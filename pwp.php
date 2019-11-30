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
  $wp = array();
  $pwp = array();
  $rwin = array();
  $ewin = array();
     
  $query = "select year,win,WLporc from MLBdata where team like '$name%' and year >='2000'";
  $result= $db->query($query);
  $num_results = $result->num_rows;
  
  for ($i=0; $i <$num_results; $i++) {
     $row = $result->fetch_assoc();
     $year= stripslashes($row['year']);
     $win= stripslashes($row['win']);
     $wporc= stripslashes($row['WLporc'])*100;
     array_push($wp, array("y"=> $wporc,"label"=>$year));
     array_push($rwin, array("y"=>$win,"label"=>$year));
  }
  
    
  
  $query = "select year,games,R,RA from MLBdata where team like '$name%' and year >='2000'";
  $result= $db->query($query);
  $num_results = $result->num_rows;
  
  for ($i=0; $i <$num_results; $i++) {
     $row = $result->fetch_assoc();
     $year= stripslashes($row['year']);
     $games= stripslashes($row['games']);
     $run= stripslashes($row['R']);
     $runa= stripslashes($row['RA']);
     $wpwp=((pow($run,1.83)/(pow($run,1.83)+pow($runa,1.83)))*100);
     array_push($pwp, array("y"=> $wpwp,"label"=>$year));
     array_push($ewin, array("y"=>($games*$wpwp/100),"label"=>$year));
  }
  
 $db->close();
 
?>
<html>
<head>
<link rel="stylesheet" href='../css/cssmain.css' />
</head>
<body>
<div id="covertest">
<div id="coverg11"></div>
<div id="coverg12"></div>
<p></p>
<div id="coverg13"></div>
<div id="coverg14"></div>
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
</div>
<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("coverg11", {
  animationEnabled: true,
  title:{
    text: "Winning %"
  },
  axisY: {
    title: "Percentage",
    prefix: "",
    suffix:  "%"
  },
  data: [{
    type: "bar",
    yValueFormatString: "#,##0.##",
    indexLabel: "{y}",
    indexLabelPlacement: "inside",
    indexLabelFontWeight: "bolder",
    indexLabelFontColor: "white",
    dataPoints: <?php echo json_encode($wp, JSON_NUMERIC_CHECK); ?>
  }]
});
chart.render();

var chart = new CanvasJS.Chart("coverg12", {
  animationEnabled: true,
  title:{
    text: "Pythagorean Winning %"
  },
  axisY: {
    title: "Percentage",
    prefix: "",
    suffix:  "%"
  },
  data: [{
    type: "bar",
    yValueFormatString: "#,##0.##",
    indexLabel: "{y}",
    indexLabelPlacement: "inside",
    indexLabelFontWeight: "bolder",
    indexLabelFontColor: "white",
    dataPoints: <?php echo json_encode($pwp, JSON_NUMERIC_CHECK); ?>
  }]
});
chart.render();

var chart = new CanvasJS.Chart("coverg13", {
  animationEnabled: true,
  title:{
    text: "Real Wins"
  },
  axisY: {
    title: "Wins",
    prefix: "",
    suffix:  ""
  },
  data: [{
    type: "bar",
    yValueFormatString: "#,##0.##",
    indexLabel: "{y}",
    indexLabelPlacement: "inside",
    indexLabelFontWeight: "bolder",
    indexLabelFontColor: "white",
    dataPoints: <?php echo json_encode($rwin, JSON_NUMERIC_CHECK); ?>
  }]
});
chart.render();

var chart = new CanvasJS.Chart("coverg14", {
  animationEnabled: true,
  title:{
    text: "Expected Wins"
  },
  axisY: {
    title: "Wins",
    prefix: "",
    suffix:  ""
  },
  data: [{
    type: "bar",
    yValueFormatString: "#,##0.##",
    indexLabel: "{y}",
    indexLabelPlacement: "inside",
    indexLabelFontWeight: "bolder",
    indexLabelFontColor: "white",
    dataPoints: <?php echo json_encode($ewin, JSON_NUMERIC_CHECK); ?>
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