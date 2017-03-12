<div id="header">
    <div class="top">
        <div class="container">
            <a href="/" class="left">
                <img id="logo" src="/images/logo.png" />
            </a>
            
            <div class="scope left">
                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <span>Hà Nội</span>
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a href="#">TP. Hồ Chí Minh</a></li>
                        <li><a href="#">Đà Nẵng</a></li>
                        <li><a href="#">Khánh Hòa</a></li>
                        <li><a href="#">Vũng Tàu</a></li>
                        <li><a href="#">Hải phòng</a></li>
                    </ul>
                </div>
            </div>
            <div class="form-search">
                <form method="get" id="search" action="http://w3lessons.info/">
                    <input type="text" class="search" placeholder="Tìm kiếm" name="s"/>
                      <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </form>
            </div>
            
            <div class="login dropdown right">
                <a href="#" title="Đăng nhập" data-toggle="modal" data-target="#modal-login"><i class="fa fa-user"></i> Đăng nhập</a>
            </div>

            
        </div>
    </div>
    <!-- Modal login -->
    <div class="modal fade" id="modal-login" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    
                    <div id="alert-login" class="alert alert-danger fade in hide">
                        <a href="#" class="close" title="close">×</a>
                        <strong>Lỗi!</strong> <span class="message"></span>
                    </div>
                    <div class="group-dangnhap">
                        <form method="POST" role="form" class="">
                            <div class="form-group">
                               <div class="">
                                    <div class="input-group">
                                        <span class="input-group-addon icon_group" style="color: #acb5b3;"><i class="fa fa-envelope-o"></i></span>
                                        <input type="text" class="form-control" id="user_email" name="phone" placeholder="Email">
                                    </div>
                               </div>
                            </div>
                            <div class="form-group">
                               <div class="">
                                    <div class="input-group">
                                        <span class="input-group-addon icon_group"><i class="fa fa-key"></i></span>
                                        <input type="password" class="form-control" id="user_pass" name="password" placeholder="Mật khẩu">
                                    </div>
                               </div>
                            </div>
                            <div class="form-group">
                               <span class="btn-login">ĐĂNG NHẬP</span>
                            </div>
                            <div class="form-group text-right">
                                <a class="btn-link" href="/dang-ky.html">Đăng ký</a>
                            </div>
                        </form>
                    </div>
                    <div class="group-dangnhap">
                        <p>Đăng nhập bằng</p>
                        
                        <div class="social-login" onclick="loginUsingFacebook()">
                            <img class="icon" src="/images/icon-fb.jpg" />
                            <span>Sign in</span>
                        </div>
                        <div class="social-login">
                            <div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark" data-width="226" data-height="46"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        
        
    })
</script>