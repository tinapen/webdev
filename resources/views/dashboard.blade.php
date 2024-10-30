<x-app-layout>
  @include('layouts.aside')
  <div class="p-4 sm:ml-64 dark:bg-gray-900  min-h-[100px]">
    <div class="p-4 mt-20">
      <x-flash-message />
      <div class="grid grid-cols-4 gap-4 mb-4">
        @foreach($posts as $post)
        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
          <a href="/post/{{$post->id}}">
            <img class="rounded-t-lg" src="{{$post->post_image ? asset('storage/' . $post->post_image) : asset('storage/images/default-image.png')}}" alt='post image'>
          </a>
          <div class="px-4 my-1">
          @php
          $str = $post->tags;
          $tags = (explode(' ', $str))
          @endphp
          @foreach($tags as $tag)
          <a href="/dashboard/?tags={{$tag}}" id='tags' class="inline-flex p-2 w-fit rounded-full border border-gray-200 dark:border-gray-700 text-gray-500 dark:text-white text-xs">
          {{$tag}}
          </a>
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
           <div class="h-10 content-end">
                <a
                href={{url('post',$post->id)}}
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
           </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</x-app-layout>
