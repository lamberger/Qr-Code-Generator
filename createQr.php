<?php
/**
* @author  Patrik Lamberger
* @website http://github.com/lamberger
**/

if(isset($_REQUEST['content'])){
	$size          	= $_REQUEST['size'];
	$title 	   		= $_REQUEST['title'];
	$artnr      	= $_REQUEST['artnr'];
	$produrl      	= $_REQUEST['produrl'];
	$content 	   	= $_REQUEST['content'];
	$encoding 	   	= $_REQUEST['encoding'];
	$correction    	= strtoupper($_REQUEST['correction']);

	//Google api
	// Line break in url = %0A
	$rootUrl = "https://chart.googleapis.com/chart?cht=qr&chs=$size&chl=$title%0A%0A$artnr%0A%0A$produrl%0A%0A$content&choe=$encoding&chld=$correction";

	//Show the image
	echo '<img src="'.$rootUrl.'">';
}
?>
