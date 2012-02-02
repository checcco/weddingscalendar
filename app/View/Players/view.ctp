<div class="players view eight columns">
	<h2>Matrimoni della comparsa <?php echo h($player['Player']['ruolo']); ?></h2>
    <div class="related">
        <?php if (!empty($player['Wedding'])) {?>
        
        <?php
            $i = 0;
            foreach ($player['Wedding'] as $wedding): ?>
            	<div class="panel">
					<?php echo $this->element('weddingheader', array('wedding'=>$wedding));?>
                    <?php //debug($wedding);?>
                </div>
        <?php endforeach; ?>
    <?php } else { ?>
    	<p>Questa comparsa non ha matrimoni</p>
    <?php }?>
    </div>
</div>
<div class="actions four columns">
	<h3><?php echo __('Azioni'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Modifica questa comparsa'), array('action' => 'edit', $player['Player']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Cancella questa comparsa'), array('action' => 'delete', $player['Player']['id']), null, __('Sei sicuro di voler eliminare questa comparsa? (#%s)', $player['Player']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Elenco delle comparse'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Crea una nuova comparsa'), array('action' => 'add')); ?> </li>
        <li><hr /></li>
		<li><?php echo $this->Html->link(__('Elenco dei matrimoni'), array('controller' => 'weddings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Crea un nuovo matrimonio'), array('controller' => 'weddings', 'action' => 'add')); ?> </li>
	</ul>
</div>