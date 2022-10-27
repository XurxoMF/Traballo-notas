<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Exercicios Decisión</h1>

</div>

<!-- Content Row -->

<div class="row">

    <div class="col-12 col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Exercicio 1</h6>
            </div>
            <div class="card-body">
                <?php echo "<p>El número " . $data['ej1_dividendo'] . " " . ($data['ej1_resultado'] ? '' : 'NO') . " es divisible entre " . $data['ej1_divisor'] . "</p>"; ?>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Exercicio 2</h6>
            </div>
            <div class="card-body">
                <p>
                    <?php echo ($data['ej2_numMai'] == 0 ? "<b>" . $data['ej2_arrNum'][0] . "</b>" : $data['ej2_arrNum'][0])
                        . ", " .
                        ($data['ej2_numMai'] == 1 ? "<b>" . $data['ej2_arrNum'][1] . "</b>" : $data['ej2_arrNum'][1])
                        . ", " .
                        ($data['ej2_numMai'] == 2 ? "<b>" . $data['ej2_arrNum'][2] . "</b>" : $data['ej2_arrNum'][2]) ?>
                </p>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Ejercicio 3</h6>
            </div>
            <div class="card-body">
                <p>
                    <?php echo $data['ej3_segundos']; ?> segundos equivalen a:<br />
                    <?php echo $data['ej3_resultado']['dias']; ?> días<br />
                    <?php echo $data['ej3_resultado']['horas']; ?> horas<br />
                    <?php echo $data['ej3_resultado']['minutos']; ?> minutos<br />
                    <?php echo $data['ej3_resultado']['segundos']; ?> segundos
                </p>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Ejercicio 4</h6>
            </div>
            <div class="card-body">
                <p>
                    El año <?php echo $data['ej4_anho'] . " " . ($data['ej4_resultado'] ? "es bisiesto." : "no es bisiesto.") ?>
                </p>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Ejercicio 5</h6>
            </div>
            <div class="card-body">
                <p>
                    <?php echo "El numero "
                        . $data['ej5_num'] . " está formado por "
                        . $data['ej5_arrNum'][0] . " centenas, "
                        . $data['ej5_arrNum'][1] . " decenas y "
                        . $data['ej5_arrNum'][2] . " unidades." ?>
                </p>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-6">
        <?php if ($data['ej6_neto'] >= 2000) { ?>
            <div class="alert alert-success">
                Felicidades, tienes un salario por encima de la media.
            </div>
        <?php } ?>
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Ejercicio 6</h6>
            </div>
            <div class="card-body">
                <p>
                    <?php echo "Sueldo total: " . $data['ej6_total'] . "<br />"
                        . "Descontado: " . $data['ej6_descuento'] . "<br />"
                        . "Neto: " . $data['ej6_neto']; ?>
                </p>
            </div>
        </div>
    </div>
</div>