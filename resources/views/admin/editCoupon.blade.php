@push('page-head')
<title>Edit Coupon</title>
<link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin/addProduct.css') }}">
@endpush

@extends('layouts.admin')
@section('content')
<div class="wrapper">
    <div id="content">
        <div class="add-box">
            <h2 class="mb-5">Edit Coupon</h2>
            <form id="add-form" action="{{ route('update-coupon') }}" method="POST">
                @csrf
                <input type="text" name="id" value="{{ $row->coupon_id }}" hidden>
                <div class="two-field">
                    <div class="user-box">
                        <input type="text" name="couponName" required="" value="{{ $row->coupon_name }}">
                        <label>Coupon Name</label>
                    </div>
                    <div class="user-box">
                        <input type="text" name="coupon_code" required="" value="{{ $row->coupon_code }}">
                        <label>Coupon Code</label>
                    </div>
                </div>

                <div class="two-field">
                    <div class="user-box">
                        <select name="discount_type" id="select-categorey">
                            @if ($row->discount_type == 'Amount')
                            <option selected>Amount</option>
                            <option>Percent</option>
                            @else
                            <option>Amount</option>
                            <option selected>Percent</option>
                            @endif
                        </select>
                        <label>Discount Type </label>
                    </div>
                    <div class="user-box">
                        <input type="text" name="coupon_amount" value="{{ $row->coupon_amount }}" required>
                        <label>Coupon Amount</label>
                    </div>
                </div>
                <div class="two-field">
                    <div class="user-box">
                        <input type="date" name="expiry_date" value="{{ $row->expiry_date }}">
                        <label>Expiry Date</label>
                    </div>
                    <div class="user-box">
                        <input type="text" name="usage_limit" value="{{ $row->usage_limit }}">
                        <label>Usage Limit</label>
                    </div>
                </div>
                <div class="two-field">
                    <div class="user-box">
                        <input type="text" name="minimum_spend" value="{{ $row->minimum_spend }}">
                        <label>Minimum Spend</label>
                    </div>
                    <div class="user-box">
                        <input type="text" name="maximum_spend" value="{{ $row->maximum_spend }}">
                        <label>Maximum Spend</label>
                    </div>
                </div>
                <div class="two-field">
                    <div class="user-box">
                        <input type="text" name="only_for_product" value="{{ $row->only_for_product }}">
                        <label>Only For Product</label>
                    </div>
                    <div class="user-box">
                        <input type="text" name="only_for_user" value="{{ $row->only_for_user }}">
                        <label>Only For User</label>
                    </div>
                </div>
                <div id="add-submit">
                    <button href="#">
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