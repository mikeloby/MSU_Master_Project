      
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
  
  $query = "select * from saveq4 where cid='$idqs'";
  $result= $db->query($query);
  $num_results = $result->num_rows;
  
  for ($i=0; $i <$num_results; $i++) {
    $row = $result->fetch_assoc();
    $cid= stripslashes($row['cid']);
    $id= stripslashes($row['uid']);
    $batter1= stripslashes($row['pitcher1']);
    $batter2= stripslashes($row['pitcher2']);
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
     
     case "Wins":
      $count=0;
      for ($i=2010; $i <=2019; $i++) {
      $cyear="p".$i;
      $gyear[$count]=$i;
      $query = "select w from $cyear where name like '$namein1%' and name like '%$namein1_1'";
      $result= $db->query($query);
      $num_results = $result->num_rows;
      if($num_results>0){
      $row = $result->fetch_assoc();
      $hits1[$count]= stripslashes($row['w']);
      }
      else{
      $hits1[$count]=0;  
      }
      
      $query = "select w from $cyear where name like '$namein2%' and name like '%$namein2_1'";
      $result= $db->query($query);
      $num_results = $result->num_rows;
      if($num_results>0){
      $row = $result->fetch_assoc();
      $hits2[$count]= stripslashes($row['w']);
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
     
    case "Losses":
     $count=0;
    for ($i=2010; $i <=2019; $i++) {
    $cyear="p".$i;
    $gyear[$count]=$i;
    $query = "select l from $cyear where name like '$namein1%' and name like '%$namein1_1'";
    $result= $db->query($query);
    $num_results = $result->num_rows;
    if($num_results>0){
    $row = $result->fetch_assoc();
    $hits1[$count]= stripslashes($row['l']);
    }
    else{
    $hits1[$count]=0;  
    }
    
    $query = "select l from $cyear where name like '$namein2%' and name like '%$namein2_1'";
    $result= $db->query($query);
    $num_results = $result->num_rows;
    if($num_results>0){
    $row = $result->fetch_assoc();
    $hits2[$count]= stripslashes($row['l']);
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
     
    case "Earned runs average":
    $count=0;
    for ($i=2010; $i <=2019; $i++) {
    $cyear="p".$i;
    $gyear[$count]=$i;
    $query = "select era from $cyear where name like '$namein1%' and name like '%$namein1_1'";
    $result= $db->query($query);
    $num_results = $result->num_rows;
    if($num_results>0){
    $row = $result->fetch_assoc();
    $hits1[$count]= stripslashes($row['era']);
    }
    else{
    $hits1[$count]=0;  
    }
    
    $query = "select era from $cyear where name like '$namein2%' and name like '%$namein2_1'";
    $result= $db->query($query);
    $num_results = $result->num_rows;
    if($num_results>0){
    $row = $result->fetch_assoc();
    $hits2[$count]= stripslashes($row['era']);
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
     
    case "Games started":
    $count=0;
    for ($i=2010; $i <=2019; $i++) {
    $cyear="p".$i;
    $gyear[$count]=$i;
    $query = "select gs from $cyear where name like '$namein1%' and name like '%$namein1_1'";
    $result= $db->query($query);
    $num_results = $result->num_rows;
    if($num_results>0){
    $row = $result->fetch_assoc();
    $hits1[$count]= stripslashes($row['gs']);
    }
    else{
    $hits1[$count]=0;  
    }
    
    $query = "select gs from $cyear where name like '$namein2%' and name like '%$namein2_1'";
    $result= $db->query($query);
    $num_results = $result->num_rows;
    if($num_results>0){
    $row = $result->fetch_assoc();
    $hits2[$count]= stripslashes($row['gs']);
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
     
    case "Innings pitched":
    $count=0;
    for ($i=2010; $i <=2019; $i++) {
    $cyear="p".$i;
    $gyear[$count]=$i;
    $query = "select ip from $cyear where name like '$namein1%' and name like '%$namein1_1'";
    $result= $db->query($query);
    $num_results = $result->num_rows;
    if($num_results>0){
    $row = $result->fetch_assoc();
    $hits1[$count]= stripslashes($row['ip']);
    }
    else{
    $hits1[$count]=0;  
    }
    
    $query = "select ip from $cyear where name like '$namein2%' and name like '%$namein2_1'";
    $result= $db->query($query);
    $num_results = $result->num_rows;
    if($num_results>0){
    $row = $result->fetch_assoc();
    $hits2[$count]= stripslashes($row['ip']);
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
     
    case "Hits allowed":
    $count=0;
    for ($i=2010; $i <=2019; $i++) {
    $cyear="p".$i;
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
     
    case "Strike outs":
    $count=0;
    for ($i=2010; $i <=2019; $i++) {
    $cyear="p".$i;
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
     
    case "Strike outs per nine innings":
    $count=0;
    for ($i=2010; $i <=2019; $i++) {
    $cyear="p".$i;
    $gyear[$count]=$i;
    $query = "select so9 from $cyear where name like '$namein1%' and name like '%$namein1_1'";
    $result= $db->query($query);
    $num_results = $result->num_rows;
    if($num_results>0){
    $row = $result->fetch_assoc();
    $hits1[$count]= stripslashes($row['so9']);
    }
    else{
    $hits1[$count]=0;  
    }
    
    $query = "select so9 from $cyear where name like '$namein2%' and name like '%$namein2_1'";
    $result= $db->query($query);
    $num_results = $result->num_rows;
    if($num_results>0){
    $row = $result->fetch_assoc();
    $hits2[$count]= stripslashes($row['so9']);
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
     
    case "Earned runs":
    $count=0;
    for ($i=2010; $i <=2019; $i++) {
    $cyear="p".$i;
    $gyear[$count]=$i;
    $query = "select er from $cyear where name like '$namein1%' and name like '%$namein1_1'";
    $result= $db->query($query);
    $num_results = $result->num_rows;
    if($num_results>0){
    $row = $result->fetch_assoc();
    $hits1[$count]= stripslashes($row['er']);
    }
    else{
    $hits1[$count]=0;  
    }
    
    $query = "select er from $cyear where name like '$namein2%' and name like '%$namein2_1'";
    $result= $db->query($query);
    $num_results = $result->num_rows;
    if($num_results>0){
    $row = $result->fetch_assoc();
    $hits2[$count]= stripslashes($row['er']);
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
     
    case "Home runs allowed":
    $count=0;
    for ($i=2010; $i <=2019; $i++) {
    $cyear="p".$i;
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
     
    case "Base on balls allowed":
    $count=0;
    for ($i=2010; $i <=2019; $i++) {
    $cyear="p".$i;
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
    
     case "Fielding independent pitching":
      $comments="Fielding independent pitching is ERA that removes the pitcher’s defense from the equation.FIP is on the same scale as ERA so 4.20 is considered average.";
      $formula="FIP.png";
      $count=0;
      for ($i=2010; $i <=2019; $i++) {
      $cyear="p".$i;
      $gyear[$count]=$i;
      
      $query = "select cFIP from leagueA where season=$i";
      $result= $db->query($query);
      $num_results = $result->num_rows;
      $row = $result->fetch_assoc();
      $cfip=stripslashes($row['cFIP']);
      
      $query = "select ip,hr,bb,so,hbp from $cyear where name like '$namein1%' and name like '%$namein1_1'";
      $result= $db->query($query);
      $num_results = $result->num_rows;
      if($num_results>0){
      $row = $result->fetch_assoc();
      $ip=stripslashes($row['ip']);
      $hr=stripslashes($row['hr']);
      $bb=stripslashes($row['bb']);
      $so=stripslashes($row['so']);
      $hbp=stripslashes($row['hbp']);
      $hits1[$count]= ((((13*$hr)+(3*($bb+$hbp))-(2*$so))/$ip)+$cfip);
      }
      else{
      $hits1[$count]=0;  
      }
      
      $query = "select ip,hr,bb,so,hbp from $cyear where name like '$namein2%' and name like '%$namein2_1'";
      $result= $db->query($query);
      $num_results = $result->num_rows;
      if($num_results>0){
      $row = $result->fetch_assoc();
      $ip=stripslashes($row['ip']);
      $hr=stripslashes($row['hr']);
      $bb=stripslashes($row['bb']);
      $so=stripslashes($row['so']);
      $hbp=stripslashes($row['hbp']);
      $hits2[$count]= ((((13*$hr)+(3*($bb+$hbp))-(2*$so))/$ip)+$cfip);
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
