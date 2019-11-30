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
	
	$query = "select * from saveq1 where bid='$idqs'";
	$result= $db->query($query);
	$num_results = $result->num_rows;
	
	for ($i=0; $i <$num_results; $i++) {
			$row = $result->fetch_assoc();
			$spid= stripslashes($row['bid']);
			$sid= stripslashes($row['uid']);
			$category= stripslashes($row['criteria']);
			$year= stripslashes($row['year']);
	}    

	
	$datapoints = array(); 
	
	switch($year){
	
	case "10":
		if($category=="h"){
			$query = "select name, tm, h from b2010";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['h']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="r"){
			$query = "select name, tm, r from b2010";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['r']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="2b"){
			$query = "select name, tm, 2b from b2010";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['2b']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
       elseif($category=="3b"){
			$query = "select name, tm, 3b from b2010";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['3b']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="hr"){
			$query = "select name, tm, hr from b2010";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['hr']);
			        $comb=$name."(".$tm.")";
			        $comp[$comb]=$cate;   		
			}
         }
        elseif($category=="sb"){
			$query = "select name, tm, sb from b2010";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['sb']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;  
			}
         }
        elseif($category=="bb"){
			$query = "select name, tm, bb from b2010";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['bb']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;  
			}
         }
        elseif($category=="so"){
			$query = "select name, tm, so from b2010";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['so']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate; 
			}
         }
        elseif($category=="rbi"){
			$query = "select name, tm, rbi from b2010";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['rbi']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="ba"){
			$query = "select name, tm, ab, ba from b2010";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$ab= stripslashes($row['ab']);
					$cate= stripslashes($row['ba']);
					$comb=$name."(".$tm.")";
					if($ab>=502){
					$comp[$comb]=$cate*1000;
					}
			}
         }
        elseif($category=="obp"){
			$query = "select name, tm, ab, obp from b2010";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$ab= stripslashes($row['ab']);
					$cate= stripslashes($row['obp']);
					$comb=$name."(".$tm.")";
					if($ab>=502){
					$comp[$comb]=$cate*1000;
					}
			}
         }
    break;

    case "11":
       		if($category=="h"){
			$query = "select name, tm, h from b2011";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['h']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="r"){
			$query = "select name, tm, r from b2011";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['r']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="2b"){
			$query = "select name, tm, 2b from b2011";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['2b']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
       elseif($category=="3b"){
			$query = "select name, tm, 3b from b2011";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['3b']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="hr"){
			$query = "select name, tm, hr from b2011";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['hr']);
			        $comb=$name."(".$tm.")";
			        $comp[$comb]=$cate;   		
			}
         }
        elseif($category=="sb"){
			$query = "select name, tm, sb from b2011";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['sb']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;  
			}
         }
        elseif($category=="bb"){
			$query = "select name, tm, bb from b2011";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['bb']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;  
			}
         }
        elseif($category=="so"){
			$query = "select name, tm, so from b2011";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['so']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate; 
			}
         }
        elseif($category=="rbi"){
			$query = "select name, tm, rbi from b2011";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['rbi']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="ba"){
	       $query = "select name, tm, ab, ba from b2011";
	       $result= $db->query($query);
	       $num_results = $result->num_rows;
	     for ($i=0; $i <$num_results; $i++) {
			$row = $result->fetch_assoc();
			$name= stripslashes($row['name']);
			$tm= stripslashes($row['tm']);
			$ab= stripslashes($row['ab']);
			$cate= stripslashes($row['ba']);
			$comb=$name."(".$tm.")";
			if($ab>=502){
			$comp[$comb]=$cate*1000;
			}
	      }
        }
        elseif($category=="obp"){
			$query = "select name, tm, ab, obp from b2011";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$ab= stripslashes($row['ab']);
					$cate= stripslashes($row['obp']);
					$comb=$name."(".$tm.")";
					if($ab>=502){
					$comp[$comb]=$cate*1000;
					}
			}
         }
    break;

    case "12":
      		if($category=="h"){
			$query = "select name, tm, h from b2012";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['h']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="r"){
			$query = "select name, tm, r from b2012";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['r']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="2b"){
			$query = "select name, tm, 2b from b2012";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['2b']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
       elseif($category=="3b"){
			$query = "select name, tm, 3b from b2012";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['3b']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="hr"){
			$query = "select name, tm, hr from b2012";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['hr']);
			        $comb=$name."(".$tm.")";
			        $comp[$comb]=$cate;   		
			}
         }
        elseif($category=="sb"){
			$query = "select name, tm, sb from b2012";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['sb']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;  
			}
         }
        elseif($category=="bb"){
			$query = "select name, tm, bb from b2012";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['bb']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;  
			}
         }
        elseif($category=="so"){
			$query = "select name, tm, so from b2012";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['so']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate; 
			}
         }
        elseif($category=="rbi"){
			$query = "select name, tm, rbi from b2012";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['rbi']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="ba"){
		   $query = "select name, tm, ab, ba from b2012";
		   $result= $db->query($query);
		   $num_results = $result->num_rows;
		   for ($i=0; $i <$num_results; $i++) {
				$row = $result->fetch_assoc();
				$name= stripslashes($row['name']);
				$tm= stripslashes($row['tm']);
				$ab= stripslashes($row['ab']);
				$cate= stripslashes($row['ba']);
				$comb=$name."(".$tm.")";
				if($ab>=502){
				$comp[$comb]=$cate*1000;
				}
		   }
	    }
	   elseif($category=="obp"){
				$query = "select name, tm, ab, obp from b2012";
				$result= $db->query($query);
				$num_results = $result->num_rows;
				for ($i=0; $i <$num_results; $i++) {
						$row = $result->fetch_assoc();
						$name= stripslashes($row['name']);
						$tm= stripslashes($row['tm']);
						$ab= stripslashes($row['ab']);
						$cate= stripslashes($row['obp']);
						$comb=$name."(".$tm.")";
						if($ab>=502){
						$comp[$comb]=$cate*1000;
						}
				}
	    }
    break;

    case "13":
        		if($category=="h"){
			$query = "select name, tm, h from b2013";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['h']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="r"){
			$query = "select name, tm, r from b2013";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['r']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="2b"){
			$query = "select name, tm, 2b from b2013";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['2b']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
       elseif($category=="3b"){
			$query = "select name, tm, 3b from b2013";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['3b']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="hr"){
			$query = "select name, tm, hr from b2013";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['hr']);
			        $comb=$name."(".$tm.")";
			        $comp[$comb]=$cate;   		
			}
         }
        elseif($category=="sb"){
			$query = "select name, tm, sb from b2013";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['sb']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;  
			}
         }
        elseif($category=="bb"){
			$query = "select name, tm, bb from b2013";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['bb']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;  
			}
         }
        elseif($category=="so"){
			$query = "select name, tm, so from b2013";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['so']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate; 
			}
         }
        elseif($category=="rbi"){
			$query = "select name, tm, rbi from b2013";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['rbi']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="ba"){
		   $query = "select name, tm, ab, ba from b2013";
		   $result= $db->query($query);
		   $num_results = $result->num_rows;
		   for ($i=0; $i <$num_results; $i++) {
				$row = $result->fetch_assoc();
				$name= stripslashes($row['name']);
				$tm= stripslashes($row['tm']);
				$ab= stripslashes($row['ab']);
				$cate= stripslashes($row['ba']);
				$comb=$name."(".$tm.")";
				if($ab>=502){
				$comp[$comb]=$cate*1000;
				}
		   }
	    }
	   elseif($category=="obp"){
				$query = "select name, tm, ab, obp from b2013";
				$result= $db->query($query);
				$num_results = $result->num_rows;
				for ($i=0; $i <$num_results; $i++) {
						$row = $result->fetch_assoc();
						$name= stripslashes($row['name']);
						$tm= stripslashes($row['tm']);
						$ab= stripslashes($row['ab']);
						$cate= stripslashes($row['obp']);
						$comb=$name."(".$tm.")";
						if($ab>=502){
						$comp[$comb]=$cate*1000;
						}
				}
	    }
    break;

    case "14":
      		if($category=="h"){
			$query = "select name, tm, h from b2014";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['h']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="r"){
			$query = "select name, tm, r from b2014";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['r']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="2b"){
			$query = "select name, tm, 2b from b2014";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['2b']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
       elseif($category=="3b"){
			$query = "select name, tm, 3b from b2014";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['3b']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="hr"){
			$query = "select name, tm, hr from b2014";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['hr']);
			        $comb=$name."(".$tm.")";
			        $comp[$comb]=$cate;   		
			}
         }
        elseif($category=="sb"){
			$query = "select name, tm, sb from b2014";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['sb']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;  
			}
         }
        elseif($category=="bb"){
			$query = "select name, tm, bb from b2014";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['bb']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;  
			}
         }
        elseif($category=="so"){
			$query = "select name, tm, so from b2014";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['so']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate; 
			}
         }
        elseif($category=="rbi"){
			$query = "select name, tm, rbi from b2014";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['rbi']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="ba"){
		   $query = "select name, tm, ab, ba from b2014";
		   $result= $db->query($query);
		   $num_results = $result->num_rows;
		   for ($i=0; $i <$num_results; $i++) {
				$row = $result->fetch_assoc();
				$name= stripslashes($row['name']);
				$tm= stripslashes($row['tm']);
				$ab= stripslashes($row['ab']);
				$cate= stripslashes($row['ba']);
				$comb=$name."(".$tm.")";
				if($ab>=502){
				$comp[$comb]=$cate*1000;
				}
		   }
	    }
	   elseif($category=="obp"){
				$query = "select name, tm, ab, obp from b2014";
				$result= $db->query($query);
				$num_results = $result->num_rows;
				for ($i=0; $i <$num_results; $i++) {
						$row = $result->fetch_assoc();
						$name= stripslashes($row['name']);
						$tm= stripslashes($row['tm']);
						$ab= stripslashes($row['ab']);
						$cate= stripslashes($row['obp']);
						$comb=$name."(".$tm.")";
						if($ab>=502){
						$comp[$comb]=$cate*1000;
						}
				}
	   }
    break;

    case "15":
      		if($category=="h"){
			$query = "select name, tm, h from b2015";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['h']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="r"){
			$query = "select name, tm, r from b2015";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['r']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="2b"){
			$query = "select name, tm, 2b from b2015";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['2b']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
       elseif($category=="3b"){
			$query = "select name, tm, 3b from b2015";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['3b']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="hr"){
			$query = "select name, tm, hr from b2015";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['hr']);
			        $comb=$name."(".$tm.")";
			        $comp[$comb]=$cate;   		
			}
         }
        elseif($category=="sb"){
			$query = "select name, tm, sb from b2015";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['sb']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;  
			}
         }
        elseif($category=="bb"){
			$query = "select name, tm, bb from b2015";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['bb']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;  
			}
         }
        elseif($category=="so"){
			$query = "select name, tm, so from b2015";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['so']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate; 
			}
         }
        elseif($category=="rbi"){
			$query = "select name, tm, rbi from b2015";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['rbi']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="ba"){
		    $query = "select name, tm, ab, ba from b2015";
		    $result= $db->query($query);
		    $num_results = $result->num_rows;
		    for ($i=0; $i <$num_results; $i++) {
				$row = $result->fetch_assoc();
				$name= stripslashes($row['name']);
				$tm= stripslashes($row['tm']);
				$ab= stripslashes($row['ab']);
				$cate= stripslashes($row['ba']);
				$comb=$name."(".$tm.")";
				if($ab>=502){
				$comp[$comb]=$cate*1000;
				}
		    }
	    }
	  elseif($category=="obp"){
				$query = "select name, tm, ab, obp from b2015";
				$result= $db->query($query);
				$num_results = $result->num_rows;
				for ($i=0; $i <$num_results; $i++) {
						$row = $result->fetch_assoc();
						$name= stripslashes($row['name']);
						$tm= stripslashes($row['tm']);
						$ab= stripslashes($row['ab']);
						$cate= stripslashes($row['obp']);
						$comb=$name."(".$tm.")";
						if($ab>=502){
						$comp[$comb]=$cate*1000;
						}
				}
	  }
    break;

    case "16":
       		if($category=="h"){
			$query = "select name, tm, h from b2016";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['h']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="r"){
			$query = "select name, tm, r from b2016";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['r']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="2b"){
			$query = "select name, tm, 2b from b2016";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['2b']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
       elseif($category=="3b"){
			$query = "select name, tm, 3b from b2016";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['3b']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="hr"){
			$query = "select name, tm, hr from b2016";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['hr']);
			        $comb=$name."(".$tm.")";
			        $comp[$comb]=$cate;   		
			}
         }
        elseif($category=="sb"){
			$query = "select name, tm, sb from b2016";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['sb']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;  
			}
         }
        elseif($category=="bb"){
			$query = "select name, tm, bb from b2016";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['bb']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;  
			}
         }
        elseif($category=="so"){
			$query = "select name, tm, so from b2016";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['so']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate; 
			}
         }
        elseif($category=="rbi"){
			$query = "select name, tm, rbi from b2016";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['rbi']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="ba"){
		   $query = "select name, tm, ab, ba from b2016";
		   $result= $db->query($query);
		   $num_results = $result->num_rows;
		   for ($i=0; $i <$num_results; $i++) {
				$row = $result->fetch_assoc();
				$name= stripslashes($row['name']);
				$tm= stripslashes($row['tm']);
				$ab= stripslashes($row['ab']);
				$cate= stripslashes($row['ba']);
				$comb=$name."(".$tm.")";
				if($ab>=502){
				$comp[$comb]=$cate*1000;
				}
		   }
        }
       elseif($category=="obp"){
			$query = "select name, tm, ab, obp from b2016";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$ab= stripslashes($row['ab']);
					$cate= stripslashes($row['obp']);
					$comb=$name."(".$tm.")";
					if($ab>=502){
					$comp[$comb]=$cate*1000;
					}
			}
         }
    break;

    case "17":
       		if($category=="h"){
			$query = "select name, tm, h from b2017";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['h']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="r"){
			$query = "select name, tm, r from b2017";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['r']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="2b"){
			$query = "select name, tm, 2b from b2017";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['2b']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
       elseif($category=="3b"){
			$query = "select name, tm, 3b from b2017";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['3b']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="hr"){
			$query = "select name, tm, hr from b2017";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['hr']);
			        $comb=$name."(".$tm.")";
			        $comp[$comb]=$cate;   		
			}
         }
        elseif($category=="sb"){
			$query = "select name, tm, sb from b2017";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['sb']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;  
			}
         }
        elseif($category=="bb"){
			$query = "select name, tm, bb from b2017";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['bb']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;  
			}
         }
        elseif($category=="so"){
			$query = "select name, tm, so from b2017";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['so']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate; 
			}
         }
        elseif($category=="rbi"){
			$query = "select name, tm, rbi from b2017";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['rbi']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="ba"){
		   $query = "select name, tm, ab, ba from b2017";
		   $result= $db->query($query);
		   $num_results = $result->num_rows;
		   for ($i=0; $i <$num_results; $i++) {
				$row = $result->fetch_assoc();
				$name= stripslashes($row['name']);
				$tm= stripslashes($row['tm']);
				$ab= stripslashes($row['ab']);
				$cate= stripslashes($row['ba']);
				$comb=$name."(".$tm.")";
				if($ab>=502){
				$comp[$comb]=$cate*1000;
				}
		   }
	   }
	   elseif($category=="obp"){
				$query = "select name, tm, ab, obp from b2017";
				$result= $db->query($query);
				$num_results = $result->num_rows;
				for ($i=0; $i <$num_results; $i++) {
						$row = $result->fetch_assoc();
						$name= stripslashes($row['name']);
						$tm= stripslashes($row['tm']);
						$ab= stripslashes($row['ab']);
						$cate= stripslashes($row['obp']);
						$comb=$name."(".$tm.")";
						if($ab>=502){
						$comp[$comb]=$cate*1000;
						}
				}
	    }
    break;

    case "18":
       		if($category=="h"){
			$query = "select name, tm, h from b2018";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['h']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="r"){
			$query = "select name, tm, r from b2018";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['r']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="2b"){
			$query = "select name, tm, 2b from b2018";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['2b']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
       elseif($category=="3b"){
			$query = "select name, tm, 3b from b2018";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['3b']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="hr"){
			$query = "select name, tm, hr from b2018";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['hr']);
			        $comb=$name."(".$tm.")";
			        $comp[$comb]=$cate;   		
			}
         }
        elseif($category=="sb"){
			$query = "select name, tm, sb from b2018";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['sb']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;  
			}
         }
        elseif($category=="bb"){
			$query = "select name, tm, bb from b2018";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['bb']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;  
			}
         }
        elseif($category=="so"){
			$query = "select name, tm, so from b2018";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['so']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate; 
			}
         }
        elseif($category=="rbi"){
			$query = "select name, tm, rbi from b2018";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['rbi']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="ba"){
		      $query = "select name, tm, ab, ba from b2018";
		      $result= $db->query($query);
		      $num_results = $result->num_rows;
		      for ($i=0; $i <$num_results; $i++) {
				$row = $result->fetch_assoc();
				$name= stripslashes($row['name']);
				$tm= stripslashes($row['tm']);
				$ab= stripslashes($row['ab']);
				$cate= stripslashes($row['ba']);
				$comb=$name."(".$tm.")";
				if($ab>=502){
				$comp[$comb]=$cate*1000;
				}
		      }
	     }
	    elseif($category=="obp"){
				$query = "select name, tm, ab, obp from b2018";
				$result= $db->query($query);
				$num_results = $result->num_rows;
				for ($i=0; $i <$num_results; $i++) {
						$row = $result->fetch_assoc();
						$name= stripslashes($row['name']);
						$tm= stripslashes($row['tm']);
						$ab= stripslashes($row['ab']);
						$cate= stripslashes($row['obp']);
						$comb=$name."(".$tm.")";
						if($ab>=502){
						$comp[$comb]=$cate*1000;
						}
				}
	    }
    break;

    case "19":
       		if($category=="h"){
			$query = "select name, tm, h from b2019";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['h']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="r"){
			$query = "select name, tm, r from b2019";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['r']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="2b"){
			$query = "select name, tm, 2b from b2019";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['2b']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
       elseif($category=="3b"){
			$query = "select name, tm, 3b from b2019";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['3b']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="hr"){
			$query = "select name, tm, hr from b2019";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['hr']);
			        $comb=$name."(".$tm.")";
			        $comp[$comb]=$cate;   		
			}
         }
        elseif($category=="sb"){
			$query = "select name, tm, sb from b2019";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['sb']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;  
			}
         }
        elseif($category=="bb"){
			$query = "select name, tm, bb from b2019";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['bb']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;  
			}
         }
        elseif($category=="so"){
			$query = "select name, tm, so from b2019";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['so']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate; 
			}
         }
        elseif($category=="rbi"){
			$query = "select name, tm, rbi from b2019";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['rbi']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="ba"){
		      $query = "select name, tm, ab, ba from b2019";
		      $result= $db->query($query);
		      $num_results = $result->num_rows;
		      for ($i=0; $i <$num_results; $i++) {
				$row = $result->fetch_assoc();
				$name= stripslashes($row['name']);
				$tm= stripslashes($row['tm']);
				$ab= stripslashes($row['ab']);
				$cate= stripslashes($row['ba']);
				$comb=$name."(".$tm.")";
				if($ab>=502){
				$comp[$comb]=$cate*1000;
				}
		      }
	   }
	   elseif($category=="obp"){
				$query = "select name, tm, ab, obp from b2019";
				$result= $db->query($query);
				$num_results = $result->num_rows;
				for ($i=0; $i <$num_results; $i++) {
						$row = $result->fetch_assoc();
						$name= stripslashes($row['name']);
						$tm= stripslashes($row['tm']);
						$ab= stripslashes($row['ab']);
						$cate= stripslashes($row['obp']);
						$comb=$name."(".$tm.")";
						if($ab>=502){
						$comp[$comb]=$cate*1000;
						}
				}
	   }
    break;
    default:
	break;	
}

