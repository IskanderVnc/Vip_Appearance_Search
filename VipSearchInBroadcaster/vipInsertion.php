<html>

<head>
<title> Vip Database - Home </title>
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
<p class="subsel" style = "color:blue;"> CHOOSE AN INTERACTION BELOW </p>
<div style = "background-color:white;">
<p>
<b>LIST OF INTERACTIONS </b> &nbsp;&nbsp;&nbsp;  &#8658;  &nbsp; &nbsp; &nbsp;<a href = "./vipIndex.html"> Home </a> | <a href = "./vipAppearanceSearch.php"> Search Vip's Appearances </a>
| <a href = "./vipInsertion.php"> Insert a New Vip </a> | <a href = "./appearanceInsertion.php"> Insert a New Appearance </a>
</p>
</div>
</center>

<div>
<p class= "selection"> ☆ INSERT A NEW VIP INTO DATABASE ☆</p>

<form action = "ExecuteVipInsertion.php" method = "get">

<p class = "subsel">
SSN &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ➠
<input type = "text" name = "Ssn" placeholder= "Enter SSN" size = "30">
</p>
<p></p>
<p class = "subsel">
Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;➠
<input type = "text" name = "Name" placeholder= "Enter Name" size = "30">
</p>
<p></p>
<p class = "subsel">
Surname &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ➠ 
<input type = "text" name = "Surname" placeholder= "Enter Surname" size = "30">
</p>
<p></p>
<p class = "subsel">
Employment ➠
<input type = "text" name = "Employment" placeholder= "Enter Vip's Employment" size = "30">
</p>
<p></p>
<input type = "submit" value = "Confirm and Insert ">
</form>

</div>

</html>