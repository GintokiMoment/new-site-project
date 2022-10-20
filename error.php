<?php
require_once("includes/config.inc.php");

$pageTitle = "Error";
$pageDescription = "An error has occured.";
$sideBar = "hobbies-sidebar.inc.php";

require("includes/header.inc.php");
?>
		<main>

			<div class="content-frame">
				<h1>About Me</h1>
				<div class="img-container">
					<img src="<?php echo(IMAGES_DIR); ?>Desert.jpg" alt="A desert!">
				</div>
				<p>
					Sorry for the inconvience! There seems to be an error. As soon as you got this page, rest assured that we were notified immediately after. We are working on it! Feel free to <a href="contact.php">contact</a> me for any more questions.
				</p>
			</div>
			
		</main>

<?php

if(!empty ($sideBar) ) {
	require("includes/" . $sideBar);
}

require("includes/footer.inc.php");
?>