
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
	$userid=$_SESSION['vuser'];
		
		
		
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
				<a href="load2.php" >VENUES</a>
				<a href="load3.php">TEAMS COMPARISON</a>
				<a href="load5.php">TOP 10</a>
				<a href="load4.php" class="current">SAVED QUERIES</a>
			</nav>
			<p><button class="button4"><a style="color: white;"   href = "../main.php">Home</button><a></p>
		</header>


		<section id="content">
			<div id="container" > 
			<div class="third3">
		    <table>
			<?php
			include('../db_con.php');

			$query = "select * from saveq where uid='$userid'";
			$result= $db->query($query);
			$num_results = $result->num_rows;
				
				for ($i=0; $i <$num_results; $i++) {
					 $row = $result->fetch_assoc();
				     $pid[$i]= stripslashes($row['pid']);
				     $uid[$i]= stripslashes($row['uid']);
				     $team1[$i]= stripslashes($row['team1']);
				     $team2[$i]= stripslashes($row['team2']);
				     $criteria[$i]= stripslashes($row['criteria']);
				     $year1[$i]= stripslashes($row['year']);

			?>
			<tr><td><a href = "/teams/teamstats1.php?id=<?php echo $pid[$i] ?>"><p style="color:blue; font-size:12pt; text-align:center;"><?php echo $team1[$i]." cmp to ".$team2[$i] ?></p></a></td>
			    <td><p style="color:red ; font-size:12pt; text-align:center;"><?php echo "Criteria=".$criteria[$i] ?></p></td>
			    <td><p style="color:red ; font-size:12pt; text-align:center;"><?php echo "Year=".$year1[$i] ?></p></td>
			    <td><button class="button3"><a href = "/teams/deleteq.php?id=<?php echo $pid[$i] ?>">Delete</button></td></tr>	
			<?php
				}
			$query = "select * from saveq1 where uid='$userid'";
			$result= $db->query($query);
			$num_results = $result->num_rows;
				
            	for ($i=0; $i <$num_results; $i++) {
		              $row = $result->fetch_assoc();
	                  $pid[$i]= stripslashes($row['bid']);
	                  $uid[$i]= stripslashes($row['uid']);
	                  $criteria[$i]= stripslashes($row['criteria']);
	                  $year1[$i]= stripslashes($row['year']);

            ?>
             <tr><td><a href = "/teams/top10b1.php?id=<?php echo $pid[$i] ?>"><p style="color:blue; font-size:12pt; text-align:center;"><?php echo "Top 10 batters " ?></p></a></td>
             <td><p style="color:red ; font-size:12pt; text-align:center;"><?php echo "Criteria=".strtoupper($criteria[$i]) ?></p></td>
             <td><p style="color:red ; font-size:12pt; text-align:center;"><?php echo "Year=20".$year1[$i] ?></p></td>
             <td><button class="button3"><a href = "/teams/deleteq1.php?id=<?php echo $pid[$i] ?>">Delete</button></td></tr>	
			
			<?php
            }
            $query = "select * from saveq2 where uid='$userid'";
			$result= $db->query($query);
			$num_results = $result->num_rows;
				
			for ($i=0; $i <$num_results; $i++) {
		              $row = $result->fetch_assoc();
	                  $pid[$i]= stripslashes($row['bid']);
	                  $uid[$i]= stripslashes($row['uid']);
	                  $criteria[$i]= stripslashes($row['criteria']);
	                  $year1[$i]= stripslashes($row['year']);

		?>
		 <tr><td><a href = "/teams/top10p1.php?id=<?php echo $pid[$i] ?>"><p style="color:blue; font-size:12pt; text-align:center;"><?php echo "Top 10 pitchers " ?></p></a></td>
		 <td><p style="color:red ; font-size:12pt; text-align:center;"><?php echo "Criteria=".strtoupper($criteria[$i]) ?></p></td>
		 <td><p style="color:red ; font-size:12pt; text-align:center;"><?php echo "Year=20".$year1[$i] ?></p></td>
		 <td><button class="button3"><a href = "/teams/deleteq2.php?id=<?php echo $pid[$i] ?>">Delete</button></td></tr>	
			
		<?php
		}
		$query = "select * from saveq3 where uid='$userid'";
		$result= $db->query($query);
		$num_results = $result->num_rows;
			
			for ($i=0; $i <$num_results; $i++) {
				 $row = $result->fetch_assoc();
			     $pid[$i]= stripslashes($row['cid']);
			     $uid[$i]= stripslashes($row['uid']);
			     $batter1[$i]= stripslashes($row['batter1']);
			     $batter2[$i]= stripslashes($row['batter2']);
			     $criteria[$i]= stripslashes($row['criteria']);
			    
		?>
		<tr><td><a href = "/teams/cbatter1.php?id=<?php echo $pid[$i] ?>"><p style="color:blue; font-size:12pt; text-align:center;"><?php echo $batter1[$i]." cmp to ".$batter2[$i] ?></p></a></td>
		    <td><p style="color:red ; font-size:12pt; text-align:center;"><?php echo "Criteria=".$criteria[$i] ?></p></td>
		    <td><p style="color:red ; font-size:12pt; text-align:center;"><?php echo "Year=All" ?></p></td>
		    <td><button class="button3"><a href = "/teams/deleteq3.php?id=<?php echo $pid[$i] ?>">Delete</button></td></tr>	
		<?php
			}
		$query = "select * from saveq4 where uid='$userid'";
		$result= $db->query($query);
		$num_results = $result->num_rows;
			
			for ($i=0; $i <$num_results; $i++) {
				 $row = $result->fetch_assoc();
			     $pid[$i]= stripslashes($row['cid']);
			     $uid[$i]= stripslashes($row['uid']);
			     $pitcher1[$i]= stripslashes($row['pitcher1']);
			     $pitcher2[$i]= stripslashes($row['pitcher2']);
			     $criteria[$i]= stripslashes($row['criteria']);
			    
		?>
		<tr><td><a href = "/teams/cpitcher1.php?id=<?php echo $pid[$i] ?>"><p style="color:blue; font-size:12pt; text-align:center;"><?php echo $pitcher1[$i]." cmp to ".$pitcher2[$i] ?></p></a></td>
		    <td><p style="color:red ; font-size:12pt; text-align:center;"><?php echo "Criteria=".$criteria[$i] ?></p></td>
		    <td><p style="color:red ; font-size:12pt; text-align:center;"><?php echo "Year=All" ?></p></td>
		    <td><button class="button3"><a href = "/teams/deleteq4.php?id=<?php echo $pid[$i] ?>">Delete</button></td></tr>	
		<?php
			}

		?>
		</table> 
		</div>
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