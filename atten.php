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
  $hr = array(); //array to hold hr
  $totalh=0;
  
  $query = "select HR from MLBteamstats where year_team like '%$id'";
  $result= $db->query($query);
  $num_results = $result->num_rows;
  
  for ($i=0; $i <$num_results; $i++) {
     $row = $result->fetch_assoc();
     $hr1= stripslashes($row['HR']);
     $totalh=$totalh+$hr1;
  }

  $query = "select year_team, HR from MLBteamstats where year_team like '%$id'";
  $result= $db->query($query);
  $num_results = $result->num_rows;
  
  for ($i=0; $i <$num_results; $i++) {
     $row = $result->fetch_assoc();
     $year= stripslashes($row['year_team']);
     $hr1= stripslashes($row['HR']);
     array_push($hr, array("label"=> substr($year,0,4),"symbol" => $hr1,"y"=>($hr1*100/$totalh)));
    
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
<p><img src= '../css/Tlogos/<?php echo $_SESSION['id'];?>.png' width = "60" height = "60" alt="logo" /></p>
<h3><?php echo $name ?></h3>
</div>
</div>
<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("coverg", {
	theme: "light2",
	animationEnabled: true,
	title: {
		text: "Home Runs percentage 2003-2018"
	},
	data: [{
		type: "doughnut",
		indexLabel: "{symbol} - {y}",
		yValueFormatString: "#,##0.0\"%\"",
		showInLegend: true,
		legendText: "{label} : {y}",
		dataPoints: <?php echo json_encode($hr, JSON_NUMERIC_CHECK); ?>
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