<?php
    get_template_part('includes/header');
    b4st_main_before();
?>

<main>
  <div class="container-fluid" style="margin-top:30px;">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <section class="container">
        <div class="row">
          <div class="col-sm-9">
            <h1 class="single-title" itemprop="headline"><?php the_title(); ?></h1>
          </div> 
          <div class="col-sm-3 searchform-single">
            <?php get_search_form(); ?>
          </div>                   
        </div>

        <div class="row data-post">
          <div class="col-6 text-left"><i class="fas fa-folder-open"></i> <?php the_category( ', ' ); ?> </div>
          <div class="col-6 text-right"><i class="fas fa-calendar-alt"></i> <?php the_time( get_option( 'date_format' ) ); ?></div>
        </div>

        <div class="row single-content">
          <div class="col-sm">
          <?php the_content();?>
          </div>
        </div>      

        <div class="row" style="margin-top:20px; margin-bottom:50px;">
          <div class="col-sm">
            <a class="btn btn-success" href="javascript:history.back()">← Volver</a>
          </div>          
        </div>
      </section>

    <?php endwhile; endif;?>

    
  </div><!-- /.container -->
</main><!-- /.container-fluid -->

<?php
    b4st_main_after();
    get_template_part('includes/footer');
?>
