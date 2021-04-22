
<section class="section" style="margin-top: 120px">
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">              
                <div class="card-header">
                <h4>Gerez vos informations</h4>
                </div>
                <div class="card-body">
                <form method="POST" action=<?=site_url('admin/profile')?> class="needs-validation" novalidate="">
                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input value="<?=$user[0]->name?>"id="name" type="text" class="form-control" name="name" tabindex="1" required autofocus>
                        <div class="invalid-feedback">
                            Veuillez saisir votre nom
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="username">Nom d'utilisateur</label>
                        <input value="<?=$user[0]->username?>"id="username" type="text" class="form-control" name="username" tabindex="1" required autofocus>
                        <div class="invalid-feedback">
                            Veuillez saisir votre nom d'utilisateur
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input value="<?=$user[0]->email?>"id="email" type="text" class="form-control" name="email" tabindex="1" required autofocus>
                        <div class="invalid-feedback">
                            Veuillez saisir votre adresse mail
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input value="<?=$user[0]->mdp?>"id="password" type="password" class="form-control" name="mdp" tabindex="2" required>
                        <div class="invalid-feedback">
                        Veuillez saisir votre mot de passe
                        </div>
                    </div>
                    <input type="text" value="<?=$user[0]->id?>" name="id" hidden>
                    <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                        Valider
                    </button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</section>