<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-8 col-lg-8 offset-md-2 offset-lg-2">
                <div class="card">
                    <div class="card-header">
                        <h4>Nouveau produit</h4>
                    </div>
                    <form action=<?=site_url('admin/new_product')?> method='post' id="form" enctype="multipart/form-data">
                    <div class="card-body">
                    <div class="form-group">
                        <label>Designation</label>
                        <input type="text" class="form-control" name="designation">
                    </div>
                    <div class="row">
                        <div class="form-group col-md-9">
                            <label>Prix</label>
                            <div class="input-group">
                                <input type="number" class="form-control" name="prix" min=1>                            
                            </div>
                        </div>    

                        <div class="form-group col-md-2">
                            <label>Devise</label>
                            <select class="form-control" name="devise">
                                <option value="$">$</option>
                                <option value="FC">FC</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                      <label>Categorie</label>
                      <select class="form-control" name="categorie">
                        <?php
                            foreach($categ as $c){
                        ?>
                        <option value=<?=$c->id?>><?=$c->nom?></option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                        <label for="comment">Description</label>
                        <textarea class="form-control" rows="10" id="comment" name="description"></textarea>                        
                    </div>              
                    <div class="form-group row">
                        <div class="col-md-6">       
                            <label>Nombre d'image</label>                   
                            <div class="input-group">
                                <input type="number" class="form-control" id="nbimg" name="nbimg">
                            </div>
                            <p id="error_img" style="color:red" hidden>Veuillez remplir ce champ</p>
                            <p id="error_nb_img" style="color:red" hidden>Vous ne pouvez avoir qu'au plus 6 images</p>
                        </div>
                        <div class="col-md-2">
                            <br>
                            <button id="choisir" class="btn btn-info" style="margin-top:10px">Choisir</button>
                        </div>
                    </div>   
                    <div id="img-space" class="offset-md-4" hidden></div>

                    <div class="row">
                        <div class="col-md-2 offset-md-5">
                            <button class="btn btn-info" id="valider">Valider</button>
                        </div>
                    </div>   
                    </form>
                </div>                
                
                
            </div>
        </div>
    </section>
</div>

<script>
    $(function(){
        $('#choisir').click(function(e)
        {
            e.preventDefault();
            console.log($('#nbimg').val());

            if($('#nbimg').val() == '')
            {
                $('#error_img').removeAttr('hidden');
            }else if($('#nbimg').val() > 6){
                $('#error_nb_img').removeAttr('hidden');
            }
            else
            {
                $.post("<?=site_url('ajax/nb_image')?>",{nbimg:$('#nbimg').val()},function(response){
                    
                    $('#img-space').removeAttr('hidden');
                    $('#img-space').html(response);

                    $('.btn-image').click(function(e)
                    {
                        e.preventDefault();
                        console.log('kvs');
                        var id = e.target.getAttribute('id').split('-')[2];

                        $('#img-'+id).click();

                        $('#img-'+id).change(function(e) 
                            {
                                if ($('#img-'+id).val() != '') 
                                {
                                    $('#small-img' + id).html($('#img-' + id).val());
                                }
                            })
                    });
                })
            }
        });

       $('#nbimg').click(function(e){
           $('#error_img').attr('hidden','hidden');
           $('#error_nb_img').attr('hidden','hidden');
       })
        
    })
</script>