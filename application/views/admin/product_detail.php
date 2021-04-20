<div class="main-content">
    <section class="section">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Produit</h4>
                </div>
                <div class="card-body p-0">
                    <?php
                        for($i=0;$i<=count($product[0]->image);$i++)
                        {
                            if($product[0]->image[$i]->main == 1)
                            {
                                $image = $product[0]->image[$i]->image;
                                break;
                            }
                        }
                    ?>
                    <div class="row">
                        <div id="aniimated-thumbnials" class="list-unstyled row clearfix">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 offset-2">
                                <a href=<?=base_url("assets/img/image-gallery/1.png")?> data-sub-html="Demo Description">
                                <img class="img-responsive thumbnail" src="<?=base_url('assets/img/produit/'.$image)?>" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <br><br>
                            <h5>Designation : <?=$product[0]->designation?></h5>
                            <h5>Categorie : <?=$product[0]->nom?></h5>
                            <h5>Prix : <?=$product[0]->prix?></h5>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <p style="font-size:20px;margin-left:15px">Description</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-7 offset-md-1">
                            <p class="text-justify"><?=$product[0]->description?> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Exercitationem, quos dolores quia laboriosam ipsum nihil adipisci voluptas ea. Dignissimos earum officia, quisquam laboriosam quasi sunt? Commodi porro rerum mollitia ex. Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis aperiam nobis veritatis reiciendis ad molestias eius numquam optio corrupti pariatur aliquid, consequatur porro atque, assumenda id quaerat magni mollitia nihil.</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <p style="font-size:20px;margin-left:15px">Autres images</p>
                        </div>
                    </div>
                    <div class="row">
                        <div id="aniimated-thumbnials" class="list-unstyled row clearfix">
                    <?php
                        for($j=0;$j<count($product[0]->image);$j++)
                        {
                            $image = $product[0]->image[$j]->image;
                    ?>
                            <div style="margin-left:50px" class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
                                <a href=<?=base_url("assets/img/image-gallery/1.png")?> data-sub-html="Demo Description">
                                <img class="img-responsive" src="<?=base_url('assets/img/produit/'.$image)?>">
                                </a>
                            </div>
                    <?php
                    }
                    ?>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-md-3 offset-md-8">
                            <form id="form-delete" onclick='javascript:confirmation($(this));return false;'action="<?= site_url("admin/delete")?>" method="post" style="float:right;">                                
                                <input type="hidden" value="<?=$product[0]->id?>" name="idproduit">
                                <button class="btn btn-danger" id="delete">Supprimer</button>
                            </form> 
                        </div>
                    </div>
                    <br/>
                </div>
            </div>
        </div>
    </div>
    </section>
</div>

<script>
    var del = document.getElementById('delete');
    var form = document.getElementById('form-delete');

    del.addEventListener('click',function(e){
        e.preventDefault();
        form.click();
    }); 

    function confirmation(anchor)
    {
        swal({
            title: "Voulez-vous vraiment supprimmer ce produit?",
            text: "Vous ne serez plus capable de le recuperer!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                swal("Produit supprimé!", {
                icon: "success",
                });
                anchor.submit();
            } 
            });
    }  
    
</script>