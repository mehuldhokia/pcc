@isset($course)
    <!-- Show Course Model -->
    <div class="modal fade" id="show{{ $course->id }}" tabindex="-1" aria-hidden="true" aria-labelledby="showModelLabel">
        <div class="modal-dialog modal-xl modal-md modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="showModelLabel">Show Course</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <img class="img-fluid rounded img-responsive" src="{{ asset('course/' . $course->blob) }}" alt="" />
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Course Title</label>
                                        <h5 class="card-title">{{ $course->title }}</h5>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Course Code</label>
                                        <p class="card-text">{{ $course->course_code }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Duration</label>
                                        <p class="card-text">{{ $course->duration }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Amount</label>
                                        <p class="card-text">{{ $course->amount }}</p>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Qualification</label>
                                        <p>{{ $course->qualification }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h4 class="border-top pt-2">Course Description</h4>
                            {!! $course->description !!}
                        </div>
                    </div>
                </div>
                {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">close</button>
                </div> --}}
            </div>
        </div>
    </div>

    <!-- Delete Course Modal -->
    <div class="modal fade" id="delete{{ $course->id }}" tabindex="-1" aria-hidden="true"
        aria-labelledby="deleteModelLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="deleteModelLabel">Delete Course</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="delete-form-{{ $course->id }}" method="post"
                    action="{{ route('courses.destroy', $course->id) }}">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <h4 class="text-center text-wrap">Are you sure, you want to delete the Course?</h4>
                        <h5 class="text-center">Course : {{ $course->title }}</h5>
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
