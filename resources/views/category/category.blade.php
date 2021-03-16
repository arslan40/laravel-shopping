
@extends('layout.app')
@section('content')

 <!DOCTYPE html>
<html>
<head>
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: left;
  text-align: center;
  font-family: arial;
}

.price {
  color: grey;
  font-size: 22px;
}

.card button {
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

.card button:hover {
  opacity: 0.7;
}
</style>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
<div style="display: inline-flex">
    
    @foreach ($products as $key => $item)
    @php
    $phpArray = array(
        'id'=>$item->id,
        'name'=>$item->Name,
        'price'=>$item->Price,
        'image'=>$item->image,
    );
  
    @endphp
        <div class="card ">
         
         <form action="view_product/{{$item->url_key}}" method="Get">
            <img src={{$item->image}} alt="Denim Jeans" style="width: auto;
            min-height: 350px;
            height: 100%;
            max-height: 400px;
            object-fit: contain;">
            <h2>{{$item->Name}}</h2>
            <p class="price">Rs.{{$item->Price}}</p>
           
            {{-- <p><button onclick="addCart()">Add Cart</button></p><br> --}}
            {{-- <a class="btn btn-outline-success" href="">Add Cart <span class="sr-only">(current)</span></a><br> --}}
            <input class="btn btn-secondary btn-lg btn-block" type="submit" value="View Product">
            
         </form>
          </div>   
    @endforeach

</div>

</body>
</html>

@endsection
 <script>
        function addCart(){
            var data=<?php echo json_encode($phpArray);?>;
            console.log(data);
            // for(var i =0; i<data.length;i++){
            //     // console.log("this is i-th index ",data[i]);
            // }
            // var products = '<?php echo $products[1]?>';
            // console.log("product id is = ", products);
        }
        function addone()
        {
          var foo =document.getElementById('thisone').innerHTML
          foo++;
          document.getElementById('thisone').innerHTML=foo;
        }
</script> 