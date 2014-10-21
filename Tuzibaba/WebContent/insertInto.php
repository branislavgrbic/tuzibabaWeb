<?php
	
		$con = $con = mysql_connect("178.148.111.25","root","");
		if (!$con)
		{
			die('Could not connect: ' . mysql_error());
		}
		mysql_select_db("testdb",$con);
		
		$name = $_REQUEST['name'];
		$surname = $_REQUEST['surname'];
		$latitude = $_REQUEST['latitude'];
		$longitude = $_REQUEST['longitude'];
		mysql_query("INSERT INTO names (first,last,latitude,longitude)
		VALUES ('$name','$surname','$latitude','$longitude')",$con );
		$id = mysql_insert_id();
		//printf ("New Record has id %d.\n", $id);
		echo ($id);
		mysql_close($con);
	
?>