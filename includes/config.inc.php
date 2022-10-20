<?php
set_error_handler("customErrorHandler");
# detect if code is running on localhost or a live server


if($_SERVER['SERVER_NAME'] == 'localhost') {
        #project directive.
    define("PROJECT_DIR", "/my-new-site/");
    define("IMAGES_DIR", PROJECT_DIR . "images/");
    define("DEBUG_MODE", TRUE);
    define("ADMIN_EMAIL", "gvigil000@gmail.com");
} else {
        #live site
    define("PROJECT_DIR", "/");
    define("IMAGES_DIR", PROJECT_DIR . "images/");
    define("DEBUG_MODE", FALSE);
    define("ADMIN_EMAIL", "gvigil000@gmail.com");
}

# if debug mode, we want to display in browser..

if(DEBUG_MODE) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

#send error email function.

/////////////////////////

// GLOBAL FUNCTIONS can be used all over the website; any page anytime
////////////////////////
function sendEmail ($to, $subject, $msg, $headers="") {

    if(mail($to, $subject, $msg, $headers)) {
        return true;
    } else {
        return false;
    }

}

    #string of data that builds up errors..

// Instead of using the defualt PHP error handler function 
// when an error occurs, we want this function to be used:
function customErrorHandler($errno, $errstr, $errfile, $errline){

	$errorMsg = "<br><b>THIS IS OUR CUSTOM ERROR HANDLER</b>";
	$errorMsg .= "<br>ERROR NUMBER: " . $errno;
	$errorMsg .= "<br>ERROR MSG: " . $errstr;
	$errorMsg .= "<br>FILE: " . $errfile;
	$errorMsg .= "<br>LINE NUMBER: " . $errline;
	// In the future we may want to include many more details in our 
	// custom error message

	if(DEBUG_MODE){
		// in debug mode we display all details of the error in the browser
		echo($errorMsg);
	}else{
		// when not debugging (on the live site) we don't want users to see ugly error messages
		// so instead, we get an email with the gory details and redirect users to our friendly error page.
		sendEmail(ADMIN_EMAIL, "WEBSITE ERROR!", $errorMsg . getAllSuperGlobals());
		header("Location: " . PROJECT_DIR . "error.php");
		exit();
	}
}

// Dumps all super globals to help us with debugging
function getAllSuperGlobals(){

	$str = "<br>POST VARS:<br>" . print_r($_POST, true);
	$str .= "<br>GET VARS:<br>" .  print_r($_GET, true);
	$str .= "<br>SERVER VARS:<br>" .   print_r($_SERVER, true);
	$str .= "<br>FILE VARS:<br>" .  print_r($_FILES, true);
	$str .= "<br>COOKIE VARS:<br>" .  print_r($_COOKIE, true);
	$str .= "<br>REQUEST VARS:<br>" .  print_r($_REQUEST, true);
	$str .= "<br>ENV VARS:<br>" .  print_r($_ENV, true);

	// Only include the SESSION super global if the site is using sessions
	if(isset($_SESSION)){
		$str .= "<br>SESSION VARS:<br>" .  print_r($_SESSION, true);
	}

	return $str;
}
