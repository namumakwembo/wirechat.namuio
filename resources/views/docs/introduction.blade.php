<x-docs-layout>

    <x-markdown>

        ## Introduction
    </x-markdown>

    <x-browser-mockup>
        <img class="h-full w-full m-auto object-cover dark:hidden" src="{{ asset('assets/wirechat-preview.png') }}"
            alt="wirechat-preview">
        <img class="h-full w-full m-auto object-cover hidden dark:flex"
            src="{{ asset('assets/wirechat-preview-dark.png') }}" alt="wirechat-preview-dark">
    </x-browser-mockup>


    {{-- Features  --}}
    <section class="space-y-10 my-28">

        <x-features-item :reverse="true">
            <x-slot:title> 
       

             <span class="flex items-center gap-3 mex-w-fit ">
               Private 1+1 
        
             
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 w-5 h-5 text-blue-500">
                  <path fill-rule="evenodd" d="M12 2.25c-2.429 0-4.817.178-7.152.521C2.87 3.061 1.5 4.795 1.5 6.741v6.018c0 1.946 1.37 3.68 3.348 3.97.877.129 1.761.234 2.652.316V21a.75.75 0 0 0 1.28.53l4.184-4.183a.39.39 0 0 1 .266-.112c2.006-.05 3.982-.22 5.922-.506 1.978-.29 3.348-2.023 3.348-3.97V6.741c0-1.947-1.37-3.68-3.348-3.97A49.145 49.145 0 0 0 12 2.25ZM8.25 8.625a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25Zm2.625 1.125a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Zm4.875-1.125a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25Z" clip-rule="evenodd" />
                </svg>
                
                                   
               </span>
             <br>
             Conversations
             </x-slot>
            <x-slot:description>
              Create private conversations and enjoy chatting with beautifully designed Livewire components.
            </x-slot>
        </x-features-item>

        <x-features-connector  />


        <x-features-item :reverse="false">
            <x-slot:title>
              <span class="flex items-center gap-3 mex-w-fit ">
                Smart Deletes

        
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-blue-400  w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m6 4.125 2.25 2.25m0 0 2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                </svg>
                
                
                </span>
             <br> Conversations 
              
              </x-slot>
            <x-slot:description>
                You can delete messages or chats and it won't intererupt the entirie conversation for other user ,
                For messages , you can choose to delete only for yourself or for everyone </x-slot>
        </x-features-item>
        <x-features-connector />


        <x-features-item :reverse="true">
            <x-slot:title>   
               <span class="flex items-center gap-3 mex-w-fit ">
                  Group
                  <svg class="shrink-0 w-8 h-7 scale-90 rounded-full text-blue-400 bg-gray-100 dark:bg-gray-600 p-1"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                     <path d="M7 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM14.5 9a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5ZM1.615 16.428a1.224 1.224 0 0 1-.569-1.175 6.002 6.002 0 0 1 11.908 0c.058.467-.172.92-.57 1.174A9.953 9.953 0 0 1 7 18a9.953 9.953 0 0 1-5.385-1.572ZM14.5 16h-.106c.07-.297.088-.611.048-.933a7.47 7.47 0 0 0-1.588-3.755 4.502 4.502 0 0 1 5.874 2.636.818.818 0 0 1-.36.98A7.465 7.465 0 0 1 14.5 16Z"></path>
                   </svg>
         
                  </span>
                <br> 
                Conversations
                </x-slot>
            <x-slot:description>
                Easily create groups , edit members , add admins ,edit group permissions , title , descriptino
                avatar and many more
                Convienient for teams or communities looking to create chat rooms </x-slot>
        </x-features-item>

        <x-features-connector />

        {{-- Share Media    --}}
        <x-features-item :reverse="false">
            <x-slot:title >

                <span class="flex items-center gap-3 mex-w-fit ">
                  Share Media   
                 
                   <svg class="w-5 h-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" class="ai ai-Attach"><path d="M6 7.91V16a6 6 0 0 0 6 6v0a6 6 0 0 0 6-6V6a4 4 0 0 0-4-4v0a4 4 0 0 0-4 4v9.182a2 2 0 0 0 2 2v0a2 2 0 0 0 2-2V8"/></svg>
                                                 
                  </span>
                <br>
                Attachments
            </x-slot>
            <x-slot:description>
                You can send media and files , including pdfs , videos , images zip files etc in the conversation and 
                with our beatufiul preview layouts , users can easily add more or remove attachemnts before uploading  </x-slot>
        </x-features-item>


        <x-features-connector />

        {{--  Realtime Messaging  --}}
        <x-features-item :reverse="false">
         <x-slot:title >
            <span class="flex items-center gap-3 mex-w-fit ">
               Realtime Messaging 
               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send-check w-5 h-5 text-blue-500 " viewBox="0 0 16 16">
                  <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855a.75.75 0 0 0-.124 1.329l4.995 3.178 1.531 2.406a.5.5 0 0 0 .844-.536L6.637 10.07l7.494-7.494-1.895 4.738a.5.5 0 1 0 .928.372zm-2.54 1.183L5.93 9.363 1.591 6.602z"/>
                  <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0m-1.993-1.679a.5.5 0 0 0-.686.172l-1.17 1.95-.547-.547a.5.5 0 0 0-.708.708l.774.773a.75.75 0 0 0 1.174-.144l1.335-2.226a.5.5 0 0 0-.172-.686"/>
                </svg>          
               </span>
    
               <br>
               And Search
               <br>
         </x-slot>
         <x-slot:description>
            Not only will you be able to share send and receives messages in realtime , you will also be able to search for private conversation & group chats   </x-slot>
       </x-features-item>

       <x-features-connector />

       {{--  Customizable  themse --}}
       <x-features-item :reverse="true">
         <x-slot:title >

             <span class="flex items-center gap-3 mex-w-fit ">
               Customizable  Theme  
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 w-5 h-5 text-blue-500">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" />
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
                                   
               </span>
             <br>
              Dark mode
         </x-slot>
         <x-slot:description>
             In order to match your brand , you can easily customize the theme in the config and to your brand color and wirechat also supports dark mode   </x-slot>
      </x-features-item>


      <x-features-connector />

       {{--  Customizable  themse --}}
       <x-features-item :reverse="false">
         <x-slot:title >

             <span class="flex items-center gap-3 mex-w-fit ">
               Reply    
                {{-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 w-5 h-5 text-blue-500">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" />
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg> --}}
                           
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                fill="currentColor" class="bi bi-reply-fill  w-5 h-5 text-blue-500"
                viewBox="0 0 16 16">
                <path
                    d="M5.921 11.9 1.353 8.62a.72.72 0 0 1 0-1.238L5.921 4.1A.716.716 0 0 1 7 4.719V6c1.5 0 6 0 7 8-2.5-4.5-7-4-7-4v1.281c0 .56-.606.898-1.079.62z" />
            </svg>
               </span>
             <br>
              Feature
         </x-slot>
         <x-slot:description>
             You can also reply to messages, files and attachments in the conversation making is convienient and easy to  following conversations just like modern chat apps   </x-slot>
      </x-features-item>




       {{--  Customizable  themse --}}
       <x-features-item :reverse="true">
         <x-slot:title >

             <span class="flex items-center gap-3 mex-w-fit ">
               Saved     
              
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6  w-5 h-5 text-blue-500">
               <path fill-rule="evenodd" d="M6.32 2.577a49.255 49.255 0 0 1 11.36 0c1.497.174 2.57 1.46 2.57 2.93V21a.75.75 0 0 1-1.085.67L12 18.089l-7.165 3.583A.75.75 0 0 1 3.75 21V5.507c0-1.47 1.073-2.756 2.57-2.93Z" clip-rule="evenodd" />
             </svg>
             
               </span>
             <br>
             Messages
         </x-slot>
         <x-slot:description>
             You can also save messages by create a conversation with yourself as authenticated user  </x-slot>
      </x-features-item>

    </section>


 



</x-docs-layout>
