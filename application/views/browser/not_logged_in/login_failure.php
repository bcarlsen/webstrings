<div class="sign_up_page">
	<div class="top_nav">
		<ul>
			<li><a href="<?php echo site_url('browser/press') ?>">Press</a></li>
			<li><a href="<?php echo site_url('browser/contact') ?>">Contact</a></li>
			<li><a href="<?php echo site_url('browser/about_us') ?>">About Us</a></li>
		</ul>

	</div>	
	<div class="logo_header_bar">
		<div class="central_text_logo"></div>
	</div>
	<div class="blue_body_bar">
		<div class="central_tag_image"></div>
		<div class="welcome_text">
			<h1>Simple, Collaborative Research</h1>
			<h2>We're still testing. Will be live soon</h2>
		</div>

		<div class="home_page_block ">
			<div class="form_errors">
					<?php echo validation_errors(); ?>
			</div>
			<form action="<?php echo site_url('browser/log_in'); ?>" method="post">
				<div class="control-group under_half_width float_left">
					<span class="input-wrapper">
						<input type="text" name="email" value="<?php echo set_value('email'); ?>" placeholder="   Your Email Address"/>
					</span>
				</div>
				<div class="under_half_width float_right">
					<div class="control-group under_half_width float_left">
						<span class="input-wrapper">
							<input type="password" name="password" placeholder="   Your Password"/>
						</span>
					</div>
					<div class="control-group under_half_width float_right">
						<input type="submit" name="submit" value="Login" />
					</div>
				</div>
			</form>
			</div>
		</div>

	</div>


	

</div>


