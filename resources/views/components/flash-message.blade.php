@if(session()->has('message'))
<div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="p-1 m-1 text-center rounded-md border text-gray-900 dark:text-white border-gray-700 dark:border-gray-100">
    <p>{{session('message')}}</p>
</div>
@endif