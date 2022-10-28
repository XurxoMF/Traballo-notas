<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Exercicio Notas Xurxo</h1>
</div>

<!-- Content Row -->
<div class="row">
    <?php
    if (isset($data["res"])) {
    ?>

        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Tabla de resultados</h6>
                </div>
                <div class="card-body">

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Módulo</th>
                                <th>Media</th>
                                <th>Aprobados</th>
                                <th>suspensas</th>
                                <th>Máximo</th>
                                <th>Mínimo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data["res"]["datos"] as $asignatura => $datos) { ?>
                                <tr>
                                    <td><?php echo $asignatura; ?></td>
                                    <td><?php echo $datos["media"]; ?></td>
                                    <td><?php echo $datos["aprobados"]; ?></td>
                                    <td><?php echo $datos["suspensos"]; ?></td>
                                    <td><?php echo $datos["max"]["nome"] . ": " . $datos["max"]["nota"]; ?></td>
                                    <td><?php echo $datos["min"]["nome"] . ": " . $datos["min"]["nota"]; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6">
            <div class="alert alert-success">
                <ul>
                    <?php
                    foreach ($data["res"]["cualificacions"] as $nome => $cualificacions) {
                        if ($cualificacions["suspensas"] == 0) {
                            echo "<li>$nome</li>";
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>

        <div class="col-12 col-lg-6">
            <div class="alert alert-warning">
                <ul>
                    <?php
                    foreach ($data["res"]["cualificacions"] as $nome => $cualificacions) {
                        if ($cualificacions["suspensas"] >= 1) {
                            echo "<li>$nome</li>";
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>

        <div class="col-12 col-lg-6">
            <div class="alert alert-primary">
                <ul>
                    <?php
                    foreach ($data["res"]["cualificacions"] as $nome => $cualificacions) {
                        if ($cualificacions["suspensas"] <= 1) {
                            echo "<li>$nome</li>";
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>

        <div class="col-12 col-lg-6">
            <div class="alert alert-danger">
                <ul>
                    <?php
                    foreach ($data["res"]["cualificacions"] as $nome => $cualificacions) {
                        if ($cualificacions["suspensas"] >= 2) {
                            echo "<li>$nome</li>";
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
    <?php
    }
    ?>
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Notas</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <form method="post" action="./?sec=notas.xurxo">
                    <div class="mb-3">
                        <label for="notas">JSON de notas</label>
                        <textarea class="form-control" id="notas" name="notas" rows="12"><?php echo isset($data["in"]["notas"]) ? $data["in"]["notas"] : ""; ?></textarea>
                        <?php
                        if (isset($data["err"])) {
                            for ($i = 0; $i < count($data["err"]["notas"]); $i++) {
                        ?>
                                <p class="text-danger small"><?php echo $data['err']['notas'][$i]; ?></p>
                        <?php
                            }
                        }
                        ?>
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="enviar" name="enviar" class="btn btn-primary" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>