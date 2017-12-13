<?php
$mysqli = new mysqli("localhost", "root", "", "reservation_data" ) or
die("Could not connect to database");
$query_res = "SELECT * FROM reservation";
$data_res = $mysqli->query($query_res);
$query_pas = "SELECT * FROM passenger";
$data_pas = $mysqli->query($query_pas);
$res_array = [];
$pas_array = [];
while($row = $data_res->fetch_assoc())
	{
		$array = [];
		array_push($array, $row["id"]);
		array_push($array, $row["destination"]);
		array_push($array, $row["insurance"]);
	
		array_push($res_array, $array);
		
	}
while($r = $data_pas->fetch_assoc())
	{
		$array = [];
		array_push($array, $r["id"]);
		array_push($array, $r["firstname"]);
		array_push($array, $r["lastname"]);
		array_push($array, $r["age"]);
		array_push($array, $r["id_res"]);
		
		array_push($pas_array, $array);
	}
$result = [];

for($i = 0; $i < sizeof($res_array);$i++)
{
	$line = $res_array[$i][0]. " ".$res_array[$i][1]. " ". $res_array[$i][2]. " ";
	for($j = 0; $j < sizeof($pas_array); $j++)
	{
		if($pas_array[$j][4] == $res_array[$i][0])
		{
			$line = $line. $pas_array[$j][1]. " ". $pas_array[$j][2]. " ". $pas_array[$j][3]. " ";
		}
	}
	array_push($result, $line);
	
}

include'Views/home.php';



?>
