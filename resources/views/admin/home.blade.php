
<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      
      @include('admin.sidebar');
      
      <!-- partial -->
      <!-- partial:partials/_navbar.html -->
      @include('admin.navBar')
        <!-- partial -->
        @include('admin.body')
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
        @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>