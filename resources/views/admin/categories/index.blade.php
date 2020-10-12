@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">Categories</div>
          <div class="card-body">
            <div class="table-responsive-lg">
            <table class="table table-bordered" id="categories-table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                    </tr>
                </thead>
            </table>
          </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(function() {
    $('#categories-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route("admin.categories-list") !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
        ]
    });
});
</script>
@endpush
