<?php 

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT");

include 'config.php';

	$data = json_decode(file_get_contents("php://input"),true);
	$id = $data['id'];
	$name = $data['name'];
	$age = $data['age'];
	$city = $data['city'];
	
$obj= new Database();
//echo "test";

 //$db->update('category',array('category_name'=>$cat_name),"category_id = '{$_GET['cid']}'");
$obj->update('students',['student_name'=>$name,'age'=>$age,'city'=>$city],"id = '$id'");
$result = $obj->get_results();
if($result)
{
	echo json_encode(array('message' => 'Students Records Updated..','status' => true));
}else{
	echo json_encode(array('message' => 'No Records Updated..','status' => false));
}
?>