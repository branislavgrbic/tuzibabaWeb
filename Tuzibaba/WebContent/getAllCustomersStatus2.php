<?php
		header("Access-Control-Allow-Origin: *");
		$con = $con = mysql_connect("http://178.148.111.25:8080/","root","");
		if (!$con)
		{
			die('Could not connect: ' . mysql_error());
		}
		mysql_select_db("testdb",$con);
		
		$result = mysql_query("SELECT first,last,ID,imageName,status,longitude,latitude,date FROM names WHERE status='2'");
		
		while ($row = mysql_fetch_assoc($result))
		{
			$output[] = $row;
		}
		
		
		print(json_encode($output));
		mysql_close($con);
	
?>