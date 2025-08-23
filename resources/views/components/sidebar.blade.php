<div class="pb-4 flex flex-col grow overflow-y-auto">

    <div class="grow flex flex-col">

        <nav class="flex-1  px-2 space-y-1">

            {{-- Getting Started --}}
            <section class="space-y-1">

                <h5 class="text-gray-950  dark:text-gray-300  py-2 px-2  font-medium">

                    Getting Started
                </h5>

                <ol class="  border-l dark:border-gray-700 ml-6 ">

                    {{-- <li>

                        <x-sidebar-link href="{{ route('docs') }}"
                            active="{{ request()->routeIs('docs') }}">
                            Introduction
                        </x-sidebar-link>
                    </li> --}}


                    <li>

                        <x-sidebar-link href="{{ docs()->route('installation') }}"
                                        active="{{ request()->routeIs('installation') }}">
                            Installation
                        </x-sidebar-link>

                    </li>


                    <li>

                        <x-sidebar-link href="{{ docs()->route('setup') }}"
                                        active="{{ request()->routeIs('setup') }}">
                            Setup
                        </x-sidebar-link>

                    </li>
                </ol>
            </section>

            {{-- Usage --}}
            <section class="space-y-1">

                <h5 class="text-gray-950  dark:text-gray-300  py-2 px-2  font-medium">
                    Usage
                </h5>

                <ol class="  border-l dark:border-gray-700 ml-6 ">

                    <li>

                        <x-sidebar-link href="{{ docs()->route('usage.overview') }}"
                                        active="{{docs()->routeIs('usage.overview') }}">
                            Overview
                        </x-sidebar-link>
                    </li>

                    <li>
                        <x-sidebar-link href="{{ docs()->route('usage.groups') }}"
                                        active="{{docs()->routeIs('usage.groups') }}">
                            Groups
                        </x-sidebar-link>
                    </li>
                    <li>


                    <li>
                        <x-sidebar-link href="{{ docs()->route('usage.attachments') }}"
                                        active="{{docs()->routeIs('usage.attachments') }}">
                            Attachments
                        </x-sidebar-link>
                    </li>
                    <li>

                        <x-sidebar-link href="{{ docs()->route('usage.aggregations') }}"
                                        active="{{docs()->routeIs('usage.aggregations') }}">
                            Aggregates
                        </x-sidebar-link>

                    </li>


                    <li>
                        <x-sidebar-link new href="{{ docs()->route('usage.notifications') }}"
                                        active="{{docs()->routeIs('usage.notifications') }}">
                            Notifications
                        </x-sidebar-link>

                    </li>

                    <li>
                        <x-sidebar-link href="{{ docs()->route('usage.events') }}"
                                        active="{{docs()->routeIs('usage.events') }}">
                            Events
                        </x-sidebar-link>

                    </li>
                </ol>
            </section>

            {{-- Customizations --}}

            <section class="space-y-1">

                <h5 class="text-gray-950  dark:text-gray-300  py-2 px-2  font-medium">
                    Customization
                </h5>

                <ol class="  border-l dark:border-gray-700 ml-6 ">

                    <li>

                        <x-sidebar-link href="{{ docs()->route('customization.trait') }}"
                                        active="{{docs()->routeIs('customization.trait') }}">
                            Trait
                        </x-sidebar-link>
                    </li>
                    <li>

                        <x-sidebar-link href="{{ docs()->route('customization.config') }}"
                                        active="{{docs()->routeIs('customization.config') }}">
                            Config
                        </x-sidebar-link>

                    </li>
                    <li>

                        <x-sidebar-link href="{{ docs()->route('customization.authorization') }}"
                                        active="{{docs()->routeIs('customization.authorization') }}">
                            Authorization
                        </x-sidebar-link>

                    </li>

                    <li>

                        <x-sidebar-link href="{{ docs()->route('customization.layout') }}"
                                        active="{{docs()->routeIs('customization.layout') }}">
                            Layout
                        </x-sidebar-link>

                    </li>


                    <li>

                        <x-sidebar-link new href="{{ docs()->route('customization.views') }}"
                                        active="{{docs()->routeIs('customization.views') }}">
                            Views


                        </x-sidebar-link>

                    </li>

                    <li>

                        <x-sidebar-link new href="{{ docs()->route('customization.components') }}"
                                        active="{{docs()->routeIs('customization.components') }}">
                            Components
                        </x-sidebar-link>

                    </li>
                    <li>

                        <x-sidebar-link new href="{{ docs()->route('customization.theme') }}"
                                        active="{{docs()->routeIs('customization.theme') }}">
                            Theme
                        </x-sidebar-link>

                    </li>
                </ol>
            </section>


            {{-- Diffing deeper --}}

            <section class="space-y-1">

                <h5 class="text-gray-950  dark:text-gray-300  py-2 px-2  font-medium">
                    Digging Deeper
                </h5>

                <ol class="  border-l dark:border-gray-700 ml-6 ">

                    <li>

                        <x-sidebar-link new href="{{ docs()->route('customization.embedding') }}"
                                        active="{{docs()->routeIs('customization.embedding') }}">
                            Embedding
                        </x-sidebar-link>
                    </li>


                    <li>
                        <x-sidebar-link new href="{{ docs()->route('customization.core-components') }}"
                                        active="{{docs()->routeIs('customization.core-components') }}">
                            Core Components
                        </x-sidebar-link>
                    </li>

                </ol>
            </section>


            {{-- More --}}

            <section class="space-y-1">

                <h5 class="text-gray-950  dark:text-gray-300  py-2 px-2  font-medium">
                    More
                </h5>

                <ol class="  border-l dark:border-gray-700 ml-6 ">

                    <li>

                        <x-sidebar-link class="flex gap-3 items-center"
                                        href="https://github.com/namumakwembo/wirechat/blob/main/CHANGELOG.md">
                            Changelog

                            <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                         class="bi bi-box-arrow-up-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                              d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5"/>
                                        <path fill-rule="evenodd"
                                              d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0z"/>
                                      </svg>
                                </span>
                        </x-sidebar-link>
                    </li>
                    <li>

                        <x-sidebar-link href="{{ docs()->route('more.contribution') }}"
                                        active="{{docs()->routeIs('more.contribution') }}">
                                Contribution
                            </x-sidebar-link>

                        </li>
                    </ol>
                </section>

        </nav>


    </div>
</div>
