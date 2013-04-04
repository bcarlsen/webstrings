<div id="header">
	<a href="<?php echo site_url('test'); ?>">&laquo; Table of Contents</a>
	
	<div id="loginResultCont">
		<?php if(isset($logged_in)): ?>
			Current user: <?php echo $cur_user->f_name.' '.$cur_user->l_name; ?>
		<?php endif; ?>
	</div>
</div>

<div class="content-container">
	
	<p>We will test the single line input/submit combo:</p>
	
	<form>
		<div class="control-group single-line-form">
			<input type="submit" value="Send Invite"/>
			<input type="text" placeholder="Invite a new contributor..." />
		</div>
	</form>
	
	<form>
		<div class="control-group single-line-form short">
			<input type="submit" value="Send Invite"/>
			<input type="text" placeholder="Invite a new contributor..." />
			
		</div>
		<div class="control-group single-line-form ">
			<input type="submit" value="Send Invite"/>
			<input type="text" placeholder="Invite a new contributor..." />
		</div>
		<div class="control-group single-line-form medium">
			<input type="submit" value="Send Invite"/>
			<input type="text" placeholder="Invite a new contributor..." />
		</div>
		<div class="control-group single-line-form long">
			<input type="submit" value="Send Invite"/>
			<input type="text" placeholder="Invite a new contributor..." />
		</div>
	</form>
	
</div>

<div class="content-container">
	
	<p>We will test the form styles:</p>
	
	<form>
		
		<div class="control-group ">
			<?php echo form_label('Email', 'email'); ?>
			<?php echo form_input('email', '', "class='text-nrm'"); ?>
		</div>
		
		<hr />
		
		<div class="control-group ">
			<?php echo form_label('First Name', 'first_name'); ?>
			<?php echo form_input('first_name', '', "class='text-nrm'"); ?>
		</div>
		
		<hr />
		
		<div class="control-group ">
			<?php echo form_label('Last Name', 'last_name'); ?>
			<?php echo form_input('last_name', '', "class='text-nrm'"); ?>
		</div>
		
		<hr />
		
		<div class="control-group ">
			<?php echo form_label('Password', 'password_button'); ?>
			<input type="button" name="password_button" value="Change Password" />
		</div>
		
		<hr />
		
		<div class="control-group">
			<?php echo form_label('Facebook', 'facebook_checkbox'); ?>
			<div class="switch">
				<span class="thumb"></span>
				<input name="facebook_checkbox" type="checkbox" checked/>
			</div>
		</div>
		
		<div class="control-group">
			<?php echo form_label('Twitter', 'twitter_checkbox'); ?>
			<div class="switch">
				<span class="thumb"></span>
				<input name="twitter_checkbox" type="checkbox" />
			</div>
		</div>
		
		<hr />
		
		<?php echo form_label('Photo', 'photo'); ?>
		
	</form>
	
</div>

<div id="cropped-circle-container" class="content-container">
	
	<p>We will test the cropped circle pictures:</p>
	
	<div class="contributors-pics">
			
			<div class="contributor-container">
				<div class="pic-cropper">
						<img src="https://graph.facebook.com/<?php echo 'daniel.haarburger'; ?>/picture" />
				</div>
				<span class="contributor-details">
					<h4>Daniel Haarburger</h4>
					<ul class="radio-pills radio-pills-roles">
						<li><a class="roles-editor" data-sid="1">Editor</a></li><!-- 
						 --><li class="active"><a class="roles-owner" data-sid="1">Owner</a></li><!-- 
						 --><li><a class="roles-remove" data-sid="1">Remove</a></li>
					</ul>
				</span>
			</div>
		
			<div class="contributor-container">
				<div class="pic-cropper">
						<img src="https://graph.facebook.com/<?php echo 'peter.salib.777'; ?>/picture" />
				</div>
				<span class="contributor-details">
					<h4>Peter Salib</h4>
					<ul class="radio-pills radio-pills-roles">
						<li class="active"><a>Editor</a></li><!-- 
						 --><li><a>Owner</a></li><!-- 
						 --><li><a>Remove</a></li>
					</ul>
				</span>
			</div>
		
			<div class="contributor-container">
				<div class="pic-cropper">
						<img src="https://graph.facebook.com/<?php echo 'alex.wilburn.98'; ?>/picture" />
				</div>
				<span class="contributor-details">
					<h4>Alex Wilburn</h4>
					<ul class="radio-pills radio-pills-roles">
						<li class="active"><a>Editor</a></li><!-- 
						 --><li><a>Owner</a></li><!-- 
						 --><li><a>Remove</a></li>
					</ul>
				</span>
			</div>
		
			<div class="contributor-container">
				<div class="pic-cropper">
						<img src="https://graph.facebook.com/<?php echo 'david.w.rockwood'; ?>/picture" />
				</div>
				<span class="contributor-details">
					<h4>David Rockwood</h4>
					<ul class="radio-pills radio-pills-roles">
						<li class="active"><a>Editor</a></li><!-- 
						 --><li><a>Owner</a></li><!-- 
						 --><li><a>Remove</a></li>
					</ul>
				</span>
			</div>
	</div>
	
</div>

