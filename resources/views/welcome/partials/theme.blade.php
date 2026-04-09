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


<article class="ring-3 ring-zinc-200/30 dark:ring-zinc-700/40 rounded-xl grid lg:overflow-hidden bg-white dark:bg-zinc-900">

    <!-- Left Side: Code Example -->
<aside class="overflow-scroll border-r border-zinc-200 dark:border-zinc-700">
<x-markdown class="text-sm w-full overflow-x-scroll">
```php
use Wirechat\Wirechat\Panel;
use Wirechat\Wirechat\Support\Color;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->colors([
              'primary' => Color::Blue
          ]);
}
```
</x-markdown>
    </aside>

    <!-- Right Side: Color Palette Grid -->
    <aside class="p-6 bg-gradient-to-br from-zinc-50 to-zinc-100 dark:from-zinc-800 dark:to-zinc-900">
        <div class="space-y-4">
            <h3 class="text-lg font-semibold text-zinc-800 dark:text-white mb-4">Available Colors</h3>
            
            <div class="grid grid-cols-2 gap-3">
                <!-- Neutrals -->
                <div class="group cursor-pointer">
                    <div class="flex items-center gap-2 p-3 rounded-lg bg-white dark:bg-zinc-800 shadow-sm hover:shadow-md transition-all duration-200 border border-zinc-200 dark:border-zinc-700">
                        <div class="w-8 h-8 rounded-md bg-slate-500 shadow-inner"></div>
                        <span class="text-sm font-medium text-zinc-700 dark:text-zinc-300">Slate</span>
                    </div>
                </div>

                <div class="group cursor-pointer">
                    <div class="flex items-center gap-2 p-3 rounded-lg bg-white dark:bg-zinc-800 shadow-sm hover:shadow-md transition-all duration-200 border border-zinc-200 dark:border-zinc-700">
                        <div class="w-8 h-8 rounded-md bg-gray-500 shadow-inner"></div>
                        <span class="text-sm font-medium text-zinc-700 dark:text-zinc-300">Gray</span>
                    </div>
                </div>

                <div class="group cursor-pointer">
                    <div class="flex items-center gap-2 p-3 rounded-lg bg-white dark:bg-zinc-800 shadow-sm hover:shadow-md transition-all duration-200 border border-zinc-200 dark:border-zinc-700">
                        <div class="w-8 h-8 rounded-md bg-zinc-500 shadow-inner"></div>
                        <span class="text-sm font-medium text-zinc-700 dark:text-zinc-300">Zinc</span>
                    </div>
                </div>

                <div class="group cursor-pointer">
                    <div class="flex items-center gap-2 p-3 rounded-lg bg-white dark:bg-zinc-800 shadow-sm hover:shadow-md transition-all duration-200 border border-zinc-200 dark:border-zinc-700">
                        <div class="w-8 h-8 rounded-md bg-neutral-500 shadow-inner"></div>
                        <span class="text-sm font-medium text-zinc-700 dark:text-zinc-300">Neutral</span>
                    </div>
                </div>

                <div class="group cursor-pointer">
                    <div class="flex items-center gap-2 p-3 rounded-lg bg-white dark:bg-zinc-800 shadow-sm hover:shadow-md transition-all duration-200 border border-zinc-200 dark:border-zinc-700">
                        <div class="w-8 h-8 rounded-md bg-stone-500 shadow-inner"></div>
                        <span class="text-sm font-medium text-zinc-700 dark:text-zinc-300">Stone</span>
                    </div>
                </div>

                <!-- Vibrant Colors -->
                <div class="group cursor-pointer">
                    <div class="flex items-center gap-2 p-3 rounded-lg bg-white dark:bg-zinc-800 shadow-sm hover:shadow-md transition-all duration-200 border border-zinc-200 dark:border-zinc-700">
                        <div class="w-8 h-8 rounded-md bg-red-500 shadow-inner"></div>
                        <span class="text-sm font-medium text-zinc-700 dark:text-zinc-300">Red</span>
                    </div>
                </div>

                <div class="group cursor-pointer">
                    <div class="flex items-center gap-2 p-3 rounded-lg bg-white dark:bg-zinc-800 shadow-sm hover:shadow-md transition-all duration-200 border border-zinc-200 dark:border-zinc-700">
                        <div class="w-8 h-8 rounded-md bg-orange-500 shadow-inner"></div>
                        <span class="text-sm font-medium text-zinc-700 dark:text-zinc-300">Orange</span>
                    </div>
                </div>

                <div class="group cursor-pointer">
                    <div class="flex items-center gap-2 p-3 rounded-lg bg-white dark:bg-zinc-800 shadow-sm hover:shadow-md transition-all duration-200 border border-zinc-200 dark:border-zinc-700">
                        <div class="w-8 h-8 rounded-md bg-amber-500 shadow-inner"></div>
                        <span class="text-sm font-medium text-zinc-700 dark:text-zinc-300">Amber</span>
                    </div>
                </div>

                <div class="group cursor-pointer">
                    <div class="flex items-center gap-2 p-3 rounded-lg bg-white dark:bg-zinc-800 shadow-sm hover:shadow-md transition-all duration-200 border border-zinc-200 dark:border-zinc-700">
                        <div class="w-8 h-8 rounded-md bg-yellow-500 shadow-inner"></div>
                        <span class="text-sm font-medium text-zinc-700 dark:text-zinc-300">Yellow</span>
                    </div>
                </div>

                <div class="group cursor-pointer">
                    <div class="flex items-center gap-2 p-3 rounded-lg bg-white dark:bg-zinc-800 shadow-sm hover:shadow-md transition-all duration-200 border border-zinc-200 dark:border-zinc-700">
                        <div class="w-8 h-8 rounded-md bg-lime-500 shadow-inner"></div>
                        <span class="text-sm font-medium text-zinc-700 dark:text-zinc-300">Lime</span>
                    </div>
                </div>

                <div class="group cursor-pointer">
                    <div class="flex items-center gap-2 p-3 rounded-lg bg-white dark:bg-zinc-800 shadow-sm hover:shadow-md transition-all duration-200 border border-zinc-200 dark:border-zinc-700">
                        <div class="w-8 h-8 rounded-md bg-green-500 shadow-inner"></div>
                        <span class="text-sm font-medium text-zinc-700 dark:text-zinc-300">Green</span>
                    </div>
                </div>

                <div class="group cursor-pointer">
                    <div class="flex items-center gap-2 p-3 rounded-lg bg-white dark:bg-zinc-800 shadow-sm hover:shadow-md transition-all duration-200 border border-zinc-200 dark:border-zinc-700">
                        <div class="w-8 h-8 rounded-md bg-emerald-500 shadow-inner"></div>
                        <span class="text-sm font-medium text-zinc-700 dark:text-zinc-300">Emerald</span>
                    </div>
                </div>

                <div class="group cursor-pointer">
                    <div class="flex items-center gap-2 p-3 rounded-lg bg-white dark:bg-zinc-800 shadow-sm hover:shadow-md transition-all duration-200 border border-zinc-200 dark:border-zinc-700">
                        <div class="w-8 h-8 rounded-md bg-teal-500 shadow-inner"></div>
                        <span class="text-sm font-medium text-zinc-700 dark:text-zinc-300">Teal</span>
                    </div>
                </div>

                <div class="group cursor-pointer">
                    <div class="flex items-center gap-2 p-3 rounded-lg bg-white dark:bg-zinc-800 shadow-sm hover:shadow-md transition-all duration-200 border border-zinc-200 dark:border-zinc-700">
                        <div class="w-8 h-8 rounded-md bg-cyan-500 shadow-inner"></div>
                        <span class="text-sm font-medium text-zinc-700 dark:text-zinc-300">Cyan</span>
                    </div>
                </div>

                <div class="group cursor-pointer">
                    <div class="flex items-center gap-2 p-3 rounded-lg bg-white dark:bg-zinc-800 shadow-sm hover:shadow-md transition-all duration-200 border border-zinc-200 dark:border-zinc-700">
                        <div class="w-8 h-8 rounded-md bg-sky-500 shadow-inner"></div>
                        <span class="text-sm font-medium text-zinc-700 dark:text-zinc-300">Sky</span>
                    </div>
                </div>

                <div class="group cursor-pointer">
                    <div class="flex items-center gap-2 p-3 rounded-lg bg-white dark:bg-zinc-800 shadow-sm hover:shadow-md transition-all duration-200 border border-zinc-200 dark:border-zinc-700">
                        <div class="w-8 h-8 rounded-md bg-blue-500 shadow-inner"></div>
                        <span class="text-sm font-medium text-zinc-700 dark:text-zinc-300">Blue</span>
                    </div>
                </div>

                <div class="group cursor-pointer">
                    <div class="flex items-center gap-2 p-3 rounded-lg bg-white dark:bg-zinc-800 shadow-sm hover:shadow-md transition-all duration-200 border border-zinc-200 dark:border-zinc-700">
                        <div class="w-8 h-8 rounded-md bg-indigo-500 shadow-inner"></div>
                        <span class="text-sm font-medium text-zinc-700 dark:text-zinc-300">Indigo</span>
                    </div>
                </div>

                <div class="group cursor-pointer">
                    <div class="flex items-center gap-2 p-3 rounded-lg bg-white dark:bg-zinc-800 shadow-sm hover:shadow-md transition-all duration-200 border border-zinc-200 dark:border-zinc-700">
                        <div class="w-8 h-8 rounded-md bg-violet-500 shadow-inner"></div>
                        <span class="text-sm font-medium text-zinc-700 dark:text-zinc-300">Violet</span>
                    </div>
                </div>

                <div class="group cursor-pointer">
                    <div class="flex items-center gap-2 p-3 rounded-lg bg-white dark:bg-zinc-800 shadow-sm hover:shadow-md transition-all duration-200 border border-zinc-200 dark:border-zinc-700">
                        <div class="w-8 h-8 rounded-md bg-purple-500 shadow-inner"></div>
                        <span class="text-sm font-medium text-zinc-700 dark:text-zinc-300">Purple</span>
                    </div>
                </div>

                <div class="group cursor-pointer">
                    <div class="flex items-center gap-2 p-3 rounded-lg bg-white dark:bg-zinc-800 shadow-sm hover:shadow-md transition-all duration-200 border border-zinc-200 dark:border-zinc-700">
                        <div class="w-8 h-8 rounded-md bg-fuchsia-500 shadow-inner"></div>
                        <span class="text-sm font-medium text-zinc-700 dark:text-zinc-300">Fuchsia</span>
                    </div>
                </div>

                <div class="group cursor-pointer">
                    <div class="flex items-center gap-2 p-3 rounded-lg bg-white dark:bg-zinc-800 shadow-sm hover:shadow-md transition-all duration-200 border border-zinc-200 dark:border-zinc-700">
                        <div class="w-8 h-8 rounded-md bg-pink-500 shadow-inner"></div>
                        <span class="text-sm font-medium text-zinc-700 dark:text-zinc-300">Pink</span>
                    </div>
                </div>

                <div class="group cursor-pointer">
                    <div class="flex items-center gap-2 p-3 rounded-lg bg-white dark:bg-zinc-800 shadow-sm hover:shadow-md transition-all duration-200 border border-zinc-200 dark:border-zinc-700">
                        <div class="w-8 h-8 rounded-md bg-rose-500 shadow-inner"></div>
                        <span class="text-sm font-medium text-zinc-700 dark:text-zinc-300">Rose</span>
                    </div>
                </div>
            </div>
        </div>
    </aside>

</article>



<div class="pt-6" style="text-align: center;">

<x-button tag="a" class=" w-full sm:w-fit px-4 flex items-center justify-center  gap-4 dark:bg-zinc-800 " href="{{ route('customization.theme') }}">
Customize your theme
</x-button>
</div>

</section>
