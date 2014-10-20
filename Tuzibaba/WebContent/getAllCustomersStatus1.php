<?php
		header("Access-Control-Allow-Origin: *");
		$con = $con = mysql_connect("localhost","root","");
		if (!$con)
		{
			die('Could not connect: ' . mysql_error());
		}
		mysql_select_db("testdb",$con);
		
		$result = mysql_query("SELECT first,last,ID,imageName,status,longitude,latitude,date FROM names WHERE status='1'");
		
		while ($row = mysql_fetch_assoc($result))
		{
			$output[] = $row;
		}
		
		
		print(json_encode($output));
		mysql_close($con);
	
?>