@extends('layouts.backend.admin-app')

@push('css')

@endpush

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <div class="card card-secondary" style="margin-top: 100px;">
                    <div class="card-header">
                        <h3 class="card-title">Lessons</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @if (session('successMsg'))
                            <div class="alert alert-success alert-dismissible fade show mt-1" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">×</span></button>
                                <strong>{{ session('successMsg') }}</strong>
                            </div>
                        @endif

                        @if (session('failureMsg'))
                            <div class="alert alert-danger alert-dismissible fade show mt-1" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">×</span></button>
                                <strong>{{ session('failureMsg') }}</strong>
                            </div>
                        @endif

                        <div class="text-right mb-4">
                            <a href="{{ route('admin.lessons.create') }}" class="btn btn-primary">Add new lesson</a>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Course</th>
                                        <th>Category</th>
                                        <th>Video</th>
                                        <th>File</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lessons as $lesson)
                                        <tr>
                                            <td>{{ $lesson->id }}</td>
                                            <td>{{ $lesson->title }}</td>
                                            {{-- Str::limit limits the description to 20 characters and concatenate the 3 dots --}}
                                            <td>{{ Str::limit($lesson->description, 20, '...') }}</td>
                                            </td>
                                            <td>
                                                {{ $lesson['course']['title'] }}
                                            </td>
                                            <td>
                                                {{ $lesson['category']['title'] }}
                                            </td>
                                            <td>{{ $lesson->video }}</td>
                                            <td>{{ $lesson->file }}</td>
                                            {{-- Format the date --}}
                                            <td>{{ Carbon\Carbon::parse($lesson->created_at)->format('Y.m.d') }}
                                            </td>

                                            {{-- with the click on the anchor tag the form is submitted. It returns false to prevent the default behavior of the anchor tag --}}
                                            {{-- the edit action redirects to the admin.courses.edit page and passes the category id to the route --}}
                                            <td><a href="{{ route('admin.lessons.edit', $lesson->id) }}">Edit</a>
                                                - <a href="#"
                                                    onclick="document.getElementById('delete-{{ $lesson->id }}').submit(); return false;">Delete</a>
                                                {{-- the form is routed to the admin.courses.destroy route and passes the lesson id to it --}}
                                                <form action="{{ route('admin.lessons.destroy', $lesson->id) }}"
                                                    {{-- the id of the form is for example delete-1 --}} id="delete-{{ $lesson->id }}" method="POST"
                                                    style="display:none;">
                                                    {{-- cross website scripting forgery prevention --}}
                                                    @csrf
                                                    {{-- it simulates a delete request --}}
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{-- this will create the pagination links automatically --}}
                        {{ $lessons->links() }}
                    </div>

                </div>

            </div>
            <!--/. container-fluid -->
        </section> <!-- /.content -->

    </div><!-- /.content-wrapper -->

@endsection

@push('js')

@endpush
