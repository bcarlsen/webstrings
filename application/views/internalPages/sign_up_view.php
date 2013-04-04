<div class="alternative_registration_page">

	<div class="intro_video_box sign_up_box">

		<h1 class="what_is_text sign_up_title">Sign Up For Webstrings</h1>
		<div class="sign_up_fields">
			<form action="<?php echo site_url('internalPages/new_user_registration'); ?>" method="post">
				<div class="control-group">
					<label for="email">Email</label>
					<span class="input-wrapper">
						<input type="text" name="email" value="<?php echo set_value('email'); ?>" />
					</span>
				</div>
				<div class="control-group">
					<label for="password">Password</label>
					<span class="input-wrapper">
						<input type="password" name="password" />
					</span>
				</div>
				<div class="control-group">
					<label for="password_conf">Confirm Password</label>
					<span class="input-wrapper">
						<input type="password" name="password_conf" />
					</span>
				</div>
				<?php echo validation_errors('<div class="control-group"><p>','</p></div>'); ?>
				<div class="control-group">
					<input type="submit" name="submit" value="Sign Up" />
				</div>
			</form>
		</div>


		<!--<h2 >(This Is A Video)</h2>-->
			

		


	</div>
</div>
