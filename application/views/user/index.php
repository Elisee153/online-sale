<?php
    if($this->session->email_saved){
?>
    <script>
        swal("Good work", "Email saved successfully!", "success");
    </script>
<?php
    }
?>

<main class="site-main">

        <section class="hero-banner">
            <div class="container">
                <div class="row no-gutters align-items-center pt-60px">
                    <div class="col-4 d-none d-sm-block">
                        <div class="hero-banner__img">
                            <img class="img-fluid" src=<?=base_url("assets/user/img/home/banner.png")?> alt="">
                        </div>
                    </div>
                    <div class="col-sm-7 col-lg-6 offset-lg-1 pl-4 pl-md-5 pl-lg-0">
                        <div class="hero-banner__content">
                            <h1>SURMPY ENGINEERING</h1>
                            <h4>& S E R V I C E S L I M I T E D</h4>
                            <br/><br/>
                            <a class="button button-hero" href="<?=site_url("user/all_product")?>">Our Products</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <br><br/>
        <section class="section-margin mt-0">
            <div class="container">
                <div class="section-intro pb-60px">
                    <p>Some of our products</p>
                    <h2>Recently<span class="section-intro__style"> added</span></h2>
                </div>
                <div class="owl-carousel owl-theme hero-carousel">
                    <?php
                    $counter = 0;
                        foreach($product as $p)
                        {
                            $counter +=1;
                    ?>
                    <div class="hero-carousel__slide">
                        <img src="<?=base_url("assets/img/produit/".$p->image->image)?>" alt="" class="img-fluid">
                        <a href="<?=site_url("user/product_detail?id=".$p->id)?>" class="hero-carousel__slideOverlay">
                            <h3><?=$p->designation?></h3>
                            <p><?=$p->categorie?></p>
                        </a>
                    </div>
                    <?php
                            if($counter == 3){break;}
                        }
                    ?>
                </div>
            </div>
        </section>


        <section class="section-margin calc-60px">
            <div class="container">
                <div class="section-intro pb-60px">
                    <p>Popular Items</p>
                    <h2>Featured <span class="section-intro__style">Products</span></h2>
                </div>
                <div class="row">
                    <?php
                        foreach($product as $p){
                    ?>
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="card text-center card-product">
                            <div class="card-product__img">
                                <a href="<?=site_url("user/product_detail?id=".$p->id)?>">
                                    <img class="card-img" src=<?=base_url("assets/img/produit/".$p->image->image)?> alt="Product" style="height:220px;">
                                    <ul class="card-product__imgOverlay">
                                        <li><button title="See"><i class="ti-eye"></i></button></li>
                                    </ul>
                                </a>
                            </div>
                            <div class="card-body">
                                <p><?=$p->categorie?></p>
                                <h4 class="card-product__title"><a href="single-product.html"><?=$p->designation?></a></h4>
                                <p class="card-product__price"><?=$p->prix?></p>
                            </div>
                        </div>
                    </div>  
                    <?php  
                        }
                    ?>                 
                </div>
            </div>
        </section>

        <section class="section-margin calc-60px">
            <div class="container">
                <div class="section-intro pb-60px">
                    <!-- <p>Partners</p> -->
                    <h2>Our <span class="section-intro__style">partners</span></h2>
                </div>
                <div class="owl-carousel owl-theme" id="bestSellerCarousel">
                <?php
                    for($i=1;$i<=9;$i++){
                ?>
                    <div class="card text-center card-product">
                        <div class="card-product__img">
                            <img class="img-fluid" src="<?=base_url("assets/user/img/home/p".$i.".png")?>" alt="" style="width:150px;height:150px">
                        </div>
                    </div>    
                <?php
                    }
                ?>               
                </div>
            </div>
        </section>

        <section class="subscribe-position">
            <div class="container">
                <div class="subscribe text-center">
                    <h3 class="subscribe__title">Get Update From Anywhere</h3>
                    <div>
                        <form action="<?=site_url("user/newslater")?>" method="post" class="subscribe-form form-inline mt-5 pt-1">
                            <div class="form-group ml-sm-auto">
                                <input class="form-control mb-1" type="email" name="email" placeholder="Enter your email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address '">                                
                            </div>
                            <button class="button button-subscribe mr-auto mb-1" type="submit">Subscribe Now</button>                            
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main> 