<x-app-layout>
@include('layouts.sidebar')
<div class="px-4 sm:ml-64 dark:bg-gray-900 min-h-[100vh]">
  <div
  class="mt-14 min-h-[100vh] mx-56 border-l border-r border-gray-200 dark:border-gray-700"
>
  <div
    id="postedby"
    class="pt-20 px-4 flex h-40 border border-gray-200 dark:border-gray-700"
  >
    @if($post->user->user_image) 
    <img src="{{asset('storage/' . $post->user->user_image)}}" alt="user_image" class="w-12 h-12 rounded-full ml-3 mt-1"> :
    @else
    <x-avatar />
    @endif
    <div>
      <p class="ml-3 dark:text-white">{{$post->user->firstname . " " . $post->user->lastname}}</p>
      <p class="ml-3 dark:text-white">Posted on October 17, 2024</p>
    </div>
    
  </div>
  <div id="action-field" class="flex justify-end p-4 border border-gray-200 dark:border-gray-700">
          <span type="button" class="me-auto px-2 flex text-gray-900 dark:text-gray-100 text-xs font-bold items-center rounded-md border border-gray-900 dark:border-gray-100 dark:hover:text-gray-500 cursor-pointer">
            <x-bookmark-icon /> Bookmark
          </span>
        {{-- Check if the logged-in user is the author of the post --}}
          @auth
          @if(Auth::user()->id === $post->user_id)
              <!-- Show Edit and Delete buttons -->
                  <button class="mx-1 inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800"><a href="/edit-post/{{$post->id}}">Edit post</a></button>
                  <form action="/delete-post/{{$post->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="mx-1 inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">Delete post</button>
                  </form>
          @endif
          @endauth
  </div>
        <div id="title" class="p-4 border border-gray-200 dark:border-gray-700">
          <h1 class="text-3xl font-extrabold text-gray-700 dark:text-white">
            {{$post['post_title']}}
          </h1>
        </div>
      <div
        id="post-image"
        class="p-4 border border-gray-200 dark:border-gray-700"
      >
        <img
          class="rounded-lg w-full"
          src="{{$post['post_image'] ? asset('storage/' . $post['post_image']) : asset('storage/images/default-image.png')}}"
          alt="post-image"
        />
        <p id="caption" class="italic dark:text-white">
          {{$post['post_caption']}}
        </p>
      </div>
      <div id="tags p-4">
        @php
          $str = $post->tags;
          $tags = (explode(' ', $str))
          @endphp
          @foreach($tags as $tag)
          <div id='tags' class="inline-flex my-2 mx-1 p-2 w-fit rounded-full border border-gray-200 dark:border-gray-700 text-gray-500 dark:text-white text-xs">
          {{$tag}}
          </div>
          @endforeach
      </div>

      <div id="content" class="p-4 border border-gray-200 dark:border-gray-700">
        <p class="text-justify dark:text-white">
            {{$post['post_content']}}
          </p>
      </div>
        
      <div id="comment" class="p-4 border border-gray-200 dark:border-gray-700">
          <livewire:comments :model="$post"/>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>