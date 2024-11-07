<div class="items-center justify-items-center" x-data="imagePreview()">
    <div class='w-25 h-25 rounded-full bg-gray-500 mb-2'>
        <img id="preview" src="" alt="" class="w-24 h-24 rounded-full  bg-gray-500">
    </div>
    <div>
        <x-secondary-button @click="document.getElementById('user_image').click()" class='relative'>
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                  </svg>
                <label for="user_image" class="">upload profile picture</label>  
                <input @change="showPreview(event)" type="file" name='user_image' id='user_image' class='absolute inset-0 -z-10 opacity-0'>
            </div>            
        </x-secondary-button>
        <p class='text-center italic text-gray-900 dark:text-white'>(optional)</p>
    </div>
    <script>
        function imagePreview() {
            return {
                showPreview: (event) => {
                   if (event.target.files.length > 0) {
                    const src = URL.createObjectURL(event.target.files[0])
                    document.getElementById('preview').src = src;
                   } 
                }
            }
        }
    </script>
</div>