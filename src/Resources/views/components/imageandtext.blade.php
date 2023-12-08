@props(['block'])
<div class="mb-10 bg-gray-100 p-4">
    <p class="mb-5"><strong>Image and Text Component:</strong></p>
    <img src="{{ asset('storage').'/'.$block->image }}" alt="">
    @markdown( $block->Text->{app()->currentLocale()} )
</div>
