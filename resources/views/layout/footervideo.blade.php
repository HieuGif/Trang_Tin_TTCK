@php use App\TheLoai;
$theloai = TheLoai::all() @endphp
<footer class="footer-area section-padding-100">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <!-- Footer Content -->
                <div class="col-12 col-lg-4">
                    <div class="footer-content">
                        <!-- Logo -->
                        <a href="index.html" class="foo-logo"><img src="public/theme/images/icons/logo-02.png" alt=""></a>
                        <p>Địa chỉ: 18 Ung Văn Khiêm, Phường Đông Xuyên, Thành phố Long Xuyên, An Giang
                            <br>
                        Email: tothenow999@gmail.com</p>
                        <div class="footer-social-info d-flex">
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                        
                        </div>
                    </div>
                </div>
                <!-- Footer Content -->
                <div class="col-12 col-lg-7 col-xl-6">
                    <div class="footer-content d-flex flex-wrap">
                        <!-- Footer Nav -->
                       
                        <!-- Footer Nav -->
                        

                        <!-- Video Catagory -->
                        <div class="video-catagory">
                            <h5 class="widget-title">Thể loại</h5>
                            <ul>
                            @foreach($theloai as $tl)
                            @if(count($tl->video) > 3 )
                                <li><a href="theloaivideo/{{$tl->id}}/{{$tl->TenKhongDau}}.html"><span> {{$tl->Ten}}</span></a></li>
                                @endif @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            </div>
        </div>
    </footer>
    