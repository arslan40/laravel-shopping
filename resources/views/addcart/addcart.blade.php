@extends('layout.app')
@section('content')

<section class="container">
 
  @if(count((array)Session::get('cart')))
    <div class="row">
      <div class="col-lg-6">
        <div class="mb-3">
          <div class="pt-4 wish-list">
            {{-- <h5 class="mb-4">Cart (<span>2</span> items)</h5> --}}
            <div class="row mb-4">
              <ul class="list-group">
              @foreach($products as $product)
              <li class="list-group-item">
                <span class="badge" name="span_qty">{{$product['qty']}}</span>
                <img class="img-fluid w-100" src="{{$product['item']['image']}}" alt="Sample"   style=" 
                  max-width: 10%;
                  height: auto;"
                  />
                <input type="hidden" name="product_id" value="{{$product['item']['id']}}"/>
                <strong> {{$product['item']['Name']}}</strong>
                Rs.<span id="totalProductPrice" name ="totalProductPrice" class="label label-sucesss">{{ $product['qty'] *$product['price']}}</span>
            
              <div> 
                Unit Price Rs.<span id="unitprice" class="badge">{{$product['item']['Price']}}</span>
                <div class="def-number-input number-input safari_only mb-0 w-100">
                 <input class="quantity" min="1" name="quantity" value="{{$product['qty']}}" type="number">
                </div><br>
                <a href='/delete_cart/{{$product['item']['id']}}' type="button" class="btn btn-danger"> Remove item </a>
              </div><br>
            </li>
              @endforeach  
              </ul>
            </div>
            <hr class="mb-4">
           
            <p class="text-primary mb-0"><i class="fas fa-info-circle mr-1"></i> Do not delay the purchase, adding
              items to your cart does not mean booking them.</p>
          </div>
        </div>  
      </div>
      <div class="col-lg-4">
        <div class="mb-3">
          <div class="pt-4">
            <h5 class="mb-3">The total amount of</h5>
            <ul class="list-group list-group-flush">
              {{-- <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                Temporary amount
                <span>$25.98</span>
              </li> --}}
              {{-- <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                Shipping
                <span>N/A</span>
              </li> --}}
              <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                <div>
                  <strong>The total amount of</strong>
                  <strong>
                    <p class="mb-0">(including VAT)</p>
                  </strong>
                </div>
                <span>Rs.<strong id="grandTotal">{{$totalPrice}}</strong></span>
              </li>
            </ul>
            <a type="button"  href="/check_out" class="btn btn-primary btn-block">go to checkout</a>
          </div>
        </div>
        <div class="mb-3">
          <div class="pt-4">
            <a class="dark-grey-text d-flex justify-content-between" data-toggle="collapse" href="#collapseExample"
              aria-expanded="false" aria-controls="collapseExample">
              Add a discount code (optional)
              <span><i class="fas fa-chevron-down pt-1"></i></span>
            </a>
            <div class="collapse" id="collapseExample">
              <div class="mt-3">
                <div class="md-form md-outline mb-0">
                  <input type="text" id="discount-code" class="form-control font-weight-light"
                    placeholder="Enter discount code">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  @else
    <h2>There is nothing added to the cart</h2>
  @endif
</section>
@endsection

<script>

document.addEventListener('change', function (e){
let element= e.target;
let productprice=element.parentElement.previousElementSibling.parentElement.previousElementSibling;
let unitprice=element.parentElement.previousElementSibling.innerHTML;
console.log('Unit PPP',unitprice);
console.log('element',element.value);
let total_product_price = document.getElementById("totalProductPrice") ;

element= parseInt(element.value)
let unit_price =document.getElementById("unitprice").innerHTML ;
// console.log('unit price',unit_price)
total_product_price= element*unitprice;
productprice.innerHTML=total_product_price
let grand_total = document.getElementById("grandTotal");
// let span_qty=document.getElementsByName("span_qty");

  var shopping_cart_counter =document.getElementById('thisone');
  let quantities = document.getElementsByName('quantity');
  let produt_total_prices = document.getElementsByName('totalProductPrice');
  let temp_counter = 0;
  let temp_grand_total = 0.0;
  let product_total_prices_values_array=[]
  let product_total_quantities_values_array=[]
  let product_ids=[]
  let temp_ids=document.getElementsByName("product_id");
  for(var i = 0; i<quantities.length; i++){

    product_ids.push(temp_ids[i].value);
    product_total_quantities_values_array.push(parseInt(quantities[i].value));
    temp_counter = temp_counter + parseInt(quantities[i].value);
    console.log(produt_total_prices[i].innerHTML)
    temp_grand_total = temp_grand_total + parseFloat(produt_total_prices[i].innerHTML);
    // quantities[i].value=span_qty.innerHTML;
  }
  shopping_cart_counter.innerHTML = parseInt(temp_counter);
  grand_total.innerHTML = parseInt(temp_grand_total);  

  let request=new XMLHttpRequest();

  request.open('POST','/ajax_call');
  request.setRequestHeader("Content-Type","application/json");
  // request.setRequestHeader("Accept","application/")
    

  // var cart = {'message':"a quick brown fox jumps over the lazy dog."}
  var data = {
     _token:"{{ csrf_token()}}",
   'quantities_array':product_total_quantities_values_array,
   "product_ids_arrays": product_ids,
   }

    request.send(JSON.stringify(data));
    request.onreadystatechange = function() {
        console.log('response status is ', this.status);
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
    }
  };

});
</script>

