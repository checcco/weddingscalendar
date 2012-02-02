<div class="weddings form eight columns">
	<?php echo $this->element('weddingform', array('title'=>'Crea matrimonio')); ?>
</div>
<div class="actions four columns">
	<h3><?php echo __('Azioni'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Elenco dei matrimoni'), array('action' => 'index'));?></li>
        <li><hr /></li>
		<li><?php echo $this->Html->link(__('Elenco delle comparse'), array('controller' => 'players', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Crea una nuova comparsa'), array('controller' => 'players', 'action' => 'add')); ?> </li>
	</ul>
</div>
