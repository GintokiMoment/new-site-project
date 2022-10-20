<?php

require_once("includes/config.inc.php");

$pageTitle = "Pictures";
$pageDescription = "Some pictures I took on my trip.";
$sideBar = "hobbies-sidebar.inc.php";

require("includes/header.inc.php");
?>

<script src="<?php echo(PROJECT_DIR); ?>js/photo-gallery.js"></script>
		<main>

			<div class="content-frame">
				
				<h1>Pictures</h1>
				<div id="image-gallery">
    				<img id="mainImg" src="" />
  				</div>
  				<br>
  				<input type="button" id="btnPrev" value="Prev" />
  				&nbsp;
  				<input type="button" id="btnNext" value="Next" />
			
			</div>
			
		</main>

<?php

if(!empty ($sideBar) ) {
	require("includes/" . $sideBar);
}
require("includes/footer.inc.php");
?>



