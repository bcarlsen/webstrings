
<div class="modal-content">
	<form action="<?php echo site_url('modals/change_email'); ?>" method="post" data-form-group="1">
		<div class="control-group single-line-form-ajax">
			<label for="email">Email</label>
			<div class="control-group single-line-form">
				<input type="submit" name="submit" value="Change"/>
				<span class="input-wrapper">
					<input type="text" name="email" value="<?php echo $user->email; ?>" />
				</span>
			</div>
		</div>
	</form>
	
	<hr />
	
	<form action="<?php echo site_url('modals/change_name'); ?>" method="post" data-form-group="1">
		<div class="control-group ">
			<label for="f_name">First Name</label>
			<span class="input-wrapper"><input type="text" name="f_name" value="<?php echo $user->f_name; ?>" /></span>
		</div>
	
		<div class="control-group single-line-form-ajax">
			<label for="l_name">Last Name</label>
			<div class="control-group single-line-form">
				<input type="submit" name="submit" value="Change"/>
				<span class="input-wrapper">
					<input type="text" name="l_name" value="<?php echo $user->l_name; ?>" />
				</span>
			</div>
		</div>
	</form>
	
	<hr />

	<form action="<?php echo site_url('modals/change_password'); ?>" method="post" data-form-group="1">
		<?php echo validation_errors(); ?>
		<div class="control-group ">
			<?php echo form_label('New password', 'pw'); ?>
			<span class="input-wrapper"><?php echo form_password('pw', '', "class='text-nrm'"); ?></span>
		</div>
		
		<div class="control-group single-line-form-ajax">
			<label for="pw_conf">Confirm password</label>
			<div class="control-group single-line-form">
				<input type="submit" name="submit" value="Change"/>
				<span class="input-wrapper">
					<input type="password" name="pw_conf" />
				</span>
			</div>
		</div>
		
		<div class="form-errors">
			
		</div>
	</form>
	
	<hr />
<!--	PICTURE
	<form action="<?php echo site_url('modals/upload_photo'); ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data" target="upload_target" data-form-group="1">
		<div class="control-group settings-change-photo-container">
			<label>Photo</label>
			<div class="settings-change-photo-content">
				<div class="pic-cropper large">
					<img src="<?php if($user->photo_set) echo base_url().'public_html/images/profile_pictures/'.md5($user->id).'.jpg'; else echo base_url()."public_html/images/default_avatar.png"; ?>" />
				</div>
				<div class="file-input-wrapper pull-left">
					<input type="file" name="userfile" size="20">
					<input type="button" value="Change Photo" />
				</div>
				<div class="error-message"></div>
			</div>
		</div>
	</form>
	<iframe class="settings-upload-target" name="upload_target" ></iframe>
</div>
-->

<!-- end modal-content -->


<div class="modal-footer">
	<a href="javascript:closeModal()" class="modal-button left">Cancel</a>
</div>

<script type="text/javascript">
	
</script>

<!--
<script src="<?php echo base_url(); ?>public_html/js/fineuploader/jquery.fineuploader-3.1.min.js"></script>

<script type="text/javascript">
	$().fineUploader({
		request: {
			endpoint: '<?php echo site_url('modals/upload_photo'); ?>'
		},
		multiple: false,
		validation: {
			allowedExtensions: ['jpeg', 'jpg', 'png', 'gif']
		},
		text: {
			uploadButton: 'Upload photo'
		},
		failedUploadTextDisplay: {
			mode: 'custom',
			maxChars: 40, 
			responseProperty: 'error',
			enableToolTip: true
		},
		debug: true
	}).on('complete', function(event, id, fileName, responseJSON) {
		if(responseJSON.success) {
			$(".settings-change-photo-content").first().load("<?php echo site_url('modals/crop_photo'); ?>",{ 'data' : responseJSON }, function() {
			});
		} else {
			
		}
	});
</script>-->