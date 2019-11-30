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
  $bave = array(); //array to hold b age
  $pave = array(); //array to p age
  $count=0;
  
  $query = "select BatAge, year from MLBdata where team like '$name%' and year >='2000'";
  $result= $db->query($query);
  $num_results = $result->num_rows;
  
  for ($i=0; $i <$num_results; $i++) {
     $row = $result->fetch_assoc();
     $bave1= stripslashes($row['BatAge']);
     $year= stripslashes($row['year']);
     $bavel[$count]=$bave1;
     $yearb[$count]=$year;
     $count=$count+1;
  }
  
  $count=0;
  
  $query = "select PAge, year from MLBdata where team like '$name%' and year >='2000'";
  $result= $db->query($query);
  $num_results = $result->num_rows;
  
  for ($i=0; $i <$num_results; $i++) {
     $row = $result->fetch_assoc();
     $pave1= stripslashes($row['PAge']);
     $year= stripslashes($row['year']);
     $pavel[$count]=$pave1;
     $yearp[$count]=$year;
     $count=$count+1;
  }
  
   for ($i=($count-1); $i >=0; $i--) {
   array_push($bave, array("y"=> $bavel[$i],"label"=> $yearb[$i]));
   array_push($pave, array("y"=> $pavel[$i],"label"=> $yearp[$i]));
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
		text: "Batter age average 2000-2016"
	},
	axisY: {
		title: "Age"
	},
	data: [{
		type: "line",
		dataPoints: <?php echo json_encode($bave, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();

var chart = new CanvasJS.Chart("coverg2", {
	title: {
		text: "Pitcher age average 2000-2016"
	},
	axisY: {
		title: "Age"
	},
	data: [{
		type: "line",
		dataPoints: <?php echo json_encode($pave, JSON_NUMERIC_CHECK); ?>
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