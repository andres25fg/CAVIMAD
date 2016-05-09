<div class="categories form">
<ul class="breadcrumb">
    <li>
		<?php echo $this->Html->link(__('Manage').' '.$humanizeAlias, array('action'=>'index', 'alias'=>$alias));?>
		<span class="divider">/</span>
	</li>
    <li class="active"><?php echo __('Add').' '.$humanizeAlias; ?></li>
</ul>
<?php echo $this->Form->create('Category', array('class'=>'form-horizontal'));?>
	<fieldset>
		<legend><?php echo __('Add').' '.$humanizeAlias; ?></legend>
	<?php
		echo $this->Form->input('parent_id', array('div'=>'control-group','placeholder'=>'','options'=>$parentCategories,'empty'=>array('0'=>__('Root')),
					'before'=>'<label class="control-label">'.__('Parent').'</label><div class="controls">',
					'after'=>$this->Form->error('name', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
					'error' => array('attributes' => array('style' => 'display:none')),
					'label'=>false, 'class'=>'input-xlarge'));
		echo $this->Form->input('name', array('div'=>'control-group','placeholder'=>'',
					'before'=>'<label class="control-label">'.__('Name').'</label><div class="controls">',
					'after'=>$this->Form->error('name', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
					'error' => array('attributes' => array('style' => 'display:none')),
					'label'=>false, 'class'=>'input-xlarge'));
		echo $this->Form->input('slug', array('div'=>'control-group','placeholder'=>'', 'readonly'=>true,
					'before'=>'<label class="control-label">'.__('Slug').'</label><div class="controls">',
					'after'=>$this->Form->error('slug', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
					'error' => array('attributes' => array('style' => 'display:none')),
					'label'=>false, 'class'=>'input-xlarge'));
		echo $this->Form->input('published', array('div'=>'control-group', 'type'=>'checkbox','placeholder'=>'',
					'before'=>'<label class="control-label">'.__('Published').'</label><div class="controls">',
					'after'=>$this->Form->error('published', array(), array('wrap' => 'span', 'class' => 'help-inline')).'</div>',
					'error' => array('attributes' => array('style' => 'display:none')),
					'label'=>false, 'class'=>''));
	?>
        <div class="form-actions">
            <?php echo $this->Form->submit(__('Submit'), array('class'=>'btn btn-primary', 'div'=>false));?>            <?php echo $this->Form->reset(__('Cancel'), array('class'=>'btn', 'div'=>false));?>        </div>
	</fieldset>
<?php echo $this->Form->end();?>
</div>
