<div class="sign_up_page">
	<div class="top_nav">
		<ul>
			<li><a href="www.google.com">Press</a></li>
			<li><a href="www.google.com">Contact</a></li>
			<li><a href="www.google.com">About Us</a></li>
		</ul>

	</div>	
	<div class="logo_header_bar">
		<div class="central_text_logo"></div>
	</div>
	<div class="blue_body_bar">
		<div class="central_tag_image"></div>
		<div class="welcome_text">
			<h1>"Simple, Collaborative Research"</h1>
			<h2>We're still testing. Will be live soon</h2>
		</div>

		<div class="home_page_block">
			<form action="<?php echo site_url('internalPages/new_user_registration'); ?>" method="post">
				<div class="float_left under_half_width">
				<?php //echo form_open('internalPages/sign_up_view'); ?>		

					<div class="control-group">
						<ul>
							<!-- First Name Label -->
							<!-- <label for="f_name">First Name</label> -->
							<li>
								<span class="input-wrapper">
									<input type="text" name="fname" value="<?php echo set_value('fname'); ?>" placeholder="   First Name"/>
								</span>
							</li>
							
							<!-- Last Name Label -->
							<!--<label for="l_name">Last Name</label>-->
							<li>
								<span class="input-wrapper">
									<input type="text" name="lname" value="<?php echo set_value('lname'); ?>" placeholder="   Last Name"/>
								</span>
							</li>
						</ul>
					</div>

				</div>

				<div class="float_right under_half_width">
					<!-- Email Label Name Label -->
					<div class="control-group">
						<span class="input-wrapper">
							<input type="text" name="email" value="<?php echo set_value('email'); ?>" placeholder="   Your Email Address" />
						</span>
					</div>

					<!-- Password Label -->
					<div class="pass_and_sign_up">
						<div class="control-group float_left under_half_width">
							<span class="input-wrapper">
								<input type="password" name="password" placeholder="   Secret Password"/>
							</span>
						</div>
						<div class="control-group float_right under_half_width">
							<input type="submit" name="submit" value="Sign Up" />
						</div>
					</div>
				</div>
				<!--
				Confirm Password Lable
				<div class="control-group">
					<label for="password_conf">Confirm Password</label>
					<span class="input-wrapper">
						<input type="password" name="password_conf" />
					</span>
				</div> 
				-->
				<?php //echo validation_errors('<div class="control-group"><p>','</p></div>'); ?>
			</form>
		</div>

		<hr>
			
		<div class="home_page_block ">
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
			<div class="form_errors">
					<?php echo validation_errors(); ?>
			</div>
		</div>

	</div>


	

</div>


