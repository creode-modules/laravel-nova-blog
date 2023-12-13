@props(['block'])

<div class="mb-10 bg-gray-100 p-4">
    <p><strong>Images Side by Side Component</strong></p>
    <div class="flex">
        <img class="w-full" src="{{ asset('storage').'/'.$block->left_image }}" alt="">
        <img class="w-full" src="{{ asset('storage').'/'.$block->right_image }}" alt="">
    </div>
</div>
