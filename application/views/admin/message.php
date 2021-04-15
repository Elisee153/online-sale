<div class="main-content">
    <section class="section">
    <div class="row">
        <div class="col-lg-12">
            <!-- Support tickets -->
            <div class="card">
                <div class="card-header">
                    <h4>Messages</h4>
                </div>
                <?php
                    foreach($mail as $m)
                    {
                ?>
                    <div class="card-body">
                        <div class="support-ticket media pb-1 mb-3">
                            <i data-feather="mail"></i>
                            <div class="media-body ml-3">
                                <a href=<?=site_url('admin/mail_detail?id='.$m->id)?> class="badge badge-pill badge-success mb-1 float-right" style="color:white">Ouvrir</a>
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
            </div>
            <!-- Support tickets -->
        </div>
    </div>
    </section>
</div>