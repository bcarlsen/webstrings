<div class="modal-content">
	
	<div class="modal-left">
		<div style="width:100px;height:100px;overflow:hidden;" class="pic-cropper">
			<img src="<?php echo base_url(); ?>public_html/images/temp/<?php echo $filename; ?>" id="preview" alt="Preview" />
	    </div>
		<form action="<?php echo site_url('modals/save_cropped_photo'); ?>" method="post" id="modalForm" onsubmit="return submitModalForm();" >
			<input type="hidden" id="x" name="x" />
			<input type="hidden" id="y" name="y" />
			<input type="hidden" id="w" name="w" />
			<input type="hidden" id="h" name="h" />
			<input type="hidden" name="filename" value="<?php echo $filename; ?>" />
			<div class="control-group">
				<input type="submit" name="crop_submit" value="Crop Image" />
			</div>
		</form>
		
	</div>
	
	<div class="modal-right">
		<img id="pictureEditor" src="<?php echo base_url(); ?>public_html/images/temp/<?php echo $filename; ?>" />
	</div>
	
</div>

<div class="modal-footer">
	<a href="javascript:closeModal()" class="modal-button left">Cancel</a>
</div>





<?php //echo $upload_data['full_path']; ?>



<script src="<?php echo base_url(); ?>public_html/js/jcrop/jquery.Jcrop.min.js"></script>
<script src="<?php echo base_url(); ?>public_html/js/jcrop/jquery.color.js"></script>

<script type="text/javascript">
	
	var jcrop_api;

	$("#pictureEditor").Jcrop({
		setSelect: [0, 0, 215, 215],
		//allowSelect: false,
		allowResize: true,
		aspectRatio: 1,
		onSelect: updateCoords,
		onChange: updateCoords,
		boxWidth: 670
	}, function() {
		jcrop_api = this;
	});

	function updateCoords(c) {
		$('#x').val(c.x);
		$('#y').val(c.y);
		$('#w').val(c.w);
		$('#h').val(c.h);
		showPreview(c);
	}
	
	function showPreview(coords) {
	
		var rx = 100 / coords.w;
		var ry = 100 / coords.h;
	
		var img_height = $("#pictureEditor").height();
	  	var img_width = $("#pictureEditor").width();
	
		$('#preview').css({
			width: Math.round(rx * img_width) + 'px',
			height: Math.round(ry * img_height) + 'px',
			marginLeft: '-' + Math.round(rx * coords.x) + 'px',
			marginTop: '-' + Math.round(ry * coords.y) + 'px'
		});
	}
</script>
