@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-title">Hello!</h1>
            </div>
            <div class="col-lg-12">
                <h2 class="page-title">--- Click todos on Navbar ---</h2>
            </div>
        </div>
        <div class="row justify-content-center mb-5">
            <div class="col-lg-4">
                @forelse ($banners as $banner)
                    <div class="col-lg-4">
                        <img src="{{ asset('storage/uploads/') }}" alt="photo" width="200px" height="100px">
                    </div>
                @empty
                    <div class="col-lg-12">
                        <h2>No Banner</h2>
                    </div>
                @endforelse
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
