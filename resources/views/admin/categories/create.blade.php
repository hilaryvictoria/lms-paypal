@extends('layouts.backend.admin-app')

@push('css')
<link rel="stylesheet" href="{{ asset('/assets/backend/css/custom-admin.css') }}">
@endpush

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="card card-secondary" style="margin-top: 100px;">
                <div class="card-header">
                    <h3 class="card-title">Add new category</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <form action="{{route('admin.categories.store')}}" method="POST" class="mt-2 mb-2">
                    @csrf

                        <div class="form-group row option-item">
                            <div class="col-6">
                                <p class="option-main-title">Category title</p>
                                <p class="option-description">The title of the category.</p>

                            </div>
                            <div class="col-6">
                                <input class="form-control" type="text" name="title" id="title-text-input" value="{{old('title')}}">
                                <p style="color:red;">{{ $errors->first('title') }}</p>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group row option-item">
                            <div class="col-6">
                                <p class="option-main-title">Category description</p>
                                <p class="option-description">Description of the category.</p>

                            </div>
                            <div class="col-6">
                            <textarea id="description-textarea" class="form-control" maxlength="225" rows="5" name="description">{{old('description')}}</textarea>
                                <p style="color:red;">{{ $errors->first('description') }}</p>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group row option-item">
                            <div class="col-6">
                                <p class="option-main-title">Course</p>
                                <p class="option-description">Select the course to which the category belongs</p>

                            </div>
                            <div class="col-6">
                                <select id="course" class="custom-select" name="course" autocomplete="off">
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->title }}</option>
                                @endforeach
                            </select>
                                <p style="color:red;">{{ $errors->first('course') }}</p>
                            </div>
                        </div>
                        <hr>




                        <div class="form-group row mb-0 mt-4">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary mt-5">Save</button>
                            </div>
                        </div>

                    </form>

                </div>

            </div>

        </div><!--/. container-fluid -->
    </section> <!-- /.content -->

  </div><!-- /.content-wrapper -->

@endsection


@push('js')
    {{-- @include('js-for-views.show-file-name-js') --}}
@endpush
