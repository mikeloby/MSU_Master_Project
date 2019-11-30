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
  $bb = array(); //array to hold bb
  $hi = array(); //array to hold hits
  $ra = array(); //array to hold runs allowed per game
  $er = array(); //array to hold error
  $dp = array(); //array to hold double plays
  $era = array(); //array to hold era
  $so = array(); //array to hold strike outs
  
  $query = "select year_team, RAperG, E, DP, ERA, H, HR, BB, SO from MLBteamstats where year_team like '%$id'";
  $result= $db->query($query);
  $num_results = $result->num_rows;
  
  
  for ($i=0; $i <$num_results; $i++) {
     $row = $result->fetch_assoc();
     $year= stripslashes($row['year_team']);
     $ra1= stripslashes($row['RAperG']);
     $er1= stripslashes($row['E']);
     $dp1= stripslashes($row['DP']);
     $era1= stripslashes($row['ERA']);
     $hi1= stripslashes($row['H']);
     $hr1= stripslashes($row['HR']);
     $bb1= stripslashes($row['BB']);
     $so1= stripslashes($row['SO']);
     array_push($hi, array("label"=> substr($year,0,4),"y"=>$hi1));
     array_push($hr, array("label"=> substr($year,0,4),"y"=>$hr1));
     array_push($bb, array("label"=> substr($year,0,4),"y"=>$bb1));
     array_push($ra, array("label"=> substr($year,0,4),"y"=>$ra1));
     array_push($er, array("label"=> substr($year,0,4),"y"=>$er1));
     array_push($dp, array("label"=> substr($year,0,4),"y"=>$dp1));
     array_push($era, array("label"=> substr($year,0,4),"y"=>$era1));
     array_push($so, array("label"=> substr($year,0,4),"y"=>$so1));
    
  }
  
  
  $db->close();
  
 
?>
<html>
<head>
<link rel="stylesheet" href='../css/cssmain.css' />
</head>
<body>
<div id="cover3">
<div id="coverg"></div>
<div id="sep1">
<div id="coverin"><p><img src= '../css/Tlogos/<?php echo $_SESSION['id']."2";?>.png' width = "30" height = "30" alt="logo" /></p></div>
<div id="coverin1"><h3><?php echo $name ?></h3></div>
</div>
<div id="coverg3"></div>
<div id="sep1">
<div id="coverin"><p><img src= '../css/Tlogos/<?php echo $_SESSION['id']."2";?>.png' width = "30" height = "30" alt="logo" /></p></div>
<div id="coverin1"><h3><?php echo $name ?></h3></div>
</div>
<div id="coverg4"></div>
<div id="sep1">
<div id="coverin"><p><img src= '../css/Tlogos/<?php echo $_SESSION['id']."2";?>.png' width = "30" height = "30" alt="logo" /></p></div>
<div id="coverin1"><h3><?php echo $name ?></h3></div>
</div>
<div id="coverg5"></div>
<div id="sep1">
<div id="coverin"><p><img src= '../css/Tlogos/<?php echo $_SESSION['id']."2";?>.png' width = "30" height = "30" alt="logo" /></p></div>
<div id="coverin1"><h3><?php echo $name ?></h3></div>
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
	theme: "light2",
	title:{
		text: "Team pitching stats 2003-2018"
	},
	legend:{
		cursor: "pointer",
		verticalAlign: "center",
		horizontalAlign: "right",
		itemclick: toggleDataSeries
	},
	data: [{
		type: "column",
		name: "Errors committed",
		indexLabel: "{y}",
		yValueFormatString: "#0.##",
		showInLegend: true,
		dataPoints: <?php echo json_encode($er, JSON_NUMERIC_CHECK); ?>
	},{
		type: "column",
		name: "Base on Balls allowed",
		indexLabel: "{y}",
		yValueFormatString: "#0.##",
		showInLegend: true,
		dataPoints: <?php echo json_encode($bb, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
function toggleDataSeries(e){
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	}
	else{
		e.dataSeries.visible = true;
	}
	chart.render();
}
 
 
var chart = new CanvasJS.Chart("coverg3", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: ""
	},
	legend:{
		cursor: "pointer",
		verticalAlign: "center",
		horizontalAlign: "right",
		itemclick: toggleDataSeries
	},
	data: [{
		type: "column",
		name: "Double plays induced",
		indexLabel: "{y}",
		yValueFormatString: "#0.##",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dp, JSON_NUMERIC_CHECK); ?>
	},{
		type: "column",
		name: "Strike outs recorded",
		indexLabel: "{y}",
		yValueFormatString: "#0.##",
		showInLegend: true,
		dataPoints: <?php echo json_encode($so, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
function toggleDataSeries(e){
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	}
	else{
		e.dataSeries.visible = true;
	}
	chart.render();
}

var chart = new CanvasJS.Chart("coverg4", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: ""
	},
	legend:{
		cursor: "pointer",
		verticalAlign: "center",
		horizontalAlign: "right",
		itemclick: toggleDataSeries
	},
	data: [{
		type: "column",
		name: "Earned run average",
		indexLabel: "{y}",
		yValueFormatString: "#0.##",
		showInLegend: true,
		dataPoints: <?php echo json_encode($era, JSON_NUMERIC_CHECK); ?>
	},{
		type: "column",
		name: "Runs allowed per game",
		indexLabel: "{y}",
		yValueFormatString: "#0.##",
		showInLegend: true,
		dataPoints: <?php echo json_encode($ra, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
function toggleDataSeries(e){
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	}
	else{
		e.dataSeries.visible = true;
	}
	chart.render();
}

var chart = new CanvasJS.Chart("coverg5", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: ""
	},
	legend:{
		cursor: "pointer",
		verticalAlign: "center",
		horizontalAlign: "right",
		itemclick: toggleDataSeries
	},
	data: [{
		type: "column",
		name: "Home Runs allowed",
		indexLabel: "{y}",
		yValueFormatString: "#0.##",
		showInLegend: true,
		dataPoints: <?php echo json_encode($hr, JSON_NUMERIC_CHECK); ?>
	},{
		type: "column",
		name: "Hits allowed",
		indexLabel: "{y}",
		yValueFormatString: "#0.##",
		showInLegend: true,
		dataPoints: <?php echo json_encode($hi, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
function toggleDataSeries(e){
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	}
	else{
		e.dataSeries.visible = true;
	}
	chart.render();
}
 
}
</script>
<script src='../js/canvasjs.min.js'></script>

</body>
</html>                              
<?php

}
?>