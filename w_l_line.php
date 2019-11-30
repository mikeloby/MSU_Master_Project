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
  $count=0;
  
  $query = "select W from MLBteamstats where year_team like '%$id' and year_team like '2018%'";
  $result= $db->query($query);
  $num_results = $result->num_rows;
  
  for ($i=0; $i <$num_results; $i++) {
     $row = $result->fetch_assoc();
     $win= stripslashes($row['W']);
     $totalw=$totalw+$win;
     $winlw[$count]=$win;
     $yearlw[$count]="2018";
     $count=$count+1;
    
  }
  
  $query = "select W from MLBteamstats where year_team like '%$id' and year_team like '2017%'";
  $result= $db->query($query);
  $num_results = $result->num_rows;
  
  for ($i=0; $i <$num_results; $i++) {
     $row = $result->fetch_assoc();
     $win= stripslashes($row['W']);
     $totalw=$totalw+$win;
     $winlw[$count]=$win;
     $yearlw[$count]="2017";
     $count=$count+1;
    
  }
 
  $query = "select win, year from MLBdata where team like '$name%' and year >='2000'";
  $result= $db->query($query);
  $num_results = $result->num_rows;
  
  for ($i=0; $i <$num_results; $i++) {
     $row = $result->fetch_assoc();
     $win= stripslashes($row['win']);
     $year= stripslashes($row['year']);
     $totalw=$totalw+$win;
     $winlw[$count]=$win;
     $yearlw[$count]=$year;
     $count=$count+1;
    
  }
  
   $count=0;
  
  $query = "select L from MLBteamstats where year_team like '%$id' and year_team like '2018%'";
  $result= $db->query($query);
  $num_results = $result->num_rows;
  
  for ($i=0; $i <$num_results; $i++) {
     $row = $result->fetch_assoc();
     $lose= stripslashes($row['L']);
     $totall=$totall+$lose;
     $losel[$count]=$lose;
     $yearll[$count]="2018";
     $count=$count+1;
  }
  
  $query = "select L from MLBteamstats where year_team like '%$id' and year_team like '2017%'";
  $result= $db->query($query);
  $num_results = $result->num_rows;
  
  for ($i=0; $i <$num_results; $i++) {
     $row = $result->fetch_assoc();
     $lose= stripslashes($row['L']);
     $totall=$totall+$lose;
     $losel[$count]=$lose;
     $yearll[$count]="2017";
     $count=$count+1;
  }
  
  $query = "select lose, year from MLBdata where team like '$name%' and year >='2000'";
  $result= $db->query($query);
  $num_results = $result->num_rows;
  
  for ($i=0; $i <$num_results; $i++) {
     $row = $result->fetch_assoc();
     $lose= stripslashes($row['lose']);
     $year= stripslashes($row['year']);
     $totall=$totall+$lose;
     $losel[$count]=$lose;
     $yearll[$count]=$year;
     $count=$count+1;
  }
  
  for ($i=($count-1); $i >=0; $i--) {
   array_push($wins, array("y"=> $winlw[$i],"label"=> $yearlw[$i]));
   array_push($losses, array("y"=> $losel[$i],"label"=> $yearll[$i]));
  }
  
  $db->close();
  
 
?>
<html>
<head>
<link rel="stylesheet" href='../css/cssmain.css' />
</head>
<body>
<div id="cover1">
<div id="coverg1"></div>
<div id="coverg2"></div>
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
 
var chart = new CanvasJS.Chart("coverg1", {
	title: {
		text: "Wins 2000-2018"
	},
	axisY: {
		title: "Wins"
	},
	data: [{
		type: "line",
		dataPoints: <?php echo json_encode($wins, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
var chart = new CanvasJS.Chart("coverg2", {
	title: {
		text: "Losses 2000-2018"
	},
	axisY: {
		title: "Losses"
	},
	data: [{
		type: "line",
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