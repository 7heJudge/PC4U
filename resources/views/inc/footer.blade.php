<!-- FOOTER -->
<footer id="footer">
    <!-- top footer -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-4 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Услуги</h3>
                        <ul class="footer-links">
                            <li><a href="#">Мой аккаунт</a></li>
                            <li><a href="#">Корзина</a></li>
                            <li><a href="#">Мои заказы</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-4 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Категории</h3>
                        <ul class="footer-links">
                            @foreach($categories as $category)
                            <li><a href="{{ route('categories', $category['id']) }}">{{ $category['title'] }}</a></li>
{{--                            <li><a href="#">Laptops</a></li>--}}
{{--                            <li><a href="#">Smartphones</a></li>--}}
{{--                            <li><a href="#">Cameras</a></li>--}}
{{--                            <li><a href="#">Accessories</a></li>--}}
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="clearfix visible-xs"></div>

                <div class="col-md-4 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Про нас</h3>
                        <ul class="footer-links">
                            <li style="color:#b9babc"><i class="fa fa-phone"></i> +380 (68) 463 31 48</li>
                            <li style="color:#b9babc"><i class="fa fa-envelope-o"></i> pc4u_sender@yan.insave.ovh</li>
                            <li style="color:#b9babc"><i class="fa fa-map-marker"></i> Украина, Днепр</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /top footer -->

    <!-- bottom footer -->
    <div id="bottom-footer" class="section">
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12 text-center">
                    <ul class="footer-payments">
                        <li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
                        <li><a href="#"><i class="fa fa-credit-card"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
                    </ul>
                    <span class="copyright">
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> Все права защищены
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</span>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /bottom footer -->
</footer>
<!-- /FOOTER -->
