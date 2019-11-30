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
		
		$query = "select * from saveq2 where bid='$idqs'";
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
	$sentinel=0;
	
	switch($year){
	
	case "10":
		if($category=="w"){
			$query = "select name, tm, w from p2010";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['w']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="l"){
			$query = "select name, tm, l from p2010";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['l']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="era"){
	        $sentinel=1;
			$query = "select name, tm, era, ip from p2010";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['era']);
					$ip= stripslashes($row['ip']);
				    $comb=$name."(".$tm.")";
				    if($ip>=162){
					$comp[$comb]=$cate;
				    }
			}
         }
       elseif($category=="g"){
			$query = "select name, tm, g from p2010";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['g']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="gs"){
			$query = "select name, tm, gs from p2010";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['gs']);
			        $comb=$name."(".$tm.")";
			        $comp[$comb]=$cate;   		
			}
         }
        elseif($category=="ip"){
			$query = "select name, tm, ip from p2010";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['ip']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;  
			}
         }
        elseif($category=="h"){
			$query = "select name, tm, h from p2010";
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
        elseif($category=="so"){
			$query = "select name, tm, so from p2010";
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
        elseif($category=="so9"){
			$query = "select name, tm, so9 from p2010";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['so9']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="er"){
			$query = "select name, tm, er from p2010";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['er']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="hr"){
			$query = "select name, tm, hr from p2010";
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
       elseif($category=="bb"){
			$query = "select name, tm, bb from p2010";
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
    break;

    case "11":
       		if($category=="w"){
			$query = "select name, tm, w from p2011";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['w']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="l"){
			$query = "select name, tm, l from p2011";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['l']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="era"){
	       $sentinel=1;
		   $query = "select name, tm, era, ip from p2011";
		$result= $db->query($query);
		$num_results = $result->num_rows;
		for ($i=0; $i <$num_results; $i++) {
				$row = $result->fetch_assoc();
				$name= stripslashes($row['name']);
				$tm= stripslashes($row['tm']);
				$cate= stripslashes($row['era']);
				$ip= stripslashes($row['ip']);
			    $comb=$name."(".$tm.")";
			    if($ip>=162){
				$comp[$comb]=$cate;
			    }
		}
	
	    }
       elseif($category=="g"){
			$query = "select name, tm, g from p2011";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['g']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="gs"){
			$query = "select name, tm, gs from p2011";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['gs']);
			        $comb=$name."(".$tm.")";
			        $comp[$comb]=$cate;   		
			}
         }
        elseif($category=="ip"){
			$query = "select name, tm, ip from p2011";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['ip']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;  
			}
         }
        elseif($category=="h"){
			$query = "select name, tm, h from p2011";
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
        elseif($category=="so"){
			$query = "select name, tm, so from p2011";
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
        elseif($category=="so9"){
			$query = "select name, tm, so9 from p2011";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['so9']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="er"){
			$query = "select name, tm, er from p2011";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['er']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="hr"){
			$query = "select name, tm, hr from p2011";
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
       elseif($category=="bb"){
			$query = "select name, tm, bb from p2011";
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

    break;

    case "12":
       		if($category=="w"){
			$query = "select name, tm, w from p2012";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['w']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="l"){
			$query = "select name, tm, l from p2012";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['l']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="era"){
	       $sentinel=1;
		   $query = "select name, tm, era, ip from p2012";
		$result= $db->query($query);
		$num_results = $result->num_rows;
		for ($i=0; $i <$num_results; $i++) {
				$row = $result->fetch_assoc();
				$name= stripslashes($row['name']);
				$tm= stripslashes($row['tm']);
				$cate= stripslashes($row['era']);
				$ip= stripslashes($row['ip']);
			    $comb=$name."(".$tm.")";
			    if($ip>=162){
				$comp[$comb]=$cate;
			    }
		}
	
	    }
       elseif($category=="g"){
			$query = "select name, tm, g from p2012";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['g']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="gs"){
			$query = "select name, tm, gs from p2012";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['gs']);
			        $comb=$name."(".$tm.")";
			        $comp[$comb]=$cate;   		
			}
         }
        elseif($category=="ip"){
			$query = "select name, tm, ip from p2012";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['ip']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;  
			}
         }
        elseif($category=="h"){
			$query = "select name, tm, h from p2012";
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
        elseif($category=="so"){
			$query = "select name, tm, so from p2012";
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
        elseif($category=="so9"){
			$query = "select name, tm, so9 from p2012";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['so9']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="er"){
			$query = "select name, tm, er from p2012";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['er']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="hr"){
			$query = "select name, tm, hr from p2012";
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
       elseif($category=="bb"){
			$query = "select name, tm, bb from p2012";
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

    break;

    case "13":
        		if($category=="w"){
			$query = "select name, tm, w from p2013";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['w']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="l"){
			$query = "select name, tm, l from p2013";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['l']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="era"){
	       $sentinel=1;
		   $query = "select name, tm, era, ip from p2013";
		$result= $db->query($query);
		$num_results = $result->num_rows;
		for ($i=0; $i <$num_results; $i++) {
				$row = $result->fetch_assoc();
				$name= stripslashes($row['name']);
				$tm= stripslashes($row['tm']);
				$cate= stripslashes($row['era']);
				$ip= stripslashes($row['ip']);
			    $comb=$name."(".$tm.")";
			    if($ip>=162){
				$comp[$comb]=$cate;
			    }
		}
	
	    }
       elseif($category=="g"){
			$query = "select name, tm, g from p2013";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['g']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="gs"){
			$query = "select name, tm, gs from p2013";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['gs']);
			        $comb=$name."(".$tm.")";
			        $comp[$comb]=$cate;   		
			}
         }
        elseif($category=="ip"){
			$query = "select name, tm, ip from p2013";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['ip']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;  
			}
         }
        elseif($category=="h"){
			$query = "select name, tm, h from p2013";
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
        elseif($category=="so"){
			$query = "select name, tm, so from p2013";
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
        elseif($category=="so9"){
			$query = "select name, tm, so9 from p2013";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['so9']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="er"){
			$query = "select name, tm, er from p2013";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['er']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="hr"){
			$query = "select name, tm, hr from p2013";
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
       elseif($category=="bb"){
			$query = "select name, tm, bb from p2013";
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

    break;

    case "14":
      		if($category=="w"){
			$query = "select name, tm, w from p2014";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['w']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="l"){
			$query = "select name, tm, l from p2014";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['l']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="era"){
	        $sentinel=1;
		    $query = "select name, tm, era, ip from p2014";
		$result= $db->query($query);
		$num_results = $result->num_rows;
		for ($i=0; $i <$num_results; $i++) {
				$row = $result->fetch_assoc();
				$name= stripslashes($row['name']);
				$tm= stripslashes($row['tm']);
				$cate= stripslashes($row['era']);
				$ip= stripslashes($row['ip']);
			    $comb=$name."(".$tm.")";
			    if($ip>=162){
				$comp[$comb]=$cate;
			    }
		}
	
	    }
       elseif($category=="g"){
			$query = "select name, tm, g from p2014";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['g']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="gs"){
			$query = "select name, tm, gs from p2014";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['gs']);
			        $comb=$name."(".$tm.")";
			        $comp[$comb]=$cate;   		
			}
         }
        elseif($category=="ip"){
			$query = "select name, tm, ip from p2014";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['ip']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;  
			}
         }
        elseif($category=="h"){
			$query = "select name, tm, h from p2014";
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
        elseif($category=="so"){
			$query = "select name, tm, so from p2014";
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
        elseif($category=="so9"){
			$query = "select name, tm, so9 from p2014";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['so9']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="er"){
			$query = "select name, tm, er from p2014";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['er']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="hr"){
			$query = "select name, tm, hr from p2014";
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
       elseif($category=="bb"){
			$query = "select name, tm, bb from p2014";
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

    break;

    case "15":
       		if($category=="w"){
			$query = "select name, tm, w from p2015";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['w']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="l"){
			$query = "select name, tm, l from p2015";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['l']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="era"){
	       $sentinel=1;
		   $query = "select name, tm, era, ip from p2015";
		$result= $db->query($query);
		$num_results = $result->num_rows;
		for ($i=0; $i <$num_results; $i++) {
				$row = $result->fetch_assoc();
				$name= stripslashes($row['name']);
				$tm= stripslashes($row['tm']);
				$cate= stripslashes($row['era']);
				$ip= stripslashes($row['ip']);
			    $comb=$name."(".$tm.")";
			    if($ip>=162){
				$comp[$comb]=$cate;
			    }
		}
	
	    }
       elseif($category=="g"){
			$query = "select name, tm, g from p2015";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['g']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="gs"){
			$query = "select name, tm, gs from p2015";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['gs']);
			        $comb=$name."(".$tm.")";
			        $comp[$comb]=$cate;   		
			}
         }
        elseif($category=="ip"){
			$query = "select name, tm, ip from p2015";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['ip']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;  
			}
         }
        elseif($category=="h"){
			$query = "select name, tm, h from p2015";
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
        elseif($category=="so"){
			$query = "select name, tm, so from p2015";
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
        elseif($category=="so9"){
			$query = "select name, tm, so9 from p2015";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['so9']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="er"){
			$query = "select name, tm, er from p2015";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['er']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="hr"){
			$query = "select name, tm, hr from p2015";
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
       elseif($category=="bb"){
			$query = "select name, tm, bb from p2015";
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

    break;

    case "16":
       		if($category=="w"){
			$query = "select name, tm, w from p2016";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['w']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="l"){
			$query = "select name, tm, l from p2016";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['l']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="era"){
	       $sentinel=1;
		   $query = "select name, tm, era, ip from p2016";
		$result= $db->query($query);
		$num_results = $result->num_rows;
		for ($i=0; $i <$num_results; $i++) {
				$row = $result->fetch_assoc();
				$name= stripslashes($row['name']);
				$tm= stripslashes($row['tm']);
				$cate= stripslashes($row['era']);
				$ip= stripslashes($row['ip']);
			    $comb=$name."(".$tm.")";
			    if($ip>=162){
				$comp[$comb]=$cate;
			    }
		}
	         
		}
       elseif($category=="g"){
			$query = "select name, tm, g from p2016";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['g']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="gs"){
			$query = "select name, tm, gs from p2016";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['gs']);
			        $comb=$name."(".$tm.")";
			        $comp[$comb]=$cate;   		
			}
         }
        elseif($category=="ip"){
			$query = "select name, tm, ip from p2016";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['ip']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;  
			}
         }
        elseif($category=="h"){
			$query = "select name, tm, h from p2016";
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
        elseif($category=="so"){
			$query = "select name, tm, so from p2016";
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
        elseif($category=="so9"){
			$query = "select name, tm, so9 from p2016";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['so9']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="er"){
			$query = "select name, tm, er from p2016";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['er']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="hr"){
			$query = "select name, tm, hr from p2016";
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
       elseif($category=="bb"){
			$query = "select name, tm, bb from p2016";
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

    break;

    case "17":
      		if($category=="w"){
			$query = "select name, tm, w from p2017";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['w']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="l"){
			$query = "select name, tm, l from p2017";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['l']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="era"){
	        $sentinel=1;
		    $query = "select name, tm, era, ip from p2017";
		$result= $db->query($query);
		$num_results = $result->num_rows;
		for ($i=0; $i <$num_results; $i++) {
				$row = $result->fetch_assoc();
				$name= stripslashes($row['name']);
				$tm= stripslashes($row['tm']);
				$cate= stripslashes($row['era']);
				$ip= stripslashes($row['ip']);
			    $comb=$name."(".$tm.")";
			    if($ip>=162){
				$comp[$comb]=$cate;
			    }
		}
	         
		}
       elseif($category=="g"){
			$query = "select name, tm, g from p2017";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['g']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="gs"){
			$query = "select name, tm, gs from p2017";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['gs']);
			        $comb=$name."(".$tm.")";
			        $comp[$comb]=$cate;   		
			}
         }
        elseif($category=="ip"){
			$query = "select name, tm, ip from p2017";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['ip']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;  
			}
         }
        elseif($category=="h"){
			$query = "select name, tm, h from p2017";
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
        elseif($category=="so"){
			$query = "select name, tm, so from p2017";
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
        elseif($category=="so9"){
			$query = "select name, tm, so9 from p2017";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['so9']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="er"){
			$query = "select name, tm, er from p2017";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['er']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="hr"){
			$query = "select name, tm, hr from p2017";
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
       elseif($category=="bb"){
			$query = "select name, tm, bb from p2017";
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

    break;

    case "18":
        		if($category=="w"){
			$query = "select name, tm, w from p2018";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['w']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="l"){
			$query = "select name, tm, l from p2018";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['l']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="era"){
	      $sentinel=1;
		  $query = "select name, tm, era, ip from p2018";
		$result= $db->query($query);
		$num_results = $result->num_rows;
		for ($i=0; $i <$num_results; $i++) {
				$row = $result->fetch_assoc();
				$name= stripslashes($row['name']);
				$tm= stripslashes($row['tm']);
				$cate= stripslashes($row['era']);
				$ip= stripslashes($row['ip']);
			    $comb=$name."(".$tm.")";
			    if($ip>=162){
				$comp[$comb]=$cate;
			    }
		}
	         
		}
       elseif($category=="g"){
			$query = "select name, tm, g from p2018";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['g']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="gs"){
			$query = "select name, tm, gs from p2018";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['gs']);
			        $comb=$name."(".$tm.")";
			        $comp[$comb]=$cate;   		
			}
         }
        elseif($category=="ip"){
			$query = "select name, tm, ip from p2018";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['ip']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;  
			}
         }
        elseif($category=="h"){
			$query = "select name, tm, h from p2018";
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
        elseif($category=="so"){
			$query = "select name, tm, so from p2018";
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
        elseif($category=="so9"){
			$query = "select name, tm, so9 from p2018";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['so9']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="er"){
			$query = "select name, tm, er from p2018";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['er']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="hr"){
			$query = "select name, tm, hr from p2018";
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
       elseif($category=="bb"){
			$query = "select name, tm, bb from p2018";
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

    break;

    case "19":
       		if($category=="w"){
			$query = "select name, tm, w from p2019";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['w']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="l"){
			$query = "select name, tm, l from p2019";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['l']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="era"){
	     $sentinel=1;
		   $query = "select name, tm, era, ip from p2019";
		$result= $db->query($query);
		$num_results = $result->num_rows;
		for ($i=0; $i <$num_results; $i++) {
				$row = $result->fetch_assoc();
				$name= stripslashes($row['name']);
				$tm= stripslashes($row['tm']);
				$cate= stripslashes($row['era']);
				$ip= stripslashes($row['ip']);
			    $comb=$name."(".$tm.")";
			    if($ip>=162){
				$comp[$comb]=$cate;
			    }
		}
	         
		}
       elseif($category=="g"){
			$query = "select name, tm, g from p2019";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['g']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="gs"){
			$query = "select name, tm, gs from p2019";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['gs']);
			        $comb=$name."(".$tm.")";
			        $comp[$comb]=$cate;   		
			}
         }
        elseif($category=="ip"){
			$query = "select name, tm, ip from p2019";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['ip']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;  
			}
         }
        elseif($category=="h"){
			$query = "select name, tm, h from p2019";
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
        elseif($category=="so"){
			$query = "select name, tm, so from p2019";
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
        elseif($category=="so9"){
			$query = "select name, tm, so9 from p2019";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['so9']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="er"){
			$query = "select name, tm, er from p2019";
			$result= $db->query($query);
			$num_results = $result->num_rows;
			for ($i=0; $i <$num_results; $i++) {
					$row = $result->fetch_assoc();
					$name= stripslashes($row['name']);
					$tm= stripslashes($row['tm']);
					$cate= stripslashes($row['er']);
					$comb=$name."(".$tm.")";
					$comp[$comb]=$cate;
			}
         }
        elseif($category=="hr"){
			$query = "select name, tm, hr from p2019";
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
       elseif($category=="bb"){
			$query = "select name, tm, bb from p2019";
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

    break;
    default:
	break;	
}

switch($category){
   
   case"w":
	$category="wins";
   break;    
   case"l":
	$category="Losses";
   break; 
   case"era":
	$category="Earned runs average";
   break; 
   case"g":
	$category="Games";
   break; 
   case"gs":
	$category="Games Started";
   break; 
   case"ip":
	$category="Innings Pitches";
   break; 
   case"h":
	$category="Hits";
   break; 
   case"so":
	$category="Strike outs";
   break; 
   case"so9":
	$category="Strike outs per nine innings";
   break; 
   case"er":
	$category="Earned Runs";
   break; 
   case"hr":
	$category="Home Runs allowed";
   break; 
   case"bb":
	$category="Base on balls allowed";
   break; 
   default:
   break;	
}

if($sentinel==1){
	asort($comp);
}else{
    arsort($comp);
}

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
		text: "<?php echo "Top 10 pitchers ".$category." 20".$year ?>"
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