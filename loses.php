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
  $dataPoints = array();
 
  $query = "select lose, year from MLBdata where team like '$name%' and year >='2000'";
  $result= $db->query($query);
  $num_results = $result->num_rows;
  $total=0;
  
  
  for ($i=0; $i <$num_results; $i++) {
     $row = $result->fetch_assoc();
     $lose= stripslashes($row['lose']);
     $year= stripslashes($row['year']);
     $total=$total+$lose;
     array_push($dataPoints, array("y"=> $lose, "label"=> $year));
    
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
<p><img src= '../css/Tlogos/<?php echo $id ?>.png' width = "60" height = "60" alt="logo" /></p>
<h3><?php echo $name ?></h3>
<h3><?php echo "Total loses=".$total ?></h3>
 <button><a href = '../teams/load1.php?id=<?php echo $id ?>'>CLOSE</a></button>
</div>
</div>
<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("coverg", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light2",
	title:{
		text: "Team loses from 2000-2016"
	},
	axisY: {
		title: "LOSES"
	},
	data: [{
		type: "bar",
		yValueFormatString: "###0",
		indexLabel: "{y}",
		indexLabelPlacement: "inside",
		indexLabelFontWeight: "bolder",
		indexLabelFontColor: "white",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
window.onresize = function(){ location.reload(); }

</script>
<script src='../js/canvasjs.min.js'></script>

</body>
</html>                              
<?php

}
?>