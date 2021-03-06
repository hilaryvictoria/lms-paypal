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
                    <h3 class="card-title">Add new course</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <form action="{{route('admin.courses.store')}}" method="POST" enctype="multipart/form-data" class="mt-2 mb-2">
                    @csrf

                        <div class="form-group row option-item">
                            <div class="col-6">
                                <p class="option-main-title">Course title</p>
                                <p class="option-description">The title of the course.</p>

                            </div>
                            <div class="col-6">
                                <input class="form-control" type="text" name="course_title" id="title-text-input" value="{{old('course_title')}}">
                                <p style="color:red;">{{ $errors->first('course_title') }}</p>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group row option-item">
                            <div class="col-6">
                                <p class="option-main-title">Course description</p>
                                <p class="option-description">Description of the course.</p>

                            </div>
                            <div class="col-6">
                            <textarea id="short-description-textarea" class="form-control" maxlength="225" rows="5" name="short_description">{{old('short_description')}}</textarea>
                                <p style="color:red;">{{ $errors->first('short_description') }}</p>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group row option-item">
                            <div class="col-6">
                                <p class="option-main-title">Course Intro</p>
                                <p class="option-description">Intro of the course.</p>

                            </div>
                            <div class="col-6">
                            <textarea id="intro-textarea" class="form-control ckeditor" maxlength="225" rows="5" name="intro">{{old('intro')}}</textarea>
                                <p style="color:red;">{{ $errors->first('intro') }}</p>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group row option-item">
                            <div class="col-6">
                                <p class="option-main-title">Course Video</p>
                                <p class="option-description">Video of the course.</p>

                            </div>
                            <div class="col-6">
                            <input class="form-control" maxlength="225" rows="5" name="video" value="{{old('video')}}">
                                <p style="color:red;">{{ $errors->first('video') }}</p>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group row option-item">
                            <div class="col-6">
                                <p class="option-main-title">Course Warning</p>
                                <p class="option-description">Warning of the course.</p>

                            </div>
                            <div class="col-6">
                            <textarea id="warning-textarea" class="form-control" maxlength="225" rows="5" name="warning">{{old('warning')}}</textarea>
                                <p style="color:red;">{{ $errors->first('warning') }}</p>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group row option-item">
                            <div class="col-6">
                                <p class="option-main-title">Course image</p>
                                <p class="option-description">Upload a cover image of the course.</p>

                            </div>
                            <div class="col-6">
                                <div class="custom-file">
                                    <input type="file" id="file2" class="custom-file-input" name="cover_image" onchange="showFileName(this)">
                                    <span class="custom-file-control custom-file-control-primary"></span>
                                </div>
                                <p style="color:red;">{{ $errors->first('cover_image') }}</p>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group row option-item">
                            <div class="col-6">
                                <p class="option-main-title">Course price</p>
                                <p class="option-description">The price of the course.</p>

                            </div>
                            <div class="col-6">
                                {{-- the old() method finds a value for the input, the previous one that was filled in before the validation failed --}}
                                <input class="form-control" type="number" step="0.01" min="1" name="course_price" id="title-text-input" value="{{ old('course_price') }}">
                                <p style="color:red;">{{ $errors->first('course_price') }}</p>
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
    @include('js-for-views.show-file-name-js')
@endpush
