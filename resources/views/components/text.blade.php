@props(['block'])
<div class="mb-10 bg-gray-100 p-4">
    <p><strong>Text Component</strong></p>
    <p>{{ $block->text->{app()->currentLocale()} }}</p>
</div>
