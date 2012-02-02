<?php if (!isset($wedding['Wedding'])) $wedding['Wedding'] = $wedding;?>
<h6><?php echo $this->Time->Format('j F Y',$wedding['Wedding']['datamatrimonio']); ?></h6>
<h4><?php echo h($wedding['Wedding']['nomecognomelui']); ?> e <?php echo h($wedding['Wedding']['nomecognomelei']); ?></h4>
<p><?php echo h($wedding['Wedding']['sala']); ?> - <?php echo h($wedding['Wedding']['cittasala']); ?>, ore <b><?php echo $this->Time->Format('H:i',$wedding['Wedding']['orario']); ?></b>&nbsp;</p>