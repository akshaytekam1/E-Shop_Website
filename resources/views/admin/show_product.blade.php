
<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')

   <style>
    .center{
        margin: auto;
        width: 50%;
        border: 2px solid white;
        text-align: center;
        margin-top: 40px;
    }
    .font_size{
        text-align: center;
        font-size: 30px;
    }
    .td{
        border: 2px solid white;
        margin: 10px;
    }
    .th_color{
        background: skyblue;
    }
    .th_deg{
        padding: 30px
    }
   </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      
      @include('admin.sidebar');
      
      <!-- partial -->
      <!-- partial:partials/_navbar.html -->
      @include('admin.navBar')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                @if(session()->has('message'))

                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{session()->get('message')}}
                </div>

            @endif

                <h1 class="font_size">Show Products</h1>
                <table class= "center">
                    <tr class="th_color">
                        <th class="th_deg">Title</th>
                        <th class="th_deg">Description</th>
                        <th class="th_deg">Catagory</th>
                        <th class="th_deg">Quantity</th>
                        <th class="th_deg">price</th>
                        <th class="th_deg">discount price</th>
                        <th class="th_deg">product Image</th>
                        <th class="th_deg">Delete</th>
                        <th class="th_deg">Edit</th>
                    </tr>

                    @foreach ($products as $products)

                    <tr class="td">
                        <td>{{$products->title}}</td>
                        <td>{{$products->description}}</td>
                        <td>{{$products->catagory}}</td>
                        <td>{{$products->quantity}}</td>
                        <td>{{$products->price}}</td>
                        <td>{{$products->discount_price}}</td>
                        <td>
                            <img style="width: 150px; height: 150px; background:white;" src="/product/{{$products->image}}">
                        </td>
                        <td> 
                            <a onclick="return confirm('Are you sure to delete this.')" class="btn btn-danger"  href="{{url('/delete_product',$products->id)}}">Delete</a>
                        </td>
                        <td> 
                            <a onclick="return confirm('Are you sure to Update this.')" class="btn btn-danger"  href="{{url('/update_product',$products->id)}}">Edit</a>
                        </td>
                    </tr>

                    @endforeach

                    <tr>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
        @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>