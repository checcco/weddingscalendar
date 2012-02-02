<div class="players form eight columns">
	<?php echo $this->element('playerform', array('title'=>'Modifica comparsa')); ?>
</div>
<div class="actions four columns">
	<h3><?php echo __('Azioni'); ?></h3>
	<ul>
		<!--<li><?php echo $this->Form->postLink(__('Cancella questa comparsa'), array('action' => 'delete', $this->Form->value('Player.id')), null, __('Sei sicuro di voler eliminare questa comparsa? (#%s)', $this->Form->value('Player.id'))); ?></li>-->
        <li><?php echo $this->element('deletelink', array('id'=>$this->Form->value('Player.id'), 'text'=>'Elimina questa comparsa'));?></li>
		<li><?php echo $this->Html->link(__('Elenco delle comparse'), array('action' => 'index'));?></li>
        <li><hr /></li>
		<li><?php echo $this->Html->link(__('Elenco dei matrimoni'), array('controller' => 'weddings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Crea un nuovo matrimonio'), array('controller' => 'weddings', 'action' => 'add')); ?> </li>
	</ul>
</div>