switch($category){
   
   case"h":
	$category="Hits";
   break;    
   case"r":
	$category="Runs scored";
   break; 
   case"2b":
	$category="Doubles";
   break; 
   case"3b":
	$category="Triples";
   break; 
   case"hr":
	$category="Home Runs";
   break; 
   case"sb":
	$category="Stolen Bases";
   break; 
   case"bb":
	$category="Base on balls";
   break; 
   case"so":
	$category="Strike outs";
   break; 
   case"rbi":
	$category="Runs batted in";
   break; 
   case"ba":
	$category="Average";
   break; 
   case"obp":
	$category="On base percentage";
   break; 
   default:
   break;	
}

arsort($comp);

$count1=0;

foreach ($comp as $key => $value) {
	array_push($datapoints, array("y"=> $value,"label"=>$key));
	$count1=$count1+1;
	if($count1>9){
		break;
	}	
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
  <div class="btn-group">
  <button class="button1"><a href = "/teams/load4.php">Return previous screen</button>
  <button class="button1"><a href = "/main.php">Return home screen</button>
  </div>
  </div>
  </div>
<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("coverteams1", {
	animationEnabled: true,
	title:{
		text: "<?php echo "Top 10 batters ".$category." 20".$year ?>"
	},
	axisY: {
		title: "<?php echo $category ?>"
	},
	data: [{
		type: "bar",
		yValueFormatString: "#,##0.00",
		indexLabel: "{y}",
		indexLabelPlacement: "inside",
		indexLabelFontWeight: "bolder",
		indexLabelFontColor: "white",
		dataPoints: <?php echo json_encode($datapoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
<script src='../js/canvasjs.min.js'></script>
</body>
</html>

<?php
	$db->close();
	}
?>