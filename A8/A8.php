<?php
if(!isset($_SESSION)){
	session_start();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$isPost = True;
	$cur = "<pre>{

	FirstName: \"{$_POST["first"]}\",

	LastName: \"{$_POST["last"]}\",

	AddressLine1: \"{$_POST["addone"]}\",

	AddressLine2: \"{$_POST["addtwo"]}\",

	City: \"{$_POST["city"]}\",

	State: \"{$_POST["state"]}\",

	Zip: \"{$_POST["zip"]}\"

}</pre>";
	$_SESSION["data"] .= $cur;	
}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
	$isPost = False;
	session_unset();
}
?>

<html>
	<head>
	<meta charset = "utf-8">
	<title>Form</title>
	<link rel="stylesheet" type="text/css" href="A8.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="A8.js"></script>
	</head>
	
	<body>	
	<p>I couldn't figure out from the wording of the assignment whether you wanted one json with all the entries or if you wanted a new json entry for each form submission, so I wrote both.
	</p>
	<table> 
	<tr>
	<th>Form 1:</th>
	<th>Form 2:</th>
	</tr>
	<tr>
	<th><pre>
{

	FirstName:"Bob", "Keith", 

	LastName: "Dylan", "Richards", 

	AddressLine1: "somewhere", "somewhere", 

	AddressLine2: "", "", 

	City: "someplace", "someplace", 

	State: "NY", "CA", 

	ZipCode: "11111", "22222", 

}
	</pre>
	</th>
	<th><pre>
{

	FirstName: "Bob",

	LastName: "Dylan",

	AddressLine1: "somewhere",

	AddressLine2: "",

	City: "someplace",

	State: "NY",

	Zip: "11111"

}

{

	FirstName: "Keith",

	LastName: "Richards",

	AddressLine1: "somewhere",

	AddressLine2: "",

	City: "someplace",

	State: "CA",

	Zip: "22222"

}
</pre>
	</th>
	</tr>
	<tr>
	<th><button type="button" onclick="window.location.replace('test.php')">Go to Form 1</button> </th>
	<th><button type="button" onclick="window.location.replace('A8.php')">Go to Form 2</button> </th>
	</tr>
</table>
	<br>		
	<form id="myform" name="myform" action="A8.php" method="post">
	<fieldset>
		<label>First name:</label>
		<input type="text" name="first" id="first"><br>
		<label>Last name:</label>
		<input type="text" name="last" id="last"><br>
		<label>Address Line 1:</label>
		<input type="text" name="addone" id="addone"><br>
		<label>Address Line 2:</label>
		<input type="text" name="addtwo" id="addtwo"><br>
		<label>City:</label>
		<input type="text" name="city" id="city"><br>
		<label>State:</label>
		<input type="text" name="state" id="state"><br>
		<label>Zip Code:</label>
		<input type="text" name="zip" id="zip"><br>
		<input type="submit" value="Submit" id="sub">
		<input type="button" onclick="window.location.replace('A8.php')" value="Cancel" />
	</fieldset>
	</form>
	<br>
	<hr>
	<br>
	
<?php
	if($isPost){
	echo $_SESSION["data"];
	}
?>
	<br>
	<h6>tested in firefox and chrome</h6>
	</body>
</html>

