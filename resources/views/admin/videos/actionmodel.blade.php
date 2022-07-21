@isset($video)
    <!-- Show Video Model -->
    <div class="modal fade" id="show{{ $video->id }}" tabindex="-1" aria-hidden="true" aria-labelledby="showModelLabel">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title fw-bold" id="showModelLabel">{{ $video->title }}</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        onclick="document.getElementById('demoVideo').pause();"></button>
                </div>
                <div class="modal-body" align="center">
                    <x-embed url="{{ $video->url }}" id="demoVideo" />
                    {{-- <div class="mb-3">
                            <img class="rounded img-fluid" src="{{ asset('gallery/' . $video->blob) }}" alt="">
                        </div> --}}
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function() {
            $('.modal').on('hidden.bs.modal', function(e) {
                $iframe = $(this).find("iframe");
                $iframe.attr("src", $iframe.attr("src"));
            });
        });
    </script>

    <!-- Edit Video Model -->
    <div class="modal fade" id="edit{{ $video->id }}" tabindex="-1" aria-hidden="true" aria-labelledby="editModelLabel">
        <div class="modal-dialog modal-md modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="editModelLabel">Edit Video</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form role="form" action="{{ route('videos.update', $video->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="title" class="form-label">Video Title</label>
                                <input type="text" id="title" name="title"
                                    class="form-control @error('title') is-invalid @enderror"
                                    placeholder="Enter Video Title" value="{{ $video->title }}">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="url" class="form-label">Video URL</label>
                                <input type="text" id="url" name="url"
                                    class="form-control @error('url') is-invalid @enderror" placeholder="Enter Video URL"
                                    value="{{ $video->url }}">
                                @error('url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <h6 class="m-0 fw-bold">Upload Video Image</h6>
                            <small>With image and default file try to remove the image</small>
                            <input type="file" class="dropify-element" id="dropify-image" name="blob"
                                data-default-file="{{ asset('gallery/' . $video->blob) }}">
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


    <!-- Delete Video Modal -->
    <div class="modal fade" id="delete{{ $video->id }}" tabindex="-1" aria-hidden="true"
        aria-labelledby="deleteModelLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="deleteModelLabel">Delete Video</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="delete-form-{{ $video->id }}" method="post"
                    action="{{ route('videos.destroy', $video->id) }}">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body mb-0 pb-0">
                        <h5 class="text-center text-wrap">Are you sure, you want to delete the Video?</h5>
                        <h4 class="text-center py-2">Video of : {{ $video->title }}</h4>
                        <p class="text-center">
                            <img class="rounded" src="{{ asset('gallery/' . $video->blob) }}" height="200"
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
