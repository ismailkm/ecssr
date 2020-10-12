@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">Students</div>
          <div class="card-body">
            <div class="table-responsive-lg">
            <table class="table table-bordered" id="categories-table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Total Tests</th>
                        <th>Action</th>
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
        ajax: '{!! route("admin.students-list") !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'total_tests', name: 'total_tests' },
            { data: 'action', name: 'action', orderable: false, searchable: false  },
        ],
        dom:'Bfrtip',
        buttons: ['pageLength']
    });
});
</script>
@endpush
