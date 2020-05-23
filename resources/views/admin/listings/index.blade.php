@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.21/r-2.2.5/datatables.min.css"/>
    <link href="//cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
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
                    <th scope="col">Email</th>
                    <th scope="col">Website URL</th>
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
                            <form action="{{route('admin.listings.destroy', $listing->id)}}" method="post">
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

    @include('admin.listings.partials._new')
@stop

@section('scripts')
    <script src="//cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.21/r-2.2.5/datatables.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    <script>
        $('.table').DataTable()
    </script>
@stop
