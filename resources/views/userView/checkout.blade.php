@push('page-head')
<title>Checkout</title>
<link rel="stylesheet" href="{{ asset('css/checkout.css') }}">
@endpush

@extends('layouts.app')
@section('content')
<div class="container checkout">
    <div class="container-details">
        <div class="basic-details" id="basic-details">
            <div class="card">
                <div class="card-body">
                    <h6>Basic Details</h6>
                    <hr>
                    <div class="field-container">
                        @foreach ($user as $user)
                            
                        <div class="input-box">
                            <label for="name">Name</label>
                            <input class="form-controller" type="text" name="name" placeholder="Name" value="{{ $user->name }}" disabled>
                        </div>
                        <div class="input-box">
                            <label for="email">email</label>
                            <input class="form-controller" type="text" name="email" placeholder="user@app.com" value="{{ $user->email }}" disabled>
                        </div>
                        <div class="input-box">
                            <label for="phone_number">Phone Number</label>
                            <input class="form-controller" type="text" name="phone_number" placeholder="Phone Number" value="{{ $user->phoneNumber }}" disabled>
                        </div>
                        <div class="input-box">
                            <label for="street">Street</label>
                            <input class="form-controller" type="text" name="street" placeholder="Street" value="{{ $user->street }}" disabled>
                        </div>
                        <div class=" input-box">
                            <label for="city">City</label>
                            <input class="form-controller" type="text" name="city" placeholder="City" value="{{ $user->city }}" disabled>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="card-footer">
                    <p>You Can Change Your Information From Settings</p>
                </div>
            </div>
        </div> 
        <div class="other-details">
            <div class="card">
                <div class="card-body">
                    <h6>
                        Order Details
                    </h6>
                    <table class="table">
                        <thead>
                            <th>Name</th>
                            <th>Qty</th>
                            <th>Price</th>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td>{{ $product['item']['name'] }}</td>
                                <td>{{ $product['qty'] }}</td>
                                <td>{{ $product['price'] }}</td>
                            </tr>   
                            
                            @endforeach
                        </tbody>
                    </table>
                    <hr>
                    <form action="{{ route('placeOrder') }}" method="POST" >
                        @csrf
                        <div class="place-order">
                            <button class="btn">Place Order</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection