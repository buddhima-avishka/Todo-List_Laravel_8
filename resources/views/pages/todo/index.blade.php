@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-title">Todo List</h1>
            </div>
            <div class="col-lg-12">
                <form action="{{ route('todo.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-5">
                        <div class="col-lg-8">
                            <input class="form-control" name="title" type="text" placeholder="Enter a new task"
                                aria-label="default input example">
                        </div>
                        <div class="col-lg-4">
                            <button type="button" class="btn btn-primary">Add</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-12">
                <table class="table table-success table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Title</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $key => $task)
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $task->title }}</td>
                                <td>
                                    @if ($task->done == 0)
                                        <span class="badge bg-warning">Not Completed</span>
                                    @else
                                        <span class="badge bg-success">Completed</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('todo.delete', $task->id) }}"><button type="button" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button></a>
                                    <a href="{{ route('todo.done', $task->id) }}"><button type="button" class="btn btn-success"><i class="bi bi-check-circle-fill"></i></button></a>
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
