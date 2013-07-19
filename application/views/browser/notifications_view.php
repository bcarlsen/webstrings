<span class="title">Notifications</span>
<ul class="notifications">
	<?php
		foreach ($notifications as $note) {
			echo '<li class="notification">'. $note->body. '</li>';
		}
	?>
</ul>