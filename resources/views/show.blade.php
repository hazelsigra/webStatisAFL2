@extends('Layout.MainLayout')

@section('container')
<div class="container">
    @error('insert_cart')
        @if (str_contains($message, 'ok'))
            <div class="alert alert-success" role="alert">Yeay! Item successfully added to cart.</div>
        @else
            <div class="alert alert-danger" role="alert">Oops! .</div>
        @endif
    @enderror
    <div class="row">
        <div class="col-md-6">
            <img src="../images/{{ $menu['photo']}}" class="img-thumbnail rounded mx-auto d-block">
        </div>
        <div class="col-md-6 px-5">
            <h2>Name : {{ $menu['name'] }}</h2>
            <h2>Description : {{ $menu['description'] }}</h2>        
        </div>
    </div>
    <div class="row my-3">
        <div class="col-md">
            <button class="btn btn-lg btn-outline-primary w-100"><a href="/cart/set/{{ $menu['id'] }}" class="text-decoration-none text-reset">Add to cart</a></button>
        </div>
    </div>
</div>

@endsection