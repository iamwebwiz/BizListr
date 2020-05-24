@extends('layouts.app')

@section('css')
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
@stop

@section('content')
    <h2>Edit Listing - {{$listing->name}}</h2>

    <div class="card">
        <div class="card-body">
            <form action="" method="post">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="{{$listing->name}}" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{$listing->email}}" required>
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address" class="form-control" value="{{$listing->address}}" required>
                </div>
                <div class="form-group">
                    <label>Website URL</label>
                    <input type="text" name="website_url" class="form-control" value="{{$listing->website_url}}" required>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" rows="5" class="form-control">{{$listing->description}}</textarea>
                </div>

                <button type="submit" class="btn btn-success">Update</button>
            </form>
        </div>
    </div>
@stop

