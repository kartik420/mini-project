<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Free Academia Website Template | Home :: w3layouts</title>
<link href="web/css/style.css" rel="stylesheet" type="text/css" media="all" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="web/css/responsiveslides.css">
<script src="web/js/jquery.min.js"></script>
<script src="web/js/responsiveslides.min.js"></script>
		  <script>
		    // You can also use "$(window).load(function() {"
			    $(function () {
			      // Slideshow 1
			      $("#slider1").responsiveSlides({
			        maxwidth: 2500,
			        speed: 600
			      });
			});
		  </script>
<!--light-box-->
<script type="text/javascript" src="web/js/jquery.lightbox.js"></script>
<link rel="stylesheet" type="text/css" href="web/css/lightbox.css" media="screen">
	<script type="text/javascript">
		$(function() {
			$('.gallery a').lightBox();
		});
   </script>
</head>
<body>
<div class="header">
	<div class="wrap">
		<div class="header-top">
			<div class="logo">
				<a href="index.html"><img src="web/images/logo.png" alt=""/></a>
			</div>
			<div class="telephone">
				<span><img src="web/images/watch.png" "style=margin-right=10px" alt=""/>BABY NAMES</span><span class="number">RANKING & GRAPH </span>
		    </div>
			<div class="clear"></div>
		</div>
	</div>
	<div class="menu">
		<div class="wrap">
			<div class="top-nav">
			      <ul class="nav">
		            <li class="active"><h3 style="font-weight: bold; color=red"><marquee> Baby Names | Ranking | Popularity | Graph </marquee></h3></li>
					
					<div class="clear"></div>
				 </ul>
				  
					<div class="clear"></div>
			</div>
	     </div>
	</div>
</div>

<br /><br />
<br /><br /><br /><br />
<div class="menu">
		<div class="wrap">
			<div class="top-nav">
			      <ul class="nav">
		            <li class="active"><a href="index.php">TOP NAMES OF THE YEAR</a></li>
					<li class="active"><a href="Nameranking.php"> Baby Name Popularity & Graph </a></li>
					<div class="clear"></div>
				 </ul>
				  
					<div class="clear"></div>
			</div>
	     </div>
	</div>
     
    <form align=center method="post">
<pre>


                                        Year:       <input type="text" pattern="[0-9]{4}" name="year" placeholder="1945-2013" required="" />

                                        Name:     <input type="text" name="name"  list="name" placeholder="Name"/>
      <datalist id="name"> </datalist>  
                                        Gender:   <select name="gender" ><option value="male"> Male </option><option value="female"> Female </option></select> 

                                                        <input type="submit" name="find" value="Show Popularity Graph & Popularity DATA"/>

</pre>
</form>


<fieldset  >
<legend></legend>


<?php
if(isset($_POST['find']))
{
    
    require 'config.php';
    $year= $_POST['year'];
    $gender= $_POST['gender'];
    $name=$_POST['name'];
    if($year==-1)
    {
        echo "<script> alert('ohhh!!! Please select Year') </script>";
    }
    else
    {
    //
    echo "<h3 style='text-align: right; color: brown;'> * Popularity of your name given by no of births </h3>";
    echo "<hr color=green />";
    echo "<hr color=green />";
    echo "<h2 style='text-align: center; color: brown;'>Your Name : $name &nbsp &nbsp &nbsp &nbsp Gender: $gender</h2><br />";
    echo '<h2 style="font-weight: bold; text-align: center; font-size: 30;"> GRAPH </h2><br />';
    $yeararr=array();
    $popularity=array();
    $rank=array();
     $i=0;
     
     //Array Created
     $temp=$year;
     for($year;$year<=2013;$year++)
    {
        $yeararr[$i]=$year;
        $table= $gender.'_'.$year;
    
    $qry="Select * from $table where Name='$name' ";
    $result=@mysql_query($qry) or die(mysql_error());
   
    if(mysql_num_rows($result)>0)
    {
        $row=mysql_fetch_array($result);
        $popularity[$i]=$row[1];
        $rank[$i]=$row[2];
    }
    else
    {        
        $rank[$i]=0;
        $popularity[$i]=0;
    }
    $i++;
    }
    //Graph Ploting
     session_start();
    $_SESSION['popularity']=$popularity;
    $_SESSION['year']=$yeararr;
    $_SESSION['name']=$name;


    echo "<img src='GRAPH.php' style='alignment-adjust: central; margin-left: 25%'/>";

     
     
    echo "<hr color=green /><br />";
    echo "<br /><br /><h3 style='text-align: right; color: red;'> * (=) means two or more name in the same rank. </h3>";
     echo '<h2 style="font-weight: bold; text-align: center; font-size: 30;"> POPULARITY DATA<br /></h2>';
    echo "<h3 style='font-weight: bold;' >&nbsp  Year &nbsp No. Of Birth &nbsp Rank</h3>";
    $year=$temp;
    for($year;$year<=2013;$year++)
    {
       // $yeararr[$i]=$year;
    $table= $gender.'_'.$year;
    //echo $table;
    
    $qry="Select * from $table where Name='$name' ";
    $result=@mysql_query($qry) or die(mysql_error());
    //echo "<h2 style='text-align: center; color: red;'> Top $topname $gender Name of Year $year</h2>";
    //echo "<br />"."Sr No."."&nbsp"."Name"."   "."Popularity"."   "."Rank";
    if(mysql_num_rows($result)>0)
    {
        $row=mysql_fetch_array($result);
       // $popularity[$i]=$row[1];
       // $rank[$i]=$row[2];
        echo "<br />&nbsp&nbsp".$year."&nbsp &nbsp &nbsp &nbsp".$row[1]."&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp".$row[2];
        
    }
    else
    {
        echo "<br /> &nbsp&nbsp".$year."&nbsp &nbsp &nbsp &nbsp".'0'."&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp".'0';
        //$rank[$i]=0;
        //$popularity[$i]=0;
    }
    $i++;
    }
    
    
    echo "<hr color=green /><br /><br />";
    
    
    
   // print_r($popularity);
    
    //echo "<br />".$row[0][1]." ".$row[0][1]." ";
}
}

?>
     <br /><br /><br /><br /><br /><br />


<br /><br /><br />







	<div class="footer">
			<div class="wrap">
			<div class="footer-grids">
				<div class="footer-grid">
					<h3>EXTRAS</h3>
					
				</div>
				<div class="footer-grid">
					<h3>RECENT POSTS</h3>
					
				</div>
				<div class="footer-grid">
					<h3>USEFUL INFO</h3>
					
				</div>
				<div class="footer-grid footer-lastgrid">
					<h3>CONTACT US</h3>
					<p></p>
					<div class="footer-grid-address">
						
						<p>Email:<a class="email-link" href="#"></a></p>
					</div>
				</div>
				<div class="clear"> </div>
			</div>
			<div class="copy-right">
			 <p>Design by <a href="#">ABC.inc</a></p>
		    </div>
		</div>
	</div>
</body>
</html>