<div class="content-container" style="min-height: 150px;">
	
	<div class="toolbar">
		<div class="toolbar-item toolbar-notifications">
			<div class="toolbar-icon">
				<i class="icon icon-globe"></i>
			</div>
			<div class="toolbar-menu">
				<ul>
					<li>Item 1</li>
					<hr />
					<li>Item 2</li>
				</ul>
			</div>
		</div>
		
		<div class="toolbar-item toolbar-settings">
			<div class="toolbar-icon">
				<i class="icon icon-gear"></i>
			</div>
			<div class="toolbar-menu">
				<ul>
					<li><a href="javascript:window.showModalDialog('<?php echo site_url('bookmarklet/index').'/'; ?>?url=' + location.href,'','dialogHeight:250px;dialogWidth:700px;center:yes;resizable:no;scroll:yes;')" onclick="alert('Drag to the bookmarks bar.'); return false;" style="cursor:move;">String It!</a></li>
					<hr />
					<li>Logout</li>
				</ul>
			</div>
		</div>
	</div>
	
</div>

<div class="content-container" id="browserList">
	<div class="string-container">
		<div class="string-unread-tag">
			<i class="icon icon-tag"></i>
			<span>1</span>
		</div>
		<input type="hidden" value="" class="string-id" />
		<div class="string-info">
			<a>
				<div class="text">
					<h3>My String</h3>
					<p>This is my test string</p>
				</div>
				<div class="arrow"><img src="<?php echo base_url('public_html/images/browser/string-arrow.png') ?>" /></div>
			</a>
		</div>
		<div class="pages-content" style="">
			<div class="page-container">
				<div class="page-unread-marker"></div>
				<div class="page-info">
					<a target="iframe" href="">
						<h4>Random Page</h4>
						<div class="page-delete">
							<i class="icon icon-trash"></i><input type="hidden" value="" />
						</div>
					</a>
				</div>
				<div class="page-comments">
					<!--<div class="comment-container">
						<div class="comment-pic">
							<div class="pic-cropper">
								<img src="https://graph.facebook.com/daniel.haarburger/picture" />
							</div>
						</div>
						<div class="comment-content">
							<p>This is my comment: I think that this page is so rad. Like OMG, it's awesome!</p>
						</div>
					</div>
					<div class="comment-container">
						<div class="comment-pic">
							<div class="pic-cropper">
								<img src="https://graph.facebook.com/david.w.rockwood/picture" />
							</div>
						</div>
						<div class="comment-content">
							<p>That's a good point. This is a pretty rad page.</p>
						</div>
					</div>-->
					<div class="comment-container">
						<div class="comment-pic">
							<div class="pic-cropper">
								<img src="https://graph.facebook.com/daniel.haarburger/picture" />
							</div>
						</div>
						<div class="comment-content">
							<p>Ohhhhh!!! It's sooooo rad!!</p>
						</div>
					</div>
					<div class="comment-container">
						<div class="comment-pic">
							<div class="pic-cropper">
								<img src="https://graph.facebook.com/david.w.rockwood/picture" />
							</div>
						</div>
						<div class="comment-content">
							<p>
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam adipiscing tellus at nunc condimentum sit amet faucibus diam aliquam. Aenean convallis dapibus vehicula. Suspendisse eget enim eget sem porta varius. Nulla scelerisque aliquam luctus. Quisque sit amet interdum turpis. Ut et lorem eu mauris lacinia pulvinar. Phasellus porta felis quis odio dapibus sed volutpat risus vulputate. Phasellus ac lacus at velit pharetra iaculis ut vitae enim.

								Vivamus ac arcu elit. Praesent eget erat leo, vitae rutrum eros. Integer mollis nunc sed leo facilisis interdum. Vestibulum eleifend mi vel ipsum hendrerit vitae ornare sapien tristique. Curabitur accumsan sapien nec erat aliquam eget elementum tellus adipiscing. Nullam hendrerit, augue laoreet consectetur suscipit, ligula quam vulputate mi, sit amet auctor dolor tellus eu augue. Aliquam ultricies malesuada lacus eget tincidunt. Suspendisse nec erat nec magna pulvinar molestie vitae nec diam. Nullam commodo turpis nec orci gravida ut vehicula metus eleifend.
								
								Pellentesque malesuada euismod massa, at elementum magna condimentum eu. Etiam lorem leo, consequat sed cursus pulvinar, interdum ut dolor. Quisque iaculis mattis vulputate. Curabitur ut magna lorem, sit amet luctus nibh. Sed justo ante, viverra vel tempus quis, blandit non ipsum. Nunc ornare, velit sit amet mollis tristique, massa nibh dignissim enim, vel fringilla dolor nibh ut enim. Pellentesque erat sem, adipiscing et feugiat id, pulvinar sit amet turpis.
							</p>
						</div>
					</div>
					<div class="comment-container">
						<form>
							<div class="control-group comments">
								<div class="comment-pic">
									<div class="pic-cropper">
										<img src="https://graph.facebook.com/david.w.rockwood/picture" />
									</div>
								</div>
								<input type="text" placeholder="Write a comment..." />
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
</div>

<script type="text/javascript">
	
	$(document).ready(function() {
		
		$("input[type=text], input[type=password]").wrap('<span class="input-wrapper" />');
		
		
	});
	
</script>


<style type="text/css">
	
	html {
		overflow: auto;
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
	
	.content-container{
		width: 960px;
		margin: auto;
		margin-bottom: 15px;
		padding: 10px;
		position: relative;
		border: 3px solid #CCCCCC;
		border-radius: 8px;
	}
	
	hr {
		margin: 15px 0;
	}
	
</style>