<!--
 /**
	* @author  Patrik Lamberger
	* @website http://github.com/lamberger
	**/
 -->
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css" media="screen" title="no title" charset="utf-8">
	<?php require('createQr.php'); ?>
</head>
<body>

<?php
// define variables and set to empty values
$title = $artnr = $produrl = $content = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$title = test_input($_POST["title"]);
  $artnr = test_input($_POST["artnr"]);
  $produrl = test_input($_POST["produrl"]);
  $content = test_input($_POST["content"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
<div class="container">
	<div class="row">
  <div class="col-md-6">
	<h2>Create QR code</h2>
	<hr>
	<div id="creator">
		<div class="css3column">
		<form class="form-horizontal" target="qr-code-box" action="createQr.php" method="post">
		  <fieldset>
				<p class="ptagg">Size of QR img</p>
				<div class="radio">
					<label><input type="radio" name="size" value="150x150" required>
				 		150x150
			 		</label>
			 	</div>
		  	 <div class="radio">
					 <label><input type="radio" name="size" value="200x200">
					 	200x200
				 	 </label>
				 </div>
		  	 <div class="radio">
					 <label><input type="radio" name="size" value="250x250">
					 250x250
					 </label>
				 </div>
		  	 <div class="radio">
					 <label><input type="radio" name="size" value="300x300">
					 300x300
					 </label>
				 </div>
			</fieldset>
			
				<fieldset>
					<p class="ptagg">Encoding:</p>
					<input type="radio" name="encoding" value="UTF-8" checked> UTF-8<br>
					<input type="radio" name="encoding" value="Shift_JIS"> Shift_JIS<br>
					<input type="radio" name="encoding" value="ISO-8859-1"> ISO-8859-1<br>
				</fieldset>
			</div>
			<input class="form-control" type="text" name="title" placeholder="A title.." required />
			<br />
			<input class="form-control" type="text" name="artnr" placeholder="a sub title..." />
			<br />
			<input class="form-control" type="text" name="produrl" placeholder="Web address http://..." />
			<br />
		  <textarea class="form-control" rows="4" name="content" placeholder="Some content..."></textarea>
			<br />
		  <p class="ptagg">Quality of QR code:</p>
			<br />
		  <select class="form-control input-lg" name="correction">
		    <option value="L" selected>L</option>
		    <option value="M">M</option>
		    <option value="Q">Q</option>
		    <option value="H">H</option>
		  </select>
			<br />
		  <small>
			  <strong>L</strong> - [Default] Allows recovery of up to 7% data loss<br />
				<strong>M</strong> - Allows recovery of up to 15% data loss<br />
				<strong>Q</strong> - Allows recovery of up to 25% data loss<br />
				<strong>H</strong> - Allows recovery of up to 30% data loss
			</small>
		  <br /><br />
		  <input class="btn btn-default" type="submit" value="Skapa"></input>
			<input class="btn btn-default" type="button" onClick="history.go(0)" value="Rensa">
		</form>
	</div>
	</div>
	<div class="col-md-6">
		<h2>Result QR code</h2>
			<hr />
			<div id="qr-result">
				<iframe name="qr-code-box" frameborder="0"  id="qr-code" src="createQr.php" height="320px" width="320px"></iframe>
			</div>
		</div>
	</div>
</div>
</body>

</html>
