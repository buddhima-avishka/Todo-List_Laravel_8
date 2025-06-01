@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-title">Banner List</h1>
            </div>
            <div class="col-lg-12">
                <form action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-5">
                        <div class="col-lg-8">
                            <input class="form-control" name="title" type="text" placeholder="Enter a new banner"
                                aria-label="default input example">
                        </div>
                        <div class="col-lg-4">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                        <div class="col-lg-8">
                            <input class="form-control" name="images" type="file" aria-label="default input example">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-12 mb-5">
                <table class="table table-success table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Title</th>
                            <th scope="col">Image</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($banners as $key => $banner)
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $banner->title }}</td>
                                <td><img src="{{ asset('storage/uploads/') }}" alt="photo" style="width: 200px;"></td>
                                <td>
                                    @if ($banner->status == 0)
                                        <span class="badge bg-warning">Draft</span>
                                    @else
                                        <span class="badge bg-success">Published</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('banner.delete', $banner->id) }}"><button type="button" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button></a>
                                    @if ($banner->status == 0)
                                        <a href="{{ route('banner.status', $banner->id) }}"><button type="button" class="btn btn-success"><i class="bi bi-check-circle-fill"></i>Publish</button></a>
                                    @else
                                        <a href="{{ route('banner.status', $banner->id) }}"><button type="button" class="btn btn-warning"><i class="bi bi-check-circle-fill"></i>Draft</button></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .page-title {
            text-align: center;
            margin-top: 50px;
            margin-bottom: 50px;
            font-size: 2.5rem;
            color: #333;
        }
    </style>
@endpush
