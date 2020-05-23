@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.21/r-2.2.5/datatables.min.css"/>
@stop

@section('content')
    <h2>
        Categories
        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#newCategoryModal">
            Add New
        </button>
    </h2>

    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="row" width="10%">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col" width="15%">Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            <td>
                                <form action="{{route('admin.categories.destroy', $category->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @include('admin.categories.partials.new')
@stop

@section('scripts')
    <script src="//cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.21/r-2.2.5/datatables.min.js"></script>

    <script>
        $('.table').DataTable()
    </script>
@stop
