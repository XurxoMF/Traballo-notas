<?php

if (isset($_POST["enviar"])) {
    $data["err"] = checkForm($_POST);
    $data["in"] = filter_var_array($_POST, FILTER_SANITIZE_SPECIAL_CHARS);
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
                                if (!is_int($nota)) {
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
