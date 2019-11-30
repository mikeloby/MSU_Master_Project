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
  $rpg = array(); //array to hold hr
  $rbi = array(); //array to hold bb
  $hi = array(); //array to hold hits
  $sb = array(); //array to hold runs allowed per game
  $lob = array(); //array to hold error
  $obp = array(); //array to hold double plays
  $slg = array(); //array to hold era
  $so = array(); //array to hold strike outs
  
  $query = "select year_team, RperG, H1, RBI, SB, SO1, OBP, SLG, LOB from MLBteamstats where year_team like '%$id'";
  $result= $db->query($query);
  $num_results = $result->num_rows;
  
  
  for ($i=0; $i <$num_results; $i++) {
     $row = $result->fetch_assoc();
     $year= stripslashes($row['year_team']);
     $rpg1= stripslashes($row['RperG']);
     $hi1= stripslashes($row['H1']);
     $rbi1= stripslashes($row['RBI']);
     $sb1= stripslashes($row['SB']);
     $so1= stripslashes($row['SO1']);
     $obp1= stripslashes($row['OBP']);
     $slg1= stripslashes($row['SLG']);
     $lob1= stripslashes($row['LOB']);
     array_push($rpg, array("label"=> substr($year,0,4),"y"=>$rpg1));
     array_push($rbi, array("label"=> substr($year,0,4),"y"=>$rbi1));
     array_push($hi, array("label"=> substr($year,0,4),"y"=>$hi1));
     array_push($sb, array("label"=> substr($year,0,4),"y"=>$sb1));
     array_push($lob, array("label"=> substr($year,0,4),"y"=>$lob1));
     array_push($obp, array("label"=> substr($year,0,4),"y"=>$obp1));
     array_push($slg, array("label"=> substr($year,0,4),"y"=>$slg1));
     array_push($so, array("label"=> substr($year,0,4),"y"=>$so1));
    
  }
  
  
  $db->close();
  
 
?>
<html>
<head>
<link rel="stylesheet" href='../css/cssmain.css' />
</head>
<body>
<div id="cover2">
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
		text: "Team batting stats 2003-2018"
	},
	legend:{
		cursor: "pointer",
		verticalAlign: "center",
		horizontalAlign: "right",
		itemclick: toggleDataSeries
	},
	data: [{
		type: "column",
		name: "Total Hits",
		indexLabel: "{y}",
		yValueFormatString: "#0.##",
		showInLegend: true,
		dataPoints: <?php echo json_encode($hi, JSON_NUMERIC_CHECK); ?>
	},{
		type: "column",
		name: "Runs Batted in",
		indexLabel: "{y}",
		yValueFormatString: "#0.##",
		showInLegend: true,
		dataPoints: <?php echo json_encode($rbi, JSON_NUMERIC_CHECK); ?>
	},{
		type: "column",
		name: "Strike outs",
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
		name: "Left on base",
		indexLabel: "{y}",
		yValueFormatString: "#0.##",
		showInLegend: true,
		dataPoints: <?php echo json_encode($lob, JSON_NUMERIC_CHECK); ?>
	},{
		type: "column",
		name: "Stolen bases",
		indexLabel: "{y}",
		yValueFormatString: "#0.##",
		showInLegend: true,
		dataPoints: <?php echo json_encode($sb, JSON_NUMERIC_CHECK); ?>
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
		name: "On Base Percentage",
		indexLabel: "{y}",
		yValueFormatString: "#0.##",
		showInLegend: true,
		dataPoints: <?php echo json_encode($obp, JSON_NUMERIC_CHECK); ?>
	},{
		type: "column",
		name: "Runs per Game",
		indexLabel: "{y}",
		yValueFormatString: "#0.##",
		showInLegend: true,
		dataPoints: <?php echo json_encode($rpg, JSON_NUMERIC_CHECK); ?>
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