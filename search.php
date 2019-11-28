<?php
    get_template_part('includes/header'); 
    b4st_main_before();
?>

<main>
  <div class="container-fluid">
    <section class="container header-buscador">
      <div class="row">
        <div class="col-sm">
          <h1>BUSCADOR</h1>
        </div>                    
      </div>
      <div class="row" style="margin-top:20px;">
        <div class="col-sm">
            <?php get_search_form(); ?>
        </div>
      </div>      
    </section>
    
    <?php if ( have_posts() ) : ?>
      <section class="container">
        <div class="row estadistica-busqueda">
          <div class="col col-12 col-md-4">
            <strong>Término buscado:</strong> <?php the_search_query(); ?>
          </div>

          <div class="col col-12 col-md-4">
            <strong>Resultados de búsqueda:</strong>
            <?php 
              $allsearch = new WP_Query("s=$s&showposts=0"); 
              echo $allsearch ->found_posts;
            ?>
          </div>

          <div class="col col-12 col-md-4 categorias-badges">
            <strong>Categorías:</strong>
            <?php $categories = get_categories(); foreach ( $categories as $category ) { ?>
              <a class="badge badge-success" href="<?php echo esc_url( get_category_link(get_cat_ID($category->name)))?>"> <i class="fab fa-slack-hash"></i> <?php echo esc_html( $category->name )?></a>
            <?php } ?>
          </div>
        </div>
      </section>

      <?php if ( wp_is_mobile() ) : ?>
        <section class="container search-mobile">      
          <?php while ( have_posts() ) : the_post(); ?>      
            <div class="row">
              <a class="leer-mas" href="<?php the_permalink();?>">
                <div class="col col-3">
                  <a href="<?php the_permalink();?>"><?php the_post_thumbnail('',array('class'=>'rounded-circle')); ?></a>
                </div>
                <div class="col col-9">
                  <h1><?php the_title(); ?></h1>
                  <span><?php the_date(); ?></span>
                </div>
              </a>
            </div>
          <?php endwhile; ?>
        </section>
      <?php else:?>
        <section class="container search-desktop"> 
          <div class="row">     
            <?php while ( have_posts() ) : the_post(); ?>
            
              <div class="col col-sm-3 mt-5">
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
                <div class="resumen-post"><?php the_excerpt(); ?><a class="leer-mas" href="<?php the_permalink();?>">Leer más...</a></div>
              </div>
            
            <?php endwhile; ?>
          </div>
        </section>
      <?php endif;?>
    
    <?php else: ?>
      <section class="container">
        <div class="row estadistica-busqueda">
          <div class="col col-12 col-md-4">
            <strong>Término buscado:</strong> <?php the_search_query(); ?>
          </div>

          <div class="col col-12 col-md-4">
            <strong>Resultados de búsqueda:</strong>
            <?php 
              $allsearch = new WP_Query("s=$s&showposts=0"); 
              echo $allsearch ->found_posts;
            ?>
          </div>

          <div class="col col-12 col-md-4 categorias-badges">
            <strong>Categorías:</strong>
            <?php $categories = get_categories(); foreach ( $categories as $category ) { ?>
              <a class="badge badge-success" href="<?php echo esc_url( get_category_link(get_cat_ID($category->name)))?>"> <i class="fab fa-slack-hash"></i> <?php echo esc_html( $category->name )?></a>
            <?php } ?>
          </div>
        </div>
      </section>

      <section class="container">
        <div class="row">
          <div class="col-sm">
            <h2 class="text-center">NO SE HAN ENCONTRADO RESULTADOS</h2>
          </div>
        </div>
      </section>
    <?php endif;?>
    
    <section class="container base-seccion">
      <div class="row">
        <div class="col col-sm text-center">
          <a class="btn btn-success" href="javascript:history.back()">← Volver</a>
        </div>
			</div>
    </section>
  </div><!-- /.container -->
</main><!-- /.container-fluid -->

<?php
    b4st_main_after();
    get_template_part('includes/footer');
?>
