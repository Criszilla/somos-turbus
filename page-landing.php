<?php
/**
 * Template Name: Landing Home
 */

get_template_part('includes/header'); 
b4st_main_before();
?>

        <!--
            ---------------------------------------------------------------------------------------------------------------------
            -----------------------------------------------------MAIN------------------------------------------------------------
            ---------------------------------------------------------------------------------------------------------------------
        -->
        <main>
            <!-- 
                -------------------------------------------------Bienvenida--------------------------------------------------------- 
            -->
            <div class="container-fluid bienvenida">                
                <section class="container">
                    <div class="row">
                        <div class="col-sm">
                            <h1 class="page-title"><?php the_field('titulo_inicio_pagina_inicio'); ?></h1>
                            <div class="page-content"><?php the_field('texto_inicio_pagina_inicio'); ?></div>
                            
                            <?php 
                            $video_home = get_field('video_pagina_inicio'); 
                            
                            if($video_home !=""){                            
                            ?>

                            <div class="video-home text-center">
                                <a class="btn btn-light rounded-circle text-success" href="https://www.youtube.com/watch?v=<?php echo $video_home; ?>" data-fancybox><i class="fas fa-play"></i></a> <span>Ver video</span>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="col-sm">
                            <?php 
                            $tarjetas_home = get_field('tarjetas_pagina_inicio');  
                            
                            if($tarjetas_home != ""){
                                $numero_tarjeta = 0;  
                                while ( have_rows('tarjetas_pagina_inicio') ) : the_row();
                                    $titulo_tarjeta_home = get_sub_field('titulo_tarjeta_pagina_inicio');
                                    $contenido_tarjeta_home = get_sub_field('contenido_tarjeta_pagina_inicio');
                                    $boton_tarjeta_home = get_sub_field('boton_tarjeta_pagina_inicio');
                                    $imagen_tarjeta_home = get_sub_field('imagen_tarjeta_pagina_inicio');
                                    $numero_tarjeta++;
                            ?>
                                    <div class="card mb-3 shadow" <?php if(wp_is_mobile()){echo 'data-aos="fade-down"';}else{ echo 'data-aos="fade-left"';}?>>
                                        <div class="row no-gutters">
                                            <div class="col-4 col-md-4">
                                                <img src="<?php echo $imagen_tarjeta_home['url']; ?>" class="card-img" alt="...">
                                            </div>
                                            <div class="col-8 col-md-8">
                                                <div class="card-body">
                                                    <h5 class="card-title"><?php echo $titulo_tarjeta_home; ?></h5>
                                                    <p class="card-text"><?php echo $contenido_tarjeta_home; ?></p>
                                                    <?php if($boton_tarjeta_home !=""){?>
                                                        <a class="d-none d-md-block btn btn-success" href="<?php echo $boton_tarjeta_home; ?>">Ver <?php echo $titulo_tarjeta_home;?></a>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if($boton_tarjeta_home !=""){?>
                                            <div class="row d-block d-md-none no-gutters">
                                                <a class="btn btn-success w-100" href="<?php echo $boton_tarjeta_home; ?>">Ver <?php echo $titulo_tarjeta_home;?></a>
                                            </div>
                                        <?php } ?>
                                    </div>
                                <?php endwhile;?> 
                            <?php } ?>
                            
                        </div>
                    </div>
                </section>
            </div>

            <!--
                 --------------------------------------------------Novedades----------------------------------------------------------
            -->
            <div id="novedades" class="container-fluid novedades">
                <section class="container page-section">
                    <div class="row" data-aos="fade-up">
                        <div class="col-sm">
                            <h1 class="page-title">Novedades</h1>
                        </div>                    
                    </div>
                    <div class="row page-content" data-aos="fade-up">
                        <div class="col-sm text-center"><?php the_field('texto_novedades_pagina_inicio'); ?></div>
                    </div>

                    <?php 
                        $novedades = new WP_Query(array(
                            'post_type'     => array('post'),
                            'posts_per_page'  => 10,
                            'post_status'   => 'publish',
                            'orderby'       => 'date',
                            'order'         => 'DESC',
                        ));
                    ?>

                    <div class="row" data-aos="fade-up">
                        <div class="col-sm">
                        <?php if ($novedades->have_posts() ) : ?> 
                            <?php if ( wp_is_mobile() ) { ?>
                                <div id="slider_novedades" class="owl-carousel owl-theme">
                                    <?php while ( $novedades->have_posts() ) : $novedades->the_post(); ?>
                                    <div class="item">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('',array('class'=>'rounded-circle')); ?>
                                            <h4><?php the_title(); ?></h4>
                                            <span><?php the_date(); ?></span>                                            
                                        </a>
                                    </div>  
                                    <?php endwhile;?>
                                </div>
                            <?php }else{ ?>
                                <div id="slider_novedades" class="owl-carousel owl-theme">
                                    <?php while ( $novedades->have_posts() ) : $novedades->the_post(); ?>
                                    <div class="item flip-card">
                                        <a href="<?php the_permalink(); ?>">
                                            <div class="flip-card-inner">
                                                <div class="flip-card-front rounded-circle">
                                                    <?php the_post_thumbnail('',array('class'=>'rounded-circle')); ?>
                                                </div>
                                                <div class="flip-card-back rounded-circle">
                                                    <div class="flip-card-back-content">
                                                        <h4><?php the_title(); ?></h4>
                                                        <span><?php the_date(); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>  
                                    <?php endwhile;?>
                                </div>
                            <?php } ?>                          
                        <?php else : ?>
                            <h2 class="text-center">No hay resultados</h2>
                        <?php endif; wp_reset_postdata(); ?>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-sm text-center">
                            <a href="<?php echo site_url().'/novedades'; ?>" class="btn btn-success">Ver más novedades</a>
                        </div>
                    </div>
                    
                </section>
            </div>

            <!--
                ---------------------------------------------------Programa----------------------------------------------------------
            -->
            <div id="programa" class="container-fluid programa">
                <section class="container page-section">
                    <div class="row" data-aos="fade-up">
                        <div class="col-sm">
                            <h1 class="page-title">Programa</h1>
                        </div>                    
                    </div>
                    
                    <?php 
                    $texto_programa = get_field('texto_programa_pagina_inicio'); 
                    if($texto_programa != ""){
                    ?>
                        <div class="row page-content" data-aos="fade-up">
                            <div class="col-sm"><?php echo $texto_programa; ?></div>
                        </div>
                    <?php } ?>
                
                    <div class="row grupo-temas-programa">
                        <?php 
                            $numero_programa = 0;  
                            while ( have_rows('detalle_programa_pagina_inicio') ) : the_row();
                                $titulo_programa = get_sub_field('titulo_programa_pagina_inicio');
                                $imagen_programa = get_sub_field('imagen_programa_pagina_inicio');
                                $resumen_programa = get_sub_field('resumen_programa_pagina_inicio');
                                $numero_programa++;
                        ?>
                            <div class="col-sm" data-aos="flip-left" data-aos-delay="<?php echo $numero_programa + 3; ?>00">
                                <div class="tema-programa">
                                    <h4><?php echo $titulo_programa; ?></h4>
                                    <hr>
                                    <img src="<?php echo $imagen_programa['url']; ?>" />
                                    <div><?php echo $resumen_programa; ?></div>
                                </div>
                            </div>
                        <?php endwhile;?>     
                    </div>
                    <div class="row" data-aos="zoom-in">
                        <div class="col-sm">
                            <h5 class="page-subtitle"><?php the_field('titulo_programa_extra_pagina_inicio'); ?></h5>
                        </div>
                    </div>
                    <div class="row" data-aos="zoom-in">
                         <?php
                            $numero_herramientas = 0;  
                            while ( have_rows('herramientas_programa_inicio') ) : the_row();
                                $titulo_herramienta_home = get_sub_field('titulo_herramienta_pagina_inicio');
                                $contenido_herramienta_home = get_sub_field('contenido_herramienta_pagina_inicio');
                                $numero_herramientas++;
                            ?>
                        <div class="col-sm herramientas">                        
                            <div class="row">
                                <div class="col-2 col-md-2">
                                    <span class="badge badge-success rounded-circle"style="font-size:15px;"><?php echo $numero_herramientas;?></span>
                                </div>
                                <div class="col-10 col-md-10">
                                    <h5 class="titulo-herramientas"><?php echo $titulo_herramienta_home;?></h5>
                                    <p class="card-text"><?php echo $contenido_herramienta_home; ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endwhile;?>
                    </div> 
                </section>
            </div>

            <!--
                ---------------------------------------------------Embajadores----------------------------------------------------------
            -->
            <div id="embajadores" class="container-fluid embajadores">                
                <section class="container">
                    <div class="row">
                        <div class="col-sm">
                            <div class="row">
                                <div class="col-sm">
                                    <h1 class="page-title">Embajadores</h1>
                                    <div class="contenido-embajadores">
                                    <?php the_field('texto_embajadores_pagina_inicio'); ?>
                                    </div>
                                </div>
                            </div>
                            <?php $segundo_texto_embajadores = get_field('segundo_texto_embajadores_pagina_inicio');
                            if($segundo_texto_embajadores !=""){
                            ?>
                            <div class="row comentario-embajadores">
                                <div class="col-sm">
                                    <?php echo $segundo_texto_embajadores; ?>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="col-sm">
                            <img class="img-embajador" src="<?php echo site_url(); ?>/wp-content/uploads/2019/08/embajador3.svg" data-aos="fade-in" />
                        </div>
                    </div>
                </section>
            </div>

            <!--
                ---------------------------------------------------Protocolos de Servicio----------------------------------------------------------
            -->
            <div id="protocolos" class="container-fluid protocolos">                
                <section class="container">
                    <div class="row">
                        <div class="col-sm" <?php if(wp_is_mobile()){echo 'data-aos="fade-in"';}else{ echo 'data-aos="fade-left"';}?>>
                            <img class="img-protocolos" src="<?php echo site_url(); ?>/wp-content/uploads/2019/08/img-protocolo.jpg" />
                        </div>
                        <div class="col-sm" <?php if(wp_is_mobile()){echo 'data-aos="fade-in"';}else{ echo 'data-aos="fade-left"';}?>>
                            <h1 class="page-title">Protocolo de Servicio</h1>
                            <div class="contenido-protocolos">
                                <?php the_field('texto_protocolo_pagina_inicio'); ?>
                            </div>

                            <?php 
                            $descargables_pagina_inicio = get_field('descargables_protocolos_pagina_inicio');
                            if($descargables_pagina_inicio !=""){
                            ?>
                            <div class="descarga-protocolos text-center">
                                <div class="col-12">Descarga los protocolos aquí:</div>
                                <div class="col-12 pt-3">
                                    <div class="row">
                                    <?php
                                        $numero_descargas = 0;  
                                        while ( have_rows('detalle_programa_pagina_inicio') ) : the_row();
                                            $nombre_archivo_protocolo = get_sub_field('nombre_archivo_protocolo_pagina_inicio');
                                            $archivo_protocolo = get_sub_field('archivo_protocolo_pagina_inicio');
                                            $numero_descargas++;
                                    ?>
                                        <div class="col-6">
                                            <a class="btn btn-success" href="<?php echo $archivo_protocolo['url']; ?>" target="_blank"><i class="far fa-file-pdf"></i> <?php echo $nombre_archivo_protocolo; ?></a>
                                        </div>
                                    <?php endwhile; ?>
                                    </div>
                                </div>                                
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </section>
            </div>

            <hr class="d-md-none" style="width:80%;">

            <!--
                ---------------------------------------------------Ganadores Instagram----------------------------------------------------------
            -->
            <div id="ganadores-insta" class="container-fluid ganadores-insta">                
                <section class="container">
                    <div class="d-flex flex-wrap-reverse flex-md-wrap justify-content-center align-items-center">
                        <div class="col-12 col-md-6">
                            <div class="row text-center">
                                <div class="col-12">
                                    <div class="main-circle">
                                    <?php $imagen_ganadora_home = get_field('imagen_ganadora_pagina_inciio');?>
                                        <img src="<?php echo $imagen_ganadora_home['url'];?>" alt="..." class="rounded-circle">
                                    </div>
                                    <div class="second-circle"></div>
                                    <div class="third-circle"></div>
                                    <div class="fourth-circle"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 text-center texto-foto-ganadora">
                            <h1 class="titulo-foto-ganadora">Foto ganadora<br>#SomosServicio<?php the_field('fecha_concurso_pagina_inicio');?></h1>
                            <h2 class="subtitulo-foto-ganadora">¡FELICITACIONES!</h2>
                            <div class="datos-foto-ganadora">
                                <span class="nombre-foto-ganadora"><?php the_field('nombre_ganador_pagina_inicio');?></span><br>
                                <span class="cargo-foto-ganadora">(<?php the_field('cargo_ganador_pagina_inicio');?>)</span>
                            </div>
                        </div>
                    </div>
                    
                    <?php 
                    $otros_ganadores_home = get_field('otros_ganadores_pagina_inicio'); 
                    if($otros_ganadores_home !=""){
                    ?>
                    <div class="row" style="margin-top:50px;">
                        <div class="col-sm" style="text-align:center; font-size:18px;">
                            <p>Además queremos reconocer el servicio en equipo con un rico desayuno para las siguientes fotos.</p>
                        </div>
                    </div>
                            
                    <div class="row" style="margin-top:30px;">
                    <?php                     
                        $numero_otros_ganadores = 0;  
                        while ( have_rows('otros_ganadores_pagina_inicio') ) : the_row();
                            $nombre_equipo_ganador_home = get_sub_field('nombre_equipo_pagina_inicio');
                            $foto_equipo_ganador_home = get_sub_field('foto_equipo_ganador_pagina_inicio');
                            $numero_otros_ganadores++;
                    
                    ?>
                        <div class="col-sm">
                            <div class="otros-ganadores" style="background-image:url('<?php echo $foto_equipo_ganador_home['url']; ?>" data-aos="flip-down" data-aos-delay="300" >
                                <div class="caption-equipo"><?php echo $nombre_equipo_ganador_home; ?>"</div>
                            </div>
                        </div>
                    <?php endwhile;?>
                    </div>
                    <?php } ?>
                </section>
            </div>

            <!--
                ---------------------------------------------------Instagram----------------------------------------------------------
            -->
            <div id="instagram" class="container-fluid instagram">                
                <section class="container">
                    <div class="row" data-aos="fade-up">
                        <div class="col-sm">
                            <h1 class="page-title">Instagram</h1>
                        </div>                    
                    </div>
                    <div class="row" data-aos="fade-up">
                        <div class="col-sm text-center">
                        Descubre las fotos que nuestros trabajadores han subido a sus redes sociales.
Sube la tuya usando el hashtag #SomosServicio2018
Para poder compartir tu foto en #SomosServicio2018, tu cuenta de instagram no debe estar en modo privado.
                        </div>
                    </div>
                </section>
            </div>

            <div id="instagram2" class="container-fluid instagram2" data-aos="fade-up">
                <section class="container">
                    <div class="row">
                        <div class="col-sm">
                            <div class="row text-center">
                                <div class="col-12">
                                    <?php $feed_back_instagram_home = get_field('feedbak_instagram_pagina_inicio'); ?>
                                    <div class="post-insta"><?php echo do_shortcode($feed_back_instagram_home); ?></div>
                                </div>
                            </div>
                        </div>                        
                    </div>
                </section>
            </div>
        </main><!-- /.main -->

<?php get_template_part('includes/footer'); ?>
