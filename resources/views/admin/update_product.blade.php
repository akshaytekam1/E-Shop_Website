
<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
   @include('admin.css')

   <style>
    .div_center{
        text-align: center;
        
        padding-top: 40px
    }
    .font_size{
        font-size: 30px;
        padding-bottom: 40px
    }
    .text_type{
        color: black;
        padding-bottom: 20px; 
    }
    lable
    {
        display: inline-block;
        width: 200px;
    }
    .div_design{
        padding-bottom: 15px;
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
                <div class="div_center">
                    @if(session()->has('message'))

                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            {{session()->get('message')}}
                        </div>
                    @endif
                    <h1 class="font_size">update Products</h1>
                   
                    

                    <form action="{{url('/edit_product_data',$product->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <div class="div_design">
                                <lable>Product title : </lable>
                                <input class="text_type" type="text" name="title" value="{{$product->title}}">
                            </div>
                            
                            <div class="div_design">
                                <lable>Product price: </lable>
                                <input class="text_type" type="text" name="price" value="{{$product->price}}">
                            </div>
                            <div class="div_design">
                                <lable>Product quantity : </lable>
                                <input class="text_type" type="text" name="quantity" value="{{$product->quantity}}">
                            </div>
                            <div class="div_design">
                                <lable>Product discount price : </lable>
                                <input class="text_type" type="text" name="discount_price" value="{{$product->discount_price}}">
                            </div>
                            
                            <div class="div_design">
                                <lable>Product description : </lable>
                                <input class="text_type"  type="text" name="description" value="{{$product->description}}">
                            </div>
                            <div class="div_design">
                                <lable>Product catagory : </lable>
                                <select class="text_type" name="catagory" >
                                    <option value="{{$product->catagory}}" selected="">{{$product->catagory}}</option>
                                    @foreach ($catagory as $catagory)
                                        <option value="{{$catagory->catagory_name}}">{{$catagory->catagory_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="div_design">
                                <lable>Current Product Image : </lable>
                                <img style="margin: auto" height="100" width="100" src="/product/{{$product->image}}">
                            </div>

                            <div class="div_design">
                                <lable>Change Product Image : </lable>
                                <input style="width: 200px" type="file" name="image" value="{{$product->image}}">
                            </div>
                            <div class="div_design">
                                <input type="submit" value="Update Product" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>        
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