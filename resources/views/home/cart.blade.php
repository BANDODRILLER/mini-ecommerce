<!doctype html>
<html lang="en">
<head>
    @include('home.seo')
    @include('home.style')
    @include('home.script')
    @include('sweetalert::alert')
    <script>
        // JavaScript functions to handle quantity adjustments
        function decreaseQuantity(itemId) {
            var quantityElement = document.getElementById('quantity-' + itemId);
            var quantity = parseInt(quantityElement.value);
            if (quantity > 1) {
                quantity--;
                quantityElement.value = quantity;
                updateTotalPrice(itemId);
                updateCheckoutTotal();
            }
        }

        function increaseQuantity(itemId) {
            var quantityElement = document.getElementById('quantity-' + itemId);
            var quantity = parseInt(quantityElement.value);
            quantity++;
            quantityElement.value = quantity;
            updateTotalPrice(itemId);
            updateCheckoutTotal();
        }

        function updateTotalPrice(itemId) {
            var itemPrice = parseFloat(document.getElementById('price-' + itemId).dataset.price);
            var quantity = parseInt(document.getElementById('quantity-' + itemId).value);
            var totalPrice = itemPrice * quantity;
            document.getElementById('total-price-' + itemId).innerText = 'KES' + totalPrice.toFixed(2);
        }

        function updateCheckoutTotal() {
            var total = 0;
            var totalPriceElements = document.getElementsByClassName('total-price');
            for (var i = 0; i < totalPriceElements.length; i++) {
                var totalPriceText = totalPriceElements[i].innerText.substring(3); // Remove 'KES' prefix
                total += parseFloat(totalPriceText);
            }
            document.getElementById('checkout-total').innerText = 'TOTAL = KES' + total.toFixed(2);
        }
        function checkout() {
            var checkoutLink = "checkout?"; // Assuming PHP is used for server-side processing
            var cartItems = document.getElementsByClassName('cart-item');
            for (var i = 0; i < cartItems.length; i++) {
                var itemId = cartItems[i].querySelector('.quantity-adjust input').id.split('-')[1];
                var quantity = document.getElementById('quantity-' + itemId).value;
                checkoutLink += "entry_id[]=" + itemId + "&quantity[]=" + quantity + "&";
            }
            // Remove the last '&' character
            checkoutLink = checkoutLink.slice(0, -1);
            window.location.href = checkoutLink;
        }
        function removecart(itemId) {
            window.location.href = "removecart?entry_id=" + itemId;

        }
    </script>
</head>
<body id="bite-toothpaste-bits" class="template-index">
@include('home.header')
@include('home.nav')

<main style="padding-top: 9vh" id="main" class="page-wrap template-index" role="main">
    <div id="shopify-section-template--14956664881257__home-hero" class="shopify-section">
        <div id="homeHero" class="home-hero">
            <div class="home-hero__wrapper">
                <div id="shopify-section-template--14956664881257__0d803749-f8e8-4142-ac38-08bd1b4892b1" class="shopify-section">
                    <div class="home-faqs">
                        <div class="container home-faqs__container">
                            <div class="home-faqs__header">
                                <h3 class="home-faqs__heading">Your Cart</h3>
                            </div>
                            <div id="homeFaqsAcc" class="acc home-faqs__acc">
                                <div id="cartItems">
                                    <!-- Cart items will be dynamically generated here -->
                                    @php
                                        $totalPrice = 0;
                                    @endphp
                                    @foreach($cart as $item)
                                        <div class="cart-item">
                                            <span class="product-name">{{ $item['name'] }}</span>
                                            <div class="quantity-adjust">
                                                <button onclick="decreaseQuantity({{ $item['id'] }})">-</button>
                                                <input style="width: 40px" type="number" id="quantity-{{ $item['id'] }}" class="quantity" value="1" min="1" onchange="updateTotalPrice({{ $item['id'] }})">
                                                <button onclick="increaseQuantity({{ $item['id'] }})">+</button>
                                            </div>
                                            <span id="price-{{ $item['id'] }}" class="price" data-price="{{ $item['price'] }}">KES{{ number_format($item['price'], 2) }}</span>
                                            <span id="total-price-{{ $item['id'] }}" class="total-price">KES{{ number_format($item['price'], 2) }}</span>
                                            <button onclick="removecart({{ $item['id'] }})" ><span style="color: red" id="remove" class="" > Remove</span></button>

                                        </div>
                                        @php
                                            $totalPrice += $item['price'];
                                        @endphp
                                    @endforeach
                                </div>
                                <!-- Display total price -->
                                <button id="checkout-total" class="button" onclick="checkout()">
                                    CHECK OUT  {{ number_format($totalPrice, 2) }} Payment on delivery
                                    <svg class="cartIcon" viewBox="0 0 576 512"><path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"></path></svg>
                                </button>
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

<style>
    .button {
        width: 100% ;
        height: 40px;
        background-image: linear-gradient(rgb(214, 202, 254), rgb(158, 129, 254));
        border: none;
        border-radius: 50px;
        color: rgb(255, 255, 255);
        font-weight: 600;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 5px;
        cursor: pointer;
        box-shadow: 1px 3px 0px rgb(139, 113, 255);
        transition-duration: .3s;
    }

    .cartIcon {
        width: 14px;
        height: fit-content;
    }

    .cartIcon path {
        fill: white;
    }

    .button:active {
        transform: translate(2px ,0px);
        box-shadow: 0px 1px 0px rgb(139, 113, 255);
        padding-bottom: 1px;
    }

</style>
