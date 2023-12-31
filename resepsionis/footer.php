  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      Website Sistem Informasi Reservasi Hotel
    </div>
    <strong>Copyright &copy; <?php echo date('Y') ?> - Cirebon Hotel</strong>
  </footer>
</div>


<script src="../assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="../assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
<script src="../assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="../assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="../assets/bower_components/raphael/raphael.min.js"></script>
<script src="../assets/bower_components/morris.js/morris.min.js"></script>
<script src="../assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<script src="../assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="../assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="../assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<script src="../assets/bower_components/moment/min/moment.min.js"></script>
<script src="../assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="../assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="../assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="../assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="../assets/bower_components/fastclick/lib/fastclick.js"></script>
<script src="../assets/dist/js/adminlte.min.js"></script>
<script src="../assets/dist/js/pages/dashboard.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/js/bootstrap.bundle.min.js"></script>
<!-- <script src="../assets/dist/js/demo.js"></script> -->
<script src="../assets/bower_components/ckeditor/ckeditor.js"></script>

<script>
  $(document).ready(function(){

     $('.select2').select2();

      $(document).on("click",".rating_bintang", function(){
      var ke = $(this).attr("ke");

      var angka = $(this).attr("id");

      $(".rating_"+ke+"_1").removeClass("fa-star").addClass("fa-star-o");
      $(".rating_"+ke+"_2").removeClass("fa-star").addClass("fa-star-o");
      $(".rating_"+ke+"_3").removeClass("fa-star").addClass("fa-star-o");
      $(".rating_"+ke+"_4").removeClass("fa-star").addClass("fa-star-o");
      $(".rating_"+ke+"_5").removeClass("fa-star").addClass("fa-star-o");

      
      
      for(a = 1; a <= angka; a++){
        var xxx = ".rating_"+ke+"_"+a;
        $(xxx).toggleClass("fa-star","addOrRemove");
        $(xxx).toggleClass("fa-star-o","addOrRemove");
      }

      $(".form_rating_"+ke).val(angka);

    });
      

   // $(".edit").hide();

   $('#table-datatable').DataTable({
    'paging'      : true,
    'lengthChange': false,
    'searching'   : true,
    'ordering'    : false,
    'info'        : true,
    'autoWidth'   : true,
    "pageLength": 50
  });



 });
  
  $('#datepicker').datepicker({
    autoclose: true,
    format: 'dd/mm/yyyy',
  }).datepicker("setDate", new Date());

  $('.datepicker2').datepicker({
    autoclose: true,
    format: 'yyyy/mm/dd',
  });


  $(function () {

    CKEDITOR.replace('editor1')
    
  });


  $(document).ready(function(){
    $("#pesan_pilih_tujuan").on("change",function(){
      var pilih = $(this).val();
      var data = "tujuan="+pilih;
      if(pilih.length > 0){
        $.ajax({
          url: "pesan_ajax_pilih_tujuan.php",
          method: "POST", 
          data:data,
          success: function(result){
            $(".tampil_tujuan").html(result);
          }});
      }

    });
  });




</script>

</body>
</html>
