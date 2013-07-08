<?php
	$this->load->helper('url');
?>
<p>
	<?php echo $sender->fullname; ?> has invited you to contribute to the string <em><?php echo $string->title; ?></em>.
</p>

<p>
	Description paragraph goes here.
</p>
<p>
Click <a href="<?php echo site_url ?>">here</a> to join.
</p>