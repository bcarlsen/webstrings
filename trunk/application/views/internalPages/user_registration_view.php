<div class="header" style="text-align:right;">
	<h1>New User Registration</h1>
</div>

<div class="ribbon">
	
</div>

<div id="pageContent">
	
	<form action="<?php echo site_url('internalPages/new_user_registration'); ?>" method="post">
		
		<div class="control-group">
			<label for="email">Email: </label>
			<input type="text" name="email" value="" />
		</div>
		
		<div class="control-group">
			<label for="password">Password: </label>
			<input type="password" name="password" value="" />
		</div>
		
		<div class="control-group">
			<label for="f_name">First Name: </label>
			<input type="text" name="f_name" value="" />
		</div>
		
		<div class="control-group">
			<label for="l_name">Last Name: </label>
			<input type="text" name="l_name" value="" />
		</div>
		
		<div class="control-group">
			<label for="gender">Gender: </label>
			<select name="gender">
				<option value="male">Male</option>
				<option value="female">Female</option>
			</select>
		</div>
		
		<div class="control-group">
			<label for="bday">Birthday: </label>
			<input type="date" name="bday" value="1989-01-01"/>
		</div>
		
		<div class="control-group">
			<input type="submit" name="create_user"	value="Create" />
		</div>
	</form>
	
</div>