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
            <a id="add-product" class="btn " href="/manage/add-product"><i class="fas fa-plus-circle mr-2"></i>Add New
                Product<i class="fas fa-plus-circle ml-2"></i></a>
        </div>
        <!--for demo wrap-->
        <h1 id="header">All Products</h1>
        <div class="tbl-header">
            <table cellpadding="0" cellspacing="0" border="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Categorey</th>
                        <th>Created Date</th>
                        <th>Sold Quantity</th>
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
                    @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }} </td>
                        <td><span class="text-success">$</span>{{ $product->price }}</td>
                        @foreach ($categories as $category )
                        @if ($category->category_id ==$product->cate_id)
                        <td>{{ $category->category_name }}</td>
                        @endif
                        @endforeach
                        <td>{{ $product->created_date }}</td>
                        <td>{{ $product->sold_quantity }}</td>
                        <td>{{ $product->rating }} <span id="fill-star" class="fa fa-star checked"></span></td>
                        <td><a href="edit-product\{{ $product->id }}" class="table-view-btn btn btn-sm"><i
                                    class='fa fa-edit mr-2'></i>Edit</a>
                        <td><button value="{{ $product->id }}" class="delete_product btn btn-sm" id="remove-btn">
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