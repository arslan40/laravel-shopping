
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   
  </head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-light" >
        <a class="text-secondary"><h3 class="mr-5">Shopping</h3></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-nav">
        <a class="btn btn-outline-secondary mr-2" href="/view_home">Home <span class="sr-only">(current)</span></a>
        {{-- <a class="btn btn-outline-secondary mr-2" href="/view_product">Product <span class="sr-only">(current)</span></a> --}}
        <a class="btn btn-outline-secondary mr-5 " href="/view_category">category <span class="sr-only">(current)</span></a>
        <a class="text-secondary"  href="/view_cart">Shopping Cart <span class="badge badge-warning" id="thisone">{{Session::has('cart')?Session::get('cart')->totalQty:''}}</span></a>
        </div>
      </nav>
      @yield('content')
</body>
</html>
@yield('script')