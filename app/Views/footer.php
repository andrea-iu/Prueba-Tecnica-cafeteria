<footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Gestión Cafeteria <?php echo date('Y'); ?></div>
                            <div>
                                <a href="#">Politica de Privacidad</a>
                                &middot;
                                <a href="#">Terminos &amp; Condiciones</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="<?php echo base_url();?>/js/bootstrap.bundle.min.js" ></script>
        <script src="<?php echo base_url();?>/js/scripts.js"></script>
        <script src="<?php echo base_url();?>/js/simple-datatables@latest.js"></script>
        <script src="<?php echo base_url();?>/js/datatables-simple-demo.js"></script>
        <script src="<?php echo base_url();?>/assets/demo/chart-area-demo.js"></script>
        <script src="<?php echo base_url();?>/assets/demo/chart-bar-demo.js"></script>
        <script src="<?php echo base_url();?>/js/jquery-3.1.1.min.js"></script>
        <script src="<?php echo base_url();?>/js/popper.min.js"></script>
        <script src="<?php echo base_url();?>/js/bootstrap.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  

       <script>
            $('#modalconfirma').on('show.bs.modal', function(e){
                $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data( 'href'));
            });
        </script>

    </body>
</html>