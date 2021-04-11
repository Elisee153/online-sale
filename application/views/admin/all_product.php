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
                                    <input type="text" class="form-control" placeholder="Recherche">
                                    <div class="input-group-btn">
                                        <button style="padding:8px" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped">
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
                                        <td><a href="#" class="btn btn-outline-primary">Detail</a></td>
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