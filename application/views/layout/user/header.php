<header id="header" class="variantleft type_8">
    <div class="header-top">
        <div class="container">
            <div class="row">
            <div class="header-top-left form-inline col-sm-6 col-xs-12 compact-hidden">
                <div class="form-group languages-block ">
                <form action="index.html" method="post" enctype="multipart/form-data" id="bt-language">
                    <a class="btn btn-xs dropdown-toggle" data-toggle="dropdown">
                    <img src="<?php echo base_url().'assets/image/demo/flags/gb.png'; ?>" alt="English" title="English">
                    <span class="">English</span>
                    <span class="fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu">
                    <li><a href="index.html"><img class="image_flag" src="<?php echo base_url().'assets/image/demo/flags/gb.png'; ?>" alt="English" title="English" /> English </a></li>
                    <li> <a href="index.html"> <img class="image_flag" src="<?php echo base_url().'assets/image/demo/flags/lb.png'; ?>" alt="Arabic" title="Arabic" /> Arabic </a> </li>
                    </ul>
                </form>
                </div>
        
                <div class="form-group currencies-block">
                <form action="index.html" method="post" enctype="multipart/form-data" id="currency">
                    <a class="btn btn-xs dropdown-toggle" data-toggle="dropdown">
                    <span class="icon icon-credit "></span> US Dollar <span class="fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu btn-xs">
                    <li> <a href="my-account.html#">(€)&nbsp;Euro</a></li>
                    <li> <a href="my-account.html#">(£)&nbsp;Pounds	</a></li>
                    <li> <a href="my-account.html#">($)&nbsp;US Dollar	</a></li>
                    </ul>
                </form>
                </div>
            </div>
            <div class="header-top-right collapsed-block text-right  col-sm-6 col-xs-12 compact-hidden">
                <h5 class="tabBlockTitle visible-xs">More<a class="expander " href="my-account.html#TabBlock-1"><i class="fa fa-angle-down"></i></a></h5>
                <div class="tabBlock" id="TabBlock-1">
                <ul class="top-link list-inline">
                    <li class="account" id="my_account">
                    <a href="my-account.html#" title="Mon Compte" class="btn btn-xs dropdown-toggle" data-toggle="dropdown"> <span >Mon Compte</span> <span class="fa fa-angle-down"></span></a>
                    <ul class="dropdown-menu ">
                        <li><a href="<?php echo site_url('indexCi/enregistrer') ;?>"><i class="fa fa-user"></i> S'Enregistrer</a></li>
                        <li><a href="<?php echo site_url('indexCi/login') ;?>"><i class="fa fa-pencil-square-o"></i> Se Connecter</a></li>
                        <li><a href="<?php echo site_url('indexCi/deconnexion') ;?>"><i class="fa fa-pencil-square-o"></i> Se Deconnecter</a></li>
                    </ul>
                    </li>
                    <li class="wishlist"><a href="wishlist.html" id="wishlist-total" class="top-link-wishlist" title="Wish List (2)"><span>Wish List (2)</span></a></li>
                    <li class="checkout"><a href="checkout.html" class="top-link-checkout" title="Checkout"><span >Checkout</span></a></li>
                    <li class="login"><a href="cart.html" title="Shopping Cart"><span >Shopping Cart</span></a></li>
                </ul>
                </div>
            </div>
            </div>
        </div>
        </div>
    <!-- Header Top -->
		<!-- //Header Top -->

    <!-- Header center -->
    <div class="header-center">
        <div class="container">
            <div class="row">
                <!-- Logo -->
                <div class="navbar-logo col-md-3 col-sm-12 col-xs-12">
                    <a href="<?php echo site_url('indexCi'); ?>"><img src="<?php echo base_url().'assets/assets/image/demo/logos/logo_8.png'; ?>" title="Your Store" alt="Your Store"></a>
                </div>
                <!-- //end Logo -->
                <!-- Search -->
                <div id="sosearchpro" class="col-md-5 col-sm-7 search-pro">
                    <form method="GET" action="index.html">
                        <div id="search0" class="search input-group">
                            <div class="select_category filter_type icon-select">
                                <select class="no-border" name="category_id">
                                    <option value="0">All Categories</option>
                                    <option value="78">Apparel</option>
                                    <option value="77">Cables &amp; Connectors</option>
                                    <option value="82">Cameras &amp; Photo</option>
                                    <option value="80">Flashlights &amp; Lamps</option>
                                    <option value="81">Mobile Accessories</option>
                                    <option value="79">Video Games</option>
                                    <option value="20">Jewelry &amp; Watches</option>
                                    <option value="76">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Earings</option>
                                    <option value="26">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Wedding Rings</option>
                                    <option value="27">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Men Watches</option>
                                </select>
                            </div>

                            <input class="autosearch-input form-control" type="text" value="" size="50" autocomplete="off" placeholder="Enter keywords to search..." name="search">
                            <span class="input-group-btn">
                            <button type="submit" class="button-search btn btn-primary" name="submit_search"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                        <input type="hidden" name="route" value="product/search">
                    </form>
                </div>
                <!-- //Search -->
                
                <!-- Main Menu -->
                <div class="phone-contact col-md-2  hidden-md hidden-sm hidden-xs">
                        <div class="inner-info">
                            <strong>Appelez-nous:</strong><br>
                            <span>No:  085-12-72-953</span>
                        </div>
                </div>
                <!-- //Main Menu -->

                <!-- Shopping Cart -->
                    <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12 shopping_cart pull-right">
                    <!--cart-->
                    <div id="cart" class="btn-group btn-shopping-cart">
                        <ul class="tab-content content dropdown-menu pull-right shoppingcart-box" role="menu">
                            <li>
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <td class="text-center" style="width:70px">
                                                <a href="product.html"> <img src="<?php echo base_url().'assets/image/demo/shop/product/resize/2.jpg'; ?>" style="width:70px" alt="Filet Mign" title="Filet Mign" class="preview"> </a>
                                            </td>
                                            <td class="text-left"> <a class="cart_product_name" href="product.html">Filet Mign</a> </td>
                                            <td class="text-center"> x1 </td>
                                            <td class="text-center"> $1,202.00 </td>
                                            <td class="text-right">
                                                <a href="product.html" class="fa fa-edit"></a>
                                            </td>
                                            <td class="text-right">
                                                <a onclick="cart.remove('2');" class="fa fa-times fa-delete"></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center" style="width:70px">
                                                <a href="product.html"> <img src="<?php echo base_url().'assets/image/demo/shop/product/resize/3.jpg'; ?>" style="width:70px" alt="Canon EOS 5D" title="Canon EOS 5D" class="preview"> </a>
                                            </td>
                                            <td class="text-left"> <a class="cart_product_name" href="product.html">Canon EOS 5D</a> </td>
                                            <td class="text-center"> x1 </td>
                                            <td class="text-center"> $60.00 </td>
                                            <td class="text-right">
                                                <a href="product.html" class="fa fa-edit"></a>
                                            </td>
                                            <td class="text-right">
                                                <a onclick="cart.remove('1');" class="fa fa-times fa-delete"></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </li>
                            <li>
                                <div>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td class="text-left"><strong>Sub-Total</strong>
                                                </td>
                                                <td class="text-right">$1,060.00</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left"><strong>Eco Tax (-2.00)</strong>
                                                </td>
                                                <td class="text-right">$2.00</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left"><strong>VAT (20%)</strong>
                                                </td>
                                                <td class="text-right">$200.00</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left"><strong>Total</strong>
                                                </td>
                                                <td class="text-right">$1,262.00</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <p class="text-right"> <a class="btn view-cart" href="cart.html"><i class="fa fa-shopping-cart"></i>View Cart</a>&nbsp;&nbsp;&nbsp; <a class="btn btn-mega checkout-cart" href="checkout.html"><i class="fa fa-share"></i>Checkout</a> </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!--//cart-->
                </div>
                <!-- //Shopping Cart -->
            </div>

        </div>
    </div>
		<!-- //Header center -->

    <!-- Header Bottom -->
    <div class="header-bottom">
        <div class="container">
            <div class="row">
                
                <!-- Main menu -->
                <div class="megamenu-hori  col-xs-12 ">
                    <div class="responsive so-megamenu ">
                            <nav class="navbar-default">
                                <div class=" container-megamenu  horizontal">
                                    <div class="navbar-header">
                                        <button type="button" id="show-megamenu" data-toggle="collapse" class="navbar-toggle">
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                        Navigation		
                                    </div>
                                    
                                    <?=$navbar;?>
                                </div>
                            </nav>
                        </div>
                    </div>
                <!-- //end Main menu -->
                
            </div>
        </div>

    </div>
	<!-- Navbar switcher -->
	<!-- //end Navbar switcher -->
</header>