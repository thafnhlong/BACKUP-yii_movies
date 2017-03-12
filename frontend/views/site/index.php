<div class="banner">
    <div class="container">
        <div class="top-slide">
            <div id="ninja-slider">
                <div class="slider-inner">
                    <ul>
                        <li><a class="ns-img" href="/images/1.jpg"></a></li>
                        <li><a class="ns-img" href="/images/2.jpg"></a></li>
                        <li><a class="ns-img" href="/images/3.jpg"></a></li>
                        <li><a class="ns-img" href="/images/4.jpg"></a></li>
                        <li><a class="ns-img" href="/images/5.jpg"></a></li>
                        <li><a class="ns-img" href="/images/6.jpg"></a></li>
                        <li><a class="ns-img" href="/images/7.jpg"></a></li>
                        <li><a class="ns-img" href="/images/8.jpg"></a></li>
                        <li><a class="ns-img" href="/images/9.jpg"></a></li>
                        <li><a class="ns-img" href="/images/10.jpg"></a></li>
                        <li><a class="ns-img" href="/images/11.jpg"></a></li>
                        <li><a class="ns-img" href="/images/12.jpg"></a></li>
                    </ul>
                    <div class="fs-icon" title="Expand/Close"></div>
                </div>
            </div>
            <div id="thumbnail-slider">
                <div class="inner">
                    <ul>
                        <li>
                            <a class="thumb" href="/images/1.jpg"></a>
                        </li>
                        <li>
                            <a class="thumb" href="/images/2.jpg"></a>
                        </li>
                        <li>
                            <a class="thumb" href="/images/3.jpg"></a>
                        </li>
                        <li>
                            <a class="thumb" href="/images/4.jpg"></a>
                        </li>
                        <li>
                            <a class="thumb" href="/images/5.jpg"></a>
                        </li>
                        <li>
                            <a class="thumb" href="/images/6.jpg"></a>
                        </li>
                        <li>
                            <a class="thumb" href="/images/7.jpg"></a>
                        </li>
                        <li>
                            <a class="thumb" href="/images/8.jpg"></a>
                        </li>
                        <li>
                            <a class="thumb" href="/images/9.jpg"></a>
                        </li>
                        <li>
                            <a class="thumb" href="/images/10.jpg"></a>
                        </li>
                        <li>
                            <a class="thumb" href="/images/11.jpg"></a>
                        </li>
                        <li>
                            <a class="thumb" href="/images/12.jpg"></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div style="clear:both;"></div>
        </div>
    </div>
</div> <!-- End banner -->
<div class="container">
    <div id="sidebar">
        <div class="categories">
            <div class="heading"><span>Danh mục</span></div>
            <ul>
                <?php $list = [
                    'Dụng cụ/Thiết bị','Dược phẩm','Điện thoại/Máy tính bảng','Đồ dùng gia đình','Đồ điện tử','Đồ em bé/Đồ trẻ em','Máy ảnh/Ảnh','May mặc','Máy tính','Nhà bếp/Nấu ăn','Nội, ngoại thất','Ô tô', 'Sản phẩm/Dịch vụ','Sức khỏe/Làm đẹp','Trang sức/Đồng hồ','Văn phòng phẩm','Vật liệu xây dựng'
                ];?>
                <?php $i= 0;
                foreach($list as $value){
                    $i++;
                    ?>
                <li>
                    <a class="<?php echo ($i == 1) ? 'active' : ''?>" href="#"><?php echo $value?></a>
                </li>
                <?php }?>
            </ul>
        </div>
    </div> <!-- End #sidebar-->
    
    <div id="main-content">
        <div class="list-content">
            <ul>
            <?php for($j = 1; $j < 3; $j++){?>
                <?php for($i = 1; $i <= 6; $i++){?>
                    <li>
                        <div class="wrapper">
                            <div class="image">
                                <a href="#"><img alt="" src="/images/img<?php echo $i?>.jpg" /></a>
                            </div>
                            <div class="text">
                                <a class="title" href="#">Rauta House Cafe - Nguyễn Chí Thanh</a>
                                <p class="address">1 Ngõ 97 Nguyễn Chí Thanh, Quận Đống Đa, Hà Nội</p>
                            </div>
                        </div>
                    </li>
                <?php }?>
            <?php }?>
            </ul>
        </div>
    </div><!-- End #main-content-->
</div>