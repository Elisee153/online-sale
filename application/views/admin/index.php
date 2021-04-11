 <!-- Main Content -->
 <div class="main-content">
    <section class="section">
        <div class="row ">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row ">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                    <div class="card-content">
                                        <h5 class="font-15">Categories</h5>
                                        <h2 class="mb-3 font-18"><?=count($categorie)?></h2>                              
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                    <div class="banner-img">
                                        <img src="assets/img/banner/1.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row ">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                    <div class="card-content">
                                        <h5 class="font-15"> Produits</h5>
                                        <h2 class="mb-3 font-18"><?=count($produit)?></h2>                                       
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                    <div class="banner-img">
                                        <img src="assets/img/banner/2.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row ">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                    <div class="card-content">
                                        <h5 class="font-15">Messages</h5>
                                        <h2 class="mb-3 font-18"><?=count($mes)?></h2>
                                        <p class="mb-0"><span class="col-green"><?=count($mes_non_lu)?></span> non lus</p>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                    <div class="banner-img">
                                        <img src="assets/img/banner/message.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row ">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                    <div class="card-content">
                                        <h5 class="font-15">Commentaires</h5>
                                        <h2 class="mb-3 font-18"><?=count($com)?></h2>
                                        <p class="mb-0"><span class="col-green"><?=count($com_non_lu)?> </span>non lus</p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                    <div class="banner-img">
                                        <img src="assets/img/banner/4.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr><br>
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
                                foreach($produit as $p)
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
<hr><br>

    <div class="row">
        <div class="col-md-6 col-lg-12 col-xl-6">
            <!-- Support tickets -->
            <div class="card">
                <div class="card-header">
                    <h4>Messages</h4>
                </div>
                <?php
                    foreach($mes as $m)
                    {
                ?>
                    <div class="card-body">
                        <div class="support-ticket media pb-1 mb-3">
                            <img src="assets/img/avatar/avatar2.png" class="user-img mr-2" alt="">
                            <div class="media-body ml-3">
                                <div class="badge badge-pill badge-success mb-1 float-right">Ouvrir</div>
                                <span class="font-weight-bold"></span>
                                <a href="javascript:void(0)"><?=$m->subject?></a>
                                <p class="my-1"><?=$m->message?></p>
                                <small class="text-muted">envoyé par <span class="font-weight-bold font-13"><?=$m->sender?></span>
                    &nbsp;&nbsp; - <?=$m->date?></small>
                            </div>
                        </div>                    
                    </div>
                <?php
                }
                ?>
                <a href="javascript:void(0)" class="card-footer card-link text-center small ">Voir tout</a>
            </div>
            <!-- Support tickets -->
        </div>
        <div class="col-md-6 col-lg-12 col-xl-6">
            <!-- Support tickets -->
            <div class="card">
                <div class="card-header">
                    <h4>Commentaires</h4>
                </div>
                <?php
                    foreach($com_join as $c)
                    {
                        $tab = array_slice(explode(' ',$c->commentaire),0,4);
                        $com = implode(' ',$tab);
                ?>  
                    <div class="card-body">
                        <div class="support-ticket media pb-1 mb-3">
                            <img src="assets/img/avatar/avatar.png" class="user-img mr-2" alt="">
                            <div class="media-body ml-3">
                                <div class="badge badge-pill badge-success mb-1 float-right">Ouvrir</div>
                                <span class="font-weight-bold"></span>
                                <a href="javascript:void(0)"><?=$c->designation?></a>
                                <p class="my-1"><?=$com?>...</p>
                                <small class="text-muted">par <span class="font-weight-bold font-13"><?=$c->nom?></span>
                    &nbsp;&nbsp; <?=$c->date?></small>
                            </div>
                        </div>
                    </div>
                <?php
                    }
                ?>
                <a href="javascript:void(0)" class="card-footer card-link text-center small ">Voir tout</a>
            </div>
            <!-- Support tickets -->
        </div>
    </div>
</section>