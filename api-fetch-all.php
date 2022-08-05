<?php 

header('Content-Type: application/json');
header('Access-Control-Allow-Origin:');


include 'config.php';

$obj= new Database();
//echo "test";


$obj->sql('SELECT * FROM `students` ');
$result = $obj->get_results();
if($result)
{
	echo json_encode($result);
}else{
	echo json_encode(array('message' => 'No Records Found..','status' => false));
}
?>