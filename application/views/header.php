<!DOCTYPE html>	
<html lang="en">
	<head>
		
		<title><?php echo $title; ?></title>
		
		<link href="<?php echo base_url(); ?>public_html/css/ws.css" type="text/css" rel="stylesheet"/>
		<link href="<?php echo base_url(); ?>public_html/css/jqueryUI/jquery.jscrollpane.css" type="text/css" rel="stylesheet"/>
		<link href="<?php echo base_url(); ?>public_html/js/fineuploader/fineuploader.css" type="text/css" rel="stylesheet"/>
		<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:800italic,400,300,600,700' rel='stylesheet' type='text/css'>
		
		<?php if(isset($extraCSS)) echo $extraCSS; ?>
		
		<script src="<?php echo base_url(); ?>public_html/js/jquery-1.7.2.min.js"></script>
		<script src="http://js.pusher.com/1.12/pusher.min.js"></script>
		
	</head>
	<body>
		
	