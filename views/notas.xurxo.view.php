<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Exercicio Notas Xurxo</h1>
</div>

<!-- Content Row -->
<div class="row">
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