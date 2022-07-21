@isset($photo)
    <!-- Show Photo Model -->
    <div class="modal fade" id="show{{ $photo->id }}" tabindex="-1" aria-hidden="true" aria-labelledby="showModelLabel">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="showModelLabel">Show Photo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" align="center">
                    <div class="mb-3">
                        <img class="rounded img-fluid" src="{{ asset('gallery/' . $photo->blob) }}" alt="">
                    </div>
                    {{ $photo->description }}
                </div>
            </div>
        </div>
    </div>


    <!-- Edit Photo Model -->
    <div class="modal fade" id="edit{{ $photo->id }}" tabindex="-1" aria-hidden="true" aria-labelledby="editModelLabel">
        <div class="modal-dialog modal-md modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="editModelLabel">Edit Photo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form role="form" action="{{ route('photos.update', $photo->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <h6 class="m-0 fw-bold">Upload Image</h6>
                            <small>With image and default file try to remove the image</small>
                            <input type="file" class="dropify-element" id="dropify-image" name="blob"
                                data-default-file="{{ asset('gallery/' . $photo->blob) }}">
                        </div>

                        <div class="form-group">
                            <label for="description" class="form-label">Description</label>
                            <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror"
                                placeholder="Enter Description" rows="4">{{ $photo->description }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Delete Photo Modal -->
    <div class="modal fade" id="delete{{ $photo->id }}" tabindex="-1" aria-hidden="true"
        aria-labelledby="deleteModelLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="deleteModelLabel">Delete Photo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="delete-form-{{ $photo->id }}" method="post"
                    action="{{ route('photos.destroy', $photo->id) }}">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body mb-0 pb-0">
                        <h5 class="text-center text-wrap">Are you sure, you want to delete the Photo?</h5>
                        <p class="text-center py-2">
                            <img class="rounded" src="{{ asset('gallery/' . $photo->blob) }}" height="200"
                                alt="">
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endisset
