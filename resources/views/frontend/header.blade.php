<header>
    <!-- TOP HEADER -->
    <div id="top-header">
        <div class="container">
            <ul class="header-links pull-left">
                <li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
                <li><a href="#"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li>
            </ul>
            <ul class="header-links pull-right">
                <li><a href="#"><i class="fa fa-dollar"></i> USD</a></li>
                <li><a href="#"><i class="fa fa-user-o"></i> My Account</a></li>
            </ul>
        </div>
    </div>
    <!-- /TOP HEADER -->

    <!-- MAIN HEADER -->
    <div id="header">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-3">
                    <div class="header-logo">
                        <a href="{{ url('/') }}" class="logo">
                            <img src="{{ 'asset/frontend/img/logo.png '}}" alt="">
                        </a>
                    </div>
                </div>
                <!-- /LOGO -->

                <!-- SEARCH BAR -->
                <div class="col-md-6">
                    <div class="header-search">
                        <form>
                            <select class="input-select">
                                <option value="0">All Categories</option>
                               @foreach ($categories as $category )

                                <option value="1">{{$category->name  }}</option>
                               @endforeach
                            </select>
                            <input class="input" placeholder="Search here">
                            <button class="search-btn">Search</button>
                        </form>
                    </div>
                </div>
                <!-- /SEARCH BAR -->

                <!-- ACCOUNT -->
                <div class="col-md-3 clearfix">
                    <div class="header-ctn">
                        <!-- Wishlist -->
                        <div>
                            <a href="#">
                                <i class="fa fa-heart-o"></i>
                                <span>Your Wishlist</span>
                                <div class="qty">2</div>
                            </a>
                        </div>
                        <!-- /Wishlist -->

                        <!-- Cart -->
                        <?php
                        $cart_array = cardArray();

                        ?>
                       <div class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                            <i class="fa fa-shopping-cart"></i>
                            <span>Your Cart</span>
                            <span class="qty">{{ count($cart_array) }}</span>
                        </a>
                        <div class="dropdown-menu cart-dropdown">
                            <div class="cart-list">
                                @foreach ($cart_array as $v_add_cart)
                                    @php
                                        $images = $v_add_cart['attributes'][0] ?? null;
                                        if ($images) {
                                            $images = explode('|', $images);
                                            $images = $images[0] ?? null;
                                        }
                                    @endphp

                                    <div class="product-widget">
                                        @if ($images)
                                            <div class="product-img">
                                                <img src="{{ asset('/image/' . $images) }}" alt="Product Image">
                                            </div>
                                        @else
                                            <div class="product-img">
                                                <p>No image available</p>
                                            </div>
                                        @endif
                                        <div class="product-body">
                                            <h3 class="product-name"><a href="#">{{ $v_add_cart['name'] }}</a></h3>
                                            <h4 class="product-price">
                                                <span class="qty">{{ $v_add_cart['quantity'] }}x</span>
                                                {{ $v_add_cart['price'] }}
                                            </h4>
                                        </div>
                                        <a class="delete" href="{{ url('/delete-cart/'.$v_add_cart['id']) }}">
                                            <i class="fa fa-close"></i>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <div class="cart-summary">
                                <small>{{ count($cart_array) }} Item(s) selected</small>
                                <h5>SUBTOTAL: {{ Cart::getTotal() }}</h5>
                            </div>
                            <div class="cart-btns">
                                <a href="#">View Cart</a>
                                <a href="{{ url('/checkout') }}">Checkout <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>


                        <!-- /Cart -->


                        <div class="menu-toggle">
                            <a href="#">
                                <i class="fa fa-bars"></i>
                                <span>Menu</span>
                            </a>
                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>

</header>
