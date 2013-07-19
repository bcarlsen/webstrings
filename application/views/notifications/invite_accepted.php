<div class="note-container" data-id="<?php echo $note_id; ?>">
	<div class="note-message">
		<div class="message-text"><?php echo $invitee->f_name; ?> accepted your invite to <em><?php echo $string->title; ?></em></div>
		<div class="note-actions-container">
			<div class="message-text">
				<a href="javascript:openString(<?php echo $string->id; ?>, <?php echo "'my_strings'"; ?>)">View String</a>
			</div>
		</div>
	</div>
</div>