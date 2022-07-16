@isset($contact)
    <!-- Show Contact Model -->
    <div class="modal fade" id="show{{ $contact->id }}" tabindex="-1" aria-hidden="true" aria-labelledby="showModelLabel">
        <div class="modal-dialog modal-xl modal-md modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="showModelLabel">View Message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Contact Person</label>
                            <p class="card-text">{{ $contact->fullname }}</p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Email</label>
                            <p class="card-text">{{ $contact->email }}</p>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Phone</label>
                            <p class="card-text">{{ $contact->phone }}</p>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Subject</label>
                            <p class="card-text">{{ $contact->subject }}</p>
                        </div>
                        <div class="col-md-12 mb-3">
                            <div class="form-label">Message</div>
                            {!! $contact->message !!}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Contact Modal -->
    <div class="modal fade" id="delete{{ $contact->id }}" tabindex="-1" aria-hidden="true"
        aria-labelledby="deleteModelLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="deleteModelLabel">Delete Contact Message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="delete-form-{{ $contact->id }}" method="post"
                    action="{{ route('contacts.destroy', $contact->id) }}">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <h6 class="text-center text-wrap mb-3">Are you sure, you want to delete the Contact Details?</h6>
                        {{-- <p>Message from : {{ $contact->fullname }}</p>
                        <p>Subject : {{ $contact->subject }}</p> --}}
                        <label class="form-label">Contact Person</label>
                        <p class="card-text">{{ $contact->fullname }}</p>
                        <label class="form-label">Subject</label>
                        <p class="card-text">{{ $contact->subject }}</p>
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
