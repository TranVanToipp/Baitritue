
<?php
	ob_start();
	// session_start();
    $title = 'chi tiết sản phẩm';
	$baseUrl = '../';
	include_once ($baseUrl.'FE/Layout/header.php');
    $fullname = "";
    $id_user = "";
    if(isset($_SESSION['fullname']) && isset($_SESSION['id'])){
        $fullname = $_SESSION['fullname'];
        $id_user = $_SESSION['id'];
    }
?>

<link rel="stylesheet" href="/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/FE/Layout/css/chitiet.css">

<div class="grid wide">
    <div class="chitiet-chitiet ">
		<div class="form-active-chitiet ">
			<?php
				if(isset($_GET['id'])){
					$id = $_GET['id'];
					$url = 'http://localhost/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/product/read_single.php?id='.$id;
					$json = file_get_contents($url);
					$data = json_decode($json);
					if(isset($data->message)){
						header('Location:../../../../WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/');
						die();
					}
					foreach($data->data as $item){
						
						// $_SESSION['product_id'] = $item->id;
						// $_SESSION['title'] = $item->title;
						// $_SESSION['thumnail'] = $item->thumnail;
						// $_SESSION['price'] = $item->price;
						echo '<div class="header-chitiet-content">
									<h3>
										'.$item->title.'
									</h3>
									
								</div> 
								<div class="chitiet-container l-12 m-12 c-12">
									<div class="chitiet-container-img-content l-4">
										<div class="chitiet-container-img">
											<div class="chitiet-container-above">
												<img src="../assets/photos/'.$item->thumnail.'" alt="Điện thoại hình ảnh ở trên" class="chitiet-container-above-img">
											</div>
											<div class="chitiet-icon-nav">
												<div class="chitiet-icon-nav-left">
													<i class="fa-solid fa-angle-left fa-angle-left-color"></i>
												</div>
												<div class="chitiet-icon-nav-right">
													<i class="fa-solid fa-angle-right"></i>
												</div>
											</div>
											<ul class="chitiet-container-below">';
					}
								foreach($data->data as $item){
									foreach($item->img as $img){
										echo '
											<li class="chitiet-container-below-img">
												<a href="#" class="chitiet-container-link">
													<div class="chitiet-container-hinhnho">
														<img src="../assets/photos/'.$img->img_desct.'" alt="Điện thoại hình ảnh ở dưới" class="chitiet-container-below-img-con">
													</div>
													<span class = "chitiet-container-tenhinh">Đỏ</span>
												</a>
											</li>';
									}
								}
						foreach($data->data as $item){
								echo '
									</ul>
								</div>
							</div>
						<div class="chitiet-container-embrace l-5">
										<div class="chitiet-container-price">
											<h3>Giá: </h3><h4>'.$item->price.'</h4><sup>đ</sup>
											<h3>Giá: </h3><h4>'.$item->discount.'</h4><sup>đ</sup>
										</div>
										<div class="chitiet-container-nhandat">
											<span>Nhận đặt trước</span>
										</div>
							
										<ul class="chitiet-container-list">
											<li class="chitiet-container-type-item">
												<img src="/WebDiiThongMinh-PTPMCN/assets/img/iphone22.jpg" alt="" class="chitiet-container-type-item-img">
												<div class="chitiet-container-type-item-blow">
													<span class="chitiet-container-type-item-tyle">Đen</span>
													<span class="chitiet-container-type-item-price">
														40.990.000
													<sup>đ</sup>
												</span>
												</div>
											</li>
											<li class="chitiet-container-type-item">
												<img src="PTPMCN/ass alt="" class="chitiet-container-type-item-img">
												<div class="chitiet-container-type-item-blow">
													<span class="chitiet-container-type-item-tyle">Đen</span>
													<span class="chitiet-container-type-item-price">
														40.990.000
													<sup>đ</sup>
												</span>
												</div>
											</li>
											<li class="chitiet-container-type-item">
												<img src="/WeThongMins/img/iphone22.jpg" alt="" class="chitiet-container-type-item-img">
												<div class="chitiet-container-type-item-blow">
													<span class="chitiet-container-type-item-tyle">Đen</span>
													<span class="chitiet-container-type-item-price">
														40.990.000
													<sup>đ</sup>
												</span>
												</div>
												</li>
											</ul>
											<div class="chitiet-container-chitiet-khuyenmai">
												<h4>Khuyến Mãi</h4>
												
												<ul class="chitiet-container-chitiet-khuyenmai-list">';
												foreach($data->data as $item){
													foreach($item->discount_text as $dis){
														echo '
														<li class="chitiet-container-chitiet-khuyenmai-item">
															'.$dis->discount_text.'
														</li>
														';
													}
												}
												foreach($data->data as $item){
													echo '
													</ul>
													</div>
													<form action="#" method ="post">
														<input type="hidden" name="Hinhanh" value="../assets/photos/'.$item->thumnail.'" >
														<input type="hidden" name="Giasp" value="'.$item->price.'">
														<input type="hidden" name="Giamsale" value="'.$item->discount.'">
														<input type="hidden" name="Tensp" value="'.$item->title.'">
														<input type="hidden" name="idSanPham" value="'.$item->id.'">
														<input class="chitiet-container-type-btn" type="submit" name="add_cart" value="Thêm vào giỏ hàng">
													</form>
													<div class="chitiet-buton-thanhtoan">
														<button class="chitiet-container-type-btn-tragop-phantram">
														<h4>Mua trả góp 0%</h4>
														<span>Duyệt hồ sơ trong 5 phút </span>
														</button>
		
														<button class="chitiet-container-type-btn-tragop-the" >
														<h4> Trả góp qua thẻ</h4>
														<span>Visa, Mastercart, JCB, Amex</span>
														</button>
													</div>
													<div class="chitiet-container-copy">
														<button class= "chitiet-container-copy-link">
															<span class="chitiet-container-boder">
																<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-link-45deg" viewBox="0 0 16 16">
																	<path d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.002 1.002 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z" />
																	<path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243L6.586 4.672z" />
																</svg>
															</span>
															<span>Sao chép đường dẫn</span>
														</button>
														<button class= "chitiet-container-copy-thongtin">
															<span class="chitiet-container-boder">
																<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-clipboard2" viewBox="0 0 16 16">
																	<path d="M3.5 2a.5.5 0 0 0-.5.5v12a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5v-12a.5.5 0 0 0-.5-.5H12a.5.5 0 0 1 0-1h.5A1.5 1.5 0 0 1 14 2.5v12a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 14.5v-12A1.5 1.5 0 0 1 3.5 1H4a.5.5 0 0 1 0 1h-.5Z" />
																	<path d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5Z" />
																</svg>
															</span>
															<span>Sao chép thông tin</span>
														</button>
													</div>
												</div>
												<div class="tinhtrang-content l-3">
													<div class = "header__nav-type">
														<img src="../assets/img/thongso.svg" alt="" class="header__nav-tab-img">
														<div class="header__nav-tab-vac">
															<span>Thông số kĩ thuật</span>
														</div>
													</div>
													<table class = "tinhtrang-table__cauhinh">
														<tbody>';
														foreach($data->data as $item){
															foreach($item->conf as $conf){
																echo '
																<tr class = "tr-1" > 
																	<td class = "title_charactestic">Độ phân giải</td>
																	<td class = "content_charactestic">1290 x 2796 pixels</td>
																</tr>
																<tr class = "tr-0">
																	<td class = "title_charactestic">Màn hình rộng</td>
																	<td class = "content_charactestic">'.$conf->screen.'</td>
																</tr>
																<tr class = "tr-1"> 
																	<td class = "title_charactestic">Độ phân giải camera sau</td>
																	<td class = "content_charactestic">'.$conf->rear_camera.'</td>
																</tr>
																<tr class = "tr-0">
																	<td class = "title_charactestic">Độ phân giải camera trước</td>
																	<td class = "content_charactestic">'.$conf->front_camera.'</td>
																</tr>
																<tr class = "tr-1"> 
																	<td class = "title_charactestic">Bộ nhớ trong</td>
																	<td class = "content_charactestic">'.$conf->ram.'</td>
																</tr>
																<tr class = "tr-0">
																	<td class = "title_charactestic">Dung lượng pin</td>
																	<td class = "content_charactestic">'.$conf->pin.'</td>
																</tr>
																<tr class = "tr-0">
																	<td class = "title_charactestic">Sim</td>
																	<td class = "content_charactestic">'.$conf->sim.'</td>
																</tr>
																';
																
															}
														}
															
														foreach($data->data as $item){
															echo '
															</tbody>
															</table>
															<div class= "tinhtrang-button__chitiet">
																<a href="" class="tinhtrang-button__chitiet-link">
																	Xem cấu hình chi tiết
																</a>
															</div>
															</div>
														</div>
													</div>
												</div>';
															
														}	
														
													}
																			
												}		
											}
										?>
									</div>
									
								</div>
							</div>

