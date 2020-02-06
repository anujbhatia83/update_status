<?php include CURR_VIEW_PATH.'templates/header_new.php'; ?>
  	<body>
        <div id="logreg-forms">
            <form class="form-signin">
                <h1 class="h3 mb-3 font-weight-normal" style="text-align: center"> Sign in</h1>
                
                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="">
                
                <button class="btn btn-success btn-block" type="submit"><i class="fas fa-sign-in-alt"></i> Sign in</button>
                <a href="#" id="forgot_pswd">Forgot password?</a>
                <hr>
                <!-- <p>Don't have an account!</p>  -->
                <button class="btn btn-primary btn-block" type="button" id="btn-signup"><i class="fas fa-user-plus"></i>New User Sign up</button>
            </form>

            <form action="/reset/password/" class="form-reset">
                <input type="email" id="resetEmail" class="form-control" placeholder="Email address" required="" autofocus="">
                <button class="btn btn-primary btn-block" type="submit">Reset Password</button>
                <a href="#" id="cancel_reset"><i class="fas fa-angle-left"></i> Back</a>
            </form>
                
            <form action="index.php?c=Login&a=register" methond="post" class="form-signup">
                <input type="text" id="user-name" class="form-control" placeholder="Full name" required="" autofocus="">
                <input type="email" id="user-email" class="form-control" placeholder="Email address" required autofocus="">
                <input type="password" id="user-pass" class="form-control" placeholder="Password" required autofocus="">
                <input type="password" id="user-repeatpass" class="form-control" placeholder="Repeat Password" required autofocus="">

                <button class="btn btn-primary btn-block" type="submit"><i class="fas fa-user-plus"></i> Sign Up</button>
                <a href="#" id="cancel_signup"><i class="fas fa-angle-left"></i> Back</a>
            </form>
            <br>
        </div>
    </body>
<?php include CURR_VIEW_PATH.'templates/footer_new.php'; ?>