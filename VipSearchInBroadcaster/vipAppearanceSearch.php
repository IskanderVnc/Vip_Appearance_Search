<html>

<head>
<title> Vip Database </title>
<style>
h1 {font-family: "Georgia", sanserif ;
   color : blue;
   }
body {

  height: 120px;
  background-color: #36FF4C; /* For browsers that do not support gradients */
  background-image: linear-gradient(180deg, #DDF832,white); /* Standard syntax (must be last) */
}
	p.selection{
		font-family: "Courier", serif;
		font-style : italic;
		font-weight : bold;
		color : blue;;
		border-bottom: 1px  dotted black;
        padding-bottom: 1px;
	}
	p.subsel{
		font-family: "Times New Roman", serif;
		font-style : normal;
		font-weight : light;
		color : red;
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
<p class="subsel" style = "color : blue;"> CHOOSE AN INTERACTION BELOW </p>
<div style = "background-color:white;">
<p>
<b>LIST OF INTERACTIONS </b> &nbsp;&nbsp;&nbsp;  &#8658;  &nbsp; &nbsp; &nbsp;<a href = "./vipIndex.html"> Home </a> | <a href = "./vipAppearanceSearch.php"> Search Vip's Appearances </a>
| <a href = "./vipInsertion.php"> Insert a New Vip </a> | <a href = "./appearanceInsertion.php"> Insert a New Appearance </a>
</p>
</div>
</center>



<div>
<p class= "selection"> ☆ SEARCH VIP APPEARENCES (by initials and broadcaster): ☆</p>
<form action = "ExecuteAppearances.php" method = "get">
 <p class = "subsel">
   Initials  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;➠
<input type = "text" name = "Initials" size = "30" placeholder = "First three letters of VIP surname" >
</p>
<?php
echo"<br>";
/*---------------- CREATION OF THE DYNAMIC SELECTION MENU ----------------*/
$connection = mysqli_connect('localhost','root','','Vip_Tv_Appearences');
if(mysqli_connect_errno())
{
	echo "<h1> FATAL ERROR : Connection Failed </h1>";
	die ('Failed to connect to MySQL : ' . mysqli_connect_error());
}

$sql_query = "SELECT DISTINCT Broadcaster
              FROM TV_Channel";
$query_result = mysqli_query($connection,$sql_query);

/* COUNT TOTAL NUMBER OF ROWS */

$rowCount = mysqli_num_rows($query_result);
mysqli_close($connection);
?>
<p class = "subsel"> Broadcaster ➠ </p>
<select name = "Broadcaster"> 
<option value = "">Select Broadcaster</option>
<?php
if($rowCount > 0){
   while($row = mysqli_fetch_row($query_result)){
	echo '<option value = "'.$row[0].'">'.$row[0].'</option>';
	}
} else{
	echo '<option value = "">Course not available</option>';
}
/*----------- END OF DYNAMIC SELECTION CREATION -----------*/

?>
</select>
<?php
echo "<br>";
echo "<br>";
?>
<input type = "submit" value = "Search">
</form>
</div>
</body>
</html>