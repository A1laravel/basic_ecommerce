@extends('master')
@section('content')
<div class="custom-product">
    <div class="col-sm-10">
        <div class="trending-wrapper">
            <h4>Result for products</h4>
            <a class="btn btn-success" href="ordernow">Order now</a><br><br>
            @foreach($products as $item)
                <div class="row searched-item cart-list-divider">
                    <div class="col-sm-3">
                        <a href="detail/{{$item->id}}">
                            <img class="trending-image" src="{{$item->gallery}}" alt="Image">
                        </a>
                    </div>
                    <div class="col-sm-4">
                        <a href="detail/{{$item->id}}">
                            <div class="">
                                <h2>{{$item->name}}</h2>
                                <h5>{{$item->description}}</h5>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-3">
                        <a href="removecart/{{$item->cart_id}}" class="btn btn-warning">Remove from cart</a>
                    </div>
                </div>
            @endforeach
        </div>
        <a class="btn btn-success" href="ordernow">Order now</a>
    </div>
</div>
@endsection