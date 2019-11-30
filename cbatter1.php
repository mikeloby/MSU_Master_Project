      
<?php
  
  session_start();
  
  if(!isset($_SESSION['vuser']))
  {
    header('Location: /home.php');
  }
  else
  {
  include('../db_con.php');
  
  $comments="";
  $formula="";
  $formula1="";
  
  $idqs = trim($_GET['id']);
    
    $query = "select * from saveq3 where cid='$idqs'";
    $result= $db->query($query);
    $num_results = $result->num_rows;
    
    for ($i=0; $i <$num_results; $i++) {
        $row = $result->fetch_assoc();
        $cid= stripslashes($row['cid']);
        $id= stripslashes($row['uid']);
        $batter1= stripslashes($row['batter1']);
        $batter2= stripslashes($row['batter2']);
        $categories= stripslashes($row['criteria']);
    }    

  
      
    $token = strtok($batter1, " ");
    $namein1=$token;
     
    while ($token !== false)
      {
      $namein1_1=$token;
      $token = strtok(" ");
      }
    
    $token1 = strtok($batter2, " ");
    $namein2=$token1;
     
    while ($token1 !== false)
      {
      $namein2_1=$token1;
      $token1 = strtok(" ");
      }

  $batter1a = array(); //array to hold team1 info
  $batter2a = array(); //array to hold team2 info
  
  
    switch($categories){
     
     case "Hits":
      $count=0;
      for ($i=2010; $i <=2019; $i++) {
      $cyear="b".$i;
      $gyear[$count]=$i;
      $query = "select h from $cyear where name like '$namein1%' and name like '%$namein1_1'";
      $result= $db->query($query);
      $num_results = $result->num_rows;
      if($num_results>0){
      $row = $result->fetch_assoc();
      $hits1[$count]= stripslashes($row['h']);
      }
      else{
      $hits1[$count]=0;  
      }
      
      $query = "select h from $cyear where name like '$namein2%' and name like '%$namein2_1'";
      $result= $db->query($query);
      $num_results = $result->num_rows;
      if($num_results>0){
      $row = $result->fetch_assoc();
      $hits2[$count]= stripslashes($row['h']);
      }
      else{
      $hits2[$count]=0;  
      }
      $count=$count+1;   
      }
      
      for ($i=0; $i <=9; $i++) {
        array_push($batter1a, array("y"=> $hits1[$i],"label"=>$gyear[$i]));
        array_push($batter2a, array("y"=> $hits2[$i],"label"=>$gyear[$i]));
      }
     break;
     
    case "Runs":
     $count=0;
    for ($i=2010; $i <=2019; $i++) {
    $cyear="b".$i;
    $gyear[$count]=$i;
    $query = "select r from $cyear where name like '$namein1%' and name like '%$namein1_1'";
    $result= $db->query($query);
    $num_results = $result->num_rows;
    if($num_results>0){
    $row = $result->fetch_assoc();
    $hits1[$count]= stripslashes($row['r']);
    }
    else{
    $hits1[$count]=0;  
    }
    
    $query = "select r from $cyear where name like '$namein2%' and name like '%$namein2_1'";
    $result= $db->query($query);
    $num_results = $result->num_rows;
    if($num_results>0){
    $row = $result->fetch_assoc();
    $hits2[$count]= stripslashes($row['r']);
    }
    else{
    $hits2[$count]=0;  
    }
    $count=$count+1;   
    }
    
    for ($i=0; $i <=9; $i++) {
      array_push($batter1a, array("y"=> $hits1[$i],"label"=>$gyear[$i]));
      array_push($batter2a, array("y"=> $hits2[$i],"label"=>$gyear[$i]));
    }
    break;
     
    case "Doubles":
    $count=0;
    for ($i=2010; $i <=2019; $i++) {
    $cyear="b".$i;
    $gyear[$count]=$i;
    $query = "select 2b from $cyear where name like '$namein1%' and name like '%$namein1_1'";
    $result= $db->query($query);
    $num_results = $result->num_rows;
    if($num_results>0){
    $row = $result->fetch_assoc();
    $hits1[$count]= stripslashes($row['2b']);
    }
    else{
    $hits1[$count]=0;  
    }
    
    $query = "select 2b from $cyear where name like '$namein2%' and name like '%$namein2_1'";
    $result= $db->query($query);
    $num_results = $result->num_rows;
    if($num_results>0){
    $row = $result->fetch_assoc();
    $hits2[$count]= stripslashes($row['2b']);
    }
    else{
    $hits2[$count]=0;  
    }
    $count=$count+1;   
    }
    
    for ($i=0; $i <=9; $i++) {
      array_push($batter1a, array("y"=> $hits1[$i],"label"=>$gyear[$i]));
      array_push($batter2a, array("y"=> $hits2[$i],"label"=>$gyear[$i]));
    }
    break;
     
    case "Triples":
    $count=0;
    for ($i=2010; $i <=2019; $i++) {
    $cyear="b".$i;
    $gyear[$count]=$i;
    $query = "select 3b from $cyear where name like '$namein1%' and name like '%$namein1_1'";
    $result= $db->query($query);
    $num_results = $result->num_rows;
    if($num_results>0){
    $row = $result->fetch_assoc();
    $hits1[$count]= stripslashes($row['3b']);
    }
    else{
    $hits1[$count]=0;  
    }
    
    $query = "select 3b from $cyear where name like '$namein2%' and name like '%$namein2_1'";
    $result= $db->query($query);
    $num_results = $result->num_rows;
    if($num_results>0){
    $row = $result->fetch_assoc();
    $hits2[$count]= stripslashes($row['3b']);
    }
    else{
    $hits2[$count]=0;  
    }
    $count=$count+1;   
    }
    
    for ($i=0; $i <=9; $i++) {
      array_push($batter1a, array("y"=> $hits1[$i],"label"=>$gyear[$i]));
      array_push($batter2a, array("y"=> $hits2[$i],"label"=>$gyear[$i]));
    }
    break;
     
    case "Home runs":
    $count=0;
    for ($i=2010; $i <=2019; $i++) {
    $cyear="b".$i;
    $gyear[$count]=$i;
    $query = "select hr from $cyear where name like '$namein1%' and name like '%$namein1_1'";
    $result= $db->query($query);
    $num_results = $result->num_rows;
    if($num_results>0){
    $row = $result->fetch_assoc();
    $hits1[$count]= stripslashes($row['hr']);
    }
    else{
    $hits1[$count]=0;  
    }
    
    $query = "select hr from $cyear where name like '$namein2%' and name like '%$namein2_1'";
    $result= $db->query($query);
    $num_results = $result->num_rows;
    if($num_results>0){
    $row = $result->fetch_assoc();
    $hits2[$count]= stripslashes($row['hr']);
    }
    else{
    $hits2[$count]=0;  
    }
    $count=$count+1;   
    }
    
    for ($i=0; $i <=9; $i++) {
      array_push($batter1a, array("y"=> $hits1[$i],"label"=>$gyear[$i]));
      array_push($batter2a, array("y"=> $hits2[$i],"label"=>$gyear[$i]));
    }
    break;
     
    case "Stolen Bases":
    $count=0;
    for ($i=2010; $i <=2019; $i++) {
    $cyear="b".$i;
    $gyear[$count]=$i;
    $query = "select sb from $cyear where name like '$namein1%' and name like '%$namein1_1'";
    $result= $db->query($query);
    $num_results = $result->num_rows;
    if($num_results>0){
    $row = $result->fetch_assoc();
    $hits1[$count]= stripslashes($row['sb']);
    }
    else{
    $hits1[$count]=0;  
    }
    
    $query = "select sb from $cyear where name like '$namein2%' and name like '%$namein2_1'";
    $result= $db->query($query);
    $num_results = $result->num_rows;
    if($num_results>0){
    $row = $result->fetch_assoc();
    $hits2[$count]= stripslashes($row['sb']);
    }
    else{
    $hits2[$count]=0;  
    }
    $count=$count+1;   
    }
    
    for ($i=0; $i <=9; $i++) {
      array_push($batter1a, array("y"=> $hits1[$i],"label"=>$gyear[$i]));
      array_push($batter2a, array("y"=> $hits2[$i],"label"=>$gyear[$i]));
    }
    break;
     
    case "Base on Balls":
    $count=0;
    for ($i=2010; $i <=2019; $i++) {
    $cyear="b".$i;
    $gyear[$count]=$i;
    $query = "select bb from $cyear where name like '$namein1%' and name like '%$namein1_1'";
    $result= $db->query($query);
    $num_results = $result->num_rows;
    if($num_results>0){
    $row = $result->fetch_assoc();
    $hits1[$count]= stripslashes($row['bb']);
    }
    else{
    $hits1[$count]=0;  
    }
    
    $query = "select bb from $cyear where name like '$namein2%' and name like '%$namein2_1'";
    $result= $db->query($query);
    $num_results = $result->num_rows;
    if($num_results>0){
    $row = $result->fetch_assoc();
    $hits2[$count]= stripslashes($row['bb']);
    }
    else{
    $hits2[$count]=0;  
    }
    $count=$count+1;   
    }
    
    for ($i=0; $i <=9; $i++) {
      array_push($batter1a, array("y"=> $hits1[$i],"label"=>$gyear[$i]));
      array_push($batter2a, array("y"=> $hits2[$i],"label"=>$gyear[$i]));
    }
    break;
     
    case "Strike outs":
    $count=0;
    for ($i=2010; $i <=2019; $i++) {
    $cyear="b".$i;
    $gyear[$count]=$i;
    $query = "select so from $cyear where name like '$namein1%' and name like '%$namein1_1'";
    $result= $db->query($query);
    $num_results = $result->num_rows;
    if($num_results>0){
    $row = $result->fetch_assoc();
    $hits1[$count]= stripslashes($row['so']);
    }
    else{
    $hits1[$count]=0;  
    }
    
    $query = "select so from $cyear where name like '$namein2%' and name like '%$namein2_1'";
    $result= $db->query($query);
    $num_results = $result->num_rows;
    if($num_results>0){
    $row = $result->fetch_assoc();
    $hits2[$count]= stripslashes($row['so']);
    }
    else{
    $hits2[$count]=0;  
    }
    $count=$count+1;   
    }
    
    for ($i=0; $i <=9; $i++) {
      array_push($batter1a, array("y"=> $hits1[$i],"label"=>$gyear[$i]));
      array_push($batter2a, array("y"=> $hits2[$i],"label"=>$gyear[$i]));
    }
    break;
     
    case "Runs batted in":
    $count=0;
    for ($i=2010; $i <=2019; $i++) {
    $cyear="b".$i;
    $gyear[$count]=$i;
    $query = "select rbi from $cyear where name like '$namein1%' and name like '%$namein1_1'";
    $result= $db->query($query);
    $num_results = $result->num_rows;
    if($num_results>0){
    $row = $result->fetch_assoc();
    $hits1[$count]= stripslashes($row['rbi']);
    }
    else{
    $hits1[$count]=0;  
    }
    
    $query = "select rbi from $cyear where name like '$namein2%' and name like '%$namein2_1'";
    $result= $db->query($query);
    $num_results = $result->num_rows;
    if($num_results>0){
    $row = $result->fetch_assoc();
    $hits2[$count]= stripslashes($row['rbi']);
    }
    else{
    $hits2[$count]=0;  
    }
    $count=$count+1;   
    }
    
    for ($i=0; $i <=9; $i++) {
      array_push($batter1a, array("y"=> $hits1[$i],"label"=>$gyear[$i]));
      array_push($batter2a, array("y"=> $hits2[$i],"label"=>$gyear[$i]));
    }
    break;
     
    case "Batter average":
    $count=0;
    for ($i=2010; $i <=2019; $i++) {
    $cyear="b".$i;
    $gyear[$count]=$i;
    $query = "select ba from $cyear where name like '$namein1%' and name like '%$namein1_1'";
    $result= $db->query($query);
    $num_results = $result->num_rows;
    if($num_results>0){
    $row = $result->fetch_assoc();
    $hits1[$count]= stripslashes($row['ba'])*1000;
    }
    else{
    $hits1[$count]=0;  
    }
    
    $query = "select ba from $cyear where name like '$namein2%' and name like '%$namein2_1'";
    $result= $db->query($query);
    $num_results = $result->num_rows;
    if($num_results>0){
    $row = $result->fetch_assoc();
    $hits2[$count]= stripslashes($row['ba'])*1000;
    }
    else{
    $hits2[$count]=0;  
    }
    $count=$count+1;   
    }
    
    for ($i=0; $i <=9; $i++) {
      array_push($batter1a, array("y"=> $hits1[$i],"label"=>$gyear[$i]));
      array_push($batter2a, array("y"=> $hits2[$i],"label"=>$gyear[$i]));
    }
    break;
     
    case "On base percentage":
    $count=0;
    for ($i=2010; $i <=2019; $i++) {
    $cyear="b".$i;
    $gyear[$count]=$i;
    $query = "select obp from $cyear where name like '$namein1%' and name like '%$namein1_1'";
    $result= $db->query($query);
    $num_results = $result->num_rows;
    if($num_results>0){
    $row = $result->fetch_assoc();
    $hits1[$count]= stripslashes($row['obp'])*1000;
    }
    else{
    $hits1[$count]=0;  
    }
    
    $query = "select obp from $cyear where name like '$namein2%' and name like '%$namein2_1'";
    $result= $db->query($query);
    $num_results = $result->num_rows;
    if($num_results>0){
    $row = $result->fetch_assoc();
    $hits2[$count]= stripslashes($row['obp'])*1000;
    }
    else{
    $hits2[$count]=0;  
    }
    $count=$count+1;   
    }
    
    for ($i=0; $i <=9; $i++) {
      array_push($batter1a, array("y"=> $hits1[$i],"label"=>$gyear[$i]));
      array_push($batter2a, array("y"=> $hits2[$i],"label"=>$gyear[$i]));
    }
    break;
    
     case "weighted on-base average":
      $comments="weighted on-base average is a statistic, based on linear weights, designed to measure a player's overall offensive contributions per plate appearance. It is formed from taking the observed run values of various offensive events, dividing by a player's plate appearances, and scaling the result to be on the same scale as on-base percentage. Unlike statistics like OPS, wOBA attempts to assign the proper value for each type of hitting event. It was created by Tom Tango and his coauthors for The Book: Playing the Percentages in Baseball.";
      $formula="wOBA.jpg";
      $formula1="wOBAscale.png";
      $count=0;
      for ($i=2010; $i <=2019; $i++) {
      $cyear="b".$i;
      $gyear[$count]=$i;
      $query = "select ab,h,2b,3b,hr,bb,hbp,sf,ibb from $cyear where name like '$namein1%' and name like '%$namein1_1'";
      $result= $db->query($query);
      $num_results = $result->num_rows;
      if($num_results>0){
      $row = $result->fetch_assoc();
      $ab=stripslashes($row['ab']);
      $h=stripslashes($row['h']);
      $double=stripslashes($row['2b']);
      $triple=stripslashes($row['3b']);
      $hr=stripslashes($row['hr']);
      $bb=stripslashes($row['bb']);
      $hbp=stripslashes($row['hbp']);
      $sf=stripslashes($row['sf']);
      $ibb=stripslashes($row['ibb']);
      $hits1[$count]= (((0.69*($bb-$ibb))+(0.72*$hbp)+(0.88*$h)+(1.247*$double)+(1.578*$triple)+(2.031*$hr))/($ab+$bb-$ibb+$sf+$hbp))*1000;
      }
      else{
      $hits1[$count]=0;  
      }
      
      $query = "select ab,h,2b,3b,hr,bb,hbp,sf,ibb from $cyear where name like '$namein2%' and name like '%$namein2_1'";
      $result= $db->query($query);
      $num_results = $result->num_rows;
      if($num_results>0){
      $row = $result->fetch_assoc();
      $ab=stripslashes($row['ab']);
      $h=stripslashes($row['h']);
      $double=stripslashes($row['2b']);
      $triple=stripslashes($row['3b']);
      $hr=stripslashes($row['hr']);
      $bb=stripslashes($row['bb']);
      $hbp=stripslashes($row['hbp']);
      $sf=stripslashes($row['sf']);
      $ibb=stripslashes($row['ibb']);
      $hits2[$count]= (((0.69*($bb-$ibb))+(0.72*$hbp)+(0.88*$h)+(1.247*$double)+(1.578*$triple)+(2.031*$hr))/($ab+$bb-$ibb+$sf+$hbp))*1000; 
      }
      else{
      $hits2[$count]=0;  
      }
      $count=$count+1;   
      }
      
      for ($i=0; $i <=9; $i++) {
        array_push($batter1a, array("y"=> $hits1[$i],"label"=>$gyear[$i]));
        array_push($batter2a, array("y"=> $hits2[$i],"label"=>$gyear[$i]));
      }
      break;

    case "insolated power":
      $comments="Isolated Power tells how often a player hits for extra bases. It is calculated as SLG-AVG. Iso more so tells what kind of hitter a player is instead of how much value he produced. Its flaw is that it counts all extra-base hits as the same value. A .140 ISO is average, .240 and above is excellent, and .080 and below is awful.";
      $formula="iso.png";
      $count=0;
      for ($i=2010; $i <=2019; $i++) {
      $cyear="b".$i;
      $gyear[$count]=$i;
      $query = "select ab,2b,3b,hr from $cyear where name like '$namein1%' and name like '%$namein1_1'";
      $result= $db->query($query);
      $num_results = $result->num_rows;
      if($num_results>0){
      $row = $result->fetch_assoc();
      $ab=stripslashes($row['ab']);
      $double=stripslashes($row['2b']);
      $triple=stripslashes($row['3b']);
      $hr=stripslashes($row['hr']);
      $hits1[$count]= (($double+(2*$triple)+(3*$hr))/$ab)*1000;
      }
      else{
      $hits1[$count]=0;  
      }
      
      $query = "select ab,2b,3b,hr from $cyear where name like '$namein2%' and name like '%$namein2_1'";
      $result= $db->query($query);
      $num_results = $result->num_rows;
      if($num_results>0){
      $row = $result->fetch_assoc();
      $ab=stripslashes($row['ab']);
      $double=stripslashes($row['2b']);
      $triple=stripslashes($row['3b']);
      $hr=stripslashes($row['hr']);
      $hits2[$count]= (($double+(2*$triple)+(3*$hr))/$ab)*1000;
      }
      else{
      $hits2[$count]=0;  
      }
      $count=$count+1;   
      }
      
      for ($i=0; $i <=9; $i++) {
        array_push($batter1a, array("y"=> $hits1[$i],"label"=>$gyear[$i]));
        array_push($batter2a, array("y"=> $hits2[$i],"label"=>$gyear[$i]));
      }
      break;
      
      case "batting average on balls in play":
        $comments="Batting average on balls in play is exactly what it sounds like. It’s what the player’s hitting when he puts the ball in play and removes strikeouts and home runs from batting average.BABIP isn’t a stat you want to use on its own. The stat can help tell you if a player is unlucky or lucky but it is also influenced by speed and hard-hit ball numbers.";
        $formula="babip.png";
        $count=0;
        for ($i=2010; $i <=2019; $i++) {
        $cyear="b".$i;
        $gyear[$count]=$i;
        $query = "select ab,h,hr,so,sf from $cyear where name like '$namein1%' and name like '%$namein1_1'";
        $result= $db->query($query);
        $num_results = $result->num_rows;
        if($num_results>0){
        $row = $result->fetch_assoc();
        $ab=stripslashes($row['ab']);
        $h=stripslashes($row['h']);
        $hr=stripslashes($row['hr']);
        $so=stripslashes($row['so']);
        $sf=stripslashes($row['sf']);
        $hits1[$count]= (($h-$hr)/($ab-$so-$hr+$sf))*1000;
        }
        else{
        $hits1[$count]=0;  
        }
        
        $query = "select ab,h,hr,so,sf from $cyear where name like '$namein2%' and name like '%$namein2_1'";
        $result= $db->query($query);
        $num_results = $result->num_rows;
        if($num_results>0){
        $row = $result->fetch_assoc();
        $ab=stripslashes($row['ab']);
        $h=stripslashes($row['h']);
        $hr=stripslashes($row['hr']);
        $so=stripslashes($row['so']);
        $sf=stripslashes($row['sf']);
        $hits2[$count]= (($h-$hr)/($ab-$so-$hr+$sf))*1000;
        }
        else{
        $hits2[$count]=0;  
        }
        $count=$count+1;   
        }
        
        for ($i=0; $i <=9; $i++) {
          array_push($batter1a, array("y"=> $hits1[$i],"label"=>$gyear[$i]));
          array_push($batter2a, array("y"=> $hits2[$i],"label"=>$gyear[$i]));
        }
        break;

     
    default:
    break;
  }
    
   ?>
  
  <html>
  <head>
  <link rel="stylesheet" href='../css/cssmain.css' />
  <link rel="stylesheet" href='../css/accordion1.css' type="text/css" />
  </head>
  <body>
  <div id="coverteamsphp1">
  <div id="coverteams1"></div>
  <div id="coverteams2">
  <div class="btn-group">
  <button class="button1"><a href = "/teams/load4.php">Return previous screen</button>
  <button class="button1"><a href = "/main.php">Return home screen</button>
  </div>
  <?php
  if($comments!=""){
  ?>
  <p></p>
  <section class="page">
  <ul class="accordion">
  <li>
    <button class="accordion-control">Click to see description</button>
    <div class="accordion-panel">
    <p class="foot"><?php echo $comments ?></p>
    </div>
  </li>
  <li>
    <button class="accordion-control">Click to see formula</button>
    <div class="accordion-panel">
    <p><img src = "../css/Tlogos/<?php echo $formula ?>" alt = "ARI" width = "800" height = "200" ></p>
    </div>
  </li>
  <?php
  if($formula1!=""){
  ?>
  <li>
    <button class="accordion-control">Click to see scale</button>
    <div class="accordion-panel">
    <p><img src = "../css/Tlogos/<?php echo $formula1 ?>" alt = "ARI" width = "800" height = "200" ></p>
    </div>
  </li>
  <?php
  }
  ?>
  </ul>
  <?php
  }
  ?>

  </div>
  </div>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("coverteams1", {
  animationEnabled: true,
  theme: "light2",
  title:{
    text: "<?php echo $categories ?>"
  },
  legend:{
    cursor: "pointer",
    verticalAlign: "center",
    horizontalAlign: "right",
    itemclick: toggleDataSeries
  },
  data: [{
    type: "column",
    name: "<?php echo $batter1 ?>",
    indexLabel: "{y}",
    yValueFormatString: "#0.##",
    showInLegend: true,
    dataPoints: <?php echo json_encode($batter1a, JSON_NUMERIC_CHECK); ?>
  },{
    type: "column",
    name: "<?php echo $batter2 ?>",
    indexLabel: "{y}",
    yValueFormatString: "#0.##",
    showInLegend: true,
    dataPoints: <?php echo json_encode($batter2a, JSON_NUMERIC_CHECK); ?>
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
  <script src='../js/jquery-1.11.0.min.js'></script>
  <script src='../js/accordion.js'></script>
  </body>
  </html>
  
  <?php
  $db->close();
  }
 ?>
