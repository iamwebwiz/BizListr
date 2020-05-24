<div class="modal fade" id="newListingModal" tabindex="-1" role="dialog" aria-labelledby="newListingModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newListingModalLabel">New Listing</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.listings.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>
                    <div class="form-group">
                        <label for="phones">
                            Phones
                            <small class="text-muted">(separate with comma e.g 088383838,383838383)</small>
                        </label>
                        <input type="text" class="form-control" id="phones" name="phones">
                    </div>
                    <div class="form-group">
                        <label for="categories">
                            Categories
                            <small class="text-muted">(multiple can be selected)</small>
                        </label>
                        <select name="categories[]" id="categories" class="form-control" multiple="multiple" style="width: 100%" required>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="websiteUrl">Website URL</label>
                        <input type="text" class="form-control" id="websiteUrl" name="website_url" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" rows="5" class="form-control" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
