@isset($qualification)

    <!-- Edit Qualification Model -->
    <div class="modal fade" id="edit{{ $qualification->id }}" tabindex="-1" aria-hidden="true" aria-labelledby="editModelLabel">
        <div class="modal-dialog modal-sm modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="editModelLabel">Edit Qualification</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form role="form" action="{{ route('qualifications.update', $qualification->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name of Qualification / Standard</label>
                            <input type="text" id="name" name="name"
                                class="form-control @error('name') is-invalid @enderror" value="{{ $qualification->name }}"
                                required>
                            @error('name')
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
                                        value="1" @if ($qualification->status == '1') checked @endif>
                                    <label class="form-check-label">
                                        Active
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input name="status" class="form-check-input" type="radio" value="0" @if ($qualification->status == '0') checked @endif>
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


    <!-- Delete Qualification Modal -->
    <div class="modal fade" id="delete{{ $qualification->id }}" tabindex="-1" aria-hidden="true"
        aria-labelledby="deleteModelLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="deleteModelLabel">Delete Qualification</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="delete-form-{{ $qualification->id }}" method="post"
                    action="{{ route('qualifications.destroy', $qualification->id) }}">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <h4 class="text-center text-wrap">Are you sure, you want to delete the Qualification?</h4>
                        <h5>Qualification : {{ $qualification->name }}</h5>
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
