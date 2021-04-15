<?php
    if($this->session->produit_ajoute){
?>
        <script>
            swal("Bon travail", "Produit ajouté avec succès", "success");
        </script>
<?php
    }
?>
<div class="main-content">
    <section class="section">
    <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Produits</h4>
                        <div class="card-header-form">
                            <form>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Recherche" id="search-form">
                                    <div class="input-group-btn">
                                        <button style="padding:8px" id="search" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table id="product_space" class="table table-striped">
                                <tr>
                                    <th>Designation</th>
                                    <th>Prix</th>
                                    <th>Categorie</th>
                                    <th>Action</th>
                                </tr>                            
                                <?php
                                    foreach($product as $p)
                                    {
                                ?>
                                    <tr>
                                        <td><?=$p->designation?></td>
                                        <td><?=$p->prix?></td>
                                        <td><?=$p->nom?></td>
                                        <form action=<?=site_url("admin/product_detail")?> method="post">
                                            <input type="text" name="idproduit" value="<?=$p->id?>" hidden>
                                            <td><button type="submit" class="btn btn-outline-primary">Detail</button></td>
                                        </form>
                                    </tr>
                                <?php
                                    }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
        </div>
        </div>
    </section>
</div>

<script>
    $(function(){
        $('#search').click(function(e){
            e.preventDefault();

           var item = $('#search-form').val().toLowerCase();

           $.post("<?=site_url('ajax/search_product')?>",{item:item},function(response){
               console.log(response);
               $('#product_space').html(response);
           })
        })

        $('#search-form').blur(function(e){
            e.preventDefault();
            
            if($('#search-form').val() == ''){
                console.log('blur');
                $.post("<?=site_url('ajax/all_product')?>",{},function(data){
                    $('#product_space').html(data);
                })                      
            }
        })

        
    })
</script>