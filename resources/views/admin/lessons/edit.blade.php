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
                        <h3 class="card-title">Edit lesson</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        {{-- we pass the course id to the admin.courses.update route --}}
                        <form action="{{ route('admin.lessons.update', $lesson->id) }}" method="POST" enctype="multipart/form-data" class="mt-2 mb-2">
                            {{-- @csrf is a blade directive that will automatically create a hidden token field that will protect the website from crosswebsite forgery attacks --}}
                            @csrf
                            {{-- blade directive that simulates a put request, the kind of request that has to made when a resource is updated --}}
                            @method('PUT')

                            <div class="form-group row option-item">
                                <div class="col-6">
                                    <p class="option-main-title">Lesson order</p>
                                    <p class="option-description">The order of the lesson</p>

                                </div>
                                <div class="col-6">
                                    {{-- the old helper will store what I filled in when I failed validation and if not available will populate the field with the current value --}}
                                    <input class="form-control" type="text" name="id" id="title-text-input"
                                        value="{{ old('id', $lesson->id) }}">
                                    <p style="color:red;">{{ $errors->first('id') }}</p>
                                </div>
                            </div>
                            <hr>

                            <div class="form-group row option-item">
                                <div class="col-6">
                                    <p class="option-main-title">Lesson title</p>
                                    <p class="option-description">The title of the lesson.</p>

                                </div>
                                <div class="col-6">
                                    {{-- the old helper will store what I filled in when I failed validation and if not available will populate the field with the current value --}}
                                    <input class="form-control" type="text" name="title" id="title-text-input"
                                        value="{{ old('title', $lesson->title) }}">
                                    <p style="color:red;">{{ $errors->first('title') }}</p>
                                </div>
                            </div>
                            <hr>

                            <div class="form-group row option-item">
                                <div class="col-6">
                                    <p class="option-main-title">Lesson description</p>
                                    <p class="option-description">Description of the lesson.</p>

                                </div>
                                <div class="col-6">
                                    <textarea id="description-textarea" class="form-control" maxlength="225" rows="5"
                                        name="description">{{ old('description', $lesson->description) }}</textarea>
                                    <p style="color:red;">{{ $errors->first('description') }}</p>
                                </div>
                            </div>
                            <hr>


                            <div class="form-group row option-item">
                                <div class="col-6">
                                    <p class="option-main-title">Course</p>
                                    <p class="option-description">Select the course to which the lesson belongs</p>

                                </div>
                                <div class="col-6">
                                    <select id="course" class="custom-select" name="course" autocomplete="off">
                                        <option value="" selected="" disabled="">Seleziona il corso</option>
                                        @foreach ($courses as $course)
                                            <option value="{{ $course->id }}"
                                                {{ $course->id == $lesson->course_id ? 'selected' : '' }}>
                                                {{ $course->title }}</option>
                                        @endforeach
                                    </select>
                                    <p style="color:red;">{{ $errors->first('course') }}</p>
                                </div>
                            </div>
                            <hr>

                            <div class="form-group row option-item">
                                <div class="col-6">
                                    <p class="option-main-title">Category</p>
                                    <p class="option-description">Select the category to which the lesson belongs</p>

                                </div>
                                <div class="col-6">
                                    <select id="category" class="custom-select" name="category" autocomplete="off">

                                        <option value="{{ $lesson->category_id }}" selected="" disabled="">
                                            {{ $current_category->title }}
                                        </option>

                                    </select>
                                    <p style="color:red;">{{ $errors->first('course') }}</p>
                                </div>
                            </div>
                            <hr>

                            <div class="form-group row option-item">
                                <div class="col-6">
                                    <p class="option-main-title">Lesson video url</p>
                                    <p class="option-description">The video of the lesson to embed.</p>

                                </div>
                                <div class="col-6">
                                    <input class="form-control" type="text" name="video" id="video-text-input"
                                        value="{{ old('video', $lesson->video) }}">
                                    <p style="color:red;">{{ $errors->first('video') }}</p>
                                </div>
                            </div>
                            <hr>


                            <div class="form-group row option-item">
                                <div class="col-6">
                                    <p class="option-main-title">Lesson file</p>
                                    <p class="option-description">Upload a file for the lesson.</p>

                                </div>
                                <div class="col-6">
                                    <div class="custom-file">
                                        <input type="file" id="file2" class="custom-file-input" name="file"
                                            onchange="showFileName(this)">
                                        <span class="custom-file-control custom-file-control-primary"></span>
                                    </div>
                                    <p style="color:red;">{{ $errors->first('file') }}</p>
                                </div>
                            </div>


                            <div class="form-group row mb-0 mt-4">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary mt-5">Save</button>
                                </div>
                            </div>

                        </form>

                    </div>

                </div>

            </div>
            <!--/. container-fluid -->
        </section> <!-- /.content -->

    </div><!-- /.content-wrapper -->

@endsection


@push('js')
    @include('js-for-views.show-file-name-js')
    @include('js-for-views.show-course-category-edit-js')
@endpush
