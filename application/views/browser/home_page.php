<div id="content">
	<div id="browserList">
		<?php
			$this->load->view('browser/string_list_view');
		?>
	</div>

	<div id="notification-list">
		<?php
			foreach ($notes as $note) {
				echo "<li class=\"notification\">". $note->body. "</li>";
			}
		?>
	</div>
</div>
<div>
	<a href="<?php echo site_url('browser/'); ?>"><i class="icon string-open-icon icon-home">Strings</i></a>
<div>