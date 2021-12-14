@extends('master')
@section('content')
<div class='container'>
    <div class='row'>
        <div class='col-sm-6'>
            <img class="detail-img" src="{{$product['gallery']}}" alt="image">
        </div>
        <div class='col-sm-6'>
            <a href="/">Go Back</a>
            <h2>Product name: {{$product['name']}}</h2>
            <h3>Price: {{$product['price']}}</h3>
            <h4>Detail: {{$product['description']}}</h4>
            <h4>Category: {{$product['category']}}</h4>
            <br>
            <form action="/add_to_cart" method="post">
                @csrf
                <input type="hidden" name="product_id" value="{{$product['id']}}">
                <button class="btn btn-primary">Add to cart</button>
            </form><br>
            <a href=""><button class="btn btn-success">Buy now</button></a>
        </div>
    </div>
</div>
@endsection