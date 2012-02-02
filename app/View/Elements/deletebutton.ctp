<?php echo $this->Html->link(__('Elimina'), "#", array('class'=>'nice small radius red button', 'data-reveal-id'=>'myModal'.$id, 'data-dismissmodalclass'=>'closemodal')); ?>
<div id="myModal<?php echo $id;?>" class="reveal-modal">
     <p>Awesome. I have it.</p>
     <p class="lead">Your couch.  I it's mine.</p>
     <p>Im a cool paragraph that lives inside of an even cooler modal. Wins</p>
     <?php echo $this->Form->postLink(__('Elimina'), array('action' => 'delete', $id), array('class'=>'nice small radius red button')); ?>
     <?php echo $this->Html->link(__('Non eliminare'), "#", array('class'=>'closemodal nice large radius blue button')); ?>
</div>