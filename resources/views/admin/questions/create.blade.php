@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Add Question') }}</div>
                @error('correct_answer')
                  <div class="col-sm-12">
                      <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ $message }}</strong>
                      </div>
                  </div>
               @enderror

               @include('admin.common.response')

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.question.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-8">
                              <div class="form-group row">
                                  <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                                  <div class="col-md-8">
                                      <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" autocomplete="title" autofocus>

                                      @error('title')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>

                              <div class="form-group row">
                                  <label for="category_id" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                                  <div class="col-md-8">
                                    <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
                                      <option value="">{{ __('-- Select --') }}</option>
                                      @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{ $category->id==old('category_id')? __('selected') : __('')}} >{{ $category->name }}</option>
                                      @endforeach
                                    </select>

                                      @error('category_id')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>

                              <div class="form-group row">
                                  <label for="answer_1" class="col-md-4 col-form-label text-md-right">{{ __('Answer 1') }}</label>

                                  <div class="col-md-7">
                                      <input id="answer_1" type="number" class="form-control @error('answer_1') is-invalid @enderror" name="answer_1" value="{{ old('answer_1') }}" autocomplete="answer_1" autofocus>
                                      @error('answer_1')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                                  <div class="col-md-1 question-radio-box">
                                      <input type="radio" id="answer_1_box" checked name="correct_answer" value="answer_1">
                                  </div>
                              </div>

                              <div class="form-group row">
                                  <label for="answer_2" class="col-md-4 col-form-label text-md-right">{{ __('Answer 2') }}</label>

                                  <div class="col-md-7">
                                      <input id="answer_2" type="number" class="form-control @error('answer_2') is-invalid @enderror" name="answer_2" value="{{ old('answer_2') }}" autocomplete="answer_2" autofocus>

                                      @error('answer_2')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                                  <div class="col-md-1 question-radio-box">
                                      <input type="radio" id="answer_2_box" name="correct_answer" value="answer_2">
                                  </div>
                              </div>

                              <div class="form-group row">
                                  <label for="answer_3" class="col-md-4 col-form-label text-md-right">{{ __('Answer 3') }}</label>

                                  <div class="col-md-7">
                                      <input id="answer_3" type="number" class="form-control @error('answer_3') is-invalid @enderror" name="answer_3" value="{{ old('answer_3') }}" autocomplete="answer_3" autofocus>

                                      @error('answer_3')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                                  <div class="col-md-1 question-radio-box">
                                      <input type="radio" id="answer_3_box" name="correct_answer" value="answer_3">
                                  </div>
                              </div>

                              <div class="form-group row">
                                  <label for="answer_4" class="col-md-4 col-form-label text-md-right">{{ __('Answer 4') }}</label>

                                  <div class="col-md-7">
                                      <input id="answer_4" type="number" class="form-control @error('answer_4') is-invalid @enderror" name="answer_4" value="{{ old('answer_4') }}" autocomplete="answer_4" autofocus>
                                      @error('answer_4')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                                  <div class="col-md-1 question-radio-box">
                                      <input type="radio" id="answer_4_box" name="correct_answer" value="answer_4">
                                  </div>
                              </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Create') }}
                                    </button>
                                </div>
                            </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
