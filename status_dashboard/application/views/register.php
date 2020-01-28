<?php include CURR_VIEW_PATH.'templates/header_new.php'; ?>
  	<div class="container">
  		<div class="row" style="margin-top:20px">
  		    <div class="col-lg-6 col-sm-12">
  				<form action="index.php?c=Employee&a=login" id="loginForm" method="post">
  					<fieldset>
  						<h2>New User Registeration</h2>
  						<hr class="colorgraph">
  						<div class="form-group">
  		                    <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address">
  						</div>
  						<div class="form-group">
  		                    <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password">
  						</div>
  						<span class="button-checkbox">
  							<button type="button" class="btn" data-color="info">Remember Me</button>
  		                    <input type="checkbox" name="remember_me" id="remember_me" checked="checked" class="hidden">
  							<a href="" class="btn btn-link pull-right">Forgot Password?</a>
  						</span>
  						<hr class="colorgraph">
  						<div class="row">
  							<div class="col-xs-6 col-sm-6 col-md-6">
  								<a href="index.php?c=Employee&a=register" class="btn btn-lg btn-primary btn-block">Register</a>
  							</div>
  						</div>
  					</fieldset>
  				</form>
  			</div>
  		</div>
  	</div>
<?php include CURR_VIEW_PATH.'templates/footer_new.php'; ?>