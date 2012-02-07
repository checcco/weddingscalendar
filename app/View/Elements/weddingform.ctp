<?php echo $this->Form->create('Wedding', array('class'=>'nice custom', 'inputDefaults' => array('class' => 'input-text','div' => false, 'timeFormat'=>'24', 'dateFormat'=>'DMY', 'interval'=>15, 'minYear'=>2011, 'maxYear'=>2018)));?>
	
		<h2><?php echo $title; ?></h2>
	<?php
		echo $this->Form->input('datamatrimonio', array('label'=>'Data del matrimonio'));
	?>
    <fieldset style="background-color:#e8f9ff">
		<legend><?php echo __('Lui'); ?></legend>
    <?php
		echo $this->Form->input('nomecognomelui', array('label'=>'Nome e cognome'));
		echo $this->Form->input('indirizzolui', array('label'=>'Indirizzo'));
		echo $this->Form->input('cittalui', array('label'=>'Città'));
		echo $this->Form->input('telefonolui', array('label'=>'Telefono'));
		echo $this->Form->input('emaillui', array('label'=>'E-mail'));
	?>
    </fieldset>
    <fieldset style="background-color:#fbe8ff">
		<legend><?php echo __('Lei'); ?></legend>
    <?php
		echo $this->Form->input('nomecognomelei', array('label'=>'Nome e cognome'));
		echo $this->Form->input('indirizzolei', array('label'=>'Indirizzo'));
		echo $this->Form->input('cittalei', array('label'=>'Città'));
		echo $this->Form->input('telefonolei', array('label'=>'Telefono'));
		echo $this->Form->input('emaillei', array('label'=>'E-mail'));
	?>
    </fieldset>
    <fieldset style="background-color:#fff9e8">
		<legend><?php echo __('Dettagli sala'); ?></legend>
    <?php
		echo $this->Form->input('orario', array('timeFormat'=>'24', 'label'=>'Orario'));
		echo $this->Form->input('sala', array('label'=>'Nome della sala'));
		echo $this->Form->input('cittasala', array('label'=>'Città'));?>
    </fieldset>
    <fieldset style="background-color:#ebffe8">
		<legend><?php echo __('Dettagli economici e organizzativi'); ?></legend>
	<?php
		echo $this->Form->input('prezzostabilito', array('label'=>'Prezzo stabilito'));
		echo $this->Form->input('saldo', array('label'=>'Saldo'));
		echo $this->Form->input('acconto', array('label'=>'Acconto'));
		echo $this->Form->input('datademolive', array('label'=>'Data per il demo-live'));
		echo $this->Form->input('datacontratto', array('label'=>'Data del contratto'));?>
    </fieldset>
    <fieldset id="fieldsetComparse">
    	<legend>Comparse</legend>
	<?php
		echo $this->Form->input('Player', array('label'=>false, 'multiple'=>'checkbox', 'class'=>''));
	?>
    </fieldset>
	
<?php echo $this->Form->input('evid', array('type'=>'hidden')); ?>    
<?php echo $this->Form->end(__('Invia'));?>