<html>

<head>
<title> SCHEDULE </title>
<style>
h1 {font-family: "Georgia", sanserif ;
   color : blue;
   }
body {

  height: 120px;
  background-color: #36FF4C; /* For browsers that do not support gradients */
  background-image: linear-gradient(180deg, #DDF832,white); /* Standard syntax (must be last) */
}
	h2{
		font-family: "Times New Roman", serif;
		font-style : normal;
		font-weight : light;
		color : black;
		display: inline;
	}
		p.subsel{
		font-family: "Times New Roman", serif;
		font-style : normal;
		font-weight : light;
		color : blue;
		display: inline;
	}
	div {
    padding: 10px;
    border-width: 1px;
    border-style: solid;
    border-radius: 8px;
    border-color: black;
	
  }
  .box{
	  
	width:450px;
	height:60px;
}
 
.red{
	background:#f00;
}
.green{
	background:#0f0;
}
</style>
</head>

<body a link = "black" vlink = "black">

<center>
<h1 style = "color:black; display:inline">  VIP DATABASE  </h1>
<h1> &#8618; DATABASE INTERACTIONS MENU  </h1>
<p class="subsel"> CHOOSE AN INTERACTION BELOW </p>
<div style = "background-color:white;">
<p>
<b>LIST OF INTERACTIONS </b> &nbsp;&nbsp;&nbsp;  &#8658;  &nbsp; &nbsp; &nbsp;<a href = "./vipIndex.html"> Home </a> | <a href = "./vipAppearanceSearch.php"> Search Vip's Appearances </a>
| <a href = "./vipInsertion.php"> Insert a New Vip </a> | <a href = "./appearanceInsertion.php"> Insert a New Appearance </a>
</p>
</div>
</center>

<div>
<?php
echo "<h1> ⯎ INSERTING NEW VIP ⯎ </h1>";
// Before using $_GET['Ssn'] 
if (isset($_GET['Ssn'])) 
{ 
// Instructions if $_GET['Ssn'] exist 
$Ssn = $_GET['Ssn'];
echo "<h2>&#11049; Ssn : '$Ssn'</h2>";
} else{
echo "<h1>Error! 'Ssn' paremeter was not stored correctly</h1>";
}
echo "<br>";
// Before using $_GET['Name'] 
if (isset($_GET['Name'])) 
{ 
// Instructions if $_GET['Broadcaster'] exist 
$Name = $_GET['Name'];
echo "<h2>&#11049; Name : $Name </h2>";
} else{
echo "<h1>Error! 'Name' parameter was not stored correctly</h1>";
}
echo "<br>";
// Before using $_GET['Surname'] 
if (isset($_GET['Surname'])) 
{ 
// Instructions if $_GET['Ssn'] exist 
$Surname = $_GET['Surname'];
echo "<h2>&#11049; Surname : '$Surname'</h2>";
} else{
echo "<h1>Error! 'Surname' paremeter was not stored correctly</h1>";
}
echo "<br>";
// Before using $_GET['Employment'] 
if (isset($_GET['Employment'])) 
{ 
// Instructions if $_GET['Employment'] exist 
$Employment = $_GET['Employment'];
echo "<h2>&#11049; Employment : '$Employment'</h2>";
} else{
echo "<h1>Error! 'Employment' paremeter was not stored correctly</h1>";
}
echo "<br>";
echo "<br>";
echo "<br>";
/* CHECK THAT THE SSN IS NOT ALREADY INTO DATABASE */

// OPEN CONNECTION TO GET Ssns ALREADY STORED IN THE DATABASE //
$connection = mysqli_connect('localhost','root','','Vip_Tv_Appearences');
if(mysqli_connect_errno())
{
	echo "<h2> FATAL ERROR : Connection Failed </h2>";
	 echo"<br>";
	die ('Failed to connect to MySQL : ' . mysqli_connect_error());
}
$sql_query =   " SELECT Ssn
                 FROM Vip";

$query_result = mysqli_query($connection,$sql_query);
if(!$query_result)
{
	die('Query error : ' . mysqli_error($connection));
}

while($row = mysqli_fetch_row($query_result))
{
if($Ssn ==$row[0])
{
	

	echo "<p style = 'color:white;background-color:red;'> ⥽ Error : Ssn ($Ssn) is already in the database ⥼ </p>";
	echo "<p style = 'color:white;background-color:red;'> &#10551; INSERTION FAILED </p>";
	echo"<br>";
    die ('ABORTING DATABASE TRANSACTION ...');
}
}

mysqli_close($connection);

$connection = mysqli_connect('localhost','root','','Vip_Tv_Appearences');
if(mysqli_connect_errno())
{
	echo "<h1> FATAL ERROR : Connection Failed </h1>";
	die ('Failed to connect to MySQL : ' . mysqli_connect_error());
}

/* QUERY SQL */
/*  Insert the new VIP into the database (into table "Vip")*/
	
$sql_query =   "INSERT INTO Vip(Ssn,Name,Surname,Employment)
values('$Ssn','$Name','$Surname','$Employment')";
				
$query_result = mysqli_query($connection,$sql_query);

if(!$query_result)
{
	die('Query error : ' . mysqli_error($connection));
}

	echo "<p style = 'background-color : green;color:white;'> &#8680; INSERTION SUCCESS </p>";
	echo"<br>";
?>
</div>

</body>

</html>



