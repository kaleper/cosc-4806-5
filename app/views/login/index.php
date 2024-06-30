<?php

// Displays invalid login attempts, if any & if failed auths < 3
if (isset($_SESSION['failedAuth']) && $_SESSION['failedAuth'] < 3 && isset($_SESSION['failedAuthMsg'])) {
		// Displays below message if failed auths < 3
		
			echo "<div class='container text-center'>" .
							"<div class='col-lg-12 mt-5'>".
								"<h5 class = 'text-danger'> INVALID CREDENTIALS ENTERED <br>" .
										"<span class='p'>" . "Number of failed login attempts: " . $_SESSION['failedAuth'] .  "</span> <br>" . 
										"<span class='small'>" .  "Number of attempts remaining before account locked: " . (3 - $_SESSION['failedAuth']) . "</span>" .
								"</h5>" .
							"</div>" .
						"</div>"
					;

	unset($_SESSION['failedAuthMsg']);

	}; 

	// Displays lockout time, if any
if ($_SESSION['timeUnlocked'] - time() > 0 && isset($_SESSION['lockedMsg'])) {

	echo "<div class='container text-center'>" .
				"<div class='col-lg-12 mt-5'>".
						"<h5 class = 'text-danger'><br>" .
							"Account locked due to too many failed login attempts. <br>
							Try again in " . ($_SESSION['timeUnlocked'] - time()) . " seconds".
						"</h5>" .
			"</div>" .
		"</div>"
	;
	unset($_SESSION['lockedMsg']);
}

	// Display successful registration message after being redirected from registration page 
	if  (isset($_SESSION['successful_registration'])) {
				

				echo "<div class='container text-center'>" .
							"<div class='col-lg-12 mt-5'>".
								"<h5 class = 'text-success'>" .	
								$_SESSION['successful_registration'] .
								"</h5>" .
							"</div>" .
					"</div>"
				;
							
				// Unset session variable to only display message once 
				unset($_SESSION['successful_registration']);
	}
?>


<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="app/views/css/login.css">
	<!-- JS Pluigin -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
	<div class="form row justify-content-center">
		<div class="col-12 col-sm-8 col-md-6 col-xl-4">
			<div class="form-container text-center mt-5 mb-3 px-5 py-5">
				<form action="/login/verify" method="post">
					<h1 class="header h2 fw-normal">Sign In</h1>
					<fieldset class="container mt-4">
						<div class="form-group mb-1">
							<label class="visually-hidden">Username</label>
							<input type="text" class="form-control" placeholder="Username" name="username" required autofocus>
						</div>
						<div class="form-group mt-2">
							<label class="visually-hidden" >Password </label>
							<input type="password" class="form-control" placeholder="Password" name="password" required autofocus>
						</div>
						<div class="button mt-3">
							<button type="submit" class="btn btn-primary">Login</button>
						</div>
							<div class="sign-up mt-4"> New here?
								<span>
									<a class=link href="/create">Sign Up</a> 
								</span>
							</div>
					</fieldset>
				</form> 
			</div>
		</div>
	</div>
	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>