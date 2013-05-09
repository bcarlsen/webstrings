<a class="ribbon-tool right-separator" href="javascript:buildModal('<?php echo site_url('modals/new_string'); ?>', 'modal-new-string')"><i class="icon icon-new-string"></i></a>
<div class="icon right-separator"></div>
<a class="ribbon-tool" href="<?php echo site_url('browser'); ?>"><i class="icon icon-home"></i></a>
<a class="ribbon-tool"><i class="icon icon-globe"></i></a>
<a class="ribbon-tool"><i class="icon icon-gear"></i></a>
<div class="toolbar-item">
	<a class="ribbon-tool">
		<i class="icon icon-gear"></i>
	</a>
	<div class="toolbar-menu toolbar-settings">
		<ul>
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
</div>
				
