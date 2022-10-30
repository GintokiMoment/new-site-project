<?php
require_once("includes/config.inc.php");

$pageTitle = "Welcome to my Website!";
$pageDescription = "This website is to detail my hobbies, some art, and some other fun things.";
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
                    Thank you for contacting me! I will get back to you ASAP.
                </p>
			</div>
			
		</main>

<?php

if(!empty ($sideBar) ) {
	require("includes/" . $sideBar);
}

require("includes/footer.inc.php");
?>