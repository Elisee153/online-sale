<main class="site-main">
<section class="blog-banner-area" id="contact">
    <div class="container h-100">
        <div class="blog-banner">
            <div class="text-center">
                <h1><?=$categorie?></h1>
                <nav aria-label="breadcrumb" class="banner-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href=<?=site_url("user/index")?>>Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Categories</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<section class="section-margin calc-60px">
    <div class="container">
        <?php
            if(count($product) > 0)
            {
        ?>
        <div class="section-intro pb-60px">
            <p><?=$product[0]->categorie?> Category</p>
            <h2>Here are <span class="section-intro__style">our products</span></h2>
        </div>
        <div class="row">
            <?php
                foreach($product as $p){
            ?>
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="card text-center card-product">
                    <div class="card-product__img">
                        <a href="<?=site_url("user/product_detail?id=".$p->id)?>">
                            <img class="card-img" src=<?=base_url("assets/img/produit/".$p->image->image)?> alt="" style="height:220px;">
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
        <?php
            }else{
        ?>
                <p class="text-center">There is no product available in this category yet. <a href="<?=site_url("user/all_product")?>">See other products</a></p>
        <?php
            }
        ?>
    </div>
</section>
</main>