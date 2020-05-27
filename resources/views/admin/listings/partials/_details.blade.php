<div class="modal fade" id="listing_{{$listing->id}}_DetailsModal" tabindex="-1" role="dialog" aria-labelledby="listing_{{$listing->id}}_DetailsModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="listing_{{$listing->id}}_DetailsModalLabel">{{$listing->name}} Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Name</h5>
                {{$listing->name}}
                <hr>

                <h5>Email</h5>
                {{$listing->email}}
                <hr>

                <h5>Website URL</h5>
                <a href="{{$listing->website_url}}">{{$listing->website_url}}</a>
                <hr>

                <h5>Address</h5>
                {{$listing->address}}
                <hr>

                <h5>Categories</h5>
                @foreach ($listing->categories as $category)
                    <span class="badge badge-primary">{{$category->name}}</span>
                @endforeach
                <hr>

                <h5>Phones</h5>
                @foreach ($listing->phones as $phone)
                    <a href="tel:{{$phone->phone}}" class="badge badge-light">
                        {{$phone->phone}}
                    </a>
                @endforeach
                <hr>

                <h5>Images</h5>
                @foreach ($listing->images as $image)
                    <img src="{{asset("{$image->file_path}")}}" alt="" class="img img-thumbnail img-fluid w-25 mr-1">
                @endforeach
                <hr>

                <h5>Description</h5>
                {{$listing->description}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
