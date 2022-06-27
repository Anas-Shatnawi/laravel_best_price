@push('page-head')
<title>Coupons</title>
<link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
<link rel="stylesheet" href="{{ asset('css/productsTable.css') }}">
@endpush

@extends('layouts.admin')
@section('content')
<div class="wrapper">
    <section id="content">
        <div class="d-flex justify-content-between">
            <a id="add-product" class="btn " href="/manage/add-coupon"><i class="fas fa-plus-circle mr-2"></i>Add New
                Coupon<i class="fas fa-plus-circle ml-2"></i></a>
        </div>
        <!--for demo wrap-->
        <h1 id="header">All Coupons</h1>
        <div class="tbl-header">
            <table cellpadding="0" cellspacing="0" border="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Amount</th>
                        <th>Discount Type</th>
                        <th>Created Date</th>
                        <th>Expiry Date</th>
                        <th>Maximum Spend</th>
                        <th>Minimum Spend</th>
                        <th>Edit</th>
                        <th>Remove</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="tbl-content">
            <table cellpadding="0" cellspacing="0" border="0">
                <tbody>
                    @foreach ($coupons as $coupon)
                    <tr>
                        <td>{{ $coupon->coupon_id }}</td>
                        <td>{{ $coupon->coupon_code }}</td>
                        <td>{{ $coupon->coupon_name }} </td>
                        <td>{{ $coupon->coupon_amount }}</td>
                        <td>{{ $coupon->discount_type }}</td>
                        <td>{{ $coupon->created_date }}</td>
                        <td>{{ $coupon->expiry_date }}</td>
                        <td><span class="text-success">$</span>{{ $coupon->maximum_spend }}</td>
                        <td><span class="text-success">$</span>{{ $coupon->minimum_spend }}</td>
                        <td><a href="edit-coupon/{{ $coupon->coupon_id }}" class="table-view-btn btn btn-sm"><i
                                    class='fa fa-edit mr-2'></i>Edit</a>
                        </td>
                        <td><button value="{{ $coupon->coupon_id }}" class="delete_coupon btn btn-sm" id="remove-btn">
                                <i class='fa fa-trash mr-1'></i>
                                Remove</button>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </section>
</div>
<div class="modal fade" id="DeleteCouponModal" tabindex="-1" aria-labelledby="exampleModalLable" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLable">Delete Coupon</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            <div class="modal-body">
                <input type="hidden" id="delete_coupon_id">
                <h4>Are You Sure that you want to delete this Coupon?</h4>
            </div>
            <div class="modal-footer">
                <button id="close-modal-btn" type="button" class="btn btn-secondary"
                    data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary delete_coupon_btn">Delete</button>
            </div>
        </div>
    </div>

</div>
<script>
    $(window).on("load resize ", function() {
    var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
    $('.tbl-header').css({'padding-right':scrollWidth});
    }).resize();
</script>
<script src="{{ asset('js/admin/removeCoupon.js') }}"></script>
@endsection