@isset($role)
    <!-- Show Role Model -->
    <div class="modal fade" id="show{{ $role->id }}" tabindex="-1" aria-hidden="true" aria-labelledby="showModelLabel">
        <div class="modal-dialog modal-xl modal-md modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="showModelLabel">Show Role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Role Name</label>
                        {{ $role->name }}
                    </div>
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="permission" class="form-label">Permissions</label>
                            <div class="row">
                                @inject('Permission', '\Spatie\Permission\Models\Permission')
                                <?php
                                $rolePermissions = $Permission
                                    ::join('role_has_permissions', 'role_has_permissions.permission_id', '=', 'permissions.id')
                                    ->where('role_has_permissions.role_id', $role->id)
                                    ->get();
                                ?>
                                <div class="row">
                                    @foreach ($rolePermissions as $v)
                                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 py-1">
                                            <ul type="circle" class="my-0">
                                                <li>{{ $v->name }}</li>
                                            </ul>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Edit Role Model -->
    <div class="modal fade" id="edit{{ $role->id }}" tabindex="-1" aria-hidden="true" aria-labelledby="editModelLabel">
        <div class="modal-dialog modal-xl modal-md modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="editModelLabel">Edit Role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form role="form" action="{{ route('roles.update', $role->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Role Name</label>
                            <input type="text" id="name" name="name"
                                class="form-control @error('name') is-invalid @enderror" value="{{ $role->name }}"
                                required>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="permission" class="form-label">Permissions</label>
                                <div class="row">
                                    <?php
                                    $rolePermissions = DB::table('role_has_permissions')
                                        ->where('role_has_permissions.role_id', $role->id)
                                        ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
                                        ->all();
                                    ?>
                                    @foreach ($permission as $value)
                                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 py-1">
                                            {{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, ['class' => 'name']) }}
                                            {{ $value->name }}
                                        </div>
                                    @endforeach
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


    <!-- Delete Role Modal -->
    <div class="modal fade" id="delete{{ $role->id }}" tabindex="-1" aria-hidden="true"
        aria-labelledby="deleteModelLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="deleteModelLabel">Delete Role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="delete-form-{{ $role->id }}" method="post"
                    action="{{ route('roles.destroy', $role->id) }}">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <h4 class="text-center text-wrap">Are you sure, you want to delete the Role?</h4>
                        <h5 class="text-center">Role of : {{ $role->name }}</h5>
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
