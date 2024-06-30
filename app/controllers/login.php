<?php

class Login extends Controller {

    public function index() {		

	    $this->view('login/index');
	
    }
    
    public function verify(){
			// Get credentials from form
			$username = $_REQUEST['username'];
			$password = $_REQUEST['password'];
		
			$user = $this->model('AuthUser');
			$authenticated = $user->authenticate($username, $password); 

			if ($authenticated) {
						//Store username in session variable
						$_SESSION['username'] = $username;

						$isAdmin = $user->isAdmin($username);

						// Default for non-admin is 1
						if ($isAdmin) {
							$_SESSION['auth'] = 'admin';
						}
			
						//Auth successful, redirect
						header('Location: /home');
						
						die;
				} else {
						// Authentication failed, redirect back to login
						header('Location: /login');
						die;
				}
			}
}