<!-- Model chi tiết sản phẩm -->
<div class="modal-chitiet">
	<div class="model-container__chitiet">
		<div class="model-heading">
			<span class="model-heading__text">
				THÔNG SỐ KỸ THUẬT CHI TIẾT IPHONE 14 PRO MAX 128GB CHÍNH HÃNG VN/A 
			</span>
			<button class="close-model-chitiet">×</button>
		</div>
		<div class="model-container__content">
			<table class="model-content-detail">
				<tbody>
					<tr>
						<td class="group_field">Kiểu màn hình</td>
					</tr>
					<tr >
						<td class="model-content-detail__title">Công nghệ màn hình</td>
						<td class="model-content-detail__charactestic">Super Retina XDR OLED </td>
					</tr>
					<tr >
						<td class="model-content-detail__title">Công nghệ màn hình</td>
						<td class="model-content-detail__charactestic">Super Retina XDR OLED </td>
					</tr>
					<tr >
						<td class="model-content-detail__title">Công nghệ màn hình</td>
						<td class="model-content-detail__charactestic">Super Retina XDR OLED </td>
					</tr>
					<tr>
						<td class="group_field">Kiểu màn hình</td>
					</tr>
					<tr >
						<td class="model-content-detail__title">Công nghệ màn hình</td>
						<td class="model-content-detail__charactestic">Super Retina XDR OLED </td>
					</tr>

					<tr >
						<td class="model-content-detail__title">Công nghệ màn hình</td>
						<td class="model-content-detail__charactestic">Super Retina XDR OLED </td>
					</tr>
					<tr >
						<td class="model-content-detail__title">Công nghệ màn hình</td>
						<td class="model-content-detail__charactestic">Super Retina XDR OLED </td>
					</tr>
					
				</tbody>
			</table>
		</div>
	</div>
</div>
<script src = "../Javascript/index.js"></script>
<?php
if(!isset($_SESSION['cart']))$_SESSION['cart'] = array();
if(isset($_POST['add_cart']) && $_POST['add_cart']) {
	$hinh = $_POST['Hinhanh'];
	$tensp = $_POST['Tensp'];
	$gia = $_POST['Giasp'];
	$sale = $_POST['Giamsale'];
	$idSP = $_POST['idSanPham'];
	
	// $_num = 1;
	$sanpham = array($hinh, $tensp, $gia, $sale, $idSP);
	array_push($_SESSION['cart'], $sanpham);
	header('location: ../cart/index.php');
	}
?>







