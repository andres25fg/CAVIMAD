<div class="container">
	<div class="row">
		<?php if($_SESSION['role']=='Administrador'): ?>
			<div class="col-md-12">
				<h2><?php echo __('Administrar Usuarios'); ?></h2>
					
				<div class="row small k-equal-height"><!-- row -->
							
						<table class="table table-hover">
							
							<thead>
								<tr>
									<th><?php echo $this->Paginator->sort('Nombre'); ?></th>
									<th><?php echo $this->Paginator->sort('Apellidos'); ?></th>
									<!--<th><?php echo $this->Paginator->sort('Primer apellido'); ?></th>-->
									<!--<th><?php echo $this->Paginator->sort('Segundo apellido'); ?></th>-->
									<th><?php echo $this->Paginator->sort('Email'); ?></th>
									<th><?php echo $this->Paginator->sort('País'); ?></th>
									<!--<th><?php echo $this->Paginator->sort('Estado'); ?></th>-->
									<!--<th><?php echo $this->Paginator->sort('Ciudad'); ?></th>-->
									<th><?php echo $this->Paginator->sort('Nombre de usuario'); ?></th>
									<th><?php echo $this->Paginator->sort('Rol'); ?></th>
									<th><?php echo $this->Paginator->sort('Estado'); ?></th>
									<th title = "Click para poder editar Usuarios" class="actions"><?php echo __('Editar'); ?></th>
									<th title = "Click para activar/desactivar usuarios"class="actions2"><?php echo __('Activación'); ?></th>
								</tr>
							</thead>
							
							<tbody>
							<?php foreach ($users as $user): ?>
								<tr>
									<td><?php echo $user['User']['name']; ?>&nbsp;</td>
									<td><?php echo $user['User']['lastname1'].' '.$user['User']['lastname2']; ?>&nbsp;</td>
									<!--<td><?php echo h($user['User']['lastname1']); ?>&nbsp;</td>-->
									<!--<td><?php echo h($user['User']['lastname2']); ?>&nbsp;</td>-->
									<td><?php echo h($user['User']['email']); ?>&nbsp;</td>
									<td><?php echo $user['User']['country'].', '.$user['User']['state'].', '.$user['User']['city']; ?>&nbsp;</td>
									<!--<td><?php echo h($user['User']['country']); ?>&nbsp;</td>-->
									<!--<td><?php echo h($user['User']['state']); ?>&nbsp;</td>-->
									<!--<td><?php echo h($user['User']['city']); ?>&nbsp;</td>-->
									<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
									<td><?php echo h($user['User']['role']); ?>&nbsp;</td>
									<td><?php if(($user['User']['activated'])==1){ 
										echo Activo;
									}else{
										echo Inactivo;
									} 
									
									?>&nbsp;
									</td>
									<td class="actions" >
										<?php echo $this->Html->link(__('Editar rol'), array('action' => 'editrol', $user['User']['id'])); ?>
										<!--<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $user['User']['id']))); ?> </li>-->
									</td>
									<td class="actions" align=center>
										<?php echo $this->Html->link(__('Activación'), array('action' => 'editactivated', $user['User']['id'])); ?>
									</td>
								</tr>
							<?php endforeach; ?>
							</tbody>
							
						</table>
							
					
		                            
				</div><!-- row end -->
							
				<p align=center>
					<?php
					echo $this->Paginator->counter(array('format' => __('Página {:page} de {:pages}, mostrando {:current} resultados de {:count}')));?>	
				</p>
				<div class="paging" align=center>
					<?php
						echo $this->Paginator->prev('< ' . __('Anterior'), array(), null, array('class' => 'prev disabled'));
						echo $this->Paginator->numbers(array('separator' => ''));
						echo $this->Paginator->next(__('Siguiente') . ' >', array(), null, array('class' => 'next disabled'));
					?>
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


