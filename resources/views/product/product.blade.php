@extends('layout.app')
@section('content')

<div class="super_container">
    @csrf   
    <div class="single_product">
        <div class="container-fluid" style=" background-color: #fff; padding: 11px;">
            <div class="row">
                <div class="col-lg-2 order-lg-1 order-2">
                    <ul class="image_list">
                        <li data-image="public/images/jean.jpg"><img src="/{{$product->image}}"  style="height: 100%;
                            max-height: 460px;
                            min-height: 200px;
                            width: auto;"
                         alt="">
                         <h3>{{$product->Name}}</h3>
                         <p class="price">Rs.{{$product->Price}}</p></li>
                         {{-- <li data-image="public/images/jean.jpg"><img src="/images/pic2.jpg" alt=""></li>
                         <li data-image="public/images/jean.jpg"><img src="/images/jean.jpg" alt=""></li>
                        <li data-image="public/images/jean.jpg"><img src="/images/category.jpg" alt=""></li> --}}
                    </ul>
                </div>
                <div class="col-lg-4 order-lg-2 order-1">
                    {{-- <div class="image_selected"><img src="https://i.imgur.com/qEwct2O.jpg" alt=""></div> --}}
                </div>
                <div class="col-lg-6 order-3">
                    <div class="product_description">
                        
                        <div class="product_name">Jeans</div>
                        <div class="product-rating"><span class="badge badge-success"><i class="fa fa-star"></i> 3.8 Star</span> <span class="rating-review">35 Ratings & 45 Reviews</span></div>
                        {{-- <div> <span class="product_price">Rs.2900</span> <strike class="product_discount"> <span style='color:black'>3500<span> </strike> </div> --}}
                        {{-- <div> <span class="product_saved">You Saved:</span> <span style='color:black'>Rs.600<span> </div> --}}
                        <hr class="singleline">
                        <div> <span class="product_info">Many people find that jeans tend to have quite a small fitting and will, therefore, size up. However if in doubt, be sure to check 
                            out Armani's online size guide where you can find the equivalent dress size for each of their waist fittings.<span><br><span class="product_info">7 Days easy return policy<span><br> </div>
                        <div>
                            {{-- <button type="button"  class="btn btn-success">Add to cart</button> --}}
                            
                            {{-- <button type="button"  class="btn btn-success">Add to cart</button> --}}
                            <a class="btn btn-primary" href="{{route('getAddToCart',['id'=>$product->id])}}">Add to cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
    <script>
        function addone()
        {
            var product = 
                {
                    id:"<?php echo $product->id; ?>",
                    Name:"<?php echo $product->Name; ?>",
                    Price:"<?php echo $product->Price; ?>",
                    image:"<?php echo $product->image; ?>",
                    url_key:"<?php echo $product->url_key; ?>"
                };
            console.log("product-->",product);
            var foo =document.getElementById('thisone').innerHTML
            foo++;
            document.getElementById('thisone').innerHTML=foo;

            <?php
                session_start();
            
                $_Session['cart']="testing cart";
            
            ?>
            
        }
        function testSession(){
            console.log("calling");
            <?php

                $test = $_Session['cart'];
            ?>
            console.log("session is",<?php echo $test;?>)
        }
    </script>
@endsection
 