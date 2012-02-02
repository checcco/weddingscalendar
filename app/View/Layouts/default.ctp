<!DOCTYPE html>

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8" />

	<!-- Set the viewport width to device width for mobile -->
	<meta name="viewport" content="width=device-width" />

	<title>Calendario dei matrimoni</title>
    <?php echo $this->Html->meta('icon');?>
    
	<?php echo $this->Html->css(array('foundation', 'app'));?>
	<!--[if lt IE 9]>
		<link rel="stylesheet" href="stylesheets/ie.css">
	<![endif]-->


	<!-- IE Fix for HTML5 Tags -->
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
    <?php echo $this->Html->script(array('jquery.min', 'modernizr.foundation', 'foundation', 'app'));?>
    
</head>
<body>

	<!-- container -->
	<div class="container">

		<div class="row">
			<div class="twelve columns">
				<h2>Calendario dei matrimoni</h2>
				<p>Sincronizzato con Google Calendar. Realizzato da Curiosity.</p>
				<hr />
			</div>
		</div>
		<div class="row">
			<?php echo $this->Session->flash(); ?>
            
        </div>
        <div class="row">
            <?php echo $content_for_layout; ?>
        </div>

	</div>
	<!-- container -->
</body>
</html>