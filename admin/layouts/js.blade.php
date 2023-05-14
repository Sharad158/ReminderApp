<script src="{{ URL::asset('/resources/assets/app-assets/vendors/js/vendors.min.js')}}"></script>
<!-- BEGIN Vendor JS-->

<script src="{{ URL::asset('/resources/assets/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{ URL::asset('/resources/assets/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>
<script src="{{ URL::asset('/resources/assets/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js')}}"></script>
<script src="{{ URL::asset('/resources/assets/app-assets/vendors/js/tables/datatable/responsive.bootstrap4.js')}}"></script>


<script src="{{ URL::asset('/resources/assets/app-assets/vendors/js/pickers/pickadate/picker.js')}}"></script>
<script src="{{ URL::asset('/resources/assets/app-assets/vendors/js/pickers/pickadate/picker.date.js')}}"></script>
<script src="{{ URL::asset('/resources/assets/app-assets/vendors/js/pickers/pickadate/picker.time.js')}}"></script>
<script src="{{ URL::asset('/resources/assets/app-assets/vendors/js/pickers/pickadate/legacy.js')}}"></script>
<script src="{{ URL::asset('/resources/assets/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>

<!-- BEGIN: Page Vendor JS-->
{{-- <script src="{{ URL::asset('/resources/assets/app-assets/vendors/js/charts/apexcharts.min.js')}}"></script> --}}
<script src="{{ URL::asset('/resources/assets/app-assets/vendors/js/extensions/toastr.min.js')}}"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{ URL::asset('/resources/assets/app-assets/js/core/app-menu.js')}}"></script>
<script src="{{ URL::asset('/resources/assets/app-assets/js/core/app.js')}}"></script>
<!-- END: Theme JS-->
<script src="{{ URL::asset('/resources/assets/app-assets/js/scripts/forms/pickers/form-pickers.js')}}"></script>
<!-- BEGIN: Page JS-->
<script src="{{ URL::asset('/resources/assets/app-assets/js/scripts/tables/table-datatables-advanced.js')}}"></script>
{{-- <script src="{{ URL::asset('/resources/assets/app-assets/js/scripts/pages/dashboard-ecommerce.js')}}"></script> --}}
<!-- END: Page JS-->
<script src="{{URL::asset('/resources/assets/admin/plugins/datepicker/bootstrap-datepicker.js')}}"></script>

<script src="{{URL::asset('resources/assets/custom/jQuery-validation-plugin/jquery.validate.js')}}"></script>
<script src="{{URL::asset('resources/assets/custom/jQuery-validation-plugin/additional-methods.js')}}"></script>

<script src="{{URL::asset('/resources/assets/custom/image_cropping/prism.js')}}"></script>
<script src="{{URL::asset('/resources/assets/custom/image_cropping/sweetalert.js')}}"></script>
<script src="{{URL::asset('/resources/assets/custom/image_cropping/croppie.js')}}"></script>
<script src="{{URL::asset('/resources/assets/custom/image_cropping/main.js')}}"></script>

<script src="{{URL::asset('/resources/assets/app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
<script src="{{URL::asset('/resources/assets/app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>

<script src="{{URL::asset('/resources/assets/app-assets/js/scripts/forms/form-validation.js')}}"></script>
<script src="{{URL::asset('/resources/assets/admin/bootstrap/js/bootbox.js')}}"></script>

<script src="{{URL::asset('/resources/assets/app-assets/js/scripts/pages/app-user-edit.js')}}"></script>
<script src="{{URL::asset('/resources/assets/app-assets/js/scripts/components/components-navs.js')}}"></script>
<script src="{{URL::asset('/resources/assets/app-assets/js/scripts/forms/form-select2.js')}}"></script>
<script src="{{URL::asset('/resources/assets/app-assets/js/scripts/pages/page-auth-register.js')}}"></script>
<script src="{{ URL::asset('/resources/assets/admin/plugins/intl-tel-input-master/build/js/intlTelInput.min.js')}}"></script>

<script>
    $(window).on('load', function() {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })
</script>
 <script>
    $(document).ready(function(){
        var SITE_URL = "<?php echo URL::to('/'); ?>";
        $(".mode-change").click(function (e) {
            e.preventDefault();
            var change_class = $( ".loaded" ).hasClass( "dark-layout" );
            if(change_class){
                var theam_mode = "dark-layout";
            }else{
                var theam_mode = "light-layout";
            }
            $.ajax({
                url: SITE_URL + '/save-theam-mode',
                type: 'POST',
                data: {theam_mode,_token:'{{ csrf_token() }}'},
                success: function (data) {
                }
            });
        });
    });

</script>

<script type="module">
    // Import the functions you need from the SDKs you need
    import { initializeApp } from "https://www.gstatic.com/firebasejs/9.18.0/firebase-app.js";
    import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.18.0/firebase-analytics.js";
    // TODO: Add SDKs for Firebase products that you want to use
    // https://firebase.google.com/docs/web/setup#available-libraries

    // Your web app's Firebase configuration
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    const firebaseConfig = {
      apiKey: "AIzaSyD3JayufggSh_0YjssoXZdiyhcpkb0pV-U",
      authDomain: "girvalley.firebaseapp.com",
      projectId: "girvalley",
      storageBucket: "girvalley.appspot.com",
      messagingSenderId: "471400215631",
      appId: "1:471400215631:web:f7ced6b32e752e00bf263a",
      measurementId: "G-MTGQVR8Q35"
    };

    // Initialize Firebase
    const app = initializeApp(firebaseConfig);
    const analytics = getAnalytics(app);
  </script>
