<div class="note-container" data-id="<?php echo $note_id; ?>">
	<div class="note-message">
		<div class="message-text"><?php echo $adder->f_name; ?> added a page to string "<?php echo $string->title; ?>"</div>
		<div class="note-actions-container">
			<div class="message-text">
				<a href="javascript:openString(<?php echo $string->id; ?>, <?php if($is_owner) echo "'my_strings'"; else echo "'shared_strings'"; ?>)">View String</a>
			</div>
		</div>
	</div>
</div>