
<div id="browser">
	<a id="hideMe"><span>Hide Bar</span></a>
	

	<div class="header">
			
			<div class="corner_logo float_left">
			<a href="<?php echo site_url('browser'); ?>"><span>WEBSTRINGS</span></a>
			</div>
			<div class="right_corner_name float_right bold_gray_text">
			<?php echo '<span>' .$user->f_name.'</span>'; ?>
			</div>
			<!-- <div class="toolbar">
				<div class="toolbar-item">
					<div class="toolbar-icon">
						<i class="icon icon-globe"></i>
						<div class="note-badge" <?php if($unread_notes < 1) echo 'style="display:none;"'; ?>><?php echo $unread_notes; ?></div>
					</div>
					<div class="toolbar-menu toolbar-notifications">
						<ul>
							<?php foreach($notes as $note): ?>
								<?php if($note): ?>
								<li <?php if($note->unread) echo 'class="unread"'; ?>><?php echo $note->body; ?></li>
								<?php endif; ?>
							<?php endforeach; ?>
							
							<li>
								<?php if(count($notes) > 0): ?>
									<a>View all</a>
								<?php else: ?>
									<p>No notifications</p>
								<?php endif; ?>
							</li>
						</ul>
					</div>
					<div class="notes-scroller"></div>
				</div>
					
				
			</div> -->
			
	
	</div>
	
	<div class="ribbon">
		<div>
			<?php 
				$data['notes'] = $notes;
				$data['unread_notes'] = $unread_notes;
				$this->load->view('browser/'.$browser_ribbon_file); 
			?>
		</div>
	</div>

	<div class="under_ribbon">
		<a class="view-all-strings-link" id="view-all-button" href="javascript:closeString()">&laquo;BACK TO ALL</a>
				
				<script type="text/javascript">
					
					Pusher.channel_auth_endpoint = '<?php echo site_url('browser/pusher_auth'); ?>';
					var pusher = new Pusher('e8910e066e06190cb4cd');
					var noteChannel = pusher.subscribe('private-<?php echo $user->id; ?>-notes');
					
					noteChannel.bind('newNote', function(data) {
						var content = "<li";
						if(data.unread)
							content += " class=\"unread\"";
						content += ">" + data.body + "</li>";
						
						if(notesScroll == null) {
							$(".toolbar-notifications ul").first().prepend(content);
						} else {
							notesScroll.getContentPane().find("ul").first().prepend(content);
							reinitialiseNoteScroller();
						}
						
						// add to badge
						var badge = $(".note-badge");
						badge.text(parseInt(badge.text()) + 1);
						if(badge.css("display") == "none")
							badge.show();
					});
					
				</script>

		<a target="iframe" href="" class="view-all-strings-link" id="add-page-link">+  Add Page</a>
		<div class="trash-icon-wrapper view-all-strings-link">
			<div id="page-trash-icon" class=""></div>
		</div>
	</div>	

	<div id="browserList" data-filter="my_strings">
		
		<?php $this->load->view('browser/'.$browser_view_file); ?>
		
	</div>
	
</div>



<div id="content">
	<div class="nav-arrow nav-arrow-left"><a href="javascript:prevPage()"><i class="icon icon-arrow-left"></i></a></div>
	<iframe name="iframe" src="">Your browser does not support iframes.</iframe>
	<div class="nav-arrow nav-arrow-right"><a href="javascript:nextPage()"><i class="icon icon-arrow-right"></i></a></div>
</div>