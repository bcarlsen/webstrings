<div class="modal-content">
	<?php echo form_open('modals/contributor_invite/'.$string_id, array('id' => 'modalForm', 'onsubmit' =>  'return addContributor();'), array('submit' => 'submit')); ?>
		
		<div class="control-group single-line-form medium">
			<input type="submit" value="Send Invite"/>
			<span class="input-wrapper"><input id="ac-contributors" type="text" name="cont_name" placeholder="Invite a new contributor..." /></span>
			<input id="contributor-hidden" type="hidden" name="contributor_id" value="" />
		</div>
	
	<?php echo form_close(); ?>
</div>

<hr />

<div class="contributors-box">
	<?php $this->load->view('modals/contributors_content_view'); ?>
</div>

<div class="modal-footer">
	
</div>

<script type="text/javascript">
	$(function() {
		
		$("#ac-contributors").autocomplete({
			source: siteURL + "modals/contributor_search/<?php echo $string_id; ?>",
			minLength: 2,
			focus: function( event, ui ) {
				$( "#ac-contributors" ).val( ui.item.label );
				$("#contributor-hidden").attr('value', '');
				return false;
			},
			select: function( event, ui ) {
				$("#contributor-hidden").attr('value', ui.item.value);

			   return false;
			}
		}).css('z-index', 15000);
		
		$("#ac-contributors").keyup(function() {
		});
		
	});
</script>