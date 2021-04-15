<div class="main-content">
    <section class="section">
    <div class="row">
        <div class="col-lg-12">
            <!-- Support tickets -->
            <div class="card">
                <div class="card-header">
                    <h4><?=$message[0]->subject?></h4>   
                </div>
                <?php
                    foreach($message as $m)
                    {
                ?>
                    <div class="card-body">
                        <div class="support-ticket media pb-1 mb-3">
                            <i data-feather="mail"></i>
                            <div class="media-body ml-3">
                                <span class="font-weight-bold"></span>
                                <p class="my-1"><?=$m->message?></p>
                                <small class="text-muted">envoyé par <span class="font-weight-bold font-13"><?=$m->sender?></span>
                    &nbsp;&nbsp; - <?=$m->date?></small>
                            </div>
                        </div>     
                <?php
                }
                ?>
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <form action=<?=site_url('admin/send_mail')?> method="post" class="form-group">
                                <textarea name="message" id="message" rows='10' cols="100" class="form-control"></textarea>
                                <input type="text" name="subject" value=<?=$message[0]->subject?> hidden>   
                                <input type="text" name="sender" value=<?=$message[0]->sender?> hidden>
                                <input type="text" name="email" value=<?=$message[0]->email?> hidden> 
                                <input type="text" name="id" value=<?=$message[0]->id?> hidden>    
                        </div>                   
                    </div>
                    <div class="row">
                        <div class="col-md-10 text-right">
                            <button class="btn btn-info" type="submit">Repondre</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <!-- Support tickets -->
        </div>
    </div>
    </section>
</div>