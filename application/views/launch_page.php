<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Web-Strings</title>

	<link href="<?php echo base_url(); ?>public_html/css/launchPage.css" type="text/css" rel="stylesheet" />
</head>
<body>

	<div id="topBar"> 
		<!--
		<ul>
			<li><a href="<?php echo site_url('browser'); ?>">Contact</a></li>
			<li><a href="#">Press Material</a></li>
		</ul> 
		-->
	</div>
	
	<div id="mainContent">
		<div id="centered">
			<h1>Welcome to <span>WebStrings</span></h1>
			
			<div id="blueDividerContainer">
				<div id="blueDividerLeft"></div>
				<div id="blueDividerRight"></div>
			</div>
			
			<p>Webstrings is still in development, but we've got some great stuff planned for launch.</p>
			
			<?php 
				if(isset($thank_you_message)){
					echo "<p>".$thank_you_message."</p>";
				} else {
			?>
				<p>To be the first with access to Webstrings, enter your email below:</p>
			<?php
					$this->load->helper('form');
					echo form_open('welcome/beta_signup');
			?>
				<div id="inputs">
					<div id="emailInput">
						<?php echo form_input('email', set_value('email', '')); ?>
					</div>
					<div id="submitButton">
						<?php echo form_submit('submit', 'Submit'); ?>
					</div>
				</div>
				<div id="errorMessage">
					<?php echo validation_errors('<span>', '</span>'); ?> 
				</div>
			<?php 
					echo form_close(); 
				}
			?>
		</div>
	</div>

</body>
</html>