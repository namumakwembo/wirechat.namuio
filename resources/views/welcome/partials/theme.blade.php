<section class="space-y-10">

    <div class="max-w-xl">

    <div class="font-semibold text-3xl flex    items-center gap-4 sm:text-[40px]  text-zinc-800 dark:text-white">
        <h1>
            Theme
        </h1>

        <svg class="size-8 dark:text-zinc-500 flex items-center mt-2  " xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="800px" height="800px" viewBox="0 0 24 24" version="1.1">
            <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
            <title>ic_fluent_dark_theme_24_regular</title>
            <desc>Created with Sketch.</desc>
            <g id="🔍-Product-Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g id="ic_fluent_dark_theme_24_regular" fill="currentColor" fill-rule="nonzero">
                    <path d="M12,22 C17.5228475,22 22,17.5228475 22,12 C22,6.4771525 17.5228475,2 12,2 C6.4771525,2 2,6.4771525 2,12 C2,17.5228475 6.4771525,22 12,22 Z M12,20.5 L12,3.5 C16.6944204,3.5 20.5,7.30557963 20.5,12 C20.5,16.6944204 16.6944204,20.5 12,20.5 Z" id="🎨-Color">
        
        </path>
                </g>
            </g>
        </svg>
    </div>

    <div class="mt-4 sm:text-[18px] text-zinc-500 dark:text-zinc-300">
        Wirechat lets you fully customize the chat theme to match your application's branding and identity, making it feel like a natural part of your app.
    </div>

    <div hiden class="mt-12 hidden sm:mt-20 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-12 sm:gap-8 md:gap-6">
        <div class="flex flex-col gap-2.5 sm:gap-2">
            <div class="flex items-center gap-2.5 text-zinc-400 dark:text-zinc-300">
                <svg class="shrink-0 [:where(&amp;)]:size-6 size-6" data-flux-icon=""
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                    aria-hidden="true" data-slot="icon">
                    <path fill-rule="evenodd"
                        d="M9.528 1.718a.75.75 0 0 1 .162.819A8.97 8.97 0 0 0 9 6a9 9 0 0 0 9 9 8.97 8.97 0 0 0 3.463-.69.75.75 0 0 1 .981.98 10.503 10.503 0 0 1-9.694 6.46c-5.799 0-10.5-4.7-10.5-10.5 0-4.368 2.667-8.112 6.46-9.694a.75.75 0 0 1 .818.162Z"
                        clip-rule="evenodd"></path>
                </svg>

                <div class="text-zinc-800 dark:text-white font-medium">Dark + Responsive</div>
            </div>

            <div class="text-zinc-500 dark:text-zinc-300 text-sm sm:text-base">Every component was built to
                look and function great both in dark mode and on mobile devices.</div>
        </div>

     
    </div>
</div>



    <article class=" ring-3 ring-zinc-200/30   dark:ring-zinc-700/40 rounded-xl grid sm:grid-cols-2 lg:overflow-hidden">

        <aside class=" overflow-scroll">

<x-markdown class="text-sm w-full overflow-x-scroll ">
```html

  <head>
    ... 
    @wirechatStyles
    <style>
     :root {
     --wc-brand-primary:'#f59e0b';       

     --wc-light-primary: #fff;  /* white */
     --wc-light-secondary: oklch(0.985 0.002 247.839);/* gray-100 */
     --wc-light-accent: oklch(0.985 0.002 247.839);/* gray-50 */
     --wc-light-border: oklch(0.928 0.006 264.531);/* gray-200 */

     --wc-dark-primary: oklch(0.21 0.006 285.885); /* zinc-900 */
     --wc-dark-secondary: oklch(0.274 0.006 286.033);/* zinc-800 */
     --wc-dark-accent: oklch(0.37 0.013 285.805);/* zinc-700 */
     --wc-dark-border: oklch(0.37 0.013 285.805);/* zinc-700 */
     }
    </style>
  </head>

```
</x-markdown>

        </aside>

        {{-- Theme gif --}}
        <aside class="relative w-full  ">

            <img class=" h-full    w-full" src="{{ asset('assets/previews/themes.gif') }}" alt="">
            <span class="absolute hover:opacity-0 transition-all ease-in-out inset-0 bg-black opacity-20"></span>

        </aside>






    </article>



    <center class="pt-6">

    <x-button tag="a" class=" w-full sm:w-fit px-4 flex items-center gap-4 dark:bg-zinc-800 " href="{{ route('customization.theme') }}">
        Customize your theme
    </x-button>
</center>

</section>