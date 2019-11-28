<?php
/**
 * Template Name: Login
 */
    get_template_part('includes/header'); 
    b4st_main_before();
?>

    <main class="container-fluid public-content">
        <div class="container">

            <?php if(have_posts()): while(have_posts()): the_post(); ?>
            <section>
                <div class="row">
                    <div class="col-sm">
                        <h1 class="page-title">Iniciar Sesión</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm text-center">
                        <img src="<?php echo site_url().'/wp-content/uploads/2019/07/login-img.svg'; ?>" />
                    </div>
                    <div class="col-sm">
                        <?php the_content()?>
                    </div>
                </div>
            </section>
            <?php
                endwhile;
            else :
                get_template_part('includes/loops/404');
            endif;
            ?>
   
        </div><!-- /.container -->
    </main><!-- /.container-fluid -->

<?php 
    b4st_main_after();
    get_template_part('includes/footer'); 
?>
