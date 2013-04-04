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