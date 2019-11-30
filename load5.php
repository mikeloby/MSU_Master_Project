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
        <a href="load3.php">TEAMS COMPARISON</a>
        <a href="load5.php" class="current">TOP 10</a>
        <a href="load4.php">SAVED QUERIES</a>
      </nav>
      <p><button class="button4"><a style="color: white;"   href = "../main.php">Home</button><a></p>
    </header>

    
    <section id="content">
      <div id="container">
      <table><tr>
      <td>  
       <form id="send1" action="top10b.php" method="post" autocomplete = "on">
         <label>TOP 10 HITTERS STATS</label>
         <label for="categories">Categories:
         <select id="criteria" name="categories" >
           <option value="h">Hits</option>
           <option value="r">Runs</option>
           <option value="2b">Doubles</option>
           <option value="3b">Triples</option>
           <option value="hr">Home runs</option>
           <option value="sb">Stolen Bases</option>
           <option value="bb">Base on balls</option>
           <option value="so">Strike outs</option>
           <option value="rbi">Runs batted in</option>
           <option value="ba">Batter average</option>
           <option value="obp">On base percentage</option>
         </select>
         </label>
         <label for="year">Year:
         <select id="criteria" name="year">
           <option value="10">2010</option>
           <option value="11">2011</option>
           <option value="12">2012</option>
           <option value="13">2013</option>
           <option value="14">2014</option>
           <option value="15">2015</option>
           <option value="16">2016</option>
           <option value="17">2017</option>
           <option value="18">2018</option>
           <option value="19">2019</option>
         </select>
         </label>
         <label for="save">Save query?
         <select id="year" name="save1" >
              <option value="No">NO</option>
              <option value="Yes">YES</option>
         </select>        
         </label>        
        <p><input type="submit" value="Enter"  />
        
        </form>
        </td>
        <td>
        <form id="send2" action="top10p.php" method="post" autocomplete = "on">
          <label>TOP 10 PITCHERS STATS</label>
          <label for="categories">Categories:
          <select id="criteria" name="categories" >
            <option value="w">Wins</option>
            <option value="l">Losses</option>
            <option value="era">Earned runs average</option>
            <option value="gs">Games started</option>
            <option value="ip">Innings pitched</option>
            <option value="h">Hits allowed</option>
            <option value="so">Strike outs</option>
            <option value="so9">Strike outs per nine innings</option>
            <option value="er">Earned runs</option>
            <option value="hr">Home runs allowed</option>
            <option value="bb">Base on balls allowed</option>
          </select>
          </label>
          <label for="year">Year:
          <select id="criteria" name="year" >
            <option value="10">2010</option>
            <option value="11">2011</option>
            <option value="12">2012</option>
            <option value="13">2013</option>
            <option value="14">2014</option>
            <option value="15">2015</option>
            <option value="16">2016</option>
            <option value="17">2017</option>
            <option value="18">2018</option>
            <option value="19">2019</option>
          </select>
          </label>
          <label for="save">Save query?
          <select id="year" name="save1" >
              <option value="No">NO</option>
              <option value="Yes">YES</option>
          </select>        
          </label>        
          <p><input type="submit" value="Enter"  />
          </form>
          </td></tr>
          </table>
                  
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