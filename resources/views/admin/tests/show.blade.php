@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">Test Detail</div>
          <div class="card-body">

            <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                      <label for="status_id" class="col-md-4 text-md-right"><strong>{{ __('Test Date') }}:</strong></label>

                      <div class="col-md-8">
                        {!! \Carbon\Carbon::parse($exam->created_at)->format('d-m-Y h:i A') !!}
                      </div>
                  </div>

                </div>
                <div class="col-md-6">
                  <div class="form-group row">
                      <label for="assigned_id" class="col-md-4 text-md-right"><strong>{{ __('Student Name') }}:</strong></label>

                      <div class="col-md-8">
                        {{ $exam->student->name }}
                      </div>
                  </div>
                </div>
            </div>

          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="card">
            <div class="card-header">Answers</div>
            <div class="card-body">
              <div class="table-responsive-lg">

              <table class="table table-bordered" id="orders-table">
                  <thead>
                      <tr>
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Result</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($exam->results as $result)
                      <tr>
                        <td>{{ $result->question->title }}</td>
                        <td>{{ $result->answer }}</td>
                        <td>
                            @if($result->is_correct)
                               <span class="alert alert-success p-2">Correct</span>
                            @else
                              <span class="alert alert-danger p-2">Wrong</span>
                            @endif
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
              </table>
            </div>
            </div>
        </div>
      </div>

    </div>
</div>



@endsection
