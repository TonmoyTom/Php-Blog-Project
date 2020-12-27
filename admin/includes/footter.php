   <!-- Start app Footer part -->
    </div>
</div>

<!-- General JS Scripts -->
<script src="../assets/bundles/lib.vendor.bundle.js"></script>
<script src="../js/CodiePie.js"></script>



<!-- JS Libraies -->
<script src="../assets/modules/jquery.sparkline.min.js"></script>
<script src="../assets/modules/chart.min.js"></script>
<script src="../assets/modules/owlcarousel2/dist/owl.carousel.min.js"></script>
<script src="../assets/modules/summernote/summernote-bs4.js"></script>
<script src="../assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
<script src="../js/page/bootstrap-modal.js"></script>
<!-- JS Libraies -->
<script src="../assets/modules/datatables/datatables.min.js"></script>
<script src="../assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="../assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
<script src="../assets/modules/jquery-ui/jquery-ui.min.js"></script>

<!-- Page Specific JS File -->
<script src="../js/page/modules-datatables.js"></script>
<script src="../assets/modules/cleave-js/dist/cleave.min.js"></script>
<script src="../assets/modules/cleave-js/dist/addons/cleave-phone.us.js"></script>
<script src="../assets/modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
<script src="../assets/modules/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="../assets/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<script src="../assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script src="../assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
<script src="../assets/modules/select2/dist/js/select2.full.min.js"></script>
<script src="../assets/modules/jquery-selectric/jquery.selectric.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>


<!-- Page Specific JS File -->
<script src="../js/page/index.js"></script>
<script src="../js/sweetalert2.all.min.js"></script>
<script src="https://kit.fontawesome.com/417824116f.js" crossorigin="anonymous"></script>
<!-- JS Libraies -->


<?php
if(isset($_SESSION['status']) && $_SESSION['status'] != '' ){

?>
<script>
Swal.fire({
  icon: '<?php echo $_SESSION['status_code'] ?>',
  text: '<?php echo $_SESSION['status'] ?>',
  background: '#000',
  footer: '',
})
</script>
<?php
unset($_SESSION['status']);
unset($_SESSION['status_code']);
}

?>


<script> 

$(document).ready(function(){
  $('.catdelete').click(function(){
     var deleted = $(this).closest('tr').find('.catdeleted_id').val();
     Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        background: '#000',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
           $.ajax({
             type:"POST",
             url : "deletecat.php", 
             data : {
               "submit" : 1,
               "delete_id" : deleted,
             },
             success: function(response){
              Swal.fire(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success'
                ).then(function(){
                  location.reload();
                })
             }
           })
        }
      })
  })
})

</script>



<script> 

$(document).ready(function(){
  $('.pagedelete').click(function(){
     var deleted = $(this).closest('tr').find('.pagedeleted_id').val();
     Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        background: '#000',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
           $.ajax({
             type:"POST",
             url : "deletepage.php", 
             data : {
               "submit" : 1,
               "delete_id" : deleted,
             },
             success: function(response){
              Swal.fire(
                  'Deleted!',
                  '#000',
                  'Your file has been deleted.',
                  'success'
                ).then(function(){
                  location.reload();
                })
             }
           })
        }
      })
  })
})

</script>




<!-- Template JS File -->
<script src="../js/scripts.js"></script>
<script src="../js/custom.js"></script>
</body>

<!--   Tue, 07 Jan 2020 03:35:12 GMT -->
</html>