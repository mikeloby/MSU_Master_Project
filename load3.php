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
  include('../db_con.php');
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
        <a href="load2.php">VENUES</a>
        <a href="load3.php" class="current">TEAMS COMPARISON</a>
        <a href="load5.php">TOP 10</a>
        <a href="load4.php">SAVED QUERIES</a>
      </nav>
      <p><button class="button4"><a style="color: white;"   href = "../main.php">Home</button><a></p>
    </header>

    
    <section id="content">
      <div id="container">  
       <form id="send" action="teamstats.php" method="post" autocomplete = "on">
          <label>All TEAMS COMPARISON STATS</label>
          <label for="team1">Team1:
          <?php
           $query = "select team from MLBdata where year='2016'";
           $result= $db->query($query);
           $nresults = $result->num_rows;
           echo "<select id='team1' name='team1'>";
           for ($i=0; $i <$nresults; $i++) {
               $row = $result->fetch_assoc();
               $team1= stripslashes($row['team']);
               echo '<option value="'.$team1.'">'.$team1.'</option>';
            }
            echo "</select>";
         ?>   
         </label>
         <label for="team2">Team2:
          <?php
           $query = "select team from MLBdata where year='2016'";
           $result= $db->query($query);
           $nresults = $result->num_rows;
           echo "<select id='team2' name='team2'>";
           for ($i=0; $i <$nresults; $i++) {
               $row = $result->fetch_assoc();
               $team2= stripslashes($row['team']);
               echo '<option value="'.$team2.'">'.$team2.'</option>';
            }
            echo "</select>";
         ?>   
         </label>
         <label for="criteria">Criteria:
         <select id="criteria" name="criteria" >
                <option value="Wins">Wins</option>
                <option value="Losses">Losses</option>
                <option value="Runs scored">Runs scored</option>
                <option value="Runs allowed">Runs allowed</option>
                <option value="Batter age ave">Hitters age ave</option>
                <option value="Pitcher age ave">Pitchers age ave</option>
                <option value="Teams salaries">Teams salaries</option>
                <option value="Pitchers runs allowed per game">Pitchers runs allowed per game</option>
                <option value="Errors">Errors</option>
                <option value="Double plays">Double plays</option>
                <option value="Pitchers Earned Run Average">Pitchers Earned Run Average</option>
                <option value="Pitchers hits allowed">Pitchers hits allowed</option>
                <option value="Pitchers home runs allowed">Pitchers home runs allowed</option>
                <option value="Pitchers base on balls">Pitchers Base on balls</option>
                <option value="Pitchers strike outs">Pitchers Strike outs</option>
                <option value="Teams runs per game">Teams runs per game</option>
                <option value="Teams hits">Teams hits</option>
                <option value="Teams runs batted in">Teams runs batted in</option>
                <option value="Teams stolen bases">Teams stolen bases</option>
                <option value="Teams strike outs">Teams strike outs</option>
         </select>
         </label>
         <label for="year">Year :
         <?php
           $query = "select year from MLBdata where year>'2002' and team like 'Arizona%'";
           $result= $db->query($query);
           $nresults = $result->num_rows;
           $all="All";
           $y1="2018";
           $y2="2017";
           echo "<select id='year' name='year'>";
           echo '<option value="'.$all.'">'.$all.'</option>';
           echo '<option value="'.$y1.'">'.$y1.'</option>';
           echo '<option value="'.$y2.'">'.$y2.'</option>';
           for ($i=0; $i <$nresults; $i++) {
               $row = $result->fetch_assoc();
               $year= stripslashes($row['year']);
               echo '<option value="'.$year.'">'.$year.'</option>';
            }
            echo "</select>";
         ?>   
         </label>
         <label for="save">Save query?
         <select id="year" name="save1" >
              <option value="No">NO</option>
              <option value="Yes">YES</option>
         </select>        
         </label>        
        <p><input type="submit" value="Enter"  />
        
        </form>
 </div>
 </section>
    <script src='../js/jquery-1.11.0.min.js'></script>
    <script src='../js/jq-load.js'></script>
</body>
</html>
<?php
$db->close();
}
?>