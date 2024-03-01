<header id="header" class="header">
    <div class="banner js-top-banner hide">

        <div class="container banner__container">
            <span class="banner__text js-banner-text"></span>
        </div>

    </div>



    <div class="header__inner">
        <div class="container header__container">
            <div class="header__block header__block--menu mobile-only">
                <button
                    id="navBtn"
                    class="btn-icon header__nav-btn header__nav-btn--hamburger mobile-only"
                    type="button"
                >
                    <label   id="navBtn" for="checkbox" class="toggle">
                        <div class="bars" id="bar1"></div>
                        <div class="bars" id="bar2"></div>
                        <div class="bars" id="bar3"></div>
                    </label>
                </button>




                <style>
                    #checkbox {
                        display: none;
                    }

                    .toggle {
                        position: relative;
                        width: 40px;
                        height: 40px;
                        cursor: pointer;
                        display: flex;
                        flex-direction: column;
                        align-items: center;
                        justify-content: center;
                        gap: 10px;
                        transition-duration: .3s;
                    }

                    .bars {
                        width: 100%;
                        height: 4px;
                        background-color: rgb(76, 189, 151);
                        border-radius: 5px;
                        transition-duration: .3s;
                    }

                    #checkbox:checked + .toggle .bars {
                        margin-left: 13px;
                    }

                    #checkbox:checked + .toggle #bar2 {
                        transform: rotate(135deg);
                        margin-left: 0;
                        transform-origin: center;
                        transition-duration: .3s;
                    }

                    #checkbox:checked + .toggle #bar1 {
                        transform: rotate(45deg);
                        transition-duration: .3s;
                        transform-origin: left center;
                    }

                    #checkbox:checked + .toggle #bar3 {
                        transform: rotate(-45deg);
                        transition-duration: .3s;
                        transform-origin: left center;
                    }

                </style>



            </div>
            <div class="header__block header__block--logo">


                <div class="header__logo">
                <a style="font-size: 1rem;" class="btn btn-secondary" href="/">Air freshener</a>
                </div>


            </div>
            <div class="header__block hide-mobile">


                <nav
                    id="desktopNav"
                    class="nav hide-mobile"
                    role="navigation"
                >
                    <ul class="nav__list list-reset">



                        <li class="nav__item js-nav-item" data-nav-menu="Shop" tabindex="0">


