<x-app-layout>
@include('layouts.aside')
<div class="p-4 sm:ml-64 dark:bg-gray-900 min-h-[100vh]">
    <div class="p-4 mt-12">
      <x-flash-message />
      <form action="/create-post" method="POST" enctype="multipart/form-data" class="mx-60 py-12">
        @csrf
        <div class="flex items-center">
          @if(Auth::user()->user_image) 
          <img src="{{asset('storage/' . Auth::user()->user_image)}}" alt="user_image" class="w-20 h-20 p-1 rounded-full">
          @else
          <x-avatar />
          @endif
          <p class="text-gray-900  dark:text-white mx-4">{{Str::ucfirst(Auth::user()->firstname . ' ' . Auth::user()->lastname)}}</p>
        </div>
        <h1 class="text-gray-900 text-center text-xl mx-4 uppercase font-bold dark:text-white ">
          Create Post
        </h1>
        <div class="my-4">
          
          <input
            type="text"
            name="post_title"
            id="post_title"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-5 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Post Title"
            required
          />
        </div>
        <div class="my-4">
          <div class="w-full">
          <p class="mt-1 text-sm italic text-gray-500 dark:text-gray-300" id="file_input_help">Upload your post image here.</p>
          <input name="post_image" id="post_image" type="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help">
          
          
          </div>
          <div class="my-8">
            <input
            type="text"
            name="post_caption"
            id="post_caption"
            class="my-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-5 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Type your caption for your image..."
            {{-- required --}}
          />
          </div>
          <div
            class="w-full mb-4 my-8 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600"
          >
          
            <div
              class="flex items-center justify-between px-3 py-2 border-b dark:border-gray-600"
            >
            
              <input
                type="text"
                name="tags"
                id="tags"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-5 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="type your tags for your post...#technology etc..."
              />
              <button
                type="button"
                data-tooltip-target="tooltip-fullscreen"
                class="p-2 text-gray-500 rounded cursor-pointer sm:ms-auto hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600"
              >
                <svg
                  class="w-4 h-4"
                  aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 19 19"
                >
                  <path
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M13 1h5m0 0v5m0-5-5 5M1.979 6V1H7m0 16.042H1.979V12M18 12v5.042h-5M13 12l5 5M2 1l5 5m0 6-5 5"
                  />
                </svg>
                <span class="sr-only">Full screen</span>
              </button>
              <div
                id="tooltip-fullscreen"
                role="tooltip"
                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700"
              >
                Show full screen
                <div class="tooltip-arrow" data-popper-arrow></div>
              </div>
            </div>
            <div class="px-4 py-2 bg-white rounded-b-lg dark:bg-gray-800">
              <label for="post-content" class="sr-only">Publish post</label>
              <textarea
                id="post_content"
                name="post_content"
                rows="8"
                class="block w-full px-0 text-sm text-gray-800 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400"
                placeholder="Share your thoughts or write an article..."
                required
              ></textarea>
            </div>
          </div>
          <button
            name="publis-post-btn"
            id="publish-post-btn"
            class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800"
          >
            Publish post
          </button>
        </div>
      </form>
    </div>
  </div>
</x-app-layout>