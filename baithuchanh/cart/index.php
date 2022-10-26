<?php
    ob_start();
?>
<?php
    $title = 'Giỏ hàng';
    $baseUrl = '../';
    include_once ($baseUrl.'FE/Layout/header.php');
?>
<link rel="stylesheet" href="/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/FE/Layout/css/cart.css">

<div class="grid wide ">
    <div class="cart-box__content l-8">
        <div class="cart-heading__text">
            <a href="../" class="cart-heading__text-link">
            <i class="fa-solid fa-angle-left fa-angle-left-color"></i>
                Mua thêm sản phẩm khác
            </a>
            <span>Giỏ hàng của bạn</span>
        </div>
        <div class="cart-container">
            <ul class="cart-container__list">
            <?php
                //if (count($_SESSION['cart'])>0){
                    if (isset($_SESSION['cart'])) {
                        // $tong = 0;
                        $i = 0;
                        foreach ($_SESSION['cart'] as $sanpham) {
                            // $ttien = $sanpham[]
                            echo '
                                <li class="cart-container__item">
                                <div class="cart-container__item-check">
                                    <input type="checkbox" name="" id="" class = "cart-container__item">
                                </div>
                                <div class="cart-container__item-box ">
                                    <a href="" class="cart-container__box-img-link">
                                        <img src="../assets/photos/'.$sanpham[0].'" alt="Đây là sản phẩm">
                                    </a>
                                    <div class="cart-container__item-xoa">
                                    <i class="fa-solid fa-angle-left fa-angle-left-color"></i>
                                    <a href="./deleteCart.php?id='.($i+1).'" class="">
                                        <span>Xóa</span>
                                    </a>
                                    </div>
                                </div>
                                <div class="cart-container__item-content ">
                                    <div class="cart-container__item-title">
                                        '.$sanpham[1].'
                                    </div>
                                    <div class="cart-container__item-salecontent">
                                        <div class="cart-container__item-sale">
                                            Mua online thêm quà:
                                        </div>
                                        <div class="cart-container__item-salechon">
                                            Chọn 1 trong 2 khuyến mãi:
                                        </div>
                                    </div>
                                    <span class= "cart-container__textmausp" >Màu: xanh</span>
                                </div>
                                <div class="cart-container__item-price-content ">
                                    <div class="cart-container__item-price-tren">
                                        <div class="cart-container__item-price">
                                            '.$sanpham[3].'
                                        </div>
                                        <div class="cart-container__item-oulprice">
                                        '.$sanpham[2].'
                                        </div>
                                    </div>
                                    <div class="cart-container__item-update-SP">
                                        <input type="button" class= "tru" value= "-" name="truSL" id="">
                                        <input class= "value-quantity" value = "1" name="" id="">
                                        <input type="button" class = "cong" value = "+" name="congSL" id="">
                                    </div>
                                </div>
                            </li>
                            ';
                            $i++;
                        }
                    }
                    else {
                        echo '<div class="container_giohang_isemty">
                            <img src="../assets/img/cart/giohangis_emty.png" alt="Hình giỏ hàng trống" class="giohang_rong">
                        </div>';
                    }
                
                ?>
            </ul>
            <form action="" class="formPayment" method="post">
                <h3 class="h3_title_from--giohang">
                    Thông tin mua hàng
                </h3>
                <div class="check-box__gioitinh">
                    <label for="" class="gender1">
                        <input type="radio" name="gender" id="gender1">
                        <span>Anh</span>
                    </label>
                    <label for="" class="gender0">
                        <input type="radio" name="gender" id="gender0">
                        <span>Chị</span>
                    </label>
                </div>
                <div class="form-input__muahang">
                    <div class="form-input__hoten">
                        <input type="text" name="name" id="name" placeholder="Họ tên">
                        <br>
                    </div>
                    <div class="form-input__sdt">
                        <input type="text" name="telephone" id="telephone" placeholder="Số điện thoại">
                        <br>
                    </div>
                </div>

                <div class="giohang_cachthuc--mua">
                    <h3 class="h3-title-cachthuc">Chọn cách thức mua hàng</h3>
                    <div class="typeReceive">
                        <label class = "typeReceive-giaohangtannoi" for="" title="Giao hàng tận nơi">
                            <input type="radio" name="receive" id="receive0">
                            <span>Giao hàng tận nơi</span>
                        </label>
                        <label class = "typeReceive-giaohangtannoi" for="receive1">
                            <input type="radio" name="receive" id="receive1" value="2">
                            <span>Nhận tại cữa hàng</span>
                        </label>
                    </div>

                </div>
                <div class="tabReceive">
                    <div class="mainTab">
                        <p class="tab-title">
                            Chọn địa chỉ để biết thời gian và phí vận chuyển (nếu có) 
                        </p>
                        <div class="row-giohang__tab">
                            <div class="l-6 select_giohang-group">
                                <select name="city" class="select_giohang-tinh" id="city">
                                    <option value="" class="option-giohang__tinh1">
                                    Tỉnh / Thành phố    
                                    </option>
                                    <option value="" class="option-giohang__tinh2">
                                        An Giang 
                                    </option>
                                </select>
                            </div>
                            <div class="l-6 select_giohang-group">
                                <select class="select_giohang-quan" name="" id="">
                                    <option value="" class="option_giohang-quan">
                                        Quận/ Huyện
                                    </option>
                                    <option value="" class="option_giohang-quan">
                                        Bình Định
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="row-giohang__tab-Phuong">
                            <div class="l-6 select_giohang-group">
                                <select name="" id="" class="select-giohang__phuong">
                                    <option value="" class="option-giohang__phuong">
                                        Phường/ Xã
                                    </option>
                                    <option value="" class="option-giohang__phuong">
                                        Bình Định
                                    </option>
                                </select>
                            </div>
                            <div class="l-6 select_giohang-group">
                                    <input value="" class="option-giohang__sonha" placeholder = "Số nhà tên đường">
                                    </input>
                                    <!-- Chỗ này nhập -->
                               
                            </div>
                        </div>
                    </div>
                </div>

            </form>
            <div class="dathang-content">
            <div class="header_dathang">
                <span class="heading-text">Tổng tiền:</span>
                <span class="heading-text__gia">13.180.000₫</span>
            </div>
            <div class="container_dieukien">
                <span class="text-dieukien">Cần thanh toán trước 849.000₫ trong 24h sau khi đặt hàng để giữ hàng</span>
            </div>
            <div class="button-container__dathang">
                <a href="" class="button-container__dathang-link">Đặt hàng</a>
            </div>
            <div class="footer-dathang">
                <span>Bạn có thể chọn hình thức thanh toán sau khi đặt hàng</span>
            </div>
        </div>
        </div>
    </div>
</div>
  
    </div>
</div>
<script src="../Javascript/tinhTP.js"></script>
<script>
    // Xử lí tăng, giảm số lượng
    const $ = document.querySelector.bind(document);
    const $$ = document.querySelectorAll.bind(document);
    for(let  i = 0; i < $$('.cong').length; i++){
        let a1 = $$('.value-quantity')[i].value;
        console.log(a1);
        a1 = parseInt(a1);
        $$('.cong')[i].onclick = () => {
            a1++;
            $$('.value-quantity')[i].value = a1;
        }
        $$('.tru')[i].onclick = () => {
            if(a1 < 2) {
                return;
            }else {
                a1--;
                $$('.value-quantity')[i].value = a1;
            }
        }
    }
  
</scrip>



