@extends('layouts.main')

@section('title')
    Checkout
@endsection

@section('content')
    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div id="charge-error" class="alert alert-danger {{ !Session::has('error') ? 'hidden' : '' }}">
                    {{ Session::get('error') }}
                </div>
                <form action="{{ route('checkout') }}" method="post" id="checkout-form">
                    @csrf
                    <div class="col-md-7">
                        <!-- Billing Details -->
                        <div class="billing-details">
                            <div class="section-title">
                                <h3 class="title">Платежный адрес</h3>
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="name" id="name" placeholder="Имя" required>
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="address" id="address" placeholder="Адрес"
                                       required>
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="card-name" id="card-name"
                                       placeholder="Имя владельца карты"
                                       required>
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="card-number" id="card-number"
                                       placeholder="Номер карты" required>
                            </div>
                            <div class="col-xs-12">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <input class="input" type="text" name="card-expiry-month"
                                                   id="card-expiry-month"
                                                   placeholder="Месяц истечения срока действия"
                                                   required maxlength="2" min="1" max="12">
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="form-group">
                                            <input class="input" type="text" name="card-expiry-year"
                                                   id="card-expiry-year"
                                                   placeholder="Год истечения срока действия"
                                                   required maxlength="4" min="2020">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="card-CVC" id="card-CVC" placeholder="CVC"
                                       required maxlength="3">
                            </div>
                        </div>
                        <!-- /Billing Details -->
                    </div>

                    <!-- Order Details -->
                    <div class="col-md-5 order-details">
                        <div class="section-title text-center">
                            <h3 class="title">Ваш заказ</h3>
                        </div>
                        <div class="order-summary">
                            <div class="order-col">
                                <div><strong>ТОВАР</strong></div>
                                <div><strong>СТОИМОСТЬ</strong></div>
                            </div>
                            <div class="order-products">
                                @foreach($products as $product)
                                    <div class="order-col">
                                        <div>{{ $product['quantity'] }}x {{ $product['item']['title'] }}</div>
                                        <div>₴{{ $product['price'] }}</div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="order-col">
                                <div>Доставка</div>
                                <div><strong>БЕСПЛАТНО</strong></div>
                            </div>
                            <div class="order-col">
                                <div><strong>ИТОГО</strong></div>
                                <div><strong class="order-total">₴{{ $total }}</strong></div>
                            </div>
                        </div>
                        <button style="width: 100%" type="submit" class="primary-btn order-submit">Оплатить</button>
                    </div>
                    <!-- /Order Details -->
                </form>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
@endsection

@section('custom_js')
    <script>

        Stripe.setPublishableKey('pk_test_51Io3mGLtbArLpPbnlC0gIkjep4vwZv4xHfwfLr1lwyZ4NsL2nWS8YHAbO0WucLuLx7e2sIM6cp1IBN9IqdNS5M3a00WoUSYfao');

        var $form = $('#checkout-form');

        $form.submit(function(event) {
            $('#charge-error').addClass('hidden');
            $form.find('button').prop('disabled', true);
            Stripe.card.createToken({
                number: $('#card-number').val(),
                cvc: $('#card-cvc').val(),
                exp_month: $('#card-expiry-month').val(),
                exp_year: $('#card-expiry-year').val(),
                name: $('#card_name').val()
            }, stripeResponseHandler);
            return false;
        });

        function stripeResponseHandler(status, response) {
            if(response.error){
                $('#charge-error').removeClass('hidden');
                $('#charge-error').text(response.error.message);
                $form.find('button').prop('disabled', false);
            } else {
                var token = response.id;
                console.log(token);
                $form.append($('<input type="hidden" name="stripeToken" />').val(token));

                // Submit the form:
                $form.get(0).submit();
            }
        }
    </script>
@endsection
