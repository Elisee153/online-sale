<?php
    if($this->session->comment_sent){
?>
    <script>
        swal("Good work", "Comment saved successfully!", "success");
    </script>
<?php
    }
?>

<section class="blog-banner-area" id="blog">
    <div class="container h-100">
        <div class="blog-banner">
            <div class="text-center">
                <h1>Single product</h1>
                <nav aria-label="breadcrumb" class="banner-breadcrumb">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Single product</li>
                </ol>
                </nav>
            </div>
        </div>
    </div>
</section>


<div class="product_image_area">
    <div class="container">
        <div class="row s_product_inner">
            <div class="col-lg-6">
                <div class="owl-carousel owl-theme s_Product_carousel">
                    <div class="single-prd-item">
                        <img class="img-fluid" src="<?=base_url("assets/img/produit/".$product[0]->image[0]->image)?>" alt="">
                    </div>

                </div>
            </div>
            <div class="col-lg-5 offset-lg-1">
                <div class="s_product_text">
                    <h3><?=$product[0]->designation?></h3>
                    <h2><?=$product[0]->prix?></h2>
                    <ul class="list">
                    <li><a class="active" href="#"><span>Category</span> : <?=$product[0]->categorie?></a></li>
                    <li><a href="#"><span>Availibility</span> : In Stock</a></li>
                    </ul>
                    <p><?=$product[0]->description?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="product_description_area">
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
            <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Comments</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                <p class="text-justify"><?=$product[0]->description?></p>
            </div>


            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="comment_list">
                            <?php
                                if(count($comment) > 0){
                                
                                foreach($comment as $c){
                            ?>
                                <div class="review_item">
                                    <div class="media">
                                        <div class="d-flex">
                                            <i><span style="font-size:35px" class="iconify" data-icon="fe-comments" data-inline="false"></span></i>
                                        </div>
                                        <div class="media-body">
                                            <h4><?=$c->nom?></h4>
                                            <h5><?=$c->date?></h5>
                                            <h5><?=$c->email?></h5>
                                        </div>
                                    </div>
                                    <p><?=$c->commentaire?></p>
                                </div>
                                <br>
                            <?php
                                }
                            }else{
                                ?>
                                <p>No Comments yet</p>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="review_box">
                            <h4>Post a comment</h4>
                            <form class="row contact_form" action=<?=site_url("user/new_comment")?> method="post" id="contactForm" novalidate="novalidate">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Your Full name">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email Address">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea class="form-control" name="comment" id="message" rows="5" placeholder="Comment"></textarea>
                                </div>
                            </div>
                            <input type="text" value=<?=$product[0]->id?> name="idproduit" hidden>
                            <div class="col-md-12 text-right">
                                <button type="submit" value="submit" class="btn primary-btn">Submit Now</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>