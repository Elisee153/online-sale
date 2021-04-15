<div class="main-content">
    <section class="section">
    <div class="row">
        <div class="col-lg-12">
            <!-- Support tickets -->
            <div class="card">
                <div class="card-header">
                    <h4><?=$comment[0]->designation?></h4>   
                </div>
                <?php
                    foreach($comment as $c)
                    {
                ?>
                    <div class="card-body">
                        <div class="support-ticket media pb-1 mb-3">
                            <i data-feather="mail"></i>
                            <div class="media-body ml-3">
                                <span class="font-weight-bold"></span>
                                <p class="my-1"><?=$c->commentaire?></p>
                                <small class="text-muted">par <span class="font-weight-bold font-13"><?=$c->nom?></span>
                    &nbsp;&nbsp; - <?=$c->date?></small>
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