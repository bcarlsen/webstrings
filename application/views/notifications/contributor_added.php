<div class="note-container" data-id="<?php echo $note_id; ?>">
	<div class="pic-cropper small"><img src="<?php if($contributor->fb) echo $contributor->pic_url; else echo base_url()."public_html/images/default_avatar.png"; ?>" /></div>
	<div class="note-message">
		<div class="message-text"><?php echo $contributor->f_name; ?> is now contributing to <em><?php echo $string->title; ?></em></div>
		<div class="note-actions-container">
			<div class="message-text">
				<a href="javascript:openString(<?php echo $string->id; ?>, <?php if($is_owner) echo "'my_strings'"; else echo "'shared_strings'"; ?>)">View String</a>
			</div>
		</div>
	</div>
</div>