<?php 

$background = function($url){
   
    $url = ($url) ? $url : "http://placehold.it/1600x800?text=HEADER";
    
    echo 'style="background-image: url('.$url.');"';
};



?>




<header class="banner" <?php $background( get_field('header_background') ); ?> >
	
	<div class="container navigation">
	
		<a class="brand" href="<?= esc_url(home_url('/')); ?>">
    	
    			<div class="brand-logo"></div>
	
		</a>
		
		<div class="nav-phone">
			<span><a href="tel:0725625482">072 - 562 54 82</a></span>
		</div>
	
		<nav class="nav-primary">
    
      		<?php
    
            if (has_nav_menu('primary_navigation')) :
        
                wp_nav_menu([
            
                    'theme_location' => 'primary_navigation',
                
                    'menu_class' => 'nav'
            
                ]);
          
            endif;
        
            ?>
		
		</nav>
		

	</div>
	
	<div class="banner-content">
		<?php // TODO: If/else $header-content-line-( 1 | 2 ) | $header-content-btn-( 1 | 2 ) :?>
		<div class="container">		
    		<h1>Wij zijn indrukwekkend,</h1><?php // line 1 ?>
    		<h2>een partij om op te bouwen <span class="text-gray">|</span></h2><?php // line 2 ?>
    		<div class="buttons">
    			<a class="btn btn-lg btn-primary" href="/over-ons">Leer ons kennen</a><?php // btn 1 ?>
    			<a class="btn btn-lg btn-black" href="/cases">Bekijk ons werk</a><?php // btn 2 ?>
    		</div>
		</div>
	</div>

</header>
