<?php $dash .= '-- '; ?>
@foreach ($child_category as $childCategory)
    <?php $_SESSION['i'] = $_SESSION['i'] + 1; ?>
    <tr>
        <td>{{ $_SESSION['i'] }}</td>
        {{-- <td>{{ $childCategory->parent->name }}</td> --}}
        <td><img @if ($childCategory->image) src="{{ asset('categories/' . $category->image) }}"
            @else
                src="{{ asset('dist/assets/images/default-no-image.png') }}" @endif
                class="img-thumbnail m-0 p-0" width="40" height="40"></td>
        <td>{{ $dash }}{{ $childCategory->name }}</td>
        {{-- <td> - - - </td>
        <td>
            <div class="form-check form-switch">
                <input type="checkbox" id="list-group2"
                    data-id="{{ $childCategory->id }}" class="form-check-input"
                    {{ $childCategory->status ? 'checked' : '' }}>
            </div>
        </td> --}}
        <td align="center">
            <div class="btn-group" role="group" aria-label="Basic outlined example">
                @can('category-update')
                    <a href="{{ route('categories.edit', $childCategory->id) }}" class="btn btn-outline-secondary">
                        <i class="icofont-edit text-success"></i> Edit</a>
                @endcan

                @can('category-delete')
                    <form id="delete-form-{{ $childCategory->id }}" method="post"
                        action="{{ route('categories.destroy', $childCategory->id) }}" style="display: none">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                    </form>
                    <a href="" class="btn btn-outline-secondary"
                        onclick="if(confirm('Are you sure, You Want to delete this?')) { event.preventDefault(); document.getElementById('delete-form-{{ $childCategory->id }}').submit(); } else { event.preventDefault(); }">
                        <i class="icofont-ui-delete text-danger"></i> Delete
                    </a>
                @endcan
            </div>
        </td>

    </tr>
    @if (count($childCategory->childrenCategories))
        @include('categories.child-category-td', ['child_category' => $childCategory->childrenCategories])
    @endif
@endforeach
