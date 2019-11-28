<?php b4st_footer_before();?>

<!--
  ---------------------------------------------------------------------------------------------------------------------
  ----------------------------------------------------FOOTER-----------------------------------------------------------
  ---------------------------------------------------------------------------------------------------------------------
-->
<footer class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <h5 class="subtitle-footer">Contactanos:</h5>
                <nav class="footer-nav">
                    <ul class="nav">
                    <?php 
                      $numero_contacto = 0;  
                        while ( have_rows('redes_contacto_footer','40') ) : the_row();
                          $tipo_contacto = get_sub_field('tipo_contacto_footer');
                          $link_contacto = get_sub_field('link_red_contacto_footer');
                          $icono_contacto = get_sub_field('icono_contacto_footer');
                          $numero_contacto++;
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" title="<?php echo $tipo_contacto; ?>" href="<?php echo $link_contacto; ?>" target="_blank">
                                <img src="<?php echo $icono_contacto['url']; ?>" alt="<?php echo $tipo_contacto; ?>" />
                            </a>
                        </li>
                    <?php endwhile;?>                        
                    </ul>
                </nav>
            </div>
            <div class="col-12 col-md-6 footer-logo">
              <?php 
              $logo_footer = get_field('logotipo_footer','40');
              $url_logo_footer = get_field('link_logotipo_footer','40');
              ?>
                <a href="<?php echo $url_logo_footer; ?>"><img src="<?php echo $logo_footer['url']; ?>" /></a>
            </div>
        </div>
    </div>
</footer><!-- /.footer -->

<!-- Modal - Cerrar Sesión -->
<div class="modal fade" id="modal_cerrarSesion" tabindex="-1" role="dialog" aria-labelledby="modal_cerrarSesion" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
				<div>                        
                    <h5 class="title-login">CERRAR SESIÓN</h5>
                    <div class="row justify-content-center">
                        <div class="col">¿Esta seguro que desea cerrar su sesión?</div>
                    </div>
                    <div class="row justify-content-center mt-4">
                        <div class="col-8">
                            <a href="?swpm-logout=true" class="btn btn-danger">Si, Cerrar Sesión</a>
                        </div>
                    </div>
				</div>
            </div>
        </div>
    </div>
</div>
<?php wp_footer(); ?>
</body>

</html>