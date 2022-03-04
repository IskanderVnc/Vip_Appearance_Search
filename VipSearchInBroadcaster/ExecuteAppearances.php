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
echo "<h1> ⯎ VIP APPEARANCES ⯎ </h1>";
// Before using $_GET['Initials'] 
if (isset($_GET['Initials'])) 
{ 
// Instructions if $_GET['initials'] exist 
$Initials = $_GET['Initials'];
echo "<h2>&#11049; Surname initials requested: '$Initials...'</h2>";
} else{
echo "<h1>Error! 'Initials' paremeter was not stored correctly</h1>";
}
echo "<br>";
// Before using $_GET['Broadcaster'] 
if (isset($_GET['Broadcaster'])) 
{ 
// Instructions if $_GET['Broadcaster'] exist 
$Broadcaster = $_GET['Broadcaster'];
echo "<h2>&#11049; Broadcaster Requested : $Broadcaster ©</h2>";
echo "<br>";
} else{
echo "<h1>Error! 'Broadcaster' parameter was not stored correctly</h1>";
}

// FINDING SURNAMES OF VIPS WITH THE INITIALS GIVEN //
/*---------------- CREATING CONNECTION----------------*/
$connection = mysqli_connect('localhost','root','','Vip_Tv_Appearences');
if(mysqli_connect_errno())
{
	echo "<h1> FATAL ERROR : Connection Failed </h1>";
	die ('Failed to connect to MySQL : ' . mysqli_connect_error());
}

$sql_query = "SELECT DISTINCT Surname
              FROM Vip";
$query_result = mysqli_query($connection,$sql_query);

/* COUNT TOTAL NUMBER OF ROWS */
$rowCount = mysqli_num_rows($query_result);

mysqli_close($connection);

$surnames[] = "";

if($rowCount > 0){
   while($row = mysqli_fetch_row($query_result)){
   if(substr_compare($row[0],$Initials,0,3,TRUE)==0){
	   array_push($surnames, $row[0]);
		}
	}
} 
else
{
	die ('No vip registered yet');
}
$surnamesNumber = count($surnames);
if($surnamesNumber == 1){
	echo "No VIPs (with surname having entered initials) found";
	die();
}
// SURNAMES SATISFYING THE INITIAL CHOSEN ARE NOW STORED IN THE ARRAY //-*
//---------------------------------------------------//

$connection = mysqli_connect('localhost','root','','Vip_Tv_Appearences');
if(mysqli_connect_errno())
{
	echo "<h1> FATAL ERROR : Connection Failed </h1>";
	die ('Failed to connect to MySQL : ' . mysqli_connect_error());
}


/* QUERY SQL */
/*  The application should show all the TV appearances of the VIPs whose surname starts with the specified letters and on the channels
of the specified broadcaster. For each appearance, the results should show the code of the
channel, the start date and time, the surname and the name of the VIP. Results should be ordered
by channel code and by start date and time (increasing order).*/
	
$userStr = implode("', '", $surnames);

$sql_query =   "SELECT c.CodC,a.ADate,a.StartTime,v.Surname,v.Name
                FROM Appearance a, Vip v, TV_Channel c
				WHERE a.Ssn = v.Ssn AND a.CodC = c.CodC AND c.Broadcaster = '$Broadcaster'
				      AND v.Surname IN ('$userStr')
				ORDER BY c.CodC,a.ADate,a.StartTime";
				
$query_result = mysqli_query($connection,$sql_query);

if(!$query_result)
{
	die('Query error : ' . mysqli_error($connection));
}

/* CREATION OF A TABLE */
if(mysqli_num_rows($query_result) > 0)
{
	echo "<table border = 1 cellpadding = 10>";
	echo "<tr>";
	for($i = 0; $i < mysqli_num_fields($query_result); $i++){
	$title = mysqli_fetch_field($query_result);
	$name = $title -> name;
	echo "<th> $name </th>";
	}
	echo "</tr>";
	
/* FILLING THE TABLE */
while($row = mysqli_fetch_row($query_result))
{
 echo "<tr>";
 for($i = 0; $i < mysqli_num_fields($query_result); $i++){
	 echo "<td>$row[$i]</td>";
 }
 echo "</tr>";
}
}
else{
echo "<h2>No Appearances found </h2>";
}
mysqli_close($connection);
echo "<br>";
echo "<br>";
?>
</div>

</body>

</html>