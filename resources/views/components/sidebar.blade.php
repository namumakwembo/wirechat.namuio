<div class="pb-4 flex flex-col flex-grow overflow-y-auto">

    <div class="flex-grow flex flex-col">
        <nav class="flex-1  px-2 space-y-1">
            {{-- <a href="https://changelog.anystack.sh/wire-elements-pro"
                class="text-gray-500 dark:text-gray-300 hover:bg-gray-50 hover:text-gray-900 group rounded-md py-2 px-2 flex items-center font-medium">
                Changelog
            </a> --}}


            {{-- Getting Started --}}
            <section class="space-y-1">

                <h5 class="text-gray-600  dark:text-gray-300  py-2 px-2  font-medium">

                    Getting Started
                </h5>

                <ol class="space-y-1  pl-8 ">

                    <li>

                        <x-sidebar-link href="{{ route('docs') }}"
                            active="{{ request()->routeIs('docs') }}">
                            Introduction
                        </x-sidebar-link>
                    </li>

                    
                    <li>

                        <x-sidebar-link href="{{ route('installation') }}"
                            active="{{ request()->routeIs('installation') }}">
                            Installation
                        </x-sidebar-link>

                    </li>
                </ol>
            </section>


            {{-- Usage --}}

            <section class="space-y-1">

                <h5 class="text-gray-600  dark:text-gray-300  py-2 px-2  font-medium">
                    Usage
                </h5>

                <ol class="space-y-1  pl-8 ">

                    <li>

                        <x-sidebar-link href="{{ route('usage.overview') }}"
                            active="{{ request()->routeIs('usage.overview') }}">
                            Overview
                        </x-sidebar-link>
                    </li>

                    <li>
                        <x-sidebar-link href="{{ route('usage.groups') }}"
                            active="{{ request()->routeIs('usage.groups') }}">
                            Groups
                        </x-sidebar-link>
                    </li>
                    <li>

                        <x-sidebar-link href="{{ route('usage.aggregations') }}"
                            active="{{ request()->routeIs('usage.aggregations') }}">
                            Aggregates
                        </x-sidebar-link>

                    </li>
                </ol>
            </section>

            {{-- Customizations --}}

            <section class="space-y-1">

                <h5 class="text-gray-600  dark:text-gray-300  py-2 px-2  font-medium">
                    Customization
                </h5>

                <ol class="space-y-1  pl-8 ">

                    <li>

                        <x-sidebar-link  href="{{ route('customization.trait') }}"
                        active="{{ request()->routeIs('customization.trait') }}">
                            Trait
                        </x-sidebar-link>
                    </li>
                    <li>

                        <x-sidebar-link   href="{{ route('customization.config') }}"
                        active="{{ request()->routeIs('customization.config') }}">
                            Config
                        </x-sidebar-link>

                    </li>
                </ol>
            </section>



        </nav>


    </div>
</div>
