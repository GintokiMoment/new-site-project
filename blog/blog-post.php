<?php
require_once("../includes/config.inc.php");
require_once("../includes/PageDataAccess.inc.php");

$pda = new PageDataAccess(getDBLink());
$page = null;

// use the pageId query string param to get all the data for the blog page
if(isset($_GET['pageId'])){

	try{
		$page = $pda->getPageById( $_GET['pageId'] );
	}catch(Exception $e){
		redirectTo404Page();
	}

}

if(!$page || $page['active'] == "no"){
	redirectTo404Page();
}


$pageTitle = $page['title'];
$pageDescription = $page['description'];
//$sideBar = "hobbies-sidebar.inc.php";

require("../includes/header.inc.php");
?>
		<main>

			<div class="content-frame">
				
				<article>
					<i><?php echo($page['publishedDate']); ?></i>
					<h3><?php echo($page['title']); ?></h3>
					<?php echo($page['content']); ?>
				</article>

			</div>
			
		</main>
		
<?php
if(!empty($sideBar)){
	require("../includes/" . $sideBar);
}

require("../includes/footer.inc.php");


?>
