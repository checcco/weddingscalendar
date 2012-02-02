<?php echo $this->Form->create('Player', array('class'=>'nice custom', 'inputDefaults' => array('class' => 'input-text','div' => false)));?>
	<h2><?php echo $title;?></h2>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('ruolo');
	?>
    	<div style="display:none;">
			<?php
                echo $this->Form->input('Wedding');
            ?>
		</div>
<?php echo $this->Form->end(__('Invia'));?>