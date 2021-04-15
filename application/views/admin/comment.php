<div class="main-content">
    <section class="section">
    <div class="row">
        <div class="col-lg-12">
            <!-- Support tickets -->
            <div class="card">
                <div class="card-header">
                    <h4>Commentaires</h4>
                </div>
                <?php
                    foreach($comment as $c)
                    {
                ?>
                    <div class="card-body">
                        <div class="support-ticket media pb-1 mb-3">
                        <span style="font-size:40px" class="iconify" data-icon="fe-comments" data-inline="false"></span>
                            <div class="media-body ml-3">
                                <a href=<?=site_url('admin/comment_detail?id='.$c->id)?> class="badge badge-pill badge-success mb-1 float-right" style="color:white">Ouvrir</a>
                                <span class="font-weight-bold"><?=$c->designation?></span>
                                <a href="javascript:void(0)"></a>
                                <p class="my-1"><?=$c->commentaire?></p>
                                <small class="text-muted">par <span class="font-weight-bold font-13"><?=$c->nom?></span>
                    &nbsp;&nbsp; - <?=$c->date?></small>
                            </div>
                        </div>                    
                    </div>
                <?php
                }
                ?>
            </div>
            <!-- Support tickets -->
        </div>
    </div>
    </section>
</div>