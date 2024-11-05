<x-app-layout>
@include('layouts.sidebar')
<x-flash-message />
<div class="p-4 sm:ml-64 dark:bg-gray-900 min-h-[100vh]">
  <div class="p-4 mt-20">
    <x-flash-message />
      @if($posts->count() > 0)
      <div class="grid grid-cols-4 gap-4 mb-4">
        @foreach($posts as $post)
        <div
          class="block max-w-sm bg-white border border-gray-200 rounded-3xl shadow dark:bg-gray-800 dark:border-gray-700 dark:text-white">
          <div class="relative overflow-hidden bg-cover bg-no-repeat">
            <a href="/post/{{$post->id}}">
              <img class="rounded-t-3xl" src="{{$post->post_image ? asset('storage/' . $post->post_image) : asset('storage/images/default-image.png')}}" alt='post image'>
            </a>
          </div>
          <ul class="w-full">
            <li
              class="w-full px-4 py-2">
              @php
              $str = $post->tags;
              $tags = (explode(' ', $str))
              @endphp
              @foreach($tags as $tag)
              <a href="/dashboard/?tags={{$tag}}" id='tags' class="inline-flex p-2 w-fit rounded-full border border-gray-200 dark:border-gray-700 text-gray-500 dark:text-white text-xs">
              {{$tag}}
              </a>
              @endforeach
            </li>
            <li
              class="w-full text-sm px-4 py-1 ">
              <p>Posted on {{$post->created_at}}</p>
            </li>
          </ul>
          <div class="px-4 py-4 items-center">
            <h5 class="mb-2 text-xl font-extrabold tracking-tight text-gray-900 dark:text-white h-16"> {{$post->post_title}}</h5>
            <p class="text-sm text-justify text-gray-700 dark:text-gray-400 h-16">
              {{Str::limit($post->post_content,150)}}
            </p>
          </div>
        
          <div class="flex px-4 py-4">
            <a
            href={{url('post', $post->id)}}
            class="content-end inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
          >
            Read more
              <svg
              class="rtl:rotate-180 w-3.5 h-3.5 ms-2"
              aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 14 10"
            >
              <path
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M1 5h12m0 0L9 1m4 4L9 9"
              />
              </svg>
            </a>
            <div class='w-20 ps-28'>
              <x-bookmark-icon />
            </div>
          </div>
        </div>
        @endforeach
      @else   
          <p class="text-gray-900 text-xl text-center font-bold dark:text-gray-400">You do not have any post yet!</p>
     @endunless
    </div>
</div>
</x-app-layout>
