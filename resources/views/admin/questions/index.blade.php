@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">Questions</div>
          <div class="card-body">
            <div class="table-responsive-lg">
            <table class="table table-bordered" id="categories-table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Correct Answer</th>
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
        ajax: '{!! route("admin.questions-list") !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'title', name: 'title' },
            { data: 'category.name', name: 'category.name' },
            { data: 'answers_count', name: 'answers_count' },
            { data: 'action', name: 'action', orderable: false, searchable: false  },
        ],
        dom:'Bfrtip',
        buttons: [
                'pageLength',
                {
                  text: 'Add New',
                  action: function ( e, dt, node, config ) {
                    $(location).attr('href','{!! route("admin.question.create") !!}');
                  }
                }
              ]
    });
});
</script>
@endpush
