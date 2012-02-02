<?php
echo $this->Form->create(false, array('class'=>'nice custom'));
echo $this->Form->input('password', array('class'=>'input-text'));
echo $this->Form->end('Invia');
?>