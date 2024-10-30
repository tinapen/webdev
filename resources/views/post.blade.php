<x-app-layout>
@include('layouts.aside')
<div class="px-4 sm:ml-64 dark:bg-gray-900 min-h-[100vh]">
    <div
      class="pt-20 min-h-[100vh] mx-56 border-l border-r border-gray-200 dark:border-gray-700"
    >
      {{-- Check if the logged-in user is the author of the post --}}
        @auth
        @if(Auth::user()->id === $post->user_id)
            <!-- Show Edit and Delete buttons -->
            <div id="action-field" class="flex justify-end p-4 border border-gray-200 dark:border-gray-700">
                <button class="mx-1 inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800"><a href="/edit-post/{{$post->id}}">Edit post</a></button>
                <form action="/delete-post/{{$post->id}}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button class="mx-1 inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">Delete post</button>
                </form>
              </div>
        @endif
        @endauth
      
      <div id="title" class="p-4 border border-gray-200 dark:border-gray-700">
        <h1 class="text-3xl font-extrabold text-gray-700 dark:text-white">
          {{$post['post_title']}}
        </h1>
      </div>
      <div>
        <p id="postedby" class="ml-3 dark:text-white">Posted by {{$post->user->firstname . " " . $post->user->lastname}} on </p>
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
          {{-- <form>
            <div
              class="w-full border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600"
            >
              <div class="px-4 py-2 bg-white rounded-t-lg dark:bg-gray-800">
                <label for="comment" class="sr-only">Your comment</label>
                <textarea
                  id="comment"
                  rows="4"
                  class="w-full px-0 text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400"
                  placeholder="Write a comment..."
                  required
                ></textarea>
              </div>
              <div
                id="comment-section"
                class="flex items-center justify-between px-3 py-2 border-t dark:border-gray-600"
              >
                <button
                  type="submit"
                  class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800"
                >
                  Post comment
                </button>
              </div>
            </div>
          </form> --}}
          <livewire:comments :model="$post"/>
        </div>
        
        <div
          id="comment-container"
          class="p-4 border border-gray-200 dark:border-gray-700"
        >
          {{-- <div
            id="user-comment"
            class="border border-gray-200 dark:border-gray-700 rounded-lg"
          >
            <div class="p-4 flex">
              <div>
                <p class="dark:text-white text-xs">Juan Dela Cruz</p>
                <p class="dark:text-white text-xs">
                  Commented on October 17, 2024
                </p>
              </div>
            </div>
            <div class="p-4 text-gray-900 dark:text-white">
              <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                Voluptate, doloribus!
              </p>
            </div>
          </div> --}}

          
        </div>
      </div>
    </div>
  </div>
</x-app-layout>