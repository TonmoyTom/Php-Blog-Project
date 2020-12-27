<!-- General JS Scripts -->



<script src="assets/bundles/lib.vendor.bundle.js"></script>
<script src="js/CodiePie.js"></script>
<script src="js/sweetalert2.all.min.js"></script>
<script src="https://kit.fontawesome.com/417824116f.js" crossorigin="anonymous"></script>
<!-- JS Libraies -->


<?php
if(isset($_SESSION['status']) && $_SESSION['status'] != '' ){

?>
<script>
Swal.fire({
  icon: '<?php echo $_SESSION['status_code'] ?>',
  title: 'Oops...',
  text: '<?php echo $_SESSION['status'] ?>',
  footer: '<a href = "../contact.php" >Why do I have this issue?</a>',
  background: '#000',
  footer: '',
}
)
</script>
<?php
unset($_SESSION['status']);
unset($_SESSION['status_code']);
}

?>


<!-- Page Specific JS File -->

<!-- Template JS File -->
<script src="js/scripts.js"></script>
<script src="js/custom.js"></script>
</body>

<!-- auth-login.html  Tue, 07 Jan 2020 03:39:47 GMT -->
</html>