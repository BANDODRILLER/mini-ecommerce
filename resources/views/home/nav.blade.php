
<nav
    id="nav"
    class="nav mobile-only"
    role="navigation"
    aria-expanded="false"
>
    <div class="nav-drawer">
        <div class="nav-drawer__header">
            <a href="#" class="nav-drawer__hdg js-nav-drawer-hdg">Shop All</a>
        </div>
        <ul class="nav-drawer__list list-reset">
            @if (Route::has('login'))
                @auth()
                @endauth
            @endif

                <?php
                $user = Illuminate\Support\Facades\Auth::user();
                ?>
            @if (Route::has('login'))
                @auth

                <li class="nav-drawer__block js-nav-drawer-block">


                <a href="/Cart" class="nav-drawer__link">CART { {{$cart_number}} }</a>

            </li>
            <li class="nav-drawer__block js-nav-drawer-block">


                <a href="/Order"class="nav-drawer__link">ORDER { {{$order_number}} }</a>

            </li>
            <li class="nav-drawer__block js-nav-drawer-block">


                <a href="/user/profile" class="nav-drawer__link">{{ $user->name }}</a>

            </li>
            <li class="nav-drawer__block js-nav-drawer-block" data-nav-menu="Our Impact" tabindex="0">
                <a class="nav-drawer__link" href="{{ route('logout') }}"
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

                        <li class="nav-drawer__block js-nav-drawer-block" data-nav-menu="Our Impact" tabindex="0">
                            <a  class="nav-drawer__link" href="/login">LOG IN</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-drawer__block js-nav-drawer-block" data-nav-menu="Our Impact" tabindex="0">
                                <a  class="nav-drawer__link" href="/register">SIGN UP</a>
                            </li>

                        @endif
                    @endauth
                @endif


        </ul>
    </div>
</nav>
