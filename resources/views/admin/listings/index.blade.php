@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.21/r-2.2.5/datatables.min.css"/>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
@stop

@section('content')
    <h2>
        Listings
        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#newListingModal">
            Add New
        </button>
    </h2>

    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col" width="10%">#</th>
                    <th scope="col">Name</th>
                    <th scope="col" width="25%">Email</th>
                    <th scope="col" width="20%">Website URL</th>
                    <th scope="col" width="15%">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($listings as $listing)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $listing->name }}</td>
                        <td>{{ $listing->email }}</td>
                        <td>{{ $listing->website_url }}</td>
                        <td>
                            <a href="{{ route('admin.listings.show', $listing->id) }}" class="btn btn-info btn-sm text-white">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <a href="" class="btn btn-secondary btn-sm text-white">
                                <i class="fa fa-ban"></i>
                            </a>
                            <form class="d-inline" action="{{ route('admin.listings.destroy', $listing->id) }}" method="post">
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

    @include('admin.listings.partials._new', ['categories' => $categories])
@stop

@section('scripts')
    <script src="//cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.21/r-2.2.5/datatables.min.js"></script>

    <script>
        $('.table').DataTable()
    </script>
@stop
