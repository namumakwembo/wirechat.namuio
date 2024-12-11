@extends('layouts.app')

@section('content')
    
<div class=" max-w-screen-2xl mx-auto  ">


<x-navigation>  
    <x-sidebar/>
</x-navigation>


<div class= "h-[calc(100vh_-_5.1rem)] overflow-y-hidden flex justify-between max-w-7xl ">
    <aside    class="w-[350px] md:w-[400px] hidden lg:flex  flex-col gap-5 bg-white dark:bg-gray-900  border-r border-gray-200 dark:border-gray-700 h-full p-8 px-9 top-0   inset-x-0 z-[50] px-6 py-4 transition-all duration-300 ease-in-out" >

           <x-sidebar/>
    </aside>



    <main class=" w-full dark:bg-gray-900 pb-14 h-full px-5 md:px-10    overflow-y-auto">

        <x-prose class=" mx-auto w-full dark:text-white/90 rounded-lg text-gray-900">

            {{$slot}}
        </x-prose>
    </main>



</div>

</div>

@endsection