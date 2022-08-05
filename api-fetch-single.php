<?php 
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: ");

$data = json_decode(file_get_contents("php://input"),true);
$student_id = $data['sid'];

include 'config.php';

$obj = new Database();
$obj->sql("SELECT * FROM students WHERE id = {$student_id} ");

$result = $obj->get_results();
if($result)
{
	echo json_encode($result);
}else{
	echo json_encode(array("message" => "No Records Found","status" => false));
}
?>