{{--                            <button class="btn nav__btn js-nav-menu-btn" type="button" aria-label="open Shop menu">Shop</button>--}}
                            <div class="nav-menu js-nav-menu" data-nav-menu="Shop">
                                <div class="nav-menu__container grid">
                                    <div class="nav-menu__block shop">
                                        <a href="#" class="nav-menu__link-tout">
                                            Shop All
                                            <i class="icon icon--arrow-black" role="presentation"></i>
                                        </a>
                                    </div>











                                    <div class="nav-menu__block shop">
                                        <div class="nav-menu__content">


                                            <h4 class="nav-menu__title">Dashboard Polish</h4>


                                            <ul class="nav-menu__list list-reset">





                                                <li class="nav-menu__item">

                                                    <a href="/products/fluoride-free-toothpaste-subscription" class="nav-menu__link">Gladiators </a>
                                                </li>




                                            </ul>



                                        </div>
                                    </div>










                                    <div class="nav-menu__block shop">
                                        <div class="nav-menu__content">


                                            <h4 class="nav-menu__title">    Foam cleaning</h4>


                                            <ul class="nav-menu__list list-reset">





                                                <li class="nav-menu__item">

                                                    <a href="/products/deodorant-kit" class="nav-menu__link">Universal Form Cleaning Agent</a>
                                                </li>
                                            </ul>



                                        </div>
                                    </div>

                                    <div class="nav-menu__block shop">
                                        <div class="nav-menu__content">


                                            <h4 class="nav-menu__title">Strings</h4>


                                            <ul class="nav-menu__list list-reset">

                                                <li class="nav-menu__item">

                                                    <a href="/products/the-best-of-bite" class="nav-menu__link">Air oma</a>
                                                </li>




                                            </ul>



                                        </div>
                                    </div>
                                    <div class="nav-menu__block shop">
                                        <div class="nav-menu__content">
                                            <h4 class="nav-menu__title">Dr Marcus</h4>
                                            <ul class="nav-menu__list list-reset">

                                                <li class="nav-menu__item">

                                                    <a href="/products/the-best-of-bite" class="nav-menu__link">Fresh bag</a>
                                                </li>
                                            </ul>



                                        </div>
                                    </div>
                                    <div class="nav-menu__block shop">
                                        <div class="nav-menu__content">


                                            <h4 class="nav-menu__title"></h4>


                                            <ul class="nav-menu__list list-reset">

                                                <li class="nav-menu__item">

                                                    <a href="/products/the-best-of-bite" class="nav-menu__link"></a>
                                                </li>




                                            </ul>



                                        </div>
                                    </div>
                                    <div class="nav-menu__block shop">
                                        <div class="nav-menu__content">


                                            <h4 class="nav-menu__title">Gel</h4>


                                            <ul class="nav-menu__list list-reset">

                                                <li class="nav-menu__item">

                                                    <a href="/products/the-best-of-bite" class="nav-menu__link">Crystal gel</a>
                                                </li>

                                                <li class="nav-menu__item">

                                                    <a href="/products/the-best-of-bite" class="nav-menu__link">Mini gel</a>
                                                </li>

                                            </ul>



                                        </div>
                                    </div>
                                    <div class="nav-menu__block shop">
                                        <div class="nav-menu__content">


                                            <h4 class="nav-menu__title">Wax</h4>


                                            <ul class="nav-menu__list list-reset">

                                                <li class="nav-menu__item">

                                                    <a href="/products/the-best-of-bite" class="nav-menu__link">Turtle wax</a>
                                                </li>

                                                <li class="nav-menu__item">

                                                    <a href="/products/the-best-of-bite" class="nav-menu__link">Mini gel</a>
                                                </li>

                                            </ul>



                                        </div>
                                    </div>
                                    <div class="nav-menu__block shop">
                                        <div class="nav-menu__content">


                                            <h4 class="nav-menu__title">Spray</h4>


                                            <ul class="nav-menu__list list-reset">

                                                <li class="nav-menu__item">

                                                    <a href="/products/the-best-of-bite" class="nav-menu__link">Mist spray</a>
                                                </li>

                                                <li class="nav-menu__item">

                                                    <a href="/products/the-best-of-bite" class="nav-menu__link">B spray</a>
                                                </li>

                                            </ul>



                                        </div>
                                    </div>











                                </div>
                            </div>

                        </li>
                        <li class="nav__item js-nav-item" data-nav-menu="Our Impact" tabindex="0">

                            <a href="/about" class="nav__link">ABOUT</a>

                        </li>

                        @if (Route::has('login'))
                            @auth()
                            @endauth
                        @endif

                            <?php
                            $user = Illuminate\Support\Facades\Auth::user();
                            ?>
                        @if (Route::has('login'))
                            @auth

                                <li class="nav__item js-nav-item" data-nav-menu="Our Impact" tabindex="0">

                                    <a href="/Cart" class="nav__link">CART { {{$cart_number}} }</a>

                                </li>

                                <li class="nav__item js-nav-item" data-nav-menu="Our Impact" tabindex="0">

                                    <a href="/Order" class="nav__link">ORDER { {{$order_number}} }</a>

                                </li>


                                <li class="nav__item js-nav-item" data-nav-menu="Our Impact" tabindex="0">

                                    <a href="/user/profile" class="nav__link">{{ $user->name }}</a>

                                </li>

                                <li class="nav__item js-nav-item" data-nav-menu="Our Impact" tabindex="0">
                                    <a class="nav__link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                </li>


                                <li style="font-size: 1rem">
                                </li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            @else

                                <li class="nav__item js-nav-item" data-nav-menu="Our Impact" tabindex="0">
                                    <a  class="nav__link" href="/login">LOG IN</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav__item js-nav-item" data-nav-menu="Our Impact" tabindex="0">
                                        <a  class="nav__link" href="/register">SIGN UP</a>
                                    </li>

                                @endif
                            @endauth
                        @endif

                    </ul>
                </nav>

            </div>
        </div>
    </div>
</header>

