<div class="modal fade" id="editListing{{$listing->id}}Modal" tabindex="-1" role="dialog" aria-labelledby="editListing{{$listing->id}}ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editListing{{$listing->id}}ModalLabel">Edit Listing</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.listings.update') }}" method="post">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" value="{{$listing->name}}" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" value="{{$listing->email}}" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" value="{{$listing->address}}" class="form-control" id="address" name="address" required>
                    </div>
                    <div class="form-group">
                        <label for="websiteUrl">Website URL</label>
                        <input type="text" value="{{$listing->website_url}}" class="form-control" id="websiteUrl" name="website_url" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" rows="5" class="form-control" required>{{$listing->description}}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
