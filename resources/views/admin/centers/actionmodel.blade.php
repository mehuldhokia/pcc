@isset($center)

    <!-- Edit Center Model -->
    <div class="modal fade" id="edit{{ $center->id }}" tabindex="-1" aria-hidden="true" aria-labelledby="editModelLabel">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="editModelLabel">Edit Center</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form role="form" action="{{ route('centers.update', $center->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="center_name" class="form-label">Center Name</label>
                            <input type="text" id="center_name" name="center_name"
                                class="form-control @error('center_name') is-invalid @enderror" value="{{ $center->center_name }}"
                                required>
                            @error('center_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="status" class="form-label">Status</label>
                                <div class="form-check">
                                    <input name="status" class="form-check-input" type="radio"
                                        value="1" @if ($center->status == '1') checked @endif>
                                    <label class="form-check-label">
                                        Active
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input name="status" class="form-check-input" type="radio" value="0" @if ($center->status == '0') checked @endif>
                                    <label class="form-check-label">
                                        In-active
                                    </label>
                                </div>
                            </div>
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


    <!-- Delete Center Modal -->
    <div class="modal fade" id="delete{{ $center->id }}" tabindex="-1" aria-hidden="true"
        aria-labelledby="deleteModelLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="deleteModelLabel">Delete Center</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="delete-form-{{ $center->id }}" method="post"
                    action="{{ route('centers.destroy', $center->id) }}">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <h4 class="text-center text-wrap">Are you sure, you want to delete the Center?</h4>
                        <h5>Center Name : {{ $center->center_name }}</h5>
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
