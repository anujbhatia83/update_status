<?php include CURR_VIEW_PATH.'templates/header_new.php'; ?>
  	<div class="container">
  		<?php foreach ($employees as $e) { ?>
	  		<div class="row">
	  			<div class="col-lg-12 col-sm-12">
	  				<div class="cards">
	  					<div class="row" id="<?php echo $e['id'] ?>">
	  						<div class="col-8">
	  							<p><?php echo $e['name'] ?></p>
	  							<p><?php echo $e['location'] ?></p>
	  						</div>
	  						<div class="col-4">
	  							<label class="switch">
	  								<?php 
	  									if ($e['status'] == 1) { 
	  										$status_checked = "checked";
	  									} else { 
	  										$status_checked = null;
	  									} 
	  								?>
  									<input type="checkbox" class="status-checkbox" empID="<?php echo $e['id'] ?>" 
  									<?php echo $status_checked?> >
			 						<span class="slider round"></span>
								</label>
	  						</div>
	  					</div>
	  				</div>
	  			</div>
	  		</div>
	  	<?php } ?>
  	</div>
<?php include CURR_VIEW_PATH.'modals/update_status_modal.php'; ?>
<?php include CURR_VIEW_PATH.'templates/footer_new.php'; ?>
    
