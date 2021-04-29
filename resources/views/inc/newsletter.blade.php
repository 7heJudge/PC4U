<!-- NEWSLETTER -->
<div id="newsletter" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="newsletter">
                    <p>Подпишитесь на рассылку <strong>НОВОСТЕЙ</strong></p>
                    <form action="{{ route('email.store') }}" method="post">
                        @csrf
                        <input class="input" type="email" name="email" placeholder="Укажите Вашу почту">
                        <button class="newsletter-btn"><i class="fa fa-envelope"></i> Подписаться</button>
                    </form>
                    <ul class="newsletter-follow">
                        <li>
                            <a href="https://t.me/volodya_apaciti"><i class="fa fa-telegram"></i></a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/sil_yan23/"><i class="fa fa-instagram"></i></a>
                        </li>
                        <li>
                            <a href="https://github.com/7heJudge"><i class="fa fa-github"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /NEWSLETTER -->
