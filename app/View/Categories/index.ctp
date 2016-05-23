 <div id="k-body"><!-- content wrapper -->
    
    	<div class="container"><!-- container -->
     
            <?php if($_SESSION['role']=='Administrador'): ?>        
            
            <div class="row"><!-- row -->
                
                <div class="col-lg-12 col-md-12"><!-- doc body wrapper -->
                
                <h2>Administración de Categorías Taxonómicas</h2>
                
                <div class="conteiner">
             
                 <!--<?php if (!isset($this->params['named']['alias'])) echo 'active'; ?>-->
                         <div title="Abre el árbol taxónomico"><div class="btn btn-mini btn-link"><a href='categories/sort'>Árbol Taxonómico</a></div></div>
                </div>
                
        <div class="categories">
            <div title="Sección para agregar un nuevo nivel taxonómico">
            <div class="span4" style="text-align: left;">
                    <?php echo $this->Html->link(__('Agregar taxón'), array('action' => 'add', 'alias' => $alias), array('class' => 'btn btn-mini btn-primary', 'id' => 'addnew')); ?>
                 </div></div>
                 <br>
            <?php if (isset($this->params['named']['alias'])):
            ?>
            <div class="alert alert-info">
                    <button data-dismiss="alert" class="close" type="button">×</button>
                    <strong>Tip!</strong> See the URL - You only change the name behind alias (EX: alias:my_team), so you can create new tree menu.
            </div>
            <?php
            endif; ?>
            <table cellpadding="0" cellspacing="0" id="table-categories" class="table table-hover table-bordered table-condensed">
                <thead>
                    <tr>
                        <th class="header" style="text-align: center; width:200px"><?php echo __('Nombre de taxón'); ?></th>
                        <!--<th class="header" style="text-align: center; width:150px"><?php echo __('Published'); ?></th>-->
                        <th class="header" style="text-align: center; width:200px"><?php echo __('Clasificación'); ?></th>
                        <!--Descripcion comentado porque se va a tener en al vista especifica de cada taxon-->
                        <!--<th class="header"> <?php echo __('Descripción'); ?></th>-->
                        <th class="header" style="text-align: center; width:200px"><?php echo __('Acciones'); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($allCategories as $category):
                        $rowId = "node-" . $category['Category']['id'];
                        $childClass = (intval($category['Category']['parent_id']) > 0) ? "child-of-node-" . $category['Category']['parent_id'] : "";
                        ?>
                        <tr id="<?php echo $rowId; ?>" class="<?php echo $childClass; ?>">
                            <td>
                                <?php
                                echo $category['Category']['name'];
                                //$this->Html->link($category['Category']['name'], array('action'=>'edit', $category['Category']['id']));
                                ?>
                            </td>
                            <td><?php echo h($category['Category']['classification']); ?>&nbsp;</td>
                            
                        <!--Descripcion comentado porque se va a tener en al vista especifica de cada taxon-->
                            <!--<td><?php echo h($category['Category']['description']); ?>&nbsp;</td>-->
                            

                            <td style="text-align: center">
                            
                               	<div title ="Vista completa de la información del taxón"> <?php echo $this->Html->link(__(''), array('action' => 'view', $category['Category']['id'], 'alias'=>$alias), array('class' => 'glyphicon glyphicon-eye-open', 'style' => 'font-size:25px; padding: 5px;')); ?></div>
                                <?php echo "" ?>
                                <div title ="Editar el taxón"><?php echo $this->Html->link(__(''), array('action' => 'edit', $category['Category']['id'], 'alias'=>$alias), array('class' => 'glyphicon glyphicon-pencil', 'style' => 'font-size:25px; padding: 5px;')); ?></div>
                                <div title ="Eliminar el taxón"><?php echo $this->Form->postLink(__(''), array('action' => 'delete', $category['Category']['id'], 'alias'=>$alias), array('class' => 'glyphicon glyphicon glyphicon-trash', 'style' => 'font-size:25px; padding: 5px;'), __('Está seguro de que desea eliminar # %s?', $category['Category']['name'])); ?></div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        
            <?php
            echo $this->Html->script(array(        
                '/tree_menu/js/treetable/jquery.treeTable.js'
            ));
            ?>
            <script type="text/javascript">
                var published = { toggle : function(id, url){ obj = $('#'+id).closest("span"); $.ajax({ url: url, type: "POST", success: function(response){ obj.html(response); } }); } };       
                $(document).ready(function()  {
                    $("#table-categories").treeTable({expandable: false});
                });
            </script>
        </div>
        </div> 
     </div>
     
            <?php endif; ?>
		    <?php if($_SESSION['role']!='Administrador'): ?>
            	<div class="alert alert-warning alert-dismissable">
                	<p><strong>Upps!</strong> No puedes acceder a esta página.</p>
           		</div>
   		<?php endif; ?>     
     
    </div> 
 </div>