<?php
ini_set("mbstring.internal_encoding", "utf8");
$data = "https://sheets.googleapis.com/v4/spreadsheets/11BCnspCt2Mut3nhc4WMY6CYTd0zF9C3eCzsk1AEpKLM/values/sales!A1:E6?key=AIzaSyDwxpicDSa3GBcLJmgE1yxdtjYpIJFogcA";

$context = stream_context_create(array(
  'http' => array(
     'ignore_errors'=>true,
     'method'=>'GET'
     // for more options check http://www.php.net/manual/en/context.http.php
   )
));
$json = file_get_contents($data,false,$context);


$decode = json_decode($json,true);

foreach($decode["values"] as $deco){
	$count = count($deco);
	if(empty($count)){
		break;
	}
	for($i=0;$i<$count;$i++){
	
		echo "\"".$deco[$i]."\",";
	}
	echo "\n";
}
?>
