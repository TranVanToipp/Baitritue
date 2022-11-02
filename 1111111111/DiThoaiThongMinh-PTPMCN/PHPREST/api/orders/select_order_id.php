<?php

//headers
header('Access-Control-Allow-Origin:*');//cho phép yêu cầu HTTP
header('Content-Type: application/json; charset=utf8');


include_once('../../core/initialize.php');

//khởi tạo product
$orders = new orders($db);
//product query
$result = $orders->select_orders_id();

//lấy số hàng
$num = $result->rowCount();
if($num >0){
	$orders_arr = array();
	$orders_arr['data'] = array();
	//tìm nạp hàng tiếp theo dưới dạng một mảng được lập chỉ mục theo tên cột
	while($row = $result->fetch(PDO::FETCH_ASSOC)){
		extract($row);
		$orders_item = array(
			'maHD' 	=>$maHD
			
		);
		array_push($orders_arr['data'],$orders_item);
	}
	//chuyển đổi sang dạng JSON
	$json = json_encode($orders_arr,JSON_UNESCAPED_UNICODE);
	echo $json;
}else{
	echo json_encode(array('message' => 'No product found.'));
}
?>