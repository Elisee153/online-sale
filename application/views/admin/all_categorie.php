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
                                        <td><?=$c->nom?></td>
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
                                <button  type="submit" style="margin-top:30px" class="btn btn-info">Ajouter</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>           
        </div>
    </section>
</div>