@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="row card-body">
                  <div class="col-sm-3">
                    <div class="card">
                      <div class="card-header">
                        Students Count
                      </div>
                      <div class="card-body">
                        {{ $total_students }}
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="card">
                      <div class="card-header">
                        Exam Counts
                      </div>
                      <div class="card-body">
                        {{ $total_test }}
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="card">
                      <div class="card-header">
                        Categories Count
                      </div>
                      <div class="card-body">
                        {{ $total_cats }}
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="card">
                      <div class="card-header">
                        Questions Count
                      </div>
                      <div class="card-body">
                        {{ $total_questions }}
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
