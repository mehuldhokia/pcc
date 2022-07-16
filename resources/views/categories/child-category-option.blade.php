<?php $dash .= '-- '; ?>
@foreach ($child_category as $childCategory)
    <option value="{{ $childCategory->id }}">{{ $dash }}{{ $childCategory->name }}</option>
    @if (count($childCategory->childrenCategories))
        @include('categories.child-category-option', [
            'child_category' => $childCategory->childrenCategories,
        ])
    @endif
@endforeach
