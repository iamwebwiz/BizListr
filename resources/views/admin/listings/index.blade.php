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
                    <th scope="col">Name</th>
                    <th scope="col" width="25%">Email</th>
                    <th scope="col" width="20%">Website URL</th>
                    <th scope="col" width="20%">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($listings as $listing)
                    <tr>
                        <td>
                            <img src="{{ asset("{$listing->images->first()->file_path}") }}" alt="" style="width: 50px; height: 50px; margin-right: 10px; border-radius: 50%;">
                            {{ $listing->name }}
                        </td>
                        <td>{{ $listing->email }}</td>
                        <td>{{ $listing->website_url }}</td>
                        <td>
                            <a href="" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#listing_{{$listing->id}}_DetailsModal">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.listings.show', $listing->id) }}" class="btn btn-info btn-sm text-white">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <form class="d-inline" action="{{ route('admin.listings.deactivate') }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="listingId" value="{{$listing->id}}">
                                <button class="btn btn-secondary btn-sm">
                                    <i class="fa fa-ban"></i>
                                </button>
                            </form>
                            <form class="d-inline" action="{{ route('admin.listings.destroy') }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="listingId" value="{{$listing->id}}">
                                <button class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>

                    @include('admin.listings.partials._details', ['listing' => $listing])
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
