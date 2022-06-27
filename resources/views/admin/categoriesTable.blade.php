@push('page-head')
<title>Categories</title>
<link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin/categoriesTable.css') }}">
@endpush

@extends('layouts.admin')
@section('content')


<div class="wrapper">

    <div class="categories-table" id="content">
        <div class="d-flex justify-content-between">
            <a id="add-category" class="btn " href="/manage/add-category"><i class="fas fa-plus-circle mr-2"></i>Add New
                Category<i class="fas fa-plus-circle ml-2"></i></a>
        </div>
        <h2>Categories <small>all categories will be here</small></h2>
        <ul class="responsive-table">
            <li class="table-header">
                <div class="col col-1"> ID</div>
                <div class="col col-2">Category Name</div>
                <div class="col col-2 btn-header">Edit</div>
                <div class="col col-2 btn-header">Remove</div>
            </li>
            @foreach ($categories as $category )
            <li class="table-row">
                <div class="col col-1" data-label="Category ID">{{$category->category_id }}</div>
                <div class="col col-2" data-label="Category Name" id="category-name">{{ $category->category_name }}
                </div>
                <div class="col col-2" data-label="Edit"><a href="edit-category/{{ $category->category_id }}"
                        class="btn" id="edit-btn"><i class='fa fa-edit mr-2'></i>Edit</a></div>
                <td><button value="{{ $category->category_id }}" class="delete_category btn btn-sm" id="remove-btn">
                        <i class='fa fa-trash mr-1'></i>
                        Remove</button>
                </td>
            </li>
            @endforeach

        </ul>
    </div>
</div>
<div class="modal fade" id="DeleteCategoryModal" tabindex="-1" aria-labelledby="exampleModalLable" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLable">Delete Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            <div class="modal-body">
                <input type="hidden" id="delete_category_id">
                <h4>Are You Sure that you want to delete this category?</h4>
            </div>
            <div class="modal-footer">
                <button id="close-modal-btn" type="button" class="btn btn-secondary"
                    data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary delete_category_btn">Delete</button>
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
<script src="{{ asset('js/admin/removeCategory.js') }}"></script>
@endsection