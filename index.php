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
		            <li class="active"><h1 style="font-weight: bold;"><marquee> Baby Names | Ranking | Popularity | Graph </marquee></h1></li>
					
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
     
     <form method="post" align=center>
 <pre>    
                        Year:   <input type="text" pattern="[0-9]{4}" name="year" placeholder="1945-2013" required="" />

                        Gender:   <select name="gender" ><option value="male"> Male </option><option value="female"> Female </option></select> 
  
                        Top Names: <input type="" required="" name="topname" placeholder="Enter Number"/>

                        <input type="submit" name="find"  value="Show Top Names Of the Year"/>
</pre>
</form>

 <hr color=red />
</table>

<?php
if(isset($_POST['find']))
{
    require 'config.php';
    $year= $_POST['year'];
    $gender= $_POST['gender'];
    $topname=$_POST['topname'];
    $table= $gender.'_'.$year;
    //echo $table;
    $qry="Select * from $table limit $topname ";
    $result=@mysql_query($qry) or die(mysql_error());
    echo "<h2 style='text-align: center; color: red; font-size: 25;'> Top $topname $gender Name of Year $year</h2>";
    echo "<hr color=red />";
    
    //echo "<br />"."Sr No."."&nbsp &nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp"."Name"."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp"."Popularity"."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp"."Rank";
    echo "<table align=center><tr><th>Sr No.</th><th>NAME </th><th>&nbsp&nbspNo.Of Births </th><th>&nbsp&nbsp </th></tr>";
    for($i=0;$i<$topname;$i++)
    {
        mysql_data_seek($result,$i);
        $row=mysql_fetch_array($result);
        $srno=$i+1;
        //echo "<br />".$srno."  &nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$row[0]." &nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  ".$row[1]." &nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp   ".$row[2];
        echo "<tr><td>&nbsp$srno</td><td> &nbsp&nbsp&nbsp $row[0]</td><td>&nbsp &nbsp $row[1]</td><td>&nbsp &nbsp</td></tr>";
    }
    //echo "<br />".$row[0][1]." ".$row[0][1]." ";
    echo "</table> <hr color=red />";
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
					<h3>About</h3>
					<p></p>
					<div class="footer-grid-address">
						
					</div>
				</div>
				<div class="clear"> </div>
			</div>
			<div class="copy-right">
			 <p>Design by <a href="http://abc.com/">Kartik</a></p>
		    </div>
		</div>
	</div>
</body>
</html>
