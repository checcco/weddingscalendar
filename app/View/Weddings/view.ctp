<div class="weddings view eight columns">
	<h2><?php  echo __('Dettagli matrimonio');?></h2>
    <div class="panel">
    	<?php echo $this->element('weddingheader', array('wedding'=>$wedding)); ?>
        <div class="row">
        	<div class="six columns">
            	<p><?php echo h($wedding['Wedding']['nomecognomelui']); ?><br />
                <?php echo h($wedding['Wedding']['indirizzolui']); ?><br />
                <?php echo h($wedding['Wedding']['cittalui']); ?><br />
                <?php echo h($wedding['Wedding']['telefonolui']); ?><br />
                <?php echo h($wedding['Wedding']['emaillui']); ?></p>
            </div>
            <div class="six columns">
            	<p><?php echo h($wedding['Wedding']['nomecognomelei']); ?><br />
                <?php echo h($wedding['Wedding']['indirizzolei']); ?><br />
                <?php echo h($wedding['Wedding']['cittalei']); ?><br />
                <?php echo h($wedding['Wedding']['telefonolei']); ?><br />
                <?php echo h($wedding['Wedding']['emaillei']); ?></p>
            </div>
        </div>
        <div class="row" style="margin-bottom:20px">
        	<div class="four columns">
            	<h6>Prezzo stabilito</h6>
                <?php echo h($wedding['Wedding']['prezzostabilito']); ?>
            </div>
            <div class="four columns">
            	<h6>Acconto</h6>
                <?php echo h($wedding['Wedding']['acconto']); ?>
            </div>
            <div class="four columns">
            	<h6>Saldo</h6>
                <?php echo h($wedding['Wedding']['saldo']); ?>
            </div>
        </div>
        <div class="row" style="margin-bottom:20px">
        	Data demo-live: <?php echo $this->Time->Format('j F Y',$wedding['Wedding']['datademolive']); ?>, ore <b><?php echo $this->Time->Format('H:i',$wedding['Wedding']['datademolive']); ?></b><br />
            Data contratto: <?php echo $this->Time->Format('j F Y',$wedding['Wedding']['datacontratto']); ?>
        </div>
        <div class="row" style="margin-bottom:20px;">
        	<h4>Comparse convocate</h4>
            <?php if (!empty($wedding['Player'])) {?>
                <table cellpadding = "0" cellspacing = "0" width="100%">
                <?php
                    $i = 0;
                    foreach ($wedding['Player'] as $player): ?>
                    <tr>
                        <td><?php echo $player['ruolo'];?></td>
                        <td class="actions">
                            <?php echo $this->Html->link(__('Dettagli su questa comparsa'), array('controller' => 'players', 'action' => 'view', $player['id'])); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </table>
            <?php } else { ?>
            	Nessuna comparsa convocata
            <?php }?>
        </div>
        <div class="row">
			<?php echo $this->Html->link(__('Modifica'), array('action' => 'edit', $wedding['Wedding']['id']), array('class'=>'nice small radius blue button')); ?>
			<?php echo $this->Form->postLink(__('Elimina'), array('action' => 'delete', $wedding['Wedding']['id']), array('class'=>'nice small radius red button'), __('Sei sicuro di voler eliminare questo matrimonio? (#%s)', $wedding['Wedding']['id'])); ?>
        </div>
    </div>
</div>
<div class="actions four columns">
	<h3><?php echo __('Azioni'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Modifica questo matrimonio'), array('action' => 'edit', $wedding['Wedding']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Cancella questo matrimonio'), array('action' => 'delete', $wedding['Wedding']['id']), null, __('Sei sicuro di voler eliminare questo matrimonio? (#%s)', $wedding['Wedding']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Elenco dei matrimoni'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Crea un nuovo matrimonio'), array('action' => 'add')); ?> </li>
        <li><hr /></li>
		<li><?php echo $this->Html->link(__('Elenco delle comparse'), array('controller' => 'players', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Crea una nuova comparsa'), array('controller' => 'players', 'action' => 'add')); ?> </li>
	</ul>
</div>

