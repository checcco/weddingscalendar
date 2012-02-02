<div class="players index eight columns">
	<h2><?php echo __('Elenco comparse');?></h2>
    <?php
	foreach ($players as $player): ?>
	<div class="panel">
    	<div class="row">
        	<div class="six columns">
            	<h6><?php echo h($player['Player']['ruolo']); ?>&nbsp;</h6>
            </div>
            <div class="six columns">
            	<?php echo $this->Html->link(__('Dettagli'), array('action' => 'view', $player['Player']['id']), array('class'=>'nice small radius blue button')); ?>
				<?php echo $this->Html->link(__('Modifica'), array('action' => 'edit', $player['Player']['id']), array('class'=>'nice small radius blue button')); ?>
                <?php echo $this->element('deletebutton', array('id'=>$player['Player']['id']));?>
            </div>
        </div>
    </div>
<?php endforeach; ?>
	<?php echo $this->element('paginator');?>

</div>
<div class="actions four columns">
	<h3><?php echo __('Azioni'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Crea una nuova comparsa'), array('action' => 'add')); ?></li>
        <li><hr /></li>
		<li><?php echo $this->Html->link(__('Elenco dei matrimoni'), array('controller' => 'weddings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Crea un nuovo matrimonio'), array('controller' => 'weddings', 'action' => 'add')); ?> </li>
	</ul>
</div>
