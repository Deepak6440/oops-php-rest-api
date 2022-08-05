<?php 
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: ");
header("Access-Control-Allow-Methods: POST");

$data = json_decode(file_get_contents("php://input"),true);
$s_name = $data['sname'];

include 'config.php';

$obj = new Database();
$obj->sql("SELECT * FROM students WHERE student_name LIKE '%{$s_name}%' ");

$result = $obj->get_results();
if($result)
{
	echo json_encode($result);
}else{
	echo json_encode(array("message" => "No Records Found","status" => false));
}
?>