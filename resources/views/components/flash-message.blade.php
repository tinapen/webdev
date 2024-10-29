@if(session()->has('message'))
<div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="p-4 border text-gray-900 dark:text-white border-gray-200 dark:border-gray-700">
    <p>{{session('message')}}</p>
</div>
@endif