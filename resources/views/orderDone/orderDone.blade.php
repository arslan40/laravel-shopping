@extends('layout.app')
@section('content')
@csrf

<h1>Order Success</h1>

<div class="row">
    <div class="col-lg-6">
      <div class="mb-3">
        <div class="pt-4 wish-list">
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
          </li>
            @endforeach  
            </ul>
          </div>
          <hr class="mb-4">
        </div>
      </div>  
    </div>
    <div class="col-lg-4">
      <div class="mb-3">
        <div class="pt-4">
          <h5 class="mb-3">The total amount of</h5>
          <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
              <div>
                <strong>The total amount of</strong>
                <strong>
                  <p class="mb-0">(including VAT)</p>
                </strong>
              </div>
              <span>Rs.<strong name="grand_total" id="grandTotal">{{$totalPrice}}</strong></span>
            </li>
          </ul>
        </div>
      </div>
      <div class="mb-3">
        <div class="pt-4">
          <div class="collapse" id="collapseExample">
            <div class="mt-3">
              <div class="md-form md-outline mb-0">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection