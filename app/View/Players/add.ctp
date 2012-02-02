<div class="players form eight columns">
	<?php echo $this->element('playerform', array('title'=>'Crea comparsa')); ?>
</div>
<div class="actions four columns">
	<h3><?php echo __('Azioni'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Elenco delle comparse'), array('action' => 'index'));?></li>
        <li><hr /></li>
		<li><?php echo $this->Html->link(__('Elenco dei matrimoni'), array('controller' => 'weddings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Crea un nuovo matrimonio'), array('controller' => 'weddings', 'action' => 'add')); ?> </li>
	</ul>
</div>
