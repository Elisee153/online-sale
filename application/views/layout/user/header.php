
<body>

<header class="header_area">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand logo_h" href="index.html"><img style="margin-left:-50" src=<?=base_url("assets/user/img/surmpy-logo3.png")?> alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
                        <li id="head-home" class="nav-item"><a class="nav-link" href="<?=site_url("user/index")?>">Home</a></li>
                        <li id="product"  class="nav-item"><a class="nav-link" href="<?=site_url("user/all_product")?>">Products</a></li>
                        <li id="categorie" class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categories</a>
                            <ul class="dropdown-menu">
                                <?php
                                    foreach($categorie as $cat)
                                    {
                                ?>
                                        <li class="nav-item"><a class="nav-link" href="<?=site_url("user/prod_by_cat?id=".$cat->id)?>"><?=$cat->nom?></a></li>
                                <?php
                                    }
                                ?>
                            </ul>
                        </li>                        
                        <li id="head-contact" class="nav-item"><a class="nav-link" href="<?=site_url("user/contact")?>">Contact</a></li>
                        <li id="about"  class="nav-item"><a class="nav-link" href="<?=site_url("user/about")?>">About</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>