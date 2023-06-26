<section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               @if(session()->has('message'))

                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            {{session()->get('message')}}
                        </div>
                    @endif
               <h2>
                  Our <span>products</span>
               </h2>
            </div>
            <div class="row">
               
               @foreach ($product as $products)
                  <div class="col-sm-6 col-md-4 col-lg-4">
                     <div class="box">
                        <div class="option_container">
                           <div class="options">
                              <a href="{{url('product_details',$products->id)}}" class="option1">
                              Product Details
                              </a>
                              <a href="{{url('add_cart',$products->id)}}" class="option2">
                              Add to cart
                              </a>
                           </div>
                        </div>
                        <div class="img-box">
                           <img src="/product/{{$products->image}}" alt="">
                        </div>
                        <div class="detail-box">
                           <h5>
                              {{$products->title}}
                           </h5>

                           @if($products->discount_price != null)
                              <h6 style="color: blue;">
                                 Price
                                 <br>
                                 <p style="color: red;">{{$products->discount_price}}/₹</p>
                                 <p style="text-decoration: line-through; color: blue;">{{$products->price}}/₹<p>
                              </h6>
                           
                           @else
                              <h6 style="color: blue;">
                                 Price
                                 <br>
                                 {{$products->price}}/₹
                              </h6>
                           @endif
                        </div>
                     </div>
                  </div>
               @endforeach
               
               <span style="padding-top: 20px">
                  {!!$product->withQueryString()->links('pagination::bootstrap-5')!!}
               </span>

            </div>
               
               
         </div>
      </section>