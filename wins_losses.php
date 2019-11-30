<?php

session_start();
  
  if(!isset($_SESSION['vuser']))
  {
    header('Location: /home.php');
  }
  else
  {
 
 include('../db_con.php');
  $name=$_SESSION['name'];
  $id=$_SESSION['id'];
  $wins = array();
  $losses = array();
  $totalw=0;
  $totall=0;
  
  $query = "select W from MLBteamstats where year_team like '%$id' and year_team like '2018%'";
  $result= $db->query($query);
  $num_results = $result->num_rows;
  
  for ($i=0; $i <$num_results; $i++) {
     $row = $result->fetch_assoc();
     $win= stripslashes($row['W']);
     $totalw=$totalw+$win;
     array_push($wins, array("label"=> "2018", "y"=> $win));
    
  }
  
  $query = "select W from MLBteamstats where year_team like '%$id' and year_team like '2017%'";
  $result= $db->query($query);
  $num_results = $result->num_rows;
  
  for ($i=0; $i <$num_results; $i++) {
     $row = $result->fetch_assoc();
     $win= stripslashes($row['W']);
     $totalw=$totalw+$win;
     array_push($wins, array("label"=> "2017", "y"=> $win));
    
  }
  
  $query = "select win, year from MLBdata where team like '$name%' and year >='2000'";
  $result= $db->query($query);
  $num_results = $result->num_rows;
  
  for ($i=0; $i <$num_results; $i++) {
     $row = $result->fetch_assoc();
     $win= stripslashes($row['win']);
     $year= stripslashes($row['year']);
     $totalw=$totalw+$win;
     array_push($wins, array("label"=> $year, "y"=> $win));
    
  }
  
  $query = "select L from MLBteamstats where year_team like '%$id' and year_team like '2018%'";
  $result= $db->query($query);
  $num_results = $result->num_rows;
  
  for ($i=0; $i <$num_results; $i++) {
     $row = $result->fetch_assoc();
     $lose= stripslashes($row['L']);
     $totall=$totall+$lose;
     array_push($losses, array("label"=> "2018", "y"=> $lose));
    
  }
  
  $query = "select L from MLBteamstats where year_team like '%$id' and year_team like '2017%'";
  $result= $db->query($query);
  $num_results = $result->num_rows;
  
  for ($i=0; $i <$num_results; $i++) {
     $row = $result->fetch_assoc();
     $lose= stripslashes($row['L']);
     $totall=$totall+$lose;
     array_push($losses, array("label"=> "2017", "y"=> $lose));
    
  }
  
  
  $query = "select lose, year from MLBdata where team like '$name%' and year >='2000'";
  $result= $db->query($query);
  $num_results = $result->num_rows;
  
  for ($i=0; $i <$num_results; $i++) {
     $row = $result->fetch_assoc();
     $lose= stripslashes($row['lose']);
     $year= stripslashes($row['year']);
     $totall=$totall+$lose;
     array_push($losses, array("label"=> $year, "y"=> $lose));
    
  }
 
 
  $db->close();
  
 
?>
<html>
<head>
<link rel="stylesheet" href='../css/cssmain.css' />
</head>
<body>
<div id="cover1">
<div id="coverg"></div>
<div id="content1">
<p><img src= '../css/Tlogos/<?php echo $_SESSION['id']."2";?>.png' width = "60" height = "60" alt="logo" /></p>
<h3><?php echo $name ?></h3>
<h3><?php echo "Total wins 2000-2018=".$totalw ?></h3>
<h3><?php echo "Total losses 2000-2018=".$totall ?></h3>
</div>
<p></p>
<div class="btn-group">
  <button class="button1"><a href = "/teams/load1.php">Return previous screen</button>
  <button class="button1"><a href = "/main.php">Return home screen</button>
  </div>
</div>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("coverg", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Win/losses 2000-2018"
	},
	axisX:{
		reversed: true
	},
	toolTip:{
		shared: true
	},
	data: [{
		type: "stackedBar",
		name: "Wins",
		dataPoints: <?php echo json_encode($wins, JSON_NUMERIC_CHECK); ?>
	},{
		type: "stackedBar",
		name: "Losses",
		indexLabel: "#total",
		indexLabelPlacement: "outside",
		indexLabelFontSize: 15,
		indexLabelFontWeight: "bold",
		dataPoints: <?php echo json_encode($losses, JSON_NUMERIC_CHECK); ?>
	
		
	}]
});
chart.render();
 
}
</script>
<script src='../js/canvasjs.min.js'></script>

</body>
</html>                              
<?php

}
?>