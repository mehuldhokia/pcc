<?php $dash .= '-- '; ?>
@foreach ($child_category as $childCategory)
    <option value="{{ $childCategory->id }}" @if ($category->category_id == $childCategory->id) selected @endif>
        {{ $dash }}{{ $childCategory->name }}
    </option>
    @if (count($childCategory->childrenCategories))
        @include('categories.child-category-option-edit', [
            'child_category' => $childCategory->childrenCategories,
        ])
    @endif
@endforeach
