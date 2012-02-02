<?php echo $this->Html->link($text, "#", array('data-reveal-id'=>'myModal'.$id, 'data-dismiss-modal-class'=>'closemodal')); ?>
<div id="myModal<?php echo $id;?>" class="reveal-modal">
     <h2>Beppe, confermi eliminazione?</h2>
     <p class="lead">Se confermi non potrai tornare indietro!!!!</p>
     <p>Io ti ho avvisato...</p>
     <?php echo $this->Html->link(__('Non eliminare'), "#", array('class'=>'closemodal nice large radius blue button')); ?>
     <?php echo $this->Form->postLink(__('Elimina'), array('action' => 'delete', $id), array('class'=>'nice small radius red button')); ?>
</div>