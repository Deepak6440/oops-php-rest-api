<?php 
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: DELETE");

$data = json_decode(file_get_contents("php://input"),true);
$student_id = $data['sid'];

include 'config.php';

$obj = new Database();
$obj->delete('students', "id = '$student_id'");

$result = $obj->get_results();
if($result)
{
	echo json_encode(array("message" => "Records Deleted Successfully..","status" =>true));
}else{
	echo json_encode(array("message" => "Records Not Deleted Successfully","status" => false));
}
?>