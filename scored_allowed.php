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
  $rscored = array();
  $rallowed = array();
 
  $query = "select R, year from MLBdata where team like '$name%' and year >='2000'";
  $result= $db->query($query);
  $num_results = $result->num_rows;
  $totals=0;
  
  
  for ($i=0; $i <$num_results; $i++) {
     $row = $result->fetch_assoc();
     $scored= stripslashes($row['R']);
     $year= stripslashes($row['year']);
     $totals=$totals+$scored;
     array_push($rscored, array("label"=> $year, "y"=> $scored));
    
  }
  
  $query = "select RA, year from MLBdata where team like '$name%' and year >='2000'";
  $result= $db->query($query);
  $num_results = $result->num_rows;
  $totala=0;
  
  
  for ($i=0; $i <$num_results; $i++) {
     $row = $result->fetch_assoc();
     $allowed= stripslashes($row['RA']);
     $year= stripslashes($row['year']);
     $totala=$totala+$allowed;
     array_push($rallowed, array("label"=> $year, "y"=> $allowed));
    
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
<h3><?php echo "Total Runs scored 2000-2016=".$totals ?></h3>
<h3><?php echo "Total Runs allowed 2000-2016=".$totala ?></h3>
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
		text: "Rscored/Rallowed 2000-2016"
	},
	axisX:{
		reversed: true
	},
	toolTip:{
		shared: true
	},
	data: [{
		type: "stackedBar",
		name: "Scored",
		dataPoints: <?php echo json_encode($rscored, JSON_NUMERIC_CHECK); ?>
	},{
		type: "stackedBar",
		name: "Allowed",
		indexLabel: "#total",
		indexLabelPlacement: "outside",
		indexLabelFontSize: 15,
		indexLabelFontWeight: "bold",
		dataPoints: <?php echo json_encode($rallowed, JSON_NUMERIC_CHECK); ?>
	
		
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