<div class="weddings form eight columns">
	<?php echo $this->element('weddingform', array('title'=>'Modifica matrimonio')); ?>
</div>
<div class="actions four columns">
	<h3><?php echo __('Azioni'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Cancella questo matrimonio'), array('action' => 'delete', $this->Form->value('Wedding.id')), null, __('Sei sicuro di voler eliminare questo matrimonio? (#%s)', $this->Form->value('Wedding.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Elenco dei matrimoni'), array('action' => 'index'));?></li>
        <li><hr /></li>
		<li><?php echo $this->Html->link(__('Elenco delle comparse'), array('controller' => 'players', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Crea una nuova comparsa'), array('controller' => 'players', 'action' => 'add')); ?> </li>
	</ul>
</div>
