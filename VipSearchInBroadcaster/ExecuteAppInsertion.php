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
echo "<h1> ⯎ INSERTING NEW APPEARANCE ⯎ </h1>";
// Before using $_GET['VipFullName'] 
if (isset($_GET['VipFullName'])) 
{ 
// Instructions if $_GET['VipFullName'] exist 
$VipFullName = $_GET['VipFullName'];
echo "<h2>&#11049; VipFullName : '$VipFullName'</h2>";
} else{
echo "<h1>Error! 'VipFullName' paremeter was not stored correctly</h1>";
}
echo "<br>";
// Before using $_GET['CName'] 
if (isset($_GET['CName'])) 
{ 
// Instructions if $_GET['CName'] exist 
$CName = $_GET['CName'];
echo "<h2>&#11049; CName : $CName </h2>";
} else{
echo "<h1>Error! 'CName' parameter was not stored correctly</h1>";
}
echo "<br>";
// Before using $_GET['Date'] 
if (isset($_GET['Date'])) 
{ 
// Instructions if $_GET['Date'] exist 
$Date = $_GET['Date'];
echo "<h2>&#11049; Date : '$Date'</h2>";
} else{
echo "<h1>Error! 'Date' paremeter was not stored correctly</h1>";
}
echo "<br>";
// Before using $_GET['Start_Time'] 
if (isset($_GET['Start_Time'])) 
{ 
// Instructions if $_GET['Start_Time'] exist 
$Start_Time = $_GET['Start_Time'];
echo "<h2>&#11049; Start_Time : '$Start_Time'</h2>";
} else{
echo "<h1>Error! 'Start_Time' paremeter was not stored correctly</h1>";
}
echo "<br>";
// Before using $_GET['End_Time'] 
if (isset($_GET['End_Time'])) 
{ 
// Instructions if $_GET['End_Time'] exist 
$End_Time = $_GET['End_Time'];
echo "<h2>&#11049; End_Time : '$End_Time'</h2>";
} else{
echo "<h1>Error! 'End_Time' paremeter was not stored correctly</h1>";
}
echo "<br>";

// CHECKING CORRECTNESS OF PARAMETERS //

// OPEN CONNECTION TO GET ChannelCodes and relative time data about appearances ALREADY STORED IN THE DATABASE //
$connection = mysqli_connect('localhost','root','','Vip_Tv_Appearences');
if(mysqli_connect_errno())
{
	echo "<h2> FATAL ERROR : Connection Failed </h2>";
	 echo"<br>";
	die ('Failed to connect to MySQL : ' . mysqli_connect_error());
}
$sql_query =   " SELECT t.Name,ADate,StartTime,EndTime
                 FROM Appearance a,TV_Channel t
				 WHERE a.CodC=t.CodC";

$query_result = mysqli_query($connection,$sql_query);
if(!$query_result)
{
	die('Query error : ' . mysqli_error($connection));
}
$InputTime = strtotime($Start_Time);
while($row = mysqli_fetch_row($query_result))
{
$StartTime = strtotime($row[2]);
$EndTime = strtotime($row[3]);

if($CName == $row[0] && $Date == $row[1] && $InputTime >= $StartTime && $InputTime<=$EndTime)
{
	echo "<p style = 'color:white;background-color:red;'> ⥽ Error : Appearence is overlapping in the database ⥼ </p>";
	echo "<p style = 'color:white;background-color:red;'> &#10551; INSERTION FAILED </p>";
	echo"<br>";
    die('ABORTING DATABASE TRANSACTION ...');
}
}

/* QUERY SQL */
/*  Insert the new Appearance into the database (into table "Appearence")*/
	
$userStr = explode(" ", $VipFullName);

// FIND SSN //

$sql_query =   "SELECT DISTINCT Ssn
                FROM Vip
				WHERE Name = '$userStr[0]' AND Surname = '$userStr[1]'";
				
$query_result = mysqli_query($connection,$sql_query);
$row = mysqli_fetch_row($query_result);
$Ssn = $row[0];

// FIND CodC //

$sql_query =   "SELECT DISTINCT CodC
                FROM TV_Channel
				WHERE Name = '$CName'";
				
$query_result = mysqli_query($connection,$sql_query);
$row = mysqli_fetch_row($query_result);
$CodC = $row[0];

$sql_query =   "INSERT INTO Appearance(Ssn,ADate,StartTime,EndTime,CodC)
values('$Ssn','$Date','$Start_Time','$End_Time','$CodC')";
				
$query_result = mysqli_query($connection,$sql_query);

if(!$query_result)
{
	die('Query error : ' . mysqli_error($connection));
}
	echo "<p style = 'background-color : green;color:white;'> &#8680; INSERTION SUCCESS </p>";
	echo"<br>";
mysqli_close($connection);


?>
</div>

</body>

</html>
