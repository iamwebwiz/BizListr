@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.21/r-2.2.5/datatables.min.css"/>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
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
                    <th scope="col" width="10%">#</th>
                    <th scope="col" width="30%">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col" width="15%">Listings</th>
                    <th scope="col" width="15%">Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            <td>{{ $category->businesses->count() }}</td>
                            <td>
                                <form action="{{ route('admin.categories.destroy', $category->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @include('admin.categories.partials._new')
@stop

@section('scripts')
    <script src="//cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.21/r-2.2.5/datatables.min.js"></script>

    <script>
        $('.table').DataTable()
    </script>
@stop
