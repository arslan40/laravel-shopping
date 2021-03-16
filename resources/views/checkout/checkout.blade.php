@extends('layout.app')
@section('content')

<div class="row">   
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


<form action="/store_checkout" method="POST">
    @csrf
    <div class="form-group container" style="width:90%;">
        <label for="Name">Name</label>
        <input type="text" name="name"class="form-control" placeholder="Enter name">

        <label for="Email">Email address</label>
        <input type="text"  name="email" class="form-control" placeholder="Enter email">
        
        <label for="Phone_number">Phone Number</label>
        <input type="text" class="form-control" name="phone_number" placeholder="Enter Phone number">

        <label for="Address">Address</label>
        <input type="text" class="form-control" name="address" placeholder="Enter Address"><br>
        
        <label for="payment_method">Payment Method</label>
        <select name="payment_method" id="payment_method">
            <option value="master_card">Master Card</option>
            <option value="visa_card">Visa Card</option>
        </select><br>
        
        <br><button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>
  @endsection
  