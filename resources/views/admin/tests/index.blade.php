@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">Tests</div>
          <div class="card-body">
            <div class="table-responsive-lg">
            <table class="table table-bordered" id="categories-table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Student Name</th>
                        <th>Date</th>
                        <th>Result</th>
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
        ajax: '{!! route("admin.tests-list") !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'student.name', name: 'student.name' },
            { data: 'created_at', name: 'created_at' },
            { data: 'result', name: 'result' },
            { data: 'action', name: 'action', orderable: false, searchable: false  },
        ],
        "search": {
          "search": "{{ $search }}"
        },
        dom:'Bfrtip',
        "order": [[ 2, "desc" ]],
        buttons: [ 'pageLength'  ]
    });
});
</script>
@endpush
