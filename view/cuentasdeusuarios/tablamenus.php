 <div class="box-body table-responsive">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th style='width: 20px'>Activar</th>
                                                <th style='width: 300px'>Nombre del Menu</th>
                                                <th style='width: 80px'>Tipo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php error_reporting(0);?>
                                             <?php  foreach ($lmenu as $menu): ?>
                                                 <tr id="<?php echo $menu->idmenu ?>">
      <?php  $odetmenus = $verificarestadoMenu->getMenuxusuxidmenu($cod, $menu->idmenu);?>
          <?php if (($odetmenus)): ?>
            <td><input type="checkbox" checked  data-idmenu="<?php echo $menu->idmenu;?>" class="agregarmenu"></td>
          <?php else: ?>
          <td> <input type="checkbox"  data-idmenu="<?php echo $menu->idmenu;?>" class="agregarmenu"></td>
          <?php endif ?>
                                                   <td> <?php echo utf8_encode($menu->nombremenu) ?></td>                                      
                                                   <td><?php 
                                                    if (isset($menu->idmenupadre)) {
                                                         echo "<b>Sub Menu</b>";
                                                    }else {
                                                          
                                                          echo "<b>Menu</b>";
                                                    }
                                                     ?>
                                                   </td>                                                 
                                                   
                                                   
                                                                                          
                                               <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div><!-- /.box-body -->