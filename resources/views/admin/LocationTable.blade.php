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
            <a id="add-product" class="btn " href="/manage/add-location"><i class="fas fa-plus-circle mr-2"></i>Add New
                Location <i class="fas fa-plus-circle ml-2"></i></a>
        </div>
        <!--for demo wrap-->
        <h1 id="header">All Locations</h1>
        <div class="tbl-header">
            <table cellpadding="0" cellspacing="0" border="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>City</th>
                        <th>Street</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="tbl-content">
            <table cellpadding="0" cellspacing="0" border="0">
                <tbody>
                    @foreach ($locations as $location)
                    <tr>
                        <td>{{ $location->id }}</td>
                        <td>{{ $location->city }} </td>
                        <td>{{ $location->street }}</td>
                        <td><a href="edit-location\{{ $location->id }}" class="table-view-btn btn btn-sm"><i
                                    class='fa fa-edit mr-2'></i>Edit</a>
                        <td><button value="{{ $location->id }}" class="delete_location btn btn-sm" id="remove-btn">
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
<div class="modal fade" id="DeleteLocationModal" tabindex="-1" aria-labelledby="exampleModalLable" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLable">Delete Location</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            <div class="modal-body">
                <input type="hidden" id="delete_location_id">
                <h4>Are You Sure that you want to delete this Location?</h4>
            </div>
            <div class="modal-footer">
                <button id="close-modal-btn" type="button" class="btn btn-secondary"
                    data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary delete_location_btn">Delete</button>
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

<script src="{{ asset('js/admin/removeLocation.js') }}"></script>
@endsection