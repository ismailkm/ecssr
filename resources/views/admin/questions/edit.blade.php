@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Edit Question') }}</div>

                @error('correct_answer')
                  <div class="col-sm-12">
                      <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ $message }}</strong>
                      </div>
                  </div>
               @enderror

               @include('admin.common.response')

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.question.update', $question->id) }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" value="put" />
                        <div class="row">
                            <div class="col-md-8">
                              <div class="form-group row">
                                  <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                                  <div class="col-md-8">
                                      <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ isset($question) ? $question->title : old('title') }}" autocomplete="title" autofocus>

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
                                        <option value="{{$category->id}}"
                                          {{ ( $category->id==old('category_id') || $category->id==$question->category_id)? __('selected') : __('')}}
                                          >{{ $category->name }}</option>
                                      @endforeach
                                    </select>

                                      @error('category_id')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>
                              </div>

                              @foreach ($question->answers as $index=>$answer)
                                @php
                                 $answer_title = 'Answer '.($index+1);
                                 $answer_text = 'answer_'.($index+1);
                                @endphp
                                <div class="form-group row">

                                    <label for="{$answer_text}" class="col-md-4 col-form-label text-md-right">{{ __($answer_title) }}</label>

                                    <div class="col-md-7">
                                        <input id="{{$answer_text}}" type="number" class="form-control @error($answer_text) is-invalid @enderror"
                                                 name="{{$answer_text}}"
                                                 value="{{ isset($question) ? $answer->description : old($answer_text) }}"
                                                 autocomplete="{{$answer_text}}" autofocus>
                                        @error($answer_text)
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-1 question-radio-box">
                                        <input type="radio" id="{{$answer_text}}_box" {{($answer->is_correct == true) ? 'checked' : ''}} name="correct_answer" value="{{$answer_text}}">
                                    </div>
                                </div>
                              @endforeach


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
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
