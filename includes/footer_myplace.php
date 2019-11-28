<?php b4st_footer_before();?>

<!--
  ---------------------------------------------------------------------------------------------------------------------
  ----------------------------------------------------FOOTER-----------------------------------------------------------
  ---------------------------------------------------------------------------------------------------------------------
-->
<!-- Modal - Archivos compartidos -->
<div class="modal fade" id="modal_sharedFiles" tabindex="-1" role="dialog" aria-labelledby="modal_sharedFiles" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <!--<div class="modal-header">
					<a class="btn bg-secodary" data-dismiss="modal" aria-label="Close" style="font-size:18px;"><i class="fas fa-times-circle"></i></a					                    
                </div>>-->
                <div class="modal-body">
					<?php echo do_shortcode('[shared_files]'); ?>
                </div>
            </div>
        </div>
    </div>

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