<?php
  
  
  session_start();
  
  if(!isset($_SESSION['vuser']))
  {
    header('Location: /home.php');
  }
  else
  {
  $id1 = trim($_GET['id']);
  
  if (!get_magic_quotes_gpc()){
        $id1 = addslashes($id1);
  }
  $id2=$id."1";
   
  include('../db_con.php');
  
  $query = "select * from teams";
  $result= $db->query($query);
  $num_results = $result->num_rows;
  
  for ($i=0; $i <$num_results; $i++) {
     $row = $result->fetch_assoc();
     $team1= stripslashes($row['team']);
     $league1= stripslashes($row['league']);
     $name1=stripslashes($row['name']);
     
     if($team1==$id1){
        $_SESSION['id']=$team1;
        $_SESSION['league']=$league1;
        $_SESSION['name']=$name1;
     }
  }
  
  $query = "select * from venues where id='$id2'";
  $result= $db->query($query);
  $num_results = $result->num_rows;
  
   for ($i=0; $i <$num_results; $i++) {
     $row = $result->fetch_assoc();
     $team= stripslashes($row['id']);
     $vname= stripslashes($row['name']);
     $year=stripslashes($row['year']);
     $capacity=stripslashes($row['capacity']);
     $dim=stripslashes($row['dim']);
     $roof=stripslashes($row['roof']);
     $type=stripslashes($row['type']);
     
     $_SESSION['team']=$team;
   $_SESSION['vname']=$vname;
   $_SESSION['year']=$year;
   $_SESSION['capacity']=$capacity;
   $_SESSION['dim']=$dim;
   $_SESSION['roof']=$roof;
   $_SESSION['type']=$type;
     
  }
  

  $db->close();
   
  $league=$_SESSION['league'];
  $name=$_SESSION['name'];
  $id=$_SESSION['id'];
  
  
  
?>
<html>
  <head>
     <link rel="stylesheet" href='../css/cssteams.css' />
  </head>
  <body>
    
    <header>
      <p><img src= '../css/Tlogos/<?php echo $id ?>.png' width = "60" height = "60" alt="logo" /><?php echo $name ?></p>
      <nav>
        <a href="load1.php" class="current"> TEAM QUERIES</a>
        <a href="load2.php">VENUES</a>
        <a href="load3.php">TEAMS COMPARISON</a>
        <a href="load5.php">TOP 10</a>
        <a href="load4.php">SAVED QUERIES</a>
      </nav>
      <p><button class="button4"><a style="color: white;"   href = "../main.php">Home</button><a></p>
    </header>
    <section id="content">
      <div id="container">
      <div class="third" >
      <a><img src= '../css/Tlogos/<?php echo $league ?>.gif' width = "100" height = "100" alt="LEAGUE" /></a>
      <ul>
        <li>
        <a href="wins_losses.php"><p class="foot2">Wins/Losses 2000-2018</p></a>
        </li>
        <li>
        <a href="scored_allowed.php"><p class="foot2">Runs scored/allowed 2000-2016</p></a>
        </li>
        <li>
        <a href="w_l_line.php"><p class="foot2">Wins/Losses 2000-2018 comparison</p></a>
        </li>
        <li>
        <a href="bp_age.php"><p class="foot2">Hitter/Pitcher age average 2000-2016</p></a>
        </li>
        <li>
        <a href="team_p.php"><p class="foot2">Team Pitching Stats 2003-2018</p></a>
        </li>
        <li>
        <a href="team_b.php"><p class="foot2">Team Batting Stats 2003-2018</p></a>
        </li>
        <li>
        <a href="pwp.php"><p class="foot2">*Pythagorean Winning Percentage*</p></a>
        </li>
      </ul>
      </div>
      
      </div>
      
    </section>
    
    <script src='../js/jquery-1.11.0.min.js'></script>
    <script src='../js/jq-load.js'></script>
       
  </body>
</html>
<?php

}
?>