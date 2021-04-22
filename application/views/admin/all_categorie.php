<?php
    if($this->session->categorie_ajoute){
?>
    <script>
        swal("Bon travail", "Categorie ajouté avec succès", "success");
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
                        <h4>Categories</h4>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <?php
                                    foreach($categorie as $c)
                                    {
                                ?>
                                    <tr>
                                        <td style="width:200px"><?=$c->nom?></td>
                                        <td>
                                            <form id="form-delete-cat" onclick='javascript:confirmation($(this));return false;'action="<?=site_url("admin/delete_cat")?>" method="post" style="float:right;">                                
                                                <input type="hidden" value="<?=$c->id?>" name="id">
                                                <button class="btn btn-info" id="delete-cat">Supprimer</button>
                                            </form> 
                                        </td>
                                    </tr>
                                <?php
                                    }
                                ?>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 offset-md-3">
                            <form action=<?=site_url("admin/new_categorie")?> method="post" class="form-group">
                                <label for="categorie"><b>Nouvelle categorie</b></label>
                                <input type="text" name="categorie" class="form-control" required/>
                            
                        </div>
                        <div class="col-md-3">
                                <button  type="submit" style="margin-top:30px" class="btn btn-success">Ajouter</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>           
        </div>
    </section>
</div>


<script>
    var del = document.getElementById('delete-cat');
    var form = document.getElementById('form-delete-cat');

    del.addEventListener('click',function(e){
        e.preventDefault();
        form.click();
    }); 

    function confirmation(anchor)
    {
        swal({
            title: "Voulez-vous vraiment supprimmer cette categorie?",
            text: "Vous ne serez plus capable de la recuperer!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                swal("Categorie supprimée!", {
                icon: "success",
                });
                anchor.submit();
            } 
            });
    }  
    
</script>