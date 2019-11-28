<?php
    get_template_part('includes/header'); 
    b4st_main_before();
?>

<main id="main" class="container mt-5">
  <div class="row">

    <div class="col-sm">
      <div id="content" role="main">

        <?php get_template_part('includes/loops/index-loop'); ?>

      </div><!-- /#content -->
    </div>

    <?php get_template_part('includes/sidebar'); ?>

  </div><!-- /.row -->
</main><!-- /.container -->

<?php 
    b4st_main_after();
    get_template_part('includes/footer'); 
?>
