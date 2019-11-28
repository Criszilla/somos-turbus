<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <!--
      ---------------------------------------------------------------------------------------------------------------------
      ----------------------------------------------------HEADER-----------------------------------------------------------
      ---------------------------------------------------------------------------------------------------------------------
  -->
  <header>

    <?php 
      //$id_usuario= do_shortcode( '[swpm_show_member_info column="member_id"]'); 
      $GLOBALS['ID_USR'] = do_shortcode( '[swpm_show_member_info column="member_id"]');
      $ID_USR = $GLOBALS['ID_USR'];
    ?>

    <?php if(is_page(array('procedimientos')) or is_page(array('novedades')) or is_page(array('password-reset')) or is_page(array('membership-login')) or is_front_page() or is_search() or is_category()): ?>
      <div class="slider_home">		
          <div id="slider_home" class="owl-carousel owl-theme">
            <?php $conteofotos = 0;?>
            <?php  while ( have_rows('slider_principal','21') ) : the_row();
              $imagen_slider_principal = get_sub_field('imagen_slider_principal');
              $conteofotos++;
            ?>
            <div class="item">			
              <img src="<?php echo $imagen_slider_principal['url']; ?>" />
            </div>
            <?php endwhile;?>
          </div>
          <div class="mascara"><img src="<?php echo site_url().'/wp-content/uploads/2019/08/mascara.svg'; ?>" /></div>
      </div>
    <?php endif; ?>

    <!-- 
      ------------------------Slider Header Single-------------------------- 
    -->
    <?php if(is_single()): ?>
      <div class="slider_single">	
        <div class="slider_single_imagenes">
          <?php 
            $bg_img_nov = get_field('imagen_post_novedades');
            $bg_img_emb = get_field('imagen_post_embajadores');
            $bg_img_pros = get_field('imagen_post_procedimientos');

            if($bg_img_nov != ""){
              echo '<img class="single_img" src="'.$bg_img_nov['url'].'" />';
            }
             
            if($bg_img_emb != ""){
              echo '<img class="single_img" src="'.$bg_img_emb['url'].'" />';
            }
             
            if($bg_img_pros != ""){
              echo '<img class="single_img" src="'.$bg_img_pros['url'].'" />';
            }  
          ?>
          
        </div>
        <div class="mascara"><img src="<?php echo site_url().'/wp-content/uploads/2019/08/mascara.svg'; ?>" /></div>
      </div>
    <?php endif;?>

    <!-- 
      -------------------------------------------------Menú My place--------------------------------------------------- 
    -->

    <?php if(is_page(array('62'))): ?>

      <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#"><img src="<?php echo site_url().'/wp-content/uploads/2019/08/logo-myplace.svg'; ?>" width="150"/></a>
        <?php get_search_form(); ?>
        <ul class="navbar-nav px-3">
          <li class="nav-item text-nowrap">
            <?php if($ID_USR != ""){ ?>
              <a id="btn_show" class="btn btn-sm btn-success rounded-circle text-white"><i class="fas fa-user"></i></a> <span class="text-white"><?php echo do_shortcode('[swpm_show_member_info column="first_name"]'); ?></span>
              <a class="btn btn-sm btn-danger" href="#" title="Cerrar Sesión" data-toggle="modal" data-target="#modal_cerrarSesion" style="margin-left:10px;"><i class="fas fa-lock"></i></a>
            <?php }else { ?>
              <a class="btn-login btn btn-sm btn-success rounded-circle text-white d-none d-md-block" data-toggle="modal" data-target="#modal_iniciarSesion"><i class="fas fa-key"></i></a>
              <a id="btn_show" class="btn-login btn btn-sm btn-primary rounded-circle text-white d-md-none"><i class="fas fa-bars"></i></a>
            <?php } ?>
          </li>
        </ul>
      </nav>

    <?php else:?>

    <!-- 
      -------------------------------------------------Menú Principal--------------------------------------------------- 
    -->
    <?php if(is_front_page()): ?>
      <div id="main-menu" class="header-menu container-fluid">
          <div class="container">
            <div class="row">
              <div class="col-9 col-sm-3">
                <?php             
                  $custom_logo_id = get_theme_mod( 'custom_logo' );
                  $custom_logo_url = wp_get_attachment_image_url( $custom_logo_id , 'full' );
                  echo '<div class="logo-site"><a class="logo-site" href="'.site_url().'"><img src="' . esc_url( $custom_logo_url ) . '" alt=""></a></div>';            
                ?>
              </div>
              <div class="col-3 col-sm-9">
                <!-- Desktop Menu -->
                <div class="general-menu-desktop d-none d-md-block">
                  <nav class="nav-top navbar navbar-expand-lg justify-content-end">
                    <ul class="navbar-nav">
                      <li class="nav-item">
                        <form id="searchform" role="search" action="<?php echo site_url(); ?>" method="get" class="search-form-top hide">
                          <div class="input-group input-group-underlined">
                            <input id="s" type="search" placeholder="Buscar..." name="s" aria-label="buscar" aria-describedby="searchsubmit" class="form-control form-control-underlined pl-3">
                            <div class="input-group-append ml-0">
                              <button id="button-search" type="button" class="btn btn-underlined py-0"> 
                                <i class="fas fa-search"></i>
                              </button>
                            </div>
                          </div>
                        </form>
                        <a id="search-form-button" class="nav-link"><i class="fas fa-search"></i></a>
                      </li>
                      <!--<li class="nav-item">
                        <a id="btn_show" class="nav-link"><i class="fas fa-user-circle"></i></a>
                      </li>-->
                    </ul>
                  </nav>

                  <nav class="nav-bottom navbar navbar-expand-lg justify-content-end">
                    <ul class="navbar-nav">
                      <li class="nav-item active">
                        <a class="nav-link" href="#">Inicio</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#novedades">Novedades</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#programa">Programa</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#embajadores">Embajadores</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#protocolos">Protocolo</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#ganadores-insta">#Somos</a>
                      </li>
                      <li class="nav-item">
                        <?php if($ID_USR ==""){?>
                          <button id="btn_show" class="btn btn-outline-light"><i class="fas fa-user-circle"></i> Entrar</button>
                        <?php }else{ ?>
                          <button id="btn_show" class="btn btn-outline-light">Mi Menú <i class="fas fa-arrow-alt-circle-right"></i></button>
                        <?php }?>
                      </li>
                    </ul>
                  </nav>   
                </div>
                <button class="btn btn-sm d-md-none btn-display-general-menu btn-success rounded-circle" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i class="fas fa-bars"></i></button>
              </div>
            </div>

            <!--Mobile Menu-->
            <div class="row">
              <div class="col">                
                <div class="general-menu-mobile d-md-none">
                  <div class="collapse" id="collapseExample">
                    <nav class="nav-collapse">
                      <ul>
                        <li>
                          <a href="#">Inicio</a>
                        </li>
                        <li>
                          <a href="#novedades">Novedades</a>
                        </li>
                        <li>
                          <a href="#programa">Programa</a>
                        </li>
                        <li>
                          <a href="#embajadores">Embajadores</a>
                        </li>
                        <li>
                          <a href="#protocolos">Protocolo</a>
                        </li>
                        <li>
                          <a href="#ganadores-insta">#Somos</a>
                        </li>
                        <li>
                          <?php if ($ID_USR==""){echo '<a id="btn_show3">Iniciar Sesión</a>';}else{echo '<a href="'.site_url().'/my-place/">Acceder a Mi Espacio</a>';} ?>  
                        </li>
                        <li>
                          <?php get_search_form(); ?>
                        </li>
                      </ul>
                    </nav>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>

        <!-- Scroll Menu -->
        <div id="main-menu2" class="header-menu container-fluid bg-light esconder-menu">
          <div class="container">
            <div class="row">
              <div class="col-9 col-sm-4">
                <?php             
                  $custom_logo_id = get_theme_mod( 'custom_logo' );
                  $custom_logo_url = wp_get_attachment_image_url( $custom_logo_id , 'full' );
                  echo '<div class="logo-site"><a href="'.site_url().'"><img src="' . esc_url( $custom_logo_url ) . '" alt=""></a></div>';            
                ?>
              </div>
              <div class="col-3 col-sm-8">
                <!-- Desktop Menu -->
                <div class="general-menu-desktop d-none d-md-block">
                  <nav class="nav-top navbar navbar-expand-lg justify-content-end">
                    <ul class="navbar-nav">
                      <li class="nav-item">
                        <form id="searchform" role="search" action="<?php echo site_url(); ?>" method="get" class="search-form-top2 hide">
                          <div class="input-group input-group-underlined">
                            <input id="s" type="search" placeholder="Buscar..." name="s" aria-label="buscar" aria-describedby="searchsubmit" class="form-control form-control-underlined pl-3">
                            <div class="input-group-append ml-0">
                              <button id="button-search" type="button" class="btn btn-underlined py-0"> 
                                <i class="fas fa-search"></i>
                              </button>
                            </div>
                          </div>
                        </form>
                        <a id="search-form-button2" class="nav-link"><i class="fas fa-search"></i></a>
                      </li>
                      <!--<li class="nav-item">
                        <a id="btn_show2" class="nav-link"><i class="fas fa-user-circle"></i></a>
                      </li>-->
                    </ul>
                  </nav>

                  <nav class="nav-bottom navbar navbar-expand-lg justify-content-end mt-1 mb-1">
                    <ul class="scroll-nav navbar-nav">
                      <li class="nav-item current">
                        <a class="nav-link" href="#">Inicio</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#novedades">Novedades</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#programa">Programa</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#embajadores">Embajadores</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#protocolos">Protocolo</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#ganadores-insta">#Somos</a>
                      </li>
                      <?php if($ID_USR ==""){?>
                          <button id="btn_show2" class="btn btn-outline-dark"><i class="fas fa-user-circle"></i> Entrar</button>
                        <?php }else{ ?>
                          <button id="btn_show2" class="btn btn-outline-secondary" style="margin-left:10px;">Mi Menú <i class="fas fa-arrow-alt-circle-right"></i></button>
                        <?php }?>
                    </ul>
                  </nav>
                </div>

                <button class="btn btn-sm d-md-none btn-display-general-menu btn-success rounded-circle" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i class="fas fa-bars"></i></button>

              </div>          
              
            </div>

            <!--Mobile Menu-->
            <div class="row">
                <div class="col">                
                  <div class="general-menu-mobile d-md-none">
                    <div class="collapse" id="collapseExample">
                      <nav class="nav-collapse">
                        <ul>
                          <li>
                            <a href="#">Inicio</a>
                          </li>
                          <li>
                            <a href="#novedades">Novedades</a>
                          </li>
                          <li>
                            <a href="#programa">Programa</a>
                          </li>
                          <li>
                            <a href="#embajadores">Embajadores</a>
                          </li>
                          <li>
                            <a href="#protocolos">Protocolo</a>
                          </li>
                          <li>
                            <a href="#ganadores-insta">#Somos</a>
                          </li>
                          <li>
                            <?php if ($ID_USR==""){echo '<a id="btn_show4">Iniciar Sesión</a>';}else{echo '<a href="'.site_url().'/my-place/">Acceder a Mi Espacio</a>';} ?>                          
                          </li>
                          <li style="padding:10px 0px;">
                            <?php get_search_form(); ?>
                          </li>
                        </ul>
                      </nav>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
      
      <?php else: ?>
      <!--
        MENÚ VISIBLE EN LAS PAGINAS INTERNAS
      -->
      <div id="main-menu" class="header-menu container-fluid">
          <div class="container">
            <div class="row">
              <div class="col-9 col-sm-3">
                <?php             
                  $custom_logo_id = get_theme_mod( 'custom_logo' );
                  $custom_logo_url = wp_get_attachment_image_url( $custom_logo_id , 'full' );
                  echo '<div class="logo-site"><a class="logo-site" href="'.site_url().'"><img src="' . esc_url( $custom_logo_url ) . '" alt=""></a></div>';            
                ?>
              </div>
              <div class="col-3 col-sm-9">
                <!-- Desktop Menu -->
                <div class="general-menu-desktop d-none d-md-block">
                  <nav class="nav-top navbar navbar-expand-lg justify-content-end">
                    <ul class="navbar-nav">
                      <li class="nav-item">
                        <form id="searchform" role="search" action="<?php echo site_url(); ?>" method="get" class="search-form-top hide">
                          <div class="input-group input-group-underlined">
                            <input id="s" type="search" placeholder="Buscar..." name="s" aria-label="buscar" aria-describedby="searchsubmit" class="form-control form-control-underlined pl-3">
                            <div class="input-group-append ml-0">
                              <button id="button-search" type="button" class="btn btn-underlined py-0"> 
                                <i class="fas fa-search"></i>
                              </button>
                            </div>
                          </div>
                        </form>
                        <a id="search-form-button" class="nav-link"><i class="fas fa-search"></i></a>
                      </li>
                      <!--<li class="nav-item">
                        <a id="btn_show" class="nav-link"><i class="fas fa-user-circle"></i></a>
                      </li>-->
                    </ul>
                  </nav>

                  <nav class="nav-bottom navbar navbar-expand-lg justify-content-end">
                    <ul class="navbar-nav">
                      <li class="nav-item active">
                        <a class="nav-link" href="<?php echo site_url(); ?>">Inicio</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url().'/novedades'; ?>">Novedades</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url().'#programa'; ?>">Programa</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url().'#embajadores'; ?>">Embajadores</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url().'#protocolos'; ?>">Protocolo</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url().'#ganadores-insta'; ?>">#Somos</a>
                      </li>
                      <li class="nav-item">
                        <?php if($ID_USR ==""){?>
                          <button id="btn_show" class="btn btn-outline-light"><i class="fas fa-user-circle"></i> Entrar</button>
                        <?php }else{ ?>
                          <button id="btn_show" class="btn btn-outline-light">Mi Menú <i class="fas fa-arrow-alt-circle-right"></i></button>
                        <?php }?>
                      </li>
                    </ul>
                  </nav>   
                </div>
                <button class="btn btn-sm d-md-none btn-display-general-menu btn-success rounded-circle" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i class="fas fa-bars"></i></button>
              </div>
            </div>

            <!--Mobile Menu-->
            <div class="row">
              <div class="col">                
                <div class="general-menu-mobile d-md-none">
                  <div class="collapse" id="collapseExample">
                    <nav class="nav-collapse">
                      <ul>
                        <li>
                          <a href="#">Inicio</a>
                        </li>
                        <li>
                          <a href="#novedades">Novedades</a>
                        </li>
                        <li>
                          <a href="#programa">Programa</a>
                        </li>
                        <li>
                          <a href="#embajadores">Embajadores</a>
                        </li>
                        <li>
                          <a href="#protocolos">Protocolo</a>
                        </li>
                        <li>
                          <a href="#ganadores-insta">#Somos</a>
                        </li>
                        <li>
                          <?php if ($ID_USR==""){echo '<a id="btn_show3">Iniciar Sesión</a>';}else{echo '<a href="'.site_url().'/my-place/">Acceder a Mi Espacio</a>';} ?>  
                        </li>
                        <li>
                          <?php get_search_form(); ?>
                        </li>
                      </ul>
                    </nav>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>

        <!-- Scroll Menu -->
        <div id="main-menu2" class="header-menu container-fluid bg-light esconder-menu">
          <div class="container">
            <div class="row">
              <div class="col-9 col-sm-4">
                <?php             
                  $custom_logo_id = get_theme_mod( 'custom_logo' );
                  $custom_logo_url = wp_get_attachment_image_url( $custom_logo_id , 'full' );
                  echo '<div class="logo-site"><a href="'.site_url().'"><img src="' . esc_url( $custom_logo_url ) . '" alt=""></a></div>';            
                ?>
              </div>
              <div class="col-3 col-sm-8">
                <!-- Desktop Menu -->
                <div class="general-menu-desktop d-none d-md-block">
                  <nav class="nav-top navbar navbar-expand-lg justify-content-end">
                    <ul class="navbar-nav">
                      <li class="nav-item">
                        <form id="searchform" role="search" action="<?php echo site_url(); ?>" method="get" class="search-form-top2 hide">
                          <div class="input-group input-group-underlined">
                            <input id="s" type="search" placeholder="Buscar..." name="s" aria-label="buscar" aria-describedby="searchsubmit" class="form-control form-control-underlined pl-3">
                            <div class="input-group-append ml-0">
                              <button id="button-search" type="button" class="btn btn-underlined py-0"> 
                                <i class="fas fa-search"></i>
                              </button>
                            </div>
                          </div>
                        </form>
                        <a id="search-form-button2" class="nav-link"><i class="fas fa-search"></i></a>
                      </li>
                      <!--<li class="nav-item">
                        <a id="btn_show2" class="nav-link"><i class="fas fa-user-circle"></i></a>
                      </li>-->
                    </ul>
                  </nav>

                  <nav class="nav-bottom navbar navbar-expand-lg justify-content-end mt-1 mb-1">
                    <ul class="scroll-nav navbar-nav">
                      <li class="nav-item current">
                        <a class="nav-link" href="#">Inicio</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#novedades">Novedades</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#programa">Programa</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#embajadores">Embajadores</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#protocolos">Protocolo</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#ganadores-insta">#Somos</a>
                      </li>
                      <?php if($ID_USR ==""){?>
                          <button id="btn_show2" class="btn btn-outline-dark"><i class="fas fa-user-circle"></i> Entrar</button>
                        <?php }else{ ?>
                          <button id="btn_show2" class="btn btn-outline-secondary" style="margin-left:10px;">Mi Menú <i class="fas fa-arrow-alt-circle-right"></i></button>
                        <?php }?>
                    </ul>
                  </nav>
                </div>

                <button class="btn btn-sm d-md-none btn-display-general-menu btn-success rounded-circle" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i class="fas fa-bars"></i></button>

              </div>          
              
            </div>

            <!--Mobile Menu-->
            <div class="row">
                <div class="col">                
                  <div class="general-menu-mobile d-md-none">
                    <div class="collapse" id="collapseExample">
                      <nav class="nav-collapse">
                        <ul>
                          <li>
                            <a href="#">Inicio</a>
                          </li>
                          <li>
                            <a href="#novedades">Novedades</a>
                          </li>
                          <li>
                            <a href="#programa">Programa</a>
                          </li>
                          <li>
                            <a href="#embajadores">Embajadores</a>
                          </li>
                          <li>
                            <a href="#protocolos">Protocolo</a>
                          </li>
                          <li>
                            <a href="#ganadores-insta">#Somos</a>
                          </li>
                          <li>
                            <?php if ($ID_USR==""){echo '<a id="btn_show4">Iniciar Sesión</a>';}else{echo '<a href="'.site_url().'/my-place/">Acceder a Mi Espacio</a>';} ?>                          
                          </li>
                          <li style="padding:10px 0px;">
                            <?php get_search_form(); ?>
                          </li>
                        </ul>
                      </nav>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>

      <?php endif; ?>

        <!--ELASTIC MENU-->
        <div id="elastic-menu" class="navigation">
          <div class="navigation__inner">
            <div class="cerrar-elastic">
              <a id="btn_close" class="text-success"><i class="fas fa-times"></i></a>
            </div>
            <div class="content-elastic">
              <?php if($ID_USR == ""){?>
                <h2 class="title-login">Iniciar Sesión</h2>
                <?php echo do_shortcode( '[swpm_login_form]' );?>
              <?php }else{?>
                <h5>Bienvenido(a):</h5><br>
                <h2><?php echo do_shortcode('[swpm_show_member_info column="first_name"] [swpm_show_member_info column="last_name"]'); ?></h2>
                <div class="row" style="margin-top:30px;">
                  <div class="col-sm-6">
                    <a class="btn btn-sm btn-success w-100" href="<?php echo site_url(); ?>/my-place/"><i class="fas fa-sign-in-alt"></i> Mi Espacio</a>
                  </div>
                  <div class="col-sm-6">
                    <a class="btn btn-sm btn-danger" href="#" data-toggle="modal" data-target="#modal_cerrarSesion"><i class="fas fa-lock"></i> Cerrar Sesión</a>
                  </div>                  
                </div>
              <?php }?>
            </div>        
          </div>
        </div>     

    <?php endif; ?>

    <div id="respuesta-login"></div>

  </header>
