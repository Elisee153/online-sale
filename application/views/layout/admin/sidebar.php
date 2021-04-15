<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
        <a href="index.html" > <i style="color:blue" data-feather="shopping-cart"></i> <span
            class="logo-name">Sales</span>
        </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown active">
                <a href=<?=site_url('admin')?> class="nav-link"><i data-feather="monitor"></i><span>Acceuil</span></a>
            </li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i
                    data-feather="briefcase"></i><span>Produits</span></a>
                <ul class="dropdown-menu">
                <li><a class="nav-link" href=<?=site_url('admin/new_product')?>>Nouveau produit</a></li>
                <li><a class="nav-link" href=<?=site_url('admin/all_product')?>>Tous les produits</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="command"></i><span>Categories</span></a>
                <ul class="dropdown-menu">
                <li><a class="nav-link" href=<?=site_url('admin/all_categorie')?>>Toutes les categories</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="mail"></i><span>Mails</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href=<?=site_url('admin/all_mails')?>>Mails</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><span style="font-size:25px" class="iconify" data-icon="fe-comments" data-inline="false"></span></i><span>&nbsp; Commentaires</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href=<?=site_url('admin/all_comments')?>>Tous les commentaires</a></li>
                </ul>
            </li>
        </ul>
    </aside>
</div>