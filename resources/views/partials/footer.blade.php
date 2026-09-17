<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2023-2024 </a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
  </aside>

</div>

<script src="	{{url('backend/plugins/jquery/jquery.min.js')}}"></script>
<script src="	{{url('backend/js/custom.js')}}"></script>

<script src="	{{url('backend/plugins/select2/js/select2.full.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Bootstrap 4 -->
<script src="{{url('backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{url('backend/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>

<!-- AdminLTE App -->
<script src="{{url('backend/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="{{url('backend/dist/js/demo.js')}}"></script> -->

<script src="{{url('backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>

<script src="{{url('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>




 <!-- jQuery (required) + Toastr JS -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>



<script type="text/javascript">
function showToastr(message, type = 'info', title = 'success') {
 toastr.options = {
     "closeButton": true,
     "debug": false,
     "newestOnTop": true,
     "progressBar": true,
     "positionClass": "toast-top-right", // e.g. "toast-bottom-left"
     "preventDuplicates": false,
     "onclick": null,
     "showDuration": "300",
     "hideDuration": "1000",
     "timeOut": "5000", // how long toast shows (ms)
     "extendedTimeOut": "1000",
     "showEasing": "swing",
     "hideEasing": "linear",
     "showMethod": "fadeIn",
     "hideMethod": "fadeOut"
 };

 switch (type) {
     case 'success':
         toastr.success(message, title);
         break;
     case 'error':
         toastr.error(message, title);
         break;
     case 'warning':
         toastr.warning(message, title);
         break;
     case 'info':
     default:
         toastr.info(message, title);
         break;
 }
}


</script>


</body>
</html>