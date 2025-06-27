 <!--begin::Javascript-->
 <script>
     var hostUrl = "<?php echo $localAdminUrl; ?>assets/";
 </script>
 <!--begin::Global Javascript Bundle(mandatory for all pages)-->
 <script src="<?php echo $localAdminUrl; ?>assets/plugins/global/plugins.bundle.js"></script>
 <script src="<?php echo $localAdminUrl; ?>assets/js/scripts.bundle.js"></script>
 <!--end::Global Javascript Bundle-->
 <!--begin::Custom Javascript(used for this page only)-->
 <script src="<?php echo $localAdminUrl; ?>assets/js/custom/authentication/sign-in/general.js"></script>
 <!--end::Custom Javascript-->
 <!--end::Javascript-->

 <script>
     document.querySelector('.toggle-password').addEventListener('click', function() {
         const passwordInput = document.getElementById('password');
         const isPassword = passwordInput.getAttribute('type') === 'password';

         passwordInput.setAttribute('type', isPassword ? 'text' : 'password');

         // Toggle the icon
         this.classList.toggle('fa-eye');
         this.classList.toggle('fa-eye-slash');
     });
 </script>