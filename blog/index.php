<?php
require_once("../includes/config.inc.php");

$pageTitle = "Welcome to my Website!";
$pageDescription = "This website is to detail my hobbies, some art, and some other fun things.";
//$sideBar = "hobbies-sidebar.inc.php";

require("../includes/header.inc.php");
?>
		<main>

			<div class="content-frame">
				
				<h1>Blog</h1>
				<p>This page will display a list of recent blog posts</p>

			</div>
			
		</main>

<?php

if(!empty ($sideBar) ) {
	require("../includes/" . $sideBar);
}

require("../includes/footer.inc.php");
?>

