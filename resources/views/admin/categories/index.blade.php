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
                        <h3 class="card-title">Categories</h3>
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
                            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Add new category</a>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Course</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ $category->id }}</td>
                                            <td>{{ $category->title }}</td>
                                            {{-- Str::limit limits the description to 20 characters and concatenate the 3 dots --}}
                                            <td>{{ Str::limit($category->description, 20, '...') }}</td>
                                            </td>
                                            <td>
                                                {{ $category['course']['title'] }}
                                            </td>
                                            {{-- Format the date --}}
                                            <td>{{ Carbon\Carbon::parse($category->created_at)->format('Y.m.d') }}
                                            </td>

                                            {{-- with the click on the anchor tag the form is submitted. It returns false to prevent the default behavior of the anchor tag --}}
                                            {{-- the edit action redirects to the admin.courses.edit page and passes the category id to the route --}}
                                            <td><a href="{{ route('admin.categories.edit', $category->id) }}">Edit</a>
                                                - <a href="#"
                                                    onclick="document.getElementById('delete-{{ $category->id }}').submit(); return false;">Delete</a>
                                                {{-- the form is routed to the admin.courses.destroy route and passes the category id to it --}}
                                                <form action="{{ route('admin.categories.destroy', $category->id) }}"
                                                    {{-- the id of the form is for example delete-1 --}} id="delete-{{ $category->id }}" method="POST"
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
                        {{ $categories->links() }}
                    </div>

                </div>

            </div>
            <!--/. container-fluid -->
        </section> <!-- /.content -->

    </div><!-- /.content-wrapper -->

@endsection

@push('js')

@endpush
