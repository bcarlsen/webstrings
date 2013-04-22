
<div id="browser">
	<a id="hideMe"><span>Hide Bar</span></a>
	<div class="header">
		<a href="<?php echo site_url('browser'); ?>"><h1>WEBSTRINGS</h1></a>
	</div>
	
	<div class="ribbon">
		<div class="ribbon-text-wrapper">
			<a class="ribbon-text-large" target="iframe" href="<?php echo site_url('internalPages/new_user_registration'); ?>">SIGN UP</a>
		</div>
	</div>
	
	<form action="<?php echo site_url('browser/log_in'); ?>" method="post">
		<div class="control-group">
			<label for="email">Email</label>
			<span class="input-wrapper">
				<input type="text" name="email" />
			</span>
		</div>
		<div class="control-group">
			<label for="password">Password</label>
			<span class="input-wrapper">
				<input type="password" name="password" />
			</span>
		</div>
		<div class="control-group">
			<input type="submit" name="submit" value="Login" />
		</div>
	</form>
	<div class="form_errors">
			<?php echo validation_errors(); ?>
	</div>
	
</div>



<div id="content">
	<div class="nav-arrow nav-arrow-left"><a href="javascript:prevPage()"><i class="icon icon-arrow-left"></i></a></div>
	<iframe name="iframe" src="<?php echo site_url('internalPages/getting_started'); ?>">Your browser does not support iframes.</iframe>
	<div class="nav-arrow nav-arrow-right"><a href="javascript:nextPage()"><i class="icon icon-arrow-right"></i></a></div>
</div>