<?php

declare(strict_types=1);

define('SEG_DIA', 24 * 60 * 60);
define('SEG_HORA', 60 * 60);
define('SEG_MINUTO', 60);

//Ejercicio 1

$ej1Dividendo = isset($_GET['dividendo']) && filter_var($_GET['dividendo'], FILTER_VALIDATE_INT) !== false ? (int)$_GET['dividendo'] : 20;
$ej1Divisor = isset($_GET['divisor']) && filter_var($_GET['divisor'], FILTER_VALIDATE_INT) !== false ? (int)$_GET['divisor'] : 5;

$data['ej1_resultado'] = esDivisible($ej1Dividendo, $ej1Divisor);
$data['ej1_dividendo'] = $ej1Dividendo;
$data['ej1_divisor'] = $ej1Divisor;

function esDivisible(int $dividendo, int $divisor): bool
{
    if ($divisor === 0) {
        return false;
    } else {
        return $dividendo % $divisor == 0;
    }
}

//Ejercicio 2

$ej2Numero = isset($_GET['numero']) && strlen($_GET['numero']) == 3 ? $_GET['numero'] : "213";

$arrayNumeros = str_split($ej2Numero);

$data['ej2_arrNum'] = $arrayNumeros;
$data['ej2_numMai'] = esMayor($arrayNumeros);

function esMayor(array $arr): int
{
    if ($arr[0] >= $arr[1] && $arr[0] >= $arr[2]) {
        return 0;
    } else if ($arr[1] >= $arr[0] && $arr[1] >= $arr[2]) {
        return 1;
    } else {
        return 2;
    }
}

//Ejercicio 3

$ej3Segundo = isset($_GET['segundos']) && filter_var($_GET['segundos'], FILTER_VALIDATE_INT) !== false ? (int)$_GET['segundos'] : 99999;
$ej3Resultado = segToTime($ej3Segundo);
$data['ej3_segundos'] = $ej3Segundo;
$data['ej3_resultado'] = $ej3Resultado;

function segToTime(int $segundos): array
{
    $resultado = array(
        'dias' => 0,
        'horas' => 0,
        'minutos' => 0,
        'segundos' => 0
    );
    if ($segundos >= SEG_DIA) {
        $resultado['dias'] = intval($segundos / SEG_DIA);
        $segundos = $segundos % SEG_DIA;
    }
    if ($segundos >= SEG_HORA) {
        $resultado['horas'] = intval($segundos / SEG_HORA);
        $segundos = $segundos % SEG_HORA;
    }
    if ($segundos >= SEG_MINUTO) {
        $resultado['minutos'] = intval($segundos / SEG_MINUTO);
        $segundos = $segundos % SEG_MINUTO;
    }
    $resultado['segundos'] = $segundos;
    return $resultado;
}

//Ejercicio 4

$ej4Anho = isset($_GET['anho']) && filter_var($_GET['anho'], FILTER_VALIDATE_INT) !== false ? (int)$_GET['anho'] : 2023;

$data['ej4_anho'] = $ej4Anho;
$data['ej4_resultado'] = $ej4Anho % 400 == 0 || $ej4Anho % 4 == 0 && $ej4Anho % 100 != 0 ? true : false;

//Ejercicio 5

$ej5Num = isset($_GET['num']) && strlen($_GET['num']) !== false ? $_GET['num'] : "345";

$data['ej5_num'] = $ej5Num;
$data['ej5_arrNum'] = str_split($ej5Num);

//Ejercicio 6

$ej6Sueldo = isset($_GET['sueldo']) && filter_var($_GET['sueldo'], FILTER_VALIDATE_INT) !== false ? (int)$_GET['sueldo'] : 2500;

$ej6Descuento = 0;
$ej6Neto = 0;

if ($ej6Sueldo > 2000) {
    $ej6Descuento += ($ej6Sueldo - 2000) * 0.03;
    $ej6Descuento += 150;
} else if ($ej6Sueldo > 1000) {
    $ej6Descuento += ($ej6Sueldo - 1000) * 0.05;
    $ej6Descuento += 100;
} else {
    $ej6Descuento += $ej6Sueldo * 0.1;
}

$ej6Neto = $ej6Sueldo - $ej6Descuento;

$data['ej6_total'] = $ej6Sueldo;
$data['ej6_descuento'] = $ej6Descuento;
$data['ej6_neto'] = $ej6Neto;

//Ejercicio 7



//Ejercicio 8



/*
 * Llamamos a las vistas
 */
include 'views/templates/header.php';
include 'views/decision.view.php';
include 'views/templates/footer.php';
