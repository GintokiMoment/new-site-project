<?php
require_once("includes/config.inc.php");


$pageTitle = "Contact me!";
$pageDescription = "If you have any further questions, concerns, or business inquiries, let me know!";
$sideBar = "hobbies-sidebar.inc.php";

## IF PAGE..

if($_SERVER['REQUEST_METHOD'] == 'POST')
 {
	$firstName = $_POST['txtFirstName'] ?? "";
	$lastName = $_POST['txtLastName'] ?? "";
	$email = $_POST['txtEmail'] ?? "";
	$comments = $_POST['txtComments'] ?? "";

	if(validateContactData($firstName, $lastName, $email, $comments)) {

		## If data is valid, then put into single string to send as email..

		$msg = "Name: $firstName $lastName <br>";
		$msg = "Email: $email <br>";
		$msg = "Comments: $comments";

		sendEmail(ADMIN_EMAIL, "Contact Form, $msg");
		header("Location: " . PROJECT_DIR . "contact-confirmation.php");
		exit();
	} else {

		#If foul play is suspected.. "client side bypassed"

		$msg = getAllSuperGlobals(); ##Grabs all client info
		sendEmail(ADMIN_EMAIL, "Security Warning!!", $msg);
		header("Location: " . PROJECT_DIR . "error.php");
		exit();
		
	}
 }

require("includes/header.inc.php");
?>
<script src="<?php echo(PROJECT_DIR); ?>js/contact-form.js"></script>
		<main>

			<div class="content-frame">
				
				<h1>Contact Me</h1>
				
				<form id="contactForm" method="POST" action="">
				    <table border="1">
				        <tr>
				            <td align="right" valign="bottom">First Name:</td>
				            <td>
				                <div class="validation-message" id="vFirstName"></div>
				                <input type="text" id="txtFirstName" name="txtFirstName">
				            </td>
				        </tr>
				        <tr>
				            <td align="right" valign="bottom">Last Name:</td>
				            <td>
				                <div class="validation-message" id="vLastName"></div>
				                <input type="text" id="txtLastName" name="txtLastName">
				            </td>
				        </tr>
				        <tr>
				            <td align="right" valign="bottom">Email:</td>
				            <td>
				                <div class="validation-message" id="vEmail"></div>
				                <input type="text" id="txtEmail" name="txtEmail">
				            </td>
				        </tr>
				        <tr>
				            <td align="right" valign="top">Comments:</td>
				            <td>
				                <div class="validation-message" id="vComments"></div>
				                <textarea id="txtComments" name="txtComments"></textarea>
				            </td>
				        </tr>
				        <tr>
				            <td align="right">&nbsp;</td>
				            <td>
				                <input type="submit" value="SUBMIT">
				            </td>
				        </tr>
				    </table>
				</form>

			</div>
			
		</main>
<?php

if(!empty ($sideBar) ) {
	require("includes/" . $sideBar);
}
require("includes/footer.inc.php");

function validateContactData($firstName, $lastName, $email, $comments){

	## Make sure that none of the inputs are empty.

	if(empty($firstName) || empty($lastName) || empty($comments)|| empty($email)) {
		return false;
	}

	## Make sure email is entered as a valid one.. 

	if(filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
		return false;
	}

	return true;
}

?>


