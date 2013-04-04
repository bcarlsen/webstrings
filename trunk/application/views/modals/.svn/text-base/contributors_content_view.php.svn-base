<div class="modal-content">	
		<div class="contributors-pics">
			<?php foreach($contributors as $contributor): ?>
				<div class="contributor-container">
					<div class="pic-cropper">
						<img src="<?php if($contributor->fb) echo $contributor->pic_url; else echo base_url()."public_html/images/default_avatar.png"; ?>" />
						<?php if(!$contributor->accepted): ?><div class="invited"><span>Invited</span></div><?php endif; ?>
					</div>
					<span class="contributor-details">
						<h4><?php echo $contributor->f_name.' '.$contributor->l_name; ?></h4>
						<?php if($contributor->is_owner): ?>
							<h5>Owner</h5>
						<?php else: ?>
							<ul class="radio-pills radio-pills-roles">
							<li><a class="roles-remove" data-sid="<?php echo $string_id; ?>" data-uid="<?php echo $contributor->id; ?>">Remove</a></li>
						</ul>
						<?php endif; ?>
					</span>
				</div>
			<?php endforeach; ?>
		</div>
	</div>