      
<?php
  
  session_start();
  
  if(!isset($_SESSION['vuser']))
  {
    header('Location: /home.php');
  }
  else
  {
  include('../db_con.php');
  
  $idqs = trim($_GET['id']);
  
  $query = "select * from saveq where pid='$idqs'";
  $result= $db->query($query);
  $num_results = $result->num_rows;
  
  for ($i=0; $i <$num_results; $i++) {
      $row = $result->fetch_assoc();
      $spid= stripslashes($row['pid']);
      $sid= stripslashes($row['uid']);
      $team1= stripslashes($row['team1']);
      $team2= stripslashes($row['team2']);
      $criteria= stripslashes($row['criteria']);
      $year= stripslashes($row['year']);
  }    

  $team1a = array(); //array to hold team1 info
  $team2a = array(); //array to hold team2 info
  $extra="";
  
  switch($team1){
      
      case "Arizona Diamondbacks":
         $team1code="ARI";
      break;
      case "Atlanta Braves":
         $team1code="ATL";
      break;
      case "Baltimore Orioles":
         $team1code="BAL";
      break;
      case "Boston Red Sox":
         $team1code="BOS";
      break;
      case "Chicago Cubs":
         $team1code="CHC";
      break;
      case "Chicago White Sox":
         $team1code="CHW";
      break;
      case "Cincinnati Reds":
         $team1code="CIN";
      break;
      case "Cleveland Indians":
         $team1code="CLE";
      break;
      case "Colorado Rockies":
         $team1code="COL";
      break;
      case "Detroit Tigers":
         $team1code="DET";
      break;
      case "Houston Astros":
         $team1code="HOU";
      break;
      case "Kansas City Royals":
         $team1code="KCR";
      break;
      case "Los Angeles Angels of Anaheim":
         $team1code="LAA";
      break;
      case "Los Angeles Dodgers":
         $team1code="LAD";
      break;
      case "Miami Marlins":
         $team1code="MIA";
      break;
      case "Milwaukee Brewers":
         $team1code="MIL";
      break;
      case "Minnesota Twins":
         $team1code="MIN";
      break;
      case "New York Mets":
         $team1code="NYM";
      break;
      case "New York Yankees":
         $team1code="NYY";
      break;
      case "Oakland Athletics":
         $team1code="OAK";
      break;
      case "Philadelphia Phillies":
         $team1code="PHI";
      break;
      case "Pittsburgh Pirates":
         $team1code="PIT";
      break;
      case "San Diego Padres":
         $team1code="SDP";
      break;
      case "San Francisco Giants":
         $team1code="SFG";
      break;
      case "Seatle Mariners":
         $team1code="SEA";
      break;
      case "St. Louis Cardinals":
         $team1code="STL";
      break;
      case "Tampa Bay Rays":
         $team1code="TBR";
      break;
      case "Texas Rangers":
         $team1code="TEX";
      break;
      case "Toronto Blue Jays":
         $team1code="TOR";
      break;
      case "Washington Nationals":
         $team1code="WSN";
      break;
      default:
      break;
  
  }
  
  switch($team2){
      
      case "Arizona Diamondbacks":
         $team2code="ARI";
      break;
      case "Atlanta Braves":
         $team2code="ATL";
      break;
      case "Baltimore Orioles":
         $team2code="BAL";
      break;
      case "Boston Red Sox":
         $team2code="BOS";
      break;
      case "Chicago Cubs":
         $team2code="CHC";
      break;
      case "Chicago White Sox":
         $team2code="CHW";
      break;
      case "Cincinnati Reds":
         $team2code="CIN";
      break;
      case "Cleveland Indians":
         $team2code="CLE";
      break;
      case "Colorado Rockies":
         $team2code="COL";
      break;
      case "Detroit Tigers":
         $team2code="DET";
      break;
      case "Houston Astros":
         $team2code="HOU";
      break;
      case "Kansas City Royals":
         $team2code="KCR";
      break;
      case "Los Angeles Angels of Anaheim":
         $team2code="LAA";
      break;
      case "Los Angeles Dodgers":
         $team2code="LAD";
      break;
      case "Miami Marlins":
         $team2code="MIA";
      break;
      case "Milwaukee Brewers":
         $team2code="MIL";
      break;
      case "Minnesota Twins":
         $team2code="MIN";
      break;
      case "New York Mets":
         $team2code="NYM";
      break;
      case "New York Yankees":
         $team2code="NYY";
      break;
      case "Oakland Athletics":
         $team2code="OAK";
      break;
      case "Philadelphia Phillies":
         $team2code="PHI";
      break;
      case "Pittsburgh Pirates":
         $team2code="PIT";
      break;
      case "San Diego Padres":
         $team2code="SDP";
      break;
      case "San Francisco Giants":
         $team2code="SFG";
      break;
      case "Seatle Mariners":
         $team2code="SEA";
      break;
      case "St. Louis Cardinals":
         $team2code="STL";
      break;
      case "Tampa Bay Rays":
         $team2code="TBR";
      break;
      case "Texas Rangers":
         $team2code="TEX";
      break;
      case "Toronto Blue Jays":
         $team2code="TOR";
      break;
      case "Washington Nationals":
         $team2code="WSN";
      break;
      default:
      break;
  
  }
  switch($criteria){
     
     case "Wins":
       $count1=0;
       $count2=0;
       if($year=="All"){
       $query = "select W from MLBteamstats where year_team like '%$team1code' and year_team like '2018%'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
  
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $wins= stripslashes($row['W']);
          $lavel1[$count1]="2018";
          $y1[$count1]=$wins;
          $count1=$count1+1;
          
       }
       $query = "select W from MLBteamstats where year_team like '%$team1code' and year_team like '2017%'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
  
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $wins= stripslashes($row['W']);
          $lavel1[$count1]="2017";
          $y1[$count1]=$wins;
          $count1=$count1+1;
          
       }
       $query = "select year, win from MLBdata where team='$team1' and year >='2003'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year']);
          $wins= stripslashes($row['win']);
          $lavel1[$count1]=$yearin;
          $y1[$count1]=$wins;
          $count1=$count1+1;
       }
       $query = "select W from MLBteamstats where year_team like '%$team2code' and year_team like '2018%'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
  
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $wins= stripslashes($row['W']);
          $lavel2[$count2]="2018";
          $y2[$count2]=$wins;
          $count2=$count2+1;
          
       }
       $query = "select W from MLBteamstats where year_team like '%$team2code' and year_team like '2017%'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
  
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $wins= stripslashes($row['W']);
          $lavel2[$count2]="2017";
          $y2[$count2]=$wins;
          $count2=$count2+1;
          
       }
       $query = "select year, win from MLBdata where team='$team2' and year >='2003'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year']);
          $wins= stripslashes($row['win']);
          $lavel2[$count2]=$yearin;
          $y2[$count2]=$wins;
          $count2=$count2+1;
       }
       for ($i=($count1-1); $i >=0; $i--) {
         array_push($team1a, array("label"=> $lavel1[$i],"y"=>$y1[$i]));
       }
       for ($i=($count2-1); $i >=0; $i--) {
         array_push($team2a, array("label"=> $lavel2[$i],"y"=>$y2[$i]));
       }
       
       }
       else{
       if($year=="2018"){
       $query = "select W from MLBteamstats where year_team like '%$team1code' and year_team like '2018%'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $wins= stripslashes($row['W']);
          array_push($team1a, array("label"=> "2018","y"=>$wins));
          
       }
       $query = "select W from MLBteamstats where year_team like '%$team2code' and year_team like '2018%'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $wins= stripslashes($row['W']);
          array_push($team2a, array("label"=> "2018","y"=>$wins));
          
       }
       }
       elseif($year=="2017"){
       $query = "select W from MLBteamstats where year_team like '%$team1code' and year_team like '2017%'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $wins= stripslashes($row['W']);
          array_push($team1a, array("label"=> "2017","y"=>$wins));
          
       }
       $query = "select W from MLBteamstats where year_team like '%$team2code' and year_team like '2017%'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $wins= stripslashes($row['W']);
          array_push($team2a, array("label"=> "2017","y"=>$wins));
          
       }
       }
       else{
       $query = "select year, win from MLBdata where team='$team1' and year='$year'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year']);
          $wins= stripslashes($row['win']);
          array_push($team1a, array("label"=> $yearin,"y"=>$wins));
       }
       $query = "select year, win from MLBdata where team='$team2' and year='$year'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year']);
          $wins= stripslashes($row['win']);
          array_push($team2a, array("label"=> $yearin,"y"=>$wins));
       }
       }
       }
     break;
     
     case "Losses":
       $count1=0;
       $count2=0;
       if($year=="All"){
       $query = "select L from MLBteamstats where year_team like '%$team1code' and year_team like '2018%'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
  
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $wins= stripslashes($row['L']);
          $lavel1[$count1]="2018";
          $y1[$count1]=$wins;
          $count1=$count1+1;
          
       }
       $query = "select L from MLBteamstats where year_team like '%$team1code' and year_team like '2017%'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
  
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $wins= stripslashes($row['L']);
          $lavel1[$count1]="2017";
          $y1[$count1]=$wins;
          $count1=$count1+1;
          
       }
       $query = "select year, lose from MLBdata where team='$team1' and year >='2003'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year']);
          $wins= stripslashes($row['lose']);
          $lavel1[$count1]=$yearin;
          $y1[$count1]=$wins;
          $count1=$count1+1;
       }
       $query = "select L from MLBteamstats where year_team like '%$team2code' and year_team like '2018%'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
  
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $wins= stripslashes($row['L']);
          $lavel2[$count2]="2018";
          $y2[$count2]=$wins;
          $count2=$count2+1;
          
       }
       $query = "select L from MLBteamstats where year_team like '%$team2code' and year_team like '2017%'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
  
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $wins= stripslashes($row['L']);
          $lavel2[$count2]="2017";
          $y2[$count2]=$wins;
          $count2=$count2+1;
          
       }
       $query = "select year, lose from MLBdata where team='$team2' and year >='2003'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year']);
          $wins= stripslashes($row['lose']);
          $lavel2[$count2]=$yearin;
          $y2[$count2]=$wins;
          $count2=$count2+1;
       }
       for ($i=($count1-1); $i >=0; $i--) {
         array_push($team1a, array("label"=> $lavel1[$i],"y"=>$y1[$i]));
       }
       for ($i=($count2-1); $i >=0; $i--) {
         array_push($team2a, array("label"=> $lavel2[$i],"y"=>$y2[$i]));
       }
       
       }
       else{
       if($year=="2018"){
       $query = "select L from MLBteamstats where year_team like '%$team1code' and year_team like '2018%'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $wins= stripslashes($row['L']);
          array_push($team1a, array("label"=> "2018","y"=>$wins));
          
       }
       $query = "select L from MLBteamstats where year_team like '%$team2code' and year_team like '2018%'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $wins= stripslashes($row['L']);
          array_push($team2a, array("label"=> "2018","y"=>$wins));
          
       }
       }
       elseif($year=="2017"){
       $query = "select L from MLBteamstats where year_team like '%$team1code' and year_team like '2017%'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $wins= stripslashes($row['L']);
          array_push($team1a, array("label"=> "2017","y"=>$wins));
          
       }
       $query = "select L from MLBteamstats where year_team like '%$team2code' and year_team like '2017%'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $wins= stripslashes($row['L']);
          array_push($team2a, array("label"=> "2017","y"=>$wins));
          
       }
       }
       else{
       $query = "select year, lose from MLBdata where team='$team1' and year='$year'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year']);
          $wins= stripslashes($row['lose']);
          array_push($team1a, array("label"=> $yearin,"y"=>$wins));
       }
       $query = "select year, lose from MLBdata where team='$team2' and year='$year'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year']);
          $wins= stripslashes($row['lose']);
          array_push($team2a, array("label"=> $yearin,"y"=>$wins));
       }
       }
       }
     break;
     
     case "Runs scored":
       $count1=0;
       $count2=0;
       if($year=="All"){
       $query = "select R from MLBteamstats where year_team like '%$team1code' and year_team like '2018%'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
  
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $wins= stripslashes($row['R']);
          $lavel1[$count1]="2018";
          $y1[$count1]=$wins;
          $count1=$count1+1;
          
       }
       $query = "select R from MLBteamstats where year_team like '%$team1code' and year_team like '2017%'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
  
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $wins= stripslashes($row['R']);
          $lavel1[$count1]="2017";
          $y1[$count1]=$wins;
          $count1=$count1+1;
          
       }
       $query = "select year, R from MLBdata where team='$team1' and year >='2003'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year']);
          $wins= stripslashes($row['R']);
          $lavel1[$count1]=$yearin;
          $y1[$count1]=$wins;
          $count1=$count1+1;
       }
       $query = "select R from MLBteamstats where year_team like '%$team2code' and year_team like '2018%'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
  
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $wins= stripslashes($row['R']);
          $lavel2[$count2]="2018";
          $y2[$count2]=$wins;
          $count2=$count2+1;
          
       }
       $query = "select R from MLBteamstats where year_team like '%$team2code' and year_team like '2017%'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
  
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $wins= stripslashes($row['R']);
          $lavel2[$count2]="2017";
          $y2[$count2]=$wins;
          $count2=$count2+1;
          
       }
       $query = "select year, R from MLBdata where team='$team2' and year >='2003'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year']);
          $wins= stripslashes($row['R']);
          $lavel2[$count2]=$yearin;
          $y2[$count2]=$wins;
          $count2=$count2+1;
       }
       for ($i=($count1-1); $i >=0; $i--) {
         array_push($team1a, array("label"=> $lavel1[$i],"y"=>$y1[$i]));
       }
       for ($i=($count2-1); $i >=0; $i--) {
         array_push($team2a, array("label"=> $lavel2[$i],"y"=>$y2[$i]));
       }
       
       }
       else{
       if($year=="2018"){
       $query = "select R from MLBteamstats where year_team like '%$team1code' and year_team like '2018%'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $wins= stripslashes($row['R']);
          array_push($team1a, array("label"=> "2018","y"=>$wins));
          
       }
       $query = "select R from MLBteamstats where year_team like '%$team2code' and year_team like '2018%'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $wins= stripslashes($row['R']);
          array_push($team2a, array("label"=> "2018","y"=>$wins));
          
       }
       }
       elseif($year=="2017"){
       $query = "select R from MLBteamstats where year_team like '%$team1code' and year_team like '2017%'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $wins= stripslashes($row['R']);
          array_push($team1a, array("label"=> "2017","y"=>$wins));
          
       }
       $query = "select R from MLBteamstats where year_team like '%$team2code' and year_team like '2017%'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $wins= stripslashes($row['R']);
          array_push($team2a, array("label"=> "2017","y"=>$wins));
          
       }
       }
       else{
       $query = "select year, R from MLBdata where team='$team1' and year='$year'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year']);
          $wins= stripslashes($row['R']);
          array_push($team1a, array("label"=> $yearin,"y"=>$wins));
       }
       $query = "select year, R from MLBdata where team='$team2' and year='$year'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year']);
          $wins= stripslashes($row['R']);
          array_push($team2a, array("label"=> $yearin,"y"=>$wins));
       }
       }
       }
     break;
     
     case "Runs allowed":
       $count1=0;
       $count2=0;
       if($year=="All"){
       $query = "select year, RA from MLBdata where team='$team1' and year >='2003'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year']);
          $wins= stripslashes($row['RA']);
          $lavel1[$count1]=$yearin;
          $y1[$count1]=$wins;
          $count1=$count1+1;
       }
       $query = "select year, RA from MLBdata where team='$team2' and year >='2003'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year']);
          $wins= stripslashes($row['RA']);
          $lavel2[$count2]=$yearin;
          $y2[$count2]=$wins;
          $count2=$count2+1;
       }
       for ($i=($count1-1); $i >=0; $i--) {
         array_push($team1a, array("label"=> $lavel1[$i],"y"=>$y1[$i]));
       }
       for ($i=($count2-1); $i >=0; $i--) {
         array_push($team2a, array("label"=> $lavel2[$i],"y"=>$y2[$i]));
       }
       }
       else{
       
       $query = "select year, RA from MLBdata where team='$team1' and year='$year'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year']);
          $wins= stripslashes($row['RA']);
          array_push($team1a, array("label"=> $yearin,"y"=>$wins));
       }
       $query = "select year, RA from MLBdata where team='$team2' and year='$year'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year']);
          $wins= stripslashes($row['RA']);
          array_push($team2a, array("label"=> $yearin,"y"=>$wins));
       }
       }
     break;
     
     case "Batter age ave":
       $count1=0;
       $count2=0;
       if($year=="All"){
       $query = "select year, BatAge from MLBdata where team='$team1' and year >='2003'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year']);
          $wins= stripslashes($row['BatAge']);
          $lavel1[$count1]=$yearin;
          $y1[$count1]=$wins;
          $count1=$count1+1;
       }
       $query = "select year, BatAge from MLBdata where team='$team2' and year >='2003'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year']);
          $wins= stripslashes($row['BatAge']);
          $lavel2[$count2]=$yearin;
          $y2[$count2]=$wins;
          $count2=$count2+1;
       }
       for ($i=($count1-1); $i >=0; $i--) {
         array_push($team1a, array("label"=> $lavel1[$i],"y"=>$y1[$i]));
       }
       for ($i=($count2-1); $i >=0; $i--) {
         array_push($team2a, array("label"=> $lavel2[$i],"y"=>$y2[$i]));
       }
       }
       else{
       
       $query = "select year, BatAge from MLBdata where team='$team1' and year='$year'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year']);
          $wins= stripslashes($row['BatAge']);
          array_push($team1a, array("label"=> $yearin,"y"=>$wins));
       }
       $query = "select year, BatAge from MLBdata where team='$team2' and year='$year'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year']);
          $wins= stripslashes($row['BatAge']);
          array_push($team2a, array("label"=> $yearin,"y"=>$wins));
       }
       }
     break;
     
     case "Pitcher age ave":
       $count1=0;
       $count2=0;
       if($year=="All"){
       $query = "select year, PAge from MLBdata where team='$team1' and year >='2003'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year']);
          $wins= stripslashes($row['PAge']);
          $lavel1[$count1]=$yearin;
          $y1[$count1]=$wins;
          $count1=$count1+1;
       }
       $query = "select year, PAge from MLBdata where team='$team2' and year >='2003'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year']);
          $wins= stripslashes($row['PAge']);
          $lavel2[$count2]=$yearin;
          $y2[$count2]=$wins;
          $count2=$count2+1;
       }
       for ($i=($count1-1); $i >=0; $i--) {
         array_push($team1a, array("label"=> $lavel1[$i],"y"=>$y1[$i]));
       }
       for ($i=($count2-1); $i >=0; $i--) {
         array_push($team2a, array("label"=> $lavel2[$i],"y"=>$y2[$i]));
       }
       }
       else{
       
       $query = "select year, PAge from MLBdata where team='$team1' and year='$year'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year']);
          $wins= stripslashes($row['PAge']);
          array_push($team1a, array("label"=> $yearin,"y"=>$wins));
       }
       $query = "select year, PAge from MLBdata where team='$team2' and year='$year'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year']);
          $wins= stripslashes($row['PAge']);
          array_push($team2a, array("label"=> $yearin,"y"=>$wins));
       }
       }
     break;
     
     case "Teams salaries":
       $extra="(In millions)";
       $count1=0;
       $count2=0;
       if($year=="All"){
       $query = "select year_team, salary from MLBteamstats where year_team like '%$team1code'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year_team']);
          $wins= stripslashes($row['salary']);
          $lavel1[$count1]=substr($yearin,0,4);
          $y1[$count1]=number_format($wins/1000000);
          $count1=$count1+1;
       }
       $query = "select year_team, salary from MLBteamstats where year_team like '%$team2code'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year_team']);
          $wins= stripslashes($row['salary']);
          $lavel2[$count2]=substr($yearin,0,4);
          $y2[$count2]=number_format($wins/1000000);
          $count2=$count2+1;
       }
       for ($i=0; $i <=($count1-1); $i++) {
         array_push($team1a, array("label"=> $lavel1[$i],"y"=>$y1[$i]));
       }
       for ($i=0; $i <=($count2-1); $i++) {
         array_push($team2a, array("label"=> $lavel2[$i],"y"=>$y2[$i]));
       }
       }
       else{
       
       $query = "select year_team, salary from MLBteamstats where year_team like '%$team1code' and year_team like '$year%'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year_team']);
          $wins= stripslashes($row['salary']);
          array_push($team1a, array("label"=> substr($yearin,0,4),"y"=>number_format($wins/1000000)));
       }
       $query = "select year_team, salary from MLBteamstats where year_team like '%$team2code' and year_team like '$year%'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year_team']);
          $wins= stripslashes($row['salary']);
          array_push($team2a, array("label"=> substr($yearin,0,4),"y"=>number_format($wins/1000000)));
       }
       }
     break;
     
     case "Pitchers runs allowed per game":
       $extra="";
       $count1=0;
       $count2=0;
       if($year=="All"){
       $query = "select year_team, RAperG from MLBteamstats where year_team like '%$team1code'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year_team']);
          $wins= stripslashes($row['RAperG']);
          $lavel1[$count1]=substr($yearin,0,4);
          $y1[$count1]=$wins;
          $count1=$count1+1;
       }
       $query = "select year_team, RAperG from MLBteamstats where year_team like '%$team2code'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year_team']);
          $wins= stripslashes($row['RAperG']);
          $lavel2[$count2]=substr($yearin,0,4);
          $y2[$count2]=$wins;
          $count2=$count2+1;
       }
       for ($i=0; $i <=($count1-1); $i++) {
         array_push($team1a, array("label"=> $lavel1[$i],"y"=>$y1[$i]));
       }
       for ($i=0; $i <=($count2-1); $i++) {
         array_push($team2a, array("label"=> $lavel2[$i],"y"=>$y2[$i]));
       }
       }
       else{
       
       $query = "select year_team, RAperG from MLBteamstats where year_team like '%$team1code' and year_team like '$year%'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year_team']);
          $wins= stripslashes($row['RAperG']);
          array_push($team1a, array("label"=> substr($yearin,0,4),"y"=>$wins));
       }
       $query = "select year_team, RAperG from MLBteamstats where year_team like '%$team2code' and year_team like '$year%'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year_team']);
          $wins= stripslashes($row['RAperG']);
          array_push($team2a, array("label"=> substr($yearin,0,4),"y"=>$wins));
       }
       }
     break;
     
     case "Errors":
       $extra="";
       $count1=0;
       $count2=0;
       if($year=="All"){
       $query = "select year_team, E from MLBteamstats where year_team like '%$team1code'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year_team']);
          $wins= stripslashes($row['E']);
          $lavel1[$count1]=substr($yearin,0,4);
          $y1[$count1]=$wins;
          $count1=$count1+1;
       }
       $query = "select year_team, E from MLBteamstats where year_team like '%$team2code'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year_team']);
          $wins= stripslashes($row['E']);
          $lavel2[$count2]=substr($yearin,0,4);
          $y2[$count2]=$wins;
          $count2=$count2+1;
       }
       for ($i=0; $i <=($count1-1); $i++) {
         array_push($team1a, array("label"=> $lavel1[$i],"y"=>$y1[$i]));
       }
       for ($i=0; $i <=($count2-1); $i++) {
         array_push($team2a, array("label"=> $lavel2[$i],"y"=>$y2[$i]));
       }
       }
       else{
       
       $query = "select year_team, E from MLBteamstats where year_team like '%$team1code' and year_team like '$year%'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year_team']);
          $wins= stripslashes($row['E']);
          array_push($team1a, array("label"=> substr($yearin,0,4),"y"=>$wins));
       }
       $query = "select year_team, E from MLBteamstats where year_team like '%$team2code' and year_team like '$year%'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year_team']);
          $wins= stripslashes($row['E']);
          array_push($team2a, array("label"=> substr($yearin,0,4),"y"=>$wins));
       }
       }
     break;
     
     case "Double plays":
       $extra="";
       $count1=0;
       $count2=0;
       if($year=="All"){
       $query = "select year_team, DP from MLBteamstats where year_team like '%$team1code'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year_team']);
          $wins= stripslashes($row['DP']);
          $lavel1[$count1]=substr($yearin,0,4);
          $y1[$count1]=$wins;
          $count1=$count1+1;
       }
       $query = "select year_team, DP from MLBteamstats where year_team like '%$team2code'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year_team']);
          $wins= stripslashes($row['DP']);
          $lavel2[$count2]=substr($yearin,0,4);
          $y2[$count2]=$wins;
          $count2=$count2+1;
       }
       for ($i=0; $i <=($count1-1); $i++) {
         array_push($team1a, array("label"=> $lavel1[$i],"y"=>$y1[$i]));
       }
       for ($i=0; $i <=($count2-1); $i++) {
         array_push($team2a, array("label"=> $lavel2[$i],"y"=>$y2[$i]));
       }
       }
       else{
       
       $query = "select year_team, DP from MLBteamstats where year_team like '%$team1code' and year_team like '$year%'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year_team']);
          $wins= stripslashes($row['DP']);
          array_push($team1a, array("label"=> substr($yearin,0,4),"y"=>$wins));
       }
       $query = "select year_team, DP from MLBteamstats where year_team like '%$team2code' and year_team like '$year%'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year_team']);
          $wins= stripslashes($row['DP']);
          array_push($team2a, array("label"=> substr($yearin,0,4),"y"=>$wins));
       }
       }
     break;
     
     case "Pitchers Earned Run Average":
       $extra="";
       $count1=0;
       $count2=0;
       if($year=="All"){
       $query = "select year_team, ERA from MLBteamstats where year_team like '%$team1code'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year_team']);
          $wins= stripslashes($row['ERA']);
          $lavel1[$count1]=substr($yearin,0,4);
          $y1[$count1]=$wins;
          $count1=$count1+1;
       }
       $query = "select year_team, ERA from MLBteamstats where year_team like '%$team2code'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year_team']);
          $wins= stripslashes($row['ERA']);
          $lavel2[$count2]=substr($yearin,0,4);
          $y2[$count2]=$wins;
          $count2=$count2+1;
       }
       for ($i=0; $i <=($count1-1); $i++) {
         array_push($team1a, array("label"=> $lavel1[$i],"y"=>$y1[$i]));
       }
       for ($i=0; $i <=($count2-1); $i++) {
         array_push($team2a, array("label"=> $lavel2[$i],"y"=>$y2[$i]));
       }
       }
       else{
       
       $query = "select year_team, ERA from MLBteamstats where year_team like '%$team1code' and year_team like '$year%'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year_team']);
          $wins= stripslashes($row['ERA']);
          array_push($team1a, array("label"=> substr($yearin,0,4),"y"=>$wins));
       }
       $query = "select year_team, ERA from MLBteamstats where year_team like '%$team2code' and year_team like '$year%'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year_team']);
          $wins= stripslashes($row['ERA']);
          array_push($team2a, array("label"=> substr($yearin,0,4),"y"=>$wins));
       }
       }
     break;
     
      case "Pitchers hits allowed":
       $extra="";
       $count1=0;
       $count2=0;
       if($year=="All"){
       $query = "select year_team, H from MLBteamstats where year_team like '%$team1code'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year_team']);
          $wins= stripslashes($row['H']);
          $lavel1[$count1]=substr($yearin,0,4);
          $y1[$count1]=$wins;
          $count1=$count1+1;
       }
       $query = "select year_team, H from MLBteamstats where year_team like '%$team2code'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year_team']);
          $wins= stripslashes($row['H']);
          $lavel2[$count2]=substr($yearin,0,4);
          $y2[$count2]=$wins;
          $count2=$count2+1;
       }
       for ($i=0; $i <=($count1-1); $i++) {
         array_push($team1a, array("label"=> $lavel1[$i],"y"=>$y1[$i]));
       }
       for ($i=0; $i <=($count2-1); $i++) {
         array_push($team2a, array("label"=> $lavel2[$i],"y"=>$y2[$i]));
       }
       }
       else{
       
       $query = "select year_team, H from MLBteamstats where year_team like '%$team1code' and year_team like '$year%'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year_team']);
          $wins= stripslashes($row['H']);
          array_push($team1a, array("label"=> substr($yearin,0,4),"y"=>$wins));
       }
       $query = "select year_team, H from MLBteamstats where year_team like '%$team2code' and year_team like '$year%'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year_team']);
          $wins= stripslashes($row['H']);
          array_push($team2a, array("label"=> substr($yearin,0,4),"y"=>$wins));
       }
       }
     break;
     
     case "Pitchers home runs allowed":
       $extra="";
       $count1=0;
       $count2=0;
       if($year=="All"){
       $query = "select year_team, HR from MLBteamstats where year_team like '%$team1code'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year_team']);
          $wins= stripslashes($row['HR']);
          $lavel1[$count1]=substr($yearin,0,4);
          $y1[$count1]=$wins;
          $count1=$count1+1;
       }
       $query = "select year_team, HR from MLBteamstats where year_team like '%$team2code'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year_team']);
          $wins= stripslashes($row['HR']);
          $lavel2[$count2]=substr($yearin,0,4);
          $y2[$count2]=$wins;
          $count2=$count2+1;
       }
       for ($i=0; $i <=($count1-1); $i++) {
         array_push($team1a, array("label"=> $lavel1[$i],"y"=>$y1[$i]));
       }
       for ($i=0; $i <=($count2-1); $i++) {
         array_push($team2a, array("label"=> $lavel2[$i],"y"=>$y2[$i]));
       }
       }
       else{
       
       $query = "select year_team, HR from MLBteamstats where year_team like '%$team1code' and year_team like '$year%'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year_team']);
          $wins= stripslashes($row['HR']);
          array_push($team1a, array("label"=> substr($yearin,0,4),"y"=>$wins));
       }
       $query = "select year_team, HR from MLBteamstats where year_team like '%$team2code' and year_team like '$year%'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year_team']);
          $wins= stripslashes($row['HR']);
          array_push($team2a, array("label"=> substr($yearin,0,4),"y"=>$wins));
       }
       }
     break;
     
     case "Pitchers base on balls":
       $extra="";
       $count1=0;
       $count2=0;
       if($year=="All"){
       $query = "select year_team, BB from MLBteamstats where year_team like '%$team1code'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year_team']);
          $wins= stripslashes($row['BB']);
          $lavel1[$count1]=substr($yearin,0,4);
          $y1[$count1]=$wins;
          $count1=$count1+1;
       }
       $query = "select year_team, BB from MLBteamstats where year_team like '%$team2code'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year_team']);
          $wins= stripslashes($row['BB']);
          $lavel2[$count2]=substr($yearin,0,4);
          $y2[$count2]=$wins;
          $count2=$count2+1;
       }
       for ($i=0; $i <=($count1-1); $i++) {
         array_push($team1a, array("label"=> $lavel1[$i],"y"=>$y1[$i]));
       }
       for ($i=0; $i <=($count2-1); $i++) {
         array_push($team2a, array("label"=> $lavel2[$i],"y"=>$y2[$i]));
       }
       }
       else{
       
       $query = "select year_team, BB from MLBteamstats where year_team like '%$team1code' and year_team like '$year%'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year_team']);
          $wins= stripslashes($row['BB']);
          array_push($team1a, array("label"=> substr($yearin,0,4),"y"=>$wins));
       }
       $query = "select year_team, BB from MLBteamstats where year_team like '%$team2code' and year_team like '$year%'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year_team']);
          $wins= stripslashes($row['BB']);
          array_push($team2a, array("label"=> substr($yearin,0,4),"y"=>$wins));
       }
       }
     break;
     
     case "Pitchers strike outs":
       $extra="";
       $count1=0;
       $count2=0;
       if($year=="All"){
       $query = "select year_team, SO from MLBteamstats where year_team like '%$team1code'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year_team']);
          $wins= stripslashes($row['SO']);
          $lavel1[$count1]=substr($yearin,0,4);
          $y1[$count1]=$wins;
          $count1=$count1+1;
       }
       $query = "select year_team, SO from MLBteamstats where year_team like '%$team2code'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year_team']);
          $wins= stripslashes($row['SO']);
          $lavel2[$count2]=substr($yearin,0,4);
          $y2[$count2]=$wins;
          $count2=$count2+1;
       }
       for ($i=0; $i <=($count1-1); $i++) {
         array_push($team1a, array("label"=> $lavel1[$i],"y"=>$y1[$i]));
       }
       for ($i=0; $i <=($count2-1); $i++) {
         array_push($team2a, array("label"=> $lavel2[$i],"y"=>$y2[$i]));
       }
       }
       else{
       
       $query = "select year_team, SO from MLBteamstats where year_team like '%$team1code' and year_team like '$year%'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year_team']);
          $wins= stripslashes($row['SO']);
          array_push($team1a, array("label"=> substr($yearin,0,4),"y"=>$wins));
       }
       $query = "select year_team, SO from MLBteamstats where year_team like '%$team2code' and year_team like '$year%'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year_team']);
          $wins= stripslashes($row['SO']);
          array_push($team2a, array("label"=> substr($yearin,0,4),"y"=>$wins));
       }
       }
     break;
     
     case "Teams runs per game":
       $extra="";
       $count1=0;
       $count2=0;
       if($year=="All"){
       $query = "select year_team, RperG from MLBteamstats where year_team like '%$team1code'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year_team']);
          $wins= stripslashes($row['RperG']);
          $lavel1[$count1]=substr($yearin,0,4);
          $y1[$count1]=$wins;
          $count1=$count1+1;
       }
       $query = "select year_team, RperG from MLBteamstats where year_team like '%$team2code'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year_team']);
          $wins= stripslashes($row['RperG']);
          $lavel2[$count2]=substr($yearin,0,4);
          $y2[$count2]=$wins;
          $count2=$count2+1;
       }
       for ($i=0; $i <=($count1-1); $i++) {
         array_push($team1a, array("label"=> $lavel1[$i],"y"=>$y1[$i]));
       }
       for ($i=0; $i <=($count2-1); $i++) {
         array_push($team2a, array("label"=> $lavel2[$i],"y"=>$y2[$i]));
       }
       }
       else{
       
       $query = "select year_team, RperG from MLBteamstats where year_team like '%$team1code' and year_team like '$year%'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year_team']);
          $wins= stripslashes($row['RperG']);
          array_push($team1a, array("label"=> substr($yearin,0,4),"y"=>$wins));
       }
       $query = "select year_team, RperG from MLBteamstats where year_team like '%$team2code' and year_team like '$year%'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year_team']);
          $wins= stripslashes($row['RperG']);
          array_push($team2a, array("label"=> substr($yearin,0,4),"y"=>$wins));
       }
       }
     break;
     
     case "Teams hits":
       $extra="";
       $count1=0;
       $count2=0;
       if($year=="All"){
       $query = "select year_team, H1 from MLBteamstats where year_team like '%$team1code'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year_team']);
          $wins= stripslashes($row['H1']);
          $lavel1[$count1]=substr($yearin,0,4);
          $y1[$count1]=$wins;
          $count1=$count1+1;
       }
       $query = "select year_team, H1 from MLBteamstats where year_team like '%$team2code'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year_team']);
          $wins= stripslashes($row['H1']);
          $lavel2[$count2]=substr($yearin,0,4);
          $y2[$count2]=$wins;
          $count2=$count2+1;
       }
       for ($i=0; $i <=($count1-1); $i++) {
         array_push($team1a, array("label"=> $lavel1[$i],"y"=>$y1[$i]));
       }
       for ($i=0; $i <=($count2-1); $i++) {
         array_push($team2a, array("label"=> $lavel2[$i],"y"=>$y2[$i]));
       }
       }
       else{
       
       $query = "select year_team, H1 from MLBteamstats where year_team like '%$team1code' and year_team like '$year%'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year_team']);
          $wins= stripslashes($row['H1']);
          array_push($team1a, array("label"=> substr($yearin,0,4),"y"=>$wins));
       }
       $query = "select year_team, H1 from MLBteamstats where year_team like '%$team2code' and year_team like '$year%'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year_team']);
          $wins= stripslashes($row['H1']);
          array_push($team2a, array("label"=> substr($yearin,0,4),"y"=>$wins));
       }
       }
     break;
     
     case "Teams runs batted in":
       $extra="";
       $count1=0;
       $count2=0;
       if($year=="All"){
       $query = "select year_team, RBI from MLBteamstats where year_team like '%$team1code'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year_team']);
          $wins= stripslashes($row['RBI']);
          $lavel1[$count1]=substr($yearin,0,4);
          $y1[$count1]=$wins;
          $count1=$count1+1;
       }
       $query = "select year_team, RBI from MLBteamstats where year_team like '%$team2code'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year_team']);
          $wins= stripslashes($row['RBI']);
          $lavel2[$count2]=substr($yearin,0,4);
          $y2[$count2]=$wins;
          $count2=$count2+1;
       }
       for ($i=0; $i <=($count1-1); $i++) {
         array_push($team1a, array("label"=> $lavel1[$i],"y"=>$y1[$i]));
       }
       for ($i=0; $i <=($count2-1); $i++) {
         array_push($team2a, array("label"=> $lavel2[$i],"y"=>$y2[$i]));
       }
       }
       else{
       
       $query = "select year_team, RBI from MLBteamstats where year_team like '%$team1code' and year_team like '$year%'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year_team']);
          $wins= stripslashes($row['RBI']);
          array_push($team1a, array("label"=> substr($yearin,0,4),"y"=>$wins));
       }
       $query = "select year_team, RBI from MLBteamstats where year_team like '%$team2code' and year_team like '$year%'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year_team']);
          $wins= stripslashes($row['RBI']);
          array_push($team2a, array("label"=> substr($yearin,0,4),"y"=>$wins));
       }
       }
     break;
     
     case "Teams stolen bases":
       $extra="";
       $count1=0;
       $count2=0;
       if($year=="All"){
       $query = "select year_team, SB from MLBteamstats where year_team like '%$team1code'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year_team']);
          $wins= stripslashes($row['SB']);
          $lavel1[$count1]=substr($yearin,0,4);
          $y1[$count1]=$wins;
          $count1=$count1+1;
       }
       $query = "select year_team, SB from MLBteamstats where year_team like '%$team2code'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year_team']);
          $wins= stripslashes($row['SB']);
          $lavel2[$count2]=substr($yearin,0,4);
          $y2[$count2]=$wins;
          $count2=$count2+1;
       }
       for ($i=0; $i <=($count1-1); $i++) {
         array_push($team1a, array("label"=> $lavel1[$i],"y"=>$y1[$i]));
       }
       for ($i=0; $i <=($count2-1); $i++) {
         array_push($team2a, array("label"=> $lavel2[$i],"y"=>$y2[$i]));
       }
       }
       else{
       
       $query = "select year_team, SB from MLBteamstats where year_team like '%$team1code' and year_team like '$year%'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year_team']);
          $wins= stripslashes($row['SB']);
          array_push($team1a, array("label"=> substr($yearin,0,4),"y"=>$wins));
       }
       $query = "select year_team, SB from MLBteamstats where year_team like '%$team2code' and year_team like '$year%'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year_team']);
          $wins= stripslashes($row['SB']);
          array_push($team2a, array("label"=> substr($yearin,0,4),"y"=>$wins));
       }
       }
     break;
     
     case "Teams strike outs":
       $extra="";
       $count1=0;
       $count2=0;
       if($year=="All"){
       $query = "select year_team, SO1 from MLBteamstats where year_team like '%$team1code'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year_team']);
          $wins= stripslashes($row['SO1']);
          $lavel1[$count1]=substr($yearin,0,4);
          $y1[$count1]=$wins;
          $count1=$count1+1;
       }
       $query = "select year_team, SO1 from MLBteamstats where year_team like '%$team2code'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year_team']);
          $wins= stripslashes($row['SO1']);
          $lavel2[$count2]=substr($yearin,0,4);
          $y2[$count2]=$wins;
          $count2=$count2+1;
       }
       for ($i=0; $i <=($count1-1); $i++) {
         array_push($team1a, array("label"=> $lavel1[$i],"y"=>$y1[$i]));
       }
       for ($i=0; $i <=($count2-1); $i++) {
         array_push($team2a, array("label"=> $lavel2[$i],"y"=>$y2[$i]));
       }
       }
       else{
       
       $query = "select year_team, SO1 from MLBteamstats where year_team like '%$team1code' and year_team like '$year%'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year_team']);
          $wins= stripslashes($row['SO1']);
          array_push($team1a, array("label"=> substr($yearin,0,4),"y"=>$wins));
       }
       $query = "select year_team, SO1 from MLBteamstats where year_team like '%$team2code' and year_team like '$year%'";
       $result= $db->query($query);
       $num_results = $result->num_rows;
       for ($i=0; $i <$num_results; $i++) {
          $row = $result->fetch_assoc();
          $yearin= stripslashes($row['year_team']);
          $wins= stripslashes($row['SO1']);
          array_push($team2a, array("label"=> substr($yearin,0,4),"y"=>$wins));
       }
       }
     break;
     
     
     default:
     break;
  }
    
   ?>
  
  <html>
  <head>
  <link rel="stylesheet" href='../css/cssmain.css' />
  </head>
  <body>
  <div id="coverteamsphp1">
  <div id="coverteams1"></div>
  <div id="coverteams2">
  <p><img src= '../css/Tlogos/<?php echo $team1code;?>.png' width = "40" height = "40" alt="logo" />
  <img src= '../css/Tlogos/vs.jpg' width = "40" height = "40" alt="logo" />
  <img src= '../css/Tlogos/<?php echo $team2code; ?>.png' width = "40" height = "40" alt="logo" /></p>
  <div class="btn-group">
  <button class="button1"><a href = "/teams/load4.php">Return previous screen</button>
  <button class="button1"><a href = "/main.php">Return home screen</button>
  </div>
</div>
  </div>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("coverteams1", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "<?php echo $criteria.$extra ?>"
	},
	legend:{
		cursor: "pointer",
		verticalAlign: "center",
		horizontalAlign: "right",
		itemclick: toggleDataSeries
	},
	data: [{
		type: "column",
		name: "<?php echo $team1 ?>",
		indexLabel: "{y}",
		yValueFormatString: "#0.##",
		showInLegend: true,
		dataPoints: <?php echo json_encode($team1a, JSON_NUMERIC_CHECK); ?>
	},{
		type: "column",
		name: "<?php echo $team2 ?>",
		indexLabel: "{y}",
		yValueFormatString: "#0.##",
		showInLegend: true,
		dataPoints: <?php echo json_encode($team2a, JSON_NUMERIC_CHECK); ?>
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
  $db->close();
  }
 ?>
