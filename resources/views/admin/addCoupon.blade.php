@push('page-head')
<title>Add Coupon</title>
<link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin/addProduct.css') }}">
@endpush

@extends('layouts.admin')
@section('content')
<div class="wrapper">
    <div id="content">
        <div class="add-box">
            <h2>Add Coupon</h2>
            <form id="add-form" action="add-coupon" method="POST">
                @csrf
                <h5 class="text-primary">General</h5>
                <hr class="bg-primary">
                <div class="two-field">
                    <div class="user-box">
                        <input type="text" name="couponName" required="">
                        <label>Coupon Name</label>
                    </div>
                    <div class="user-box">
                        <input type="text" name="coupon_code" required="">
                        <label>Coupon Code</label>
                    </div>
                </div>

                <div class="two-field">
                    <div class="user-box">
                        <select name="discount_type" id="select-categorey">
                            <option>Amount</option>
                            <option>Percent</option>
                        </select>
                        <label>Discount Type </label>
                    </div>
                    <div class="user-box">
                        <input type="text" name="coupon_amount" required="">
                        <label>Coupon Amount</label>
                    </div>
                </div>
                <div class="two-field">
                    <div class="user-box">
                        <input type="date" name="expiry_date">
                        <label>Expiry Date</label>
                    </div>
                    <div class="user-box">
                        <input type="text" name="usage_limit" required="">
                        <label>Usage Limit</label>
                    </div>
                </div>
                <h5 class="text-primary mt-4">Usage Restruction</h5>
                <hr class="bg-primary">
                <div class="two-field">
                    <div class="user-box">
                        <input type="text" name="minimum_spend">
                        <label>Minimum Spend </label>
                    </div>
                    <div class="user-box">
                        <input type="text" name="maximum_spend">
                        <label>Maximum Spend</label>
                    </div>
                </div>
                <div class="two-field">
                    <div class="user-box">
                        <input type="text" name="only_for_product">
                        <label>Only For Product </label>
                    </div>
                    <div class="user-box">
                        <input type="text" name="only_for_user">
                        <label>Only For User</label>
                    </div>
                </div>
                <div id="add-submit">
                    <button href="add-product">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection