<x-app-layout>
  <aside
  id="logo-sidebar"
  class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
  aria-label="Sidebar"
>
  <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
    <ul class="space-y-2 font-medium">
      <li>
        <a
          href="/dashboard"
          class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group"
        >
          <svg
            class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
            aria-hidden="true"
            xmlns=""
            fill="currentColor"
            viewBox="0 0 22 21"
          ></svg>
          <span class="ms-3">Dashboard</span>
        </a>
      </li>
      <li>
        <a
          href="/create-post"
          class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group"
        >
          <svg
            class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
            aria-hidden="true"
            xmlns=""
            fill="currentColor"
            viewBox="0 0 18 18"
          ></svg>
          <span class="flex-1 ms-3 whitespace-nowrap">Create Post</span>
        </a>
      </li>
      <li>
        <a
          href="/your-post"
          class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group"
        >
          <svg
            class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
            aria-hidden="true"
            xmlns=""
            fill="currentColor"
            viewBox="0 0 20 20"
          ></svg>
          <span class="flex-1 ms-3 whitespace-nowrap">Your Posts</span>
        </a>
      </li>
    </ul>
  </div>
</aside> 
<div class="p-4 sm:ml-64 dark:bg-gray-900 min-h-[100vh]">
  <div class="p-4 mt-20">
    <x-flash-message />
    <div class="grid grid-cols-4 gap-4 mb-4">
      @foreach($posts as $post)
      <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <a href="#">
          <img class="rounded-t-lg" src="{{$post->post_image ? asset('storage/' . $post->post_image) : asset('storage/images/default-image.png')}}" alt='post image'>
        </a>
        <div class="px-5 my-1">
          @php
          $str = $post->tags;
          $tags = (explode(' ', $str))
          @endphp
          @foreach($tags as $tag)
          <div id='tags' class="inline-flex w-auto p-1 text-xs text-gray-900  rounded-full border border-gray-900 dark:border-gray-50 dark:text-white">
          {{$tag}}
          </div>
          @endforeach
          </div>
        <div
          id="date-posted"
          class="px-5 text-gray-500 dark:text-white text-xs"
        >
          <p>{{$post->created_at}}</p>
        </div>
        <div class="px-5 pb-5 pt-2">
          <a href="#">
            <h5
              class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"
            >
              {{$post->post_title}}
            </h5>
          </a>
          <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
            {{Str::limit($post->post_content,100)}}
          </p>
          <a
            href={{url('post',$post->id)}}
            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
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
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
</x-app-layout>
