<div class="weddings index eight columns">
	<h2><?php echo __('Elenco matrimoni');?></h2>
    <?php
	foreach ($weddings as $wedding): ?>
    	<div class="panel">
			<?php echo $this->element('weddingheader', array('wedding'=>$wedding)); ?>
            <div>
                <?php echo $this->Html->link(__('Dettagli'), array('action' => 'view', $wedding['Wedding']['id']), array('class'=>'nice small radius blue button')); ?>
                <?php echo $this->Html->link(__('Modifica'), array('action' => 'edit', $wedding['Wedding']['id']), array('class'=>'nice small radius blue button')); ?>
                <!--<?php echo $this->Form->postLink(__('Elimina'), array('action' => 'delete', $wedding['Wedding']['id']), array('class'=>'nice small radius red button'), __('Sei sicuro di voler eliminare questo matrimonio? (#%s)', $wedding['Wedding']['id'])); ?>-->
                <?php echo $this->element('deletebutton', array('id'=>$wedding['Wedding']['id']));?>
            </div>
        </div>
<?php endforeach; ?>
	<?php echo $this->element('paginator');?>
</div>
<div class="actions four columns">
	<h3><?php echo __('Azioni'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Crea un nuovo matrimonio'), array('action' => 'add')); ?></li>
        <li><hr /></li>
		<li><?php echo $this->Html->link(__('Elenco delle comparse'), array('controller' => 'players', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Crea una nuova comparsa'), array('controller' => 'players', 'action' => 'add')); ?> </li>
	</ul>
</div>
