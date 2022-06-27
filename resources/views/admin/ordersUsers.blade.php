@push('page-head')
<title>Best Price</title>
<link rel="stylesheet" href="{{ asset('css/productsTable.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
@endpush

@extends('layouts.admin')
@section('content')
<div class="wrapper">
    <section id="content">
        <div class="d-flex justify-content-end mr-2">
        </div>
        <!--for demo wrap-->
        <h1 id="header">All Orders</h1>
        <div class="tbl-header">
            <table cellpadding="0" cellspacing="0" border="0">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>User Name</th>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Ratig</th>
                        <th>Edit</th>
                        <th>Remove</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="tbl-content">
            <table cellpadding="0" cellspacing="0" border="0">
                <tbody>
                    @foreach ($usersOrders as $userOrder)
                    <tr>
                        <td>{{ $userOrder->user_id }}</td>
                        <td>{{ $userOrder->name}} </td>
                        <td>{{ $userOrder->id}} </td>
                        <td>{{ $userOrder->product_name}} </td>
                        <td>{{ $userOrder->price}}</td>
                        <td>{{ $userOrder->qty }}</td>
                        <td>{{ $userOrder->rating }} <span id="fill-star" class="fa fa-star checked"></span></td>
                        <td><a href="" class="table-view-btn btn btn-sm"><i
                                    class='fa fa-edit mr-2'></i>Edit</a>
                        <td><button value="" class="delete_product btn btn-sm" id="remove-btn">
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
<div class="modal fade" id="DeleteProductModal" tabindex="-1" aria-labelledby="exampleModalLable" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLable">Delete Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            <div class="modal-body">
                <input type="hidden" id="delete_product_id">
                <h4>Are You Sure that you want to delete this product?</h4>
            </div>
            <div class="modal-footer">
                <button id="close-modal-btn" type="button" class="btn btn-secondary"
                    data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary delete_product_btn">Delete</button>
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

<script src="{{ asset('js/admin/removeProduct.js') }}"></script>
@endsection