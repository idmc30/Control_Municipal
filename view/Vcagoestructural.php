<label>Cargo Estructural</label>
                                             <select class="form-control" id="idcargo" name="idcargo">
                                                <?php  foreach ($lcargos as $lcargos): ?>
                                                  <option value="<?php echo $lcargos->idcargo; ?>">
                                                    <?php echo utf8_encode($lcargos->titulo)." - ".utf8_encode($lcargos->descripcion) ?></option>
                                                <?php endforeach; ?>  