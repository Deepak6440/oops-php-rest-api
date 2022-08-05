<?php 

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");

include 'config.php';

	$data = json_decode(file_get_contents("php://input"),true);
	$name = $data['name'];
	$age = $data['age'];
	$city = $data['city'];
	
$obj= new Database();
//echo "test";


$obj->insert('students',['student_name'=>$name,'age'=>$age,'city'=>$city]);
$result = $obj->get_results();
if($result)
{
	echo json_encode(array('message' => 'Students Records Inserted..','status' => true));
}else{
	echo json_encode(array('message' => 'No Records Inserted..','status' => false));
}
?>