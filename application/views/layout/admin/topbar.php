<div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <li>
                <a href="#" class="nav-link nav-link-lg fullscreen-btn" title="maximiser">
                    <i data-feather="maximize"></i>
                </a>
            </li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
              class="nav-link nav-link-lg message-toggle"><i data-feather="mail"></i>
              <?php 
                  if(count($mes_non_lu) >= 1){
                ?>
                 <span class="badge headerBadge1">
                <?=count($mes_non_lu)?> 
                </span>
              <?php
              }?>
             
            </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
              <div class="dropdown-header">
                Messages
              </div>
              <?php
                foreach($mes_non_lu as $m){
              ?>
                <div class="dropdown-list-content dropdown-list-message">
                  <a href="#" class="dropdown-item"> <span class="dropdown-item-avatar
                        text-white"> <img alt="image" src=<?=base_url("assets/img/avatar/avatar.png")?>)?> class="rounded-circle">
                    </span> <span class="dropdown-item-desc"> <span class="message-user"><?=$m->sender?></span>
                      <span class="time messege-text"><?=$m->subject?></span>
                      <span class="time"><?=$m->date?></span>
                    </span>
                  </a> 
                </div>
                <?php
                }
                ?>
              <div class="dropdown-footer text-center">
                <a href="#">Voir tout<i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src=<?=base_url("assets/img/avatar/avatar3.png")?>
                class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title">Hello <?=$this->session->nom?></div>
              <a href="profile.html" class="dropdown-item has-icon"> <i class="far fa-user"></i> 
                Profile
              </a>
              <div class="dropdown-divider"></div>
              <a href=<?=site_url("admin/logout")?> class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                Deconnexion
              </a>
            </div>
          </li>
        </ul>
      </nav>
   