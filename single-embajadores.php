<?php
/**
 * Template Name: Single Embajadores
 * Template Post Type: embajadores
 */
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

    <!-- Si es que el usuario se logeo -->
    <?php if($ID_USR !=""): $postid = get_the_ID(); ?>   
      <section class="container" style="margin-bottom:50px;">
        <div class="row">
          <div class="col col-12 col-md-6 formulario-comentarios">
            <div class="container">
              <div class="row titulo-formulario">
                <h3>Agregar un comentario</h3>
                <p class="logged-in-as">
                  <!--<a href="/web/somos_turbus2/wp-admin/profile.php" aria-label="Conectado como Turbus. Edita tu perfil.">Conectado como Turbus</a>--> 
                  <a href="/web/somos_turbus2/wp-login.php?action=logout&amp;redirect_to=http%3A%2F%2Flocalhost%2Fweb%2Fsomos_turbus2%2Fnovedad-5-copy%2F&amp;_wpnonce=f6917edf61">¿Desconectarse?</a>
                </p>
              </div>
              <div class="row contenido-formulario">
                <form action="/web/somos_turbus2/wp-comments-post.php" method="post" class="comment-form"> 
                  <div class="form-group">                 
                    <label for="comment">Comentario</label> 
                    <textarea name="comment" cols="45" rows="8" maxlength="65525" required="required" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <input name="submit" type="submit" class="submit btn btn-comentario" value="Publicar">
                  </div>
                  <p class="form-submit">                    
                    <input type="hidden" name="comment_post_ID" value="<?php echo $postid; ?>">
                    <input type="hidden" name="comment_parent" value="0">
                  </p>			
                </form>
              </div>
            </div>
          </div>

          <div class="col col-12 col-md-6 comments-list">
            <div class="row">
              <div class="col-sm">
                <div class="comments-header">Comentarios</div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm">
                <div class="contenido-comentarios"><?php comments_template();?></div>
              </div>
            </div>            
          </div>
        </div>
      </section>


      <?php /*$postid = get_the_ID(); 
          
          $args = array(
            'status' => 'hold',
            'number' => '5',
            'post_id' => $postid, // use post_id, not post_ID
          );
          $comments = get_comments($args);
          foreach($comments as $comment) :
            $avatar = get_avatar($comment->user_id);
            echo($comment->comment_author . '<br />' . $comment->comment_content .'<br>' .$comment->comment_date.'<br>' .$comment->user_id.'<br>'.$avatar);
            echo get_comment_reply_link($postid);
            echo '<hr>';
          endforeach;*/
          
          ?>



    <?php endif; ?>

    <?php
            //for use in the loop, list 5 post titles related to first tag on current post
            $tags = wp_get_post_tags($post->ID);
            
            if ($tags) :
              echo 'Related Posts';
              
              $first_tag = $tags[0]->term_id;
              
              $args=array(
                'tag__in' => array($first_tag),
                'post__not_in' => array($post->ID),
                'posts_per_page'=>5,
                'caller_get_posts'=>1
              );

              $my_query = new WP_Query($args);
            
              if( $my_query->have_posts() ) :
                while ($my_query->have_posts()) : $my_query->the_post(); ?>
                  <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
            
            <?php endwhile; endif;?>
            <?php wp_reset_query(); endif; ?>
    
  </div><!-- /.container -->
</main><!-- /.container-fluid -->

<?php
    b4st_main_after();
    get_template_part('includes/footer');
?>
