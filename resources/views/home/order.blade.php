<!doctype html>
<html lang="en">
<head>
    @include('home.seo')
    @include('home.style')
    @include('home.script')
    @include('sweetalert::alert')
</head>
<body id="bite-toothpaste-bits" class="template-index">
@include('home.header')
@include('home.nav')
<script>
    function removeorder(itemId) {
        window.location.href = "removeorder?entry_id=" + itemId;

    }
</script>

<main style="padding-top: 9vh" id="main" class="page-wrap template-index" role="main">
    <div id="shopify-section-template--14956664881257__home-hero" class="shopify-section">
        <div id="homeHero" class="home-hero">
            <div class="home-hero__wrapper">
                <div id="shopify-section-template--14956664881257__0d803749-f8e8-4142-ac38-08bd1b4892b1" class="shopify-section">
                    <div class="home-faqs">
                        <div class="container home-faqs__container">
                            <div class="home-faqs__header">
                                <h3 class="home-faqs__heading">Your Order</h3>
                            </div>
                            <div id="homeFaqsAcc" class="acc home-faqs__acc">
                                <div id="cartItems">
                                    <!-- Cart items will be dynamically generated here -->

                                    @foreach($order as $item)
                                        <div class="cart-item">
                                            <span class="product-name">{{ $item['item_id'] }} )</span>
                                            <span class="product-name">{{ $item['name'] }}</span>
                                            <span id="price-{{ $item['id'] }}" class="price" data-price="{{ $item['price'] }}">KES {{ number_format($item['calculated_column'], 2) }}</span>
                                            <span class="product-name">{{ $item['quantity'] }}</span>
                                            <button onclick="removeorder({{ $item['id'] }})">
                                                <span style="color: red" class="product-name">Cancel</span>
                                            </button>


                                        </div>

                                    @endforeach
                                </div>
                                <div class="home-faqs__header">
                                    <h6 style="font-size: 1.5rem" class="home-faqs__heading">Total price to pay: KES {{$ordersum}}</h6>
                                    <h6 style="font-size: 1.5rem" class="home-faqs__heading">Payment on delivery</h6>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@include('home.footer')
</body>
</html>
