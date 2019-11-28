<?php
    get_template_part('includes/header'); 
    b4st_main_before();
?>

<!--<main id="main" class="container mt-5">
  <div class="row">

    <div class="col-sm">
      <div id="content" role="main">
        <?php //get_template_part('includes/loops/page-content'); ?>
      </div>
    </div>

    <?php //get_template_part('includes/sidebar'); ?>

  </div>
</main>-->

 <main>
  <div class="container-fluid bienvenida">                
    <section class="container">
      <div class="row">
        <div class="col-sm">
        <h1 class="page-title"><?php the_title(); ?></h1>
        </div>
      </div>
      
      <div class="row">      
        <?php 
            if(have_posts()) : 
              while(have_posts()) : the_post();

                the_content();

              endwhile;

            else :
              get_template_part('includes/loops/404');
            endif;            
        ?>
      </div>
    </section>

    <?php if(is_page(array('password-reset'))):?>
      <section class="container base-seccion">
        <div class="row">
          <div class="col col-sm text-right">
            <a class="btn btn-success" href="<?php echo site_url(); ?>">← Volver</a>
          </div>

          <div class="col col-sm text-left">
            <button id="btn_show5" class="btn btn-primary"><i class="far fa-user"></i> Iniciar Sesión</button>
          </div>
        </div>
      </section>
    <?php endif;?>
  </div>
</main>

<?php 
    b4st_main_after();
    get_template_part('includes/footer'); 
?>
