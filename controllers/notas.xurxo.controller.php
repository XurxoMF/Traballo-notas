<?php

if (isset($_POST["enviar"])) {
    $data["err"] = checkForm($_POST);
    $data["in"] = filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS);
    if (empty($data["err"]["notas"])) {
        $data["res"] = notasAlumnos($_POST);
        var_dump($data);
    }
}

function notasAlumnos(array $POST): array
{
    $json = json_decode($_POST["notas"], true);

    $datos = [];
    $cualificacions = [];

    foreach ($json as $asignatura => $alumnos) {
        $notasMedia = 0;
        $cantAlumnos = 0;
        $suspensos = 0;
        $aprobados = 0;
        $max = ["nome" => "", "nota" => 0];
        $min = ["nome" => "", "nota" => 10];

        foreach ($alumnos as $nome => $arNotas) {
            $sumaNotasAlumno = 0;
            $cantNotasAlumno = 0;

            foreach ($arNotas as $nota) {
                $sumaNotasAlumno += $nota;
                $cantNotasAlumno++;
            }
            $nota = $sumaNotasAlumno / $cantNotasAlumno;

            $notasMedia += $nota;
            $cantAlumnos++;

            if (!isset($cualificacions[$nome])) {
                $cualificacions[$nome] = ["aprobadas" => 0, "suspensas" => 0];
            }
            if ($nota < 5) {
                $cualificacions[$nome]["suspensas"]++;
                $suspensos++;
            } else if ($nota >= 5) {
                $cualificacions[$nome]["aprobadas"]++;
                $aprobados++;
            }
            if ($max["nota"] < $nota) {
                $max["nome"] = $nome;
                $max["nota"] = $nota;
            }
            if ($min["nota"] > $nota) {
                $min["nome"] = $nome;
                $min["nota"] = $nota;
            }
        }

        $datos[$asignatura] = [
            "media" => number_format(($notasMedia / $cantAlumnos), 2, ",", "."),
            "suspensos" => $suspensos,
            "aprobados" => $aprobados,
            "max" => $max,
            "min" => $min
        ];
    }
    return ["datos" => $datos, "cualificacions" => $cualificacions];
}

function checkForm(array $POST): array
{
    $errNotas = [];
    if (empty($POST["notas"])) {
        array_push($errNotas, "O JSON de notas non pode estar vacío.");
    } else {
        $json = json_decode($POST["notas"], true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            array_push($errNotas, "O JSON de notas non ten un formato válido.");
        } else {
            foreach ($json as $asignatura => $arAlumnos) {
                if (empty($asignatura)) {
                    array_push($errNotas, "As asignaturas teñen que ter un nome.");
                }
                if (!is_array($arAlumnos)) {
                    array_push($errNotas, "A asignatura '" . htmlentities($asignatura) . "' ten que conter un array alumno->notas.");
                } else {
                    foreach ($arAlumnos as $nome => $arNotas) {
                        if (empty($nome)) {
                            array_push($errNotas, "Algún dos alumnos na materia '" . htmlentities($asignatura) . "' non ten nome.");
                        }
                        if (!is_array($arNotas)) {
                            array_push($errNotas, "As notas de '" . htmlentities($nome) . "' non están en formato array.");
                        } else {
                            foreach ($arNotas as $nota) {
                                if (!is_float($nota) && !is_int($nota)) {
                                    array_push($errNotas, "O alumno '" . htmlentities($nome) . "' en '" . htmlentities($asignatura) . "' contén unha nota que non é un número.");
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    $err["notas"] = $errNotas;
    return $err;
}

include 'views/templates/header.php';
include 'views/notas.xurxo.view.php';
include 'views/templates/footer.php';
