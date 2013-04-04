<div id="header">
	<a href="<?php echo site_url('test'); ?>">&laquo; Table of Contents</a>
	
	<div id="loginResultCont">
		<?php if(isset($logged_in)): ?>
			Current user: <?php echo $cur_user->f_name.' '.$cur_user->l_name; ?>
		<?php endif; ?>
	</div>
</div>

<?php if(isset($logged_in)): ?>
	<form action="<?php echo site_url('test/user_and_login_test'); ?>" method="post">
		<input type="submit" name="logout"	value="Logout" />
	</form>
<?php else: ?>
	<div id="loginFormCont">
		<form action="<?php echo site_url('test/user_and_login_test'); ?>" method="post">
			<label for="email">Email: </label>
			<input type="text" name="email" value="" />
			<label for="password">Password: </label>
			<input type="password" name="password" value="" />
			<input type="submit" name="login"	value="Login" />
		</form>
	</div>
<?php endif; ?>


<div id="allUsersCont">
	<table>
		<thead>
			<th>ID</th>
			<th>Time Created</th>
			<th>Password</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
			<th>Gender</th>
			<th>Birthday</th>
			<th>Delete</th>
		</thead>
		<?php if(isset($users)): ?>
			<?php foreach($users as $user): ?>
				<tr>
					<td><?php echo $user->id; ?></td>
					<td><?php echo $user->date_created; ?></td>
					<td><?php echo $user->password; ?></td>
					<td><?php echo $user->f_name; ?></td>
					<td><?php echo $user->l_name; ?></td>
					<td><?php echo $user->email; ?></td>
					<td><?php if($user->gender == 1) echo 'Male'; else echo 'Female'; ?></td>
					<td><?php echo strftime("%b %#d, %Y", strtotime($user->birthday)); ?></td>
					<td><a href="<?php echo site_url('test/delete_user/'.$user->id); ?>">Delete</a></td>
				</tr>
			<?php endforeach; ?>
		<?php endif; ?>
	</table>
</div>

<div id="userCreateCont">
	<form action="<?php echo site_url('test/user_and_login_test'); ?>" method="post">
		<label for="email">Email: </label>
		<input type="text" name="email" value="" />
		
		<label for="password">Password: </label>
		<input type="password" name="password" value="" />
		
		<label for="f_name">First Name: </label>
		<input type="text" name="f_name" value="" />
		
		<label for="l_name">Last Name: </label>
		<input type="text" name="l_name" value="" />
		
		<label for="gender">Gender: </label>
		<select name="gender">
			<option value="male">Male</option>
			<option value="female">Female</option>
		</select>
		
		<label for="bday">Birthday: </label>
		<input type="date" name="bday" value="1989-01-01"/>
		
		<input type="submit" name="create_user"	value="Create" />
	</form>
</div>

<style type="text/css">
	*{
		margin:0;
		padding:0;
	}
	
	#header{
		width:100%;
		margin-bottom:15px;
		overflow: hidden;
		
		border-top: 1px solid #4490d0;
		border-bottom: 1px solid #4490d0;
		background-color: #d1ebfa;
	}
	
	#header a{
		display:block;
		padding: 8px;
		
		color: #959595;
		font-family: "OstrichSansBlack", Helvetica, Arial;
		text-decoration:none;
	}
	
	label{
		width:100%;
	}
	
	input, select{
		width:100%;
		margin-bottom:15px;
	}
	
	input[type=submit]{
		width: 100px;
		display:block;
		float:right;
	}
	
	#loginFormCont{
		width: 200px;
	}
	
	#allUsersCont{
		width:100%;
	}
	
	#allUsersCont table{
		width:100%;
		text-align:center;
	}
	
	#userCreateCont{
		width: 250px;
	}
	
	
</style>