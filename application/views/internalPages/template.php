<!DOCTYPE html>	
<html lang="en">
	<head>
		
		<title><?php echo $title; ?></title>
		
		<link href="<?php echo base_url(); ?>public_html/css/ws.css" type="text/css" rel="stylesheet"/>
		<link href="<?php echo base_url(); ?>public_html/css/jqueryUI/jquery.jscrollpane.css" type="text/css" rel="stylesheet"/>
		<link href="<?php echo base_url(); ?>public_html/js/fineuploader/fineuploader.css" type="text/css" rel="stylesheet"/>
		<?php if(isset($extraCSS)) echo $extraCSS; ?>
		
		<script src="http://js.pusher.com/1.12/pusher.min.js"></script>
		
	</head>
	<body class="scrollable">
<?php $this->load->view('internalPages/'.$view_file); ?>

	<script type="text/javascript">
		var baseURL = "<?php echo base_url(); ?>";
		var siteURL = "<?php echo site_url(); ?>/";
		var browserScroll = null;
	</script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>
	<script src="<?php echo base_url(); ?>public_html/js/jscrollpane/jquery.mousewheel.js"></script>
	<script src="<?php echo base_url(); ?>public_html/js/jscrollpane/mwheelIntent.js"></script>
	<script src="<?php echo base_url(); ?>public_html/js/jscrollpane/jquery.jscrollpane.min.js"></script>
	<?php if(isset($extraJS)) echo $extraJS; ?>

</body>
</html>