@extends('layouts.app')

@section('content')
    
<div class=" max-w-screen-2xl mx-auto  ">


<x-navigation>  
    <x-sidebar/>
</x-navigation>


<div class= "h-[calc(100vh_-_5.1rem)] overflow-y-hidden flex justify-between dark:bg-gray-900 ">
    <aside    class="w-[350px] md:w-[380px]  hidden lg:flex  flex-col gap-5 bg-white dark:bg-gray-900  border-r border-gray-200 dark:border-gray-700/40 h-full p-8 px-9 top-0   inset-x-0 z-[50] px-6 py-4 transition-all duration-300 ease-in-out" >

           <x-sidebar/>
    </aside>



    <main class="w-full lg:grid lg:grid-cols-12 ">

    <div class="lg:col-span-9 w-full pb-14 h-full px-5 md:px-10    overflow-y-auto" style="contain: conent">

        <x-prose class=" mx-auto w-full dark:text-white/90 rounded-lg text-gray-900">

            {{$slot}}
        </x-prose>
    </div>

    <aside class="hidden lg:grid lg:col-span-3   h-full grid overflow-y-auto p-4" >
        <div class="mt-auto flex flex-col gap-4">

            <a href="https://buymeacoffee.com/namuio/e/366303" title="Book an appointment Namu" target="_blank">
                <img src="{{asset('assets/support.jpeg')}}" class=" w-full rounded-xl" alt="book appointment">
            </a>
        </div>
    </aside>
</main>



</div>

</div>

@endsection