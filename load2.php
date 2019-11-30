<?php
  
  
  session_start();
  
  if(!isset($_SESSION['vuser']))
  {
    header('Location: /home.php');
  }
  else
  {
  $id=$_SESSION['id'];
  $league=$_SESSION['league'];
  $name=$_SESSION['name'];
  $id1=$id."1";
  
  include('../db_con.php');
  
  $query = "select * from venues where id='$id1'";
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
  
  $query = "select link from venuesmap where id='$id'";
  $result= $db->query($query);
  $num_results = $result->num_rows;
  
  for ($i=0; $i <$num_results; $i++) {
     $row = $result->fetch_assoc();
     $link= stripslashes($row['link']);
  }
  

  $db->close();

?>
<html>
  <head>
    <link rel="stylesheet" href='../css/cssteams.css' />
  </head>
  <body>

    <header>
      <p><img src= '../css/Tlogos/<?php echo $id ?>.png' width = "60" height = "60" alt="logo" /><?php echo $name ?></p>
      <nav>
        <a href="load1.php" >TEAM QUERIES</a>
        <a href="load2.php" class="current" >VENUES</a>
        <a href="load3.php">TEAMS COMPARISON</a>
        <a href="load5.php">TOP 10</a>
        <a href="load4.php">SAVED QUERIES</a>
      </nav>
      <p><button class="button4"><a style="color: white;"   href = "../main.php">Home</button><a></p>
    </header>


    <section id="content">
      <div id="container" > 
      <div class="third1">
      <img src= '../css/Tlogos/<?php echo $_SESSION['team'] ?>.jpg' width = "600" height = "400" alt="venues" />
      <p><?php echo $_SESSION['vname']?></p>
      <p><?php echo "Year made: ". $_SESSION['year'] ?></p>
      <p><?php echo "Capacity: ".$_SESSION['capacity'] ?></p>
      <p><?php echo "Distance to center field: ". $_SESSION['dim']." feet" ?></p>	
      <p><?php echo "Roof type: ".$_SESSION['roof'] ?></p>
      <p><?php echo "Venue type: ". $_SESSION['type'] ?></p> 
      </div>
      <div class="third4">
      <iframe src="<?php echo $link ?>" width="400" height="400" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
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