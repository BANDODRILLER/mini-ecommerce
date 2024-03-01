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

<main style="padding-top: 9vh" id="main" class="page-wrap template-index" role="main">
    <div id="shopify-section-template--14956664881257__home-hero" class="shopify-section">
        <div id="homeHero" class="home-hero">
            <div class="home-hero__wrapper">
                <div id="shopify-section-template--14956664881257__0d803749-f8e8-4142-ac38-08bd1b4892b1" class="shopify-section">
                    <div class="home-faqs">
                        <div class="container home-faqs__container">
                            <div class="home-faqs__header">
                                <h5 class="home-faqs__heading">Your shipping address</h5>
                            </div>
                            <div id="homeFaqsAcc" class="acc home-faqs__acc">


                                <div id="cartItems">
                                    <div class="cart-item" data-county="{{$county}}" data-estate="{{$estate}}" data-road="{{$road}}" data-phone="{{$phone}}">
                                        <!-- Dummy shipping address -->
                                        <p><strong>City/Town:</strong> {{$county}}</p>
                                        <p><strong>Estate /Section:</strong> {{$estate}}</p>
                                        <p><strong>Nearest Road:</strong> {{$road}}</p>
                                        <br>
                                        <p><strong>Phone number:</strong> {{$phone}}</p>

                                    </div>
                                </div>

                                <style>
                                    /* Base styles for form elements */
                                    form {
                                        max-width: 400px; /* Adjust as needed */
                                        margin: 0 auto;
                                        padding: 20px;
                                        border: 1px solid #ccc;
                                        border-radius: 5px;
                                    }

                                    label {
                                        display: block;
                                        margin-bottom: 5px;
                                    }

                                    input[type="text"] {
                                        width: 100%;
                                        padding: 10px;
                                        margin-bottom: 10px;
                                        border: 1px solid #ccc;
                                        border-radius: 5px;
                                    }

                                    button[type="submit"] {
                                        width: 100%;
                                        padding: 10px;
                                        background-color: #007bff;
                                        color: #fff;
                                        border: none;
                                        border-radius: 5px;
                                        cursor: pointer;
                                    }

                                    /* Media query for mobile devices */
                                    @media screen and (max-width: 600px) {
                                        form {
                                            max-width: none;
                                        }
                                    }
                                </style>

                                <form style="padding-bottom: 50px" id="shippingAddressForm" action="/shipping_address" method="post">
                                    @csrf
                                    <label for="address">City/Town:</label>
                                    <input type="text" id="address" name="address">
                                    <label for="city">Estate /Section</label>
                                    <input type="text" id="city" name="city">
                                    <label for="country">Nearest Road:</label>
                                    <input type="text" id="country" name="country">
                                    <label for="phone">Phone number:</label> <!-- Fixed typo in label for phone -->
                                    <input type="text" id="phone" name="phone">
                                    <button type="submit">Update Shipping Address</button>
                                </form>


                                <!-- Display total price -->
                                <button id="checkout-total" class="button" onclick="updateShipping()">
                                    Confirm Current Shipping Address
                                </button>

                                <script>
                                    function updateShipping() {
                                        var cartItem = document.querySelector('.cart-item');
                                        var city = cartItem.dataset.county;
                                        var estate = cartItem.dataset.estate;
                                        var road = cartItem.dataset.road;
                                        var phone = cartItem.dataset.phone;


                                        var link = "currentshipping?city=" + encodeURIComponent(city) + "&estate=" + encodeURIComponent(estate) + "&road=" + encodeURIComponent(road)+ "&phone=" + encodeURIComponent(phone);

                                        // Navigate to the constructed link
                                        window.location.href = link;
                                    }

                                </script>
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
