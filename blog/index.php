<?php

$pageTitle = "Welcome to my Website!";
$pageDescription = "This website is to detail my hobbies, some art, and some other fun things.";

require("includes/header.inc.php");
?>
		<main>

			<div class="content-frame">
				
				<h1>Blog</h1>
				<p>This page will display a list of recent blog posts</p>

			</div>
			
		</main>
		<aside>
			<div class="content-frame">
				<h3>My Hobbies</h3>
				<ol>
					<li>Music</li>
					<li>Guitar</li>
					<li>Coding</li>
				</ol>
				<div class="img-container">
					<img src="../images/Lighthouse.jpg" alt="A lighthouse">
				</div>
			</div>
		</aside>
<?php
require("includes/footer.inc.php");
?>
