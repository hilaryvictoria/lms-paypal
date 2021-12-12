  <!-- Main Footer -->
  <footer class="main-footer">
    Copyright &copy; 2021-{{ date('Y') }} <a targte="_blank" href="https://uxnovo.it/">Uxnovo</a>.
    All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('/assets/backend/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('/assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('/assets/backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/assets/backend/js/adminlte.min.js') }}"></script>
<script src="http://cdn.ckeditor.com/4.4.7/standard-all/adapters/jquery.js"></script>


@stack('js')
<script>
  $(document).ready(function () {
    CKEDITOR.replace( 'description-textarea' );
    });
</script>
</body>
</html>