<a class="ribbon-tool" href="javascript:buildModal('<?php echo site_url('modals/contributors/'.$string_id); ?>', 'modal-contributors')"><i class="icon icon-add-user"></i></a>

<a class="ribbon-tool" href="javascript:buildModal('<?php echo site_url('modals/share/'.$string_id); ?>', 'modal-share')"><i class="icon icon-share"></i></a>
<span class="icon right-separator"></span>

<a class="ribbon-tool" href="<?php echo site_url('browser'); ?>"><i class="icon icon-home"></i></a>

<div class="ribbon-tool-group dropdown-tool">
	<a class="ribbon-tool"><i class="icon icon-globe">
		<span class="badge notification-badge">
			<?php 
				if ($unread_notes > 0) {
					echo $unread_notes;
				}		
			?>
		</span>
	</i></a>
	<ul class="dropdown notifications">
		<?php
			//foreach ($notes as $note) {
				//echo "<li class=\"notification\">". $note->body. "</li>";
			//}
		?>
		<li>
			<?php if(count($notes) > 0): ?>
				<a>View all</a>
			<?php else: ?>
				<p>No notifications</p>
			<?php endif; ?>
		</li>
	</ul>
</div>

<div class="ribbon-tool-group dropdown-tool">
	<a class="ribbon-tool">
		<i class="icon icon-gear"></i>
	</a>
	<ul class="dropdown dropdown-menu">
		<li><a>Invite Friends</a></li>
		<hr />
		<li><a href="javascript:window.showModalDialog('<?php echo site_url('bookmarklet/index').'/'; ?>?url=' + location.href,'','dialogHeight:250px;dialogWidth:700px;center:yes;resizable:no;scroll:yes;')" onclick="alert('Drag to the bookmarks bar.'); return false;" style="cursor:move;">String It!</a></li>
		<hr />
		<li><a href="javascript:buildModal('<?php echo site_url('modals/settings'); ?>', 'modal-settings')">Settings</a></li>
		<hr />
		<li><a>About Us</a></li>
		<hr />
		<li><a href="<?php echo site_url('modals/log_out'); ?>/browser/index">Logout</a></li>
	</ul>
</div>