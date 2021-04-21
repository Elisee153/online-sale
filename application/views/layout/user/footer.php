<script src=<?=base_url("assets/user/vendors/jquery/jquery-3.2.1.min.js")?>></script>
<?php
    if($active_option == 'home')
    {
?>
    <script>
        $(function(){
            $('#home').addClass('active');
        })
    </script>
<?php
    }else{
?>
    <script>
        $(function(){
            $('#home').removeClass('active');
        })
    </script>
<?php
    }
?>
<?php
    if($active_option == 'product')
    {
?>
    <script>
        $(function(){
            $('#product').addClass('active');
        })
    </script>
<?php
    }else{
?>
    <script>
        $(function(){
            $('#product').removeClass('active');
        })
    </script>
<?php
    }
?>
<?php
    if($active_option == 'categorie')
    {
?>
    <script>
        $(function(){
            $('#categorie').addClass('active');
        })
    </script>
<?php
    }else{
?>
    <script>
        $(function(){
            $('#categorie').removeClass('active');
        })
    </script>
<?php
    }
?>
<?php
    if($active_option == 'contact')
    {
?>
    <script>
        $(function(){
            $('#contact').addClass('active');
        })
    </script>
<?php
    }else{
?>
    <script>
        $(function(){
            $('#contact').removeClass('active');
        })
    </script>
<?php
    }
?>
<?php
    if($active_option == 'about')
    {
?>
    <script>
        $(function(){
            $('#about').addClass('active');
        })
    </script>
<?php
    }else{
?>
    <script>
        $(function(){
            $('#about').removeClass('active');
        })
    </script>
<?php
    }
?>

<footer class="footer">
        <div class="footer-area">
            <div class="container">
                <div class="row section_gap">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-footer-widget tp_widgets">
                            <h4 class="footer_title large_title">Our Services</h4>
                            <ul class="list">
                               <li>Supply of crusher spares, conveyor belts, rollers and fasteners.</li>
                            
                            
                               <li> Supply of bearings and Plummer blocks.</li>
                        
                            
                               <li> Supply & Rehabilitation of gear boxes.</li>
                              
                            
                               <li> Supply of Lubricating Pumps.</li>
                             
                            
                                <li>Supply of Mill Liners and Rehabilitation of Mills, Vibrators and Shells.</li>
                             
                            
                            <li>Fabrication of all Mining Chutes, Grizzlly bars, Mounting frames ,Conies, Vibrator pans Fabrication and Installation of Mining structures.</li>
                            </ul> 
                        </div>
                    </div>
                    <div class="offset-lg-2 col-lg-2 col-md-6 col-sm-6">
                        <div class="single-footer-widget tp_widgets">
                            <h4 class="footer_title">Quick Links</h4>
                            <ul class="list">
                                <li><a href="<?=site_url("user/index")?>">Home</a></li>
                                <li><a href="<?=site_url("user/all_product")?>">Products</a></li>
                                <li><a href="<?=site_url("user/contact")?>">Contact</a></li>
                                <li><a href="<?=site_url("user/about")?>">About</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="offset-lg-2 col-lg-3 col-md-6 col-sm-6">
                        <div class="single-footer-widget tp_widgets">
                            <h4 class="footer_title">Contact Us</h4>
                            <div class="ml-40">
                                <p class="sm-head">
                                    <span class="fa fa-location-arrow"></span> Head Office
                                </p>
                                <p>5,avenue Nkulimba, Quartier Kassapa Commune Annexe</p>
                                <p class="sm-head">
                                    <span class="fa fa-phone"></span> Phone Number
                                </p>
                                <p>
                                    +243 823155262<br> +260 979 858 411 <br> +260 977 454 343 <br>+260 967 454 343
                                </p>
                                <p class="sm-head">
                                    <span class="fa fa-envelope"></span> Email
                                </p>
                                <p>
                                    bobpoba@surmpyengineering.com​<br>surmpy.engineering@yahoo.com​
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row d-flex">
                    <p class="col-lg-12 footer-text text-center">
                        Copyright &copy;
                        <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | made by DTeam
                    </p>
                </div>
            </div>
        </div>
    </footer>