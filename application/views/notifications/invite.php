<div class="note-container" data-id="<?php echo $note->id; ?>">
	<div class="note-message">
		<div class="message-text"><?php echo $sender->f_name; ?> invited you to <?php if($sender->gender) echo 'his'; else echo 'her'; ?> string "<?php echo $string->title; ?>"</div>
		<div class="note-actions-container">
			<div class="message-text">
				<?php if($note->data->response == INVITE_ACCEPTED): ?>
					<a>Accepted</a>
				<?php elseif($note->data->response == INVITE_REJECTED): ?>
					<a>Ignored</a>
				<?php else: ?>
					<a class="note-accept-invite">Join String</a> | <a class="note-ignore-invite">Ignore Invite</a>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>