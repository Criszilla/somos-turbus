<?php
/**
 * Template Name: My Place
 */

  $postTitleError = '';
  
  if(isset( $_POST['submitted'])){  
      if (trim( $_POST['postTitle']) === '' ) {
          $postTitleError = 'Please enter a title.';
          $hasError = true;
      }  
  }
    get_template_part('includes/header'); 
    b4st_main_before();
?>


  <?php if ($ID_USR !=""){ ?>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-2 d-none d-md-block sidebar">
          <div class="row mt-5">
            <div class="col bienvenida-intra">
              <?php $tipo_usuario = do_shortcode('[swpm_show_member_info column="membership_level_name"]'); ?>
              <h4>Bienvenido(a):</h4>
              <h2><?php echo do_shortcode('[swpm_show_member_info column="first_name"] [swpm_show_member_info column="last_name"]'); ?></h2>
              <h6><?php echo $tipo_usuario; ?></h6>
            </div>
          </div>

          <hr>

          <div class="row">
            <div class="d-flex flex-column col w-100" style="height: calc(100vh - 192px); overflow: hidden;">
              <nav class="menu-intra">
                <ul class="nav">
                  <?php if($tipo_usuario == "Usuario admin"){?>
                    <li>
                      <a id="dashboard-tab" class="active" href="#dashboard" data-toggle="tab" aria-controls="dashboard" aria-selected="true"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
                    </li>                  
                    
                    <li>
                      <a id="cliente-incognito-tab" href="#cliente-incognito" data-toggle="tab" aria-controls="cliente-incognito" aria-selected="false"><i class="fas fa-mask"></i>Cliente Incógnito</a>
                    </li>

                    <li>
                      <a id="mi-perfil-tab" href="#mi-perfil" data-toggle="tab" aria-controls="mi-perfil" aria-selected="false"><i class="fas fa-user-edit"></i>Mi Perfil</a>
                    </li>

                    <li>
                      <a id="embajadores-tab" href="#embajadores" data-toggle="tab" aria-controls="embajadores" aria-selected="false"><i class="fas fa-flag"></i>Embajadores</a>
                    </li>
                    
                    <!--<li>
                      <a data-toggle="collapse" href="#collapse-mantenedores" role="button" aria-expanded="false" aria-controls="collapse-mantenedores"><i class="fas fa-cog"></i> Mantenedores</a>
                      <li class="collapse sub-menu-intra" id="collapse-mantenedores">
                        <a id="novedades-tab" href="#novedades" data-toggle="tab" aria-controls="novedades" aria-selected="false"><i class="far fa-newspaper"></i> Novedades</a>
                        <a id="procedimientos-tab" href="#procedimientos" data-toggle="tab" aria-controls="procedimientos" aria-selected="false"><i class="fas fa-folder-open"></i> Procedimientos</a>
                      </li>
                    </li>-->
                  <?php } ?>

                  <?php if($tipo_usuario == "Embajador"){?>
                    <li>
                      <a id="embajadores-tab" class="active" href="#embajadores" data-toggle="tab" aria-controls="embajadores" aria-selected="false"><i class="fas fa-flag"></i>Embajadores</a>
                    </li>

                    <li>
                      <a id="mi-perfil-tab" href="#mi-perfil" data-toggle="tab" aria-controls="mi-perfil" aria-selected="false"><i class="fas fa-user-edit"></i>Mi Perfil</a>
                    </li>                    
                  <?php } ?>

                  <?php if($tipo_usuario == "Usuario"){?>
                    <li>
                      <a id="cliente-incognito-tab" class="active" href="#cliente-incognito" data-toggle="tab" aria-controls="cliente-incognito" aria-selected="false"><i class="fas fa-mask"></i>Cliente Incógnito</a>
                    </li>

                    <li>
                      <a id="mi-perfil-tab" href="#mi-perfil" data-toggle="tab" aria-controls="mi-perfil" aria-selected="false"><i class="fas fa-user-edit"></i>Mi Perfil</a>
                    </li>                    
                  <?php } ?>
                </ul>
              </nav>
              
              <div class="accordion mt-auto w-100" id="accordionExample">
                <a class="btn-volver-intra w-100" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                  <i class="fas fa-arrow-alt-circle-left"></i> VOLVER
                </a>

                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                  <div class="botones-volver">
                    <a class="w-100 text-left" href="<?php echo site_url(); ?>"><i class="fas fa-home"></i> Inicio</a>
                    <a class="w-100 text-left" href="<?php echo site_url().'/novedades'; ?>"><i class="fas fa-newspaper"></i> Novedades</a>
                    <a class="w-100 text-left" href="<?php echo site_url().'/procedimientos'; ?>"><i class="fas fa-project-diagram"></i> Procedimientos</a>
                  </div>
                </div>  
              </div>
            </div>
          </div>
        </div>

          
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <?php if(have_posts()): while(have_posts()): the_post(); ?>

          <!--
            ---------------------------------------------------------------------------------------------------------------------
            -----------------------------------------TABS PRINCIPALES------------------------------------------------------------
            ---------------------------------------------------------------------------------------------------------------------
          -->
          
          <div class="tab-content">
            <!-- 
                -------------------------------------------------Dashboard------------------------------------------------------- 
            -->
            <?php if($tipo_usuario == "Usuario admin"){?>
              <div id="dashboard" class="tab-pane fade <?php if($tipo_usuario == "Usuario admin"){echo "show active";}?>" role="tabpanel" aria-labelledby="dashboard-tab">

                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                  <h1 class="h2"><i class="fas fa-tachometer-alt"></i> Dashboard</h1>            
                </div>

                <div class="row"></div>              
              </div>
            <?php } ?>

            <!-- 
                ---------------------------------------------Cliente Incógnito-------------------------------------------------- 
            -->
            <?php if($tipo_usuario == "Usuario admin" OR $tipo_usuario == "Usuario" ){?>
            <div id="cliente-incognito" class="tab-pane fade <?php if($tipo_usuario == "Usuario"){echo "show active";}?>" role="tabpanel" aria-labelledby="cliente-incognito-tab">
              <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                <h1 class="h2"><i class="fas fa-mask"></i> Cliente Incógnito</h1>            
              </div>

              <?php echo do_shortcode('[ipt_fsqm_form id="52"]');?>
            </div>
            <?php } ?>
            <!-- 
                ---------------------------------------------Mi perfil-------------------------------------------------- 
            -->
            <div id="mi-perfil" class="tab-pane fade" role="tabpanel" aria-labelledby="mi-perfil-tab">
              <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                <h1 class="h2"><i class="fas fa-user-edit"></i> Mi Perfil</h1>            
              </div>
              <?php echo do_shortcode('[swpm_profile_form]');?>
            </div>

            <!-- 
                ---------------------------------------------Embajadores-------------------------------------------------- 
            -->
            <?php if($tipo_usuario == "Usuario admin" OR $tipo_usuario == "Embajador" ){?>
            <div id="embajadores" class="tab-pane fade <?php if($tipo_usuario == "Embajador"){echo "show active";}?>" role="tabpanel" aria-labelledby="embajadores-tab">
              <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                <h1 class="h2"><i class="fas fa-flag"></i> Embajadores</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                  <button class="btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#modal_sharedFiles"><i class="fas fa-folder"></i> Archivos Compartidos</button>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-4">
                  <div id="comentarios-myplace">
                    <div class="lista-comentario"><?php comments_template();?></div>
                  </div>
                </div>
                <div class="col-sm-8">
                  <div id="post-embajadores-myplace">
                  <?php 
                      $post_embajadores = new WP_Query(array(
                          'post_type'     => array('embajadores'),
                          'posts_per_page'  => -1,
                          'post_status'   => 'publish',
                          'orderby'       => 'menu_order date',
                          'order'         => 'DESC',
                      ));
                  ?>
                    <?php            
                      if ($post_embajadores->have_posts() ) : 
                          $conteo_post_embajadores = 0;
                          while ( $post_embajadores->have_posts() ) : $post_embajadores->the_post();
                          $conteo_post_embajadores++;
                          ?>
                          <div class="row bg-white border-bottom">
                            <div class="col-2">
                              <?php the_post_thumbnail( array(50, 50),array( 'class' => 'rounded-circle' ) );?>
                            </div>
                            <div class="col-8">
                              <h5 class="post-title-embajador-myplace"><?php the_title(); ?></h5>
                              <div class="resumen-post-embajador-myplace"><?php the_excerpt(); ?><a class="leer-mas" href="<?php the_permalink();?>">Leer más...</a></div>
                            </div>
                            <div class="col-2">
                              <a class="btn btn-sm btn-success" href="<?php the_permalink(); ?>">Ver más</a>
                            </div>
                          </div>
                          <?php endwhile;?>
                          <?php wp_reset_postdata(); ?>
                                
                      <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>

            <!-- 
                ---------------------------------------------Novedades-------------------------------------------------- 
            -->
            <!--<div id="novedades" class="tab-pane fade" role="tabpanel" aria-labelledby="novedades-tab">

              <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                <h1 class="h2"><i class="far fa-newspaper"></i> Mantenedor de Novedades</h1>            
              </div>

              <form id="post_novedades" name="post_novedades" method="post" enctype="multipart/form-data">
                <p>
                  <input type="text" name="titulo_post_novedades" placeholder="Escribe el titulo de la entrada" />
                </p>
                <p>
                  <?php /*wp_editor(
                    $post_obj->post_content,'userpostcontent', 
                    array('textarea_name' => 'contenido', 'media_buttons' => 'true'));*/

                    /*$content_novedades = 'Ingresa aqui tu contenido';
                    $editor_id_novedades = 'contenido_post_novedades';
                    $settings_novedades =   array(
                        'wpautop' => true, // use wpautop?
                        'media_buttons' => true, // show insert/upload button(s)
                        'textarea_name' => $editor_id_novedades, // set the textarea name to something different, square brackets [] can be used here
                        'textarea_rows' => get_option('default_post_edit_rows', 10), // rows="..."
                        'tabindex' => '',
                        'editor_css' => '', //  extra styles for both visual and HTML editors buttons, 
                        'editor_class' => '', // add extra class(es) to the editor textarea
                        'teeny' => false, // output the minimal editor config used in Press This
                        'dfw' => false, // replace the default fullscreen with DFW (supported on the front-end in WordPress 3.4)
                        'tinymce' => true, // load TinyMCE, can be used to pass settings directly to TinyMCE using an array()
                        'quicktags' => true // load Quicktags, can be used to pass settings directly to Quicktags using an array()
                    );

                    wp_editor( $content_novedades, $editor_id_novedades, $settings_novedades = array() );*/
                    ?>
                </p>

                <p>
                  <?php //wp_dropdown_categories( 'show_option_none=Category&tab_index=4&taxonomy=category' ); ?>
                </p>

                <p>
                  <input type="submit" value="Enviar Post" />
                </p>                

                <?php //wp_nonce_field('post_novedades'); ?>
              </form>

              <?php 
               /*$mi_post_novedades = array(
                  'post_title' => wp_strip_all_tags($_POST['titulo_post_novedades']),
                  'post_content' => $_POST['contenido_post_novedades'],
                  'post_type' => 'post',
                  'post_status' => 'pending',
                  'post_author' => $user_id
                );

                $nuevo_post_novedades = wp_insert_post($mi_post_novedades);*/
              ?>

            </div>-->

            <!-- 
                ---------------------------------------------Procedimientos-------------------------------------------------- 
            -->
            <!--<div id="procedimientos" class="tab-pane fade" role="tabpanel" aria-labelledby="procedimientos-tab">

              <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                <h1 class="h2"><i class="fas fa-folder-open"></i> Mantenedor de Procedimientos</h1>            
              </div>
            
              <form id="post_procedimientos" name="post_procedimientos" method="post" enctype="multipart/form-data">
                <p>
                  <input type="text" name="titulo_post_procedimientos" placeholder="Escribe el titulo de la entrada" />
                </p>
                <p>
                  <?php /*wp_editor(
                    $post_obj->post_content,'userpostcontent', 
                    array('textarea_name' => 'contenido', 'media_buttons' => 'true'));*/

                    /*$content_procedimientos = 'Ingresa aqui tu contenido';
                    $editor_id_procedimientos = 'contenido_post_procedimientos';
                    $settings_procedimientos =   array(
                        'wpautop' => true, // use wpautop?
                        'media_buttons' => true, // show insert/upload button(s)
                        'textarea_name' => $editor_id_procedimientos, // set the textarea name to something different, square brackets [] can be used here
                        'textarea_rows' => get_option('default_post_edit_rows', 10), // rows="..."
                        'tabindex' => '',
                        'editor_css' => '', //  extra styles for both visual and HTML editors buttons, 
                        'editor_class' => '', // add extra class(es) to the editor textarea
                        'teeny' => false, // output the minimal editor config used in Press This
                        'dfw' => false, // replace the default fullscreen with DFW (supported on the front-end in WordPress 3.4)
                        'tinymce' => true, // load TinyMCE, can be used to pass settings directly to TinyMCE using an array()
                        'quicktags' => true // load Quicktags, can be used to pass settings directly to Quicktags using an array()
                    );

                    wp_editor( $content_procedimientos, $editor_id_procedimientos, $settings_procedimientos = array() );*/
                    ?>
                </p>

                <p>
                  <?php //wp_dropdown_categories( 'show_option_none=Category&tab_index=4&taxonomy=category' ); ?>
                </p>

                <p>
                  <input type="submit" value="Enviar Post" />
                </p>                

                <?php //wp_nonce_field('post_procedimientos'); ?>
              </form>

              <?php 
               /*$mi_post_procedimientos = array(
                  'post_title' => wp_strip_all_tags($_POST['titulo_post_procedimientos']),
                  'post_content' => $_POST['contenido_post_procedimientos'],
                  'post_type' => 'post',
                  'post_status' => 'pending',
                  'post_author' => $user_id
                );

                $nuevo_post_procedimientos = wp_insert_post($mi_post_procedimientos);*/
              ?>

            </div>-->

          </div>

          <?php
            endwhile;
            else :
              get_template_part('includes/loops/404');
            endif;
          ?>
        </main>
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->


  <?php }else{ ?>
    <div class="container-fluid">
      <div class="row">
        <main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
          <?php if(have_posts()): while(have_posts()): the_post(); ?>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2"><?php the_title()?></h1>
            
          </div>
          <?php the_content()?>

          <?php
            endwhile;
            else :
              get_template_part('includes/loops/404');
            endif;
          ?>
        </main>
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  <?php }?>

<?php
    b4st_main_after();
    get_template_part('includes/footer_myplace');
?>

