@props(['reverse'=>false])


<div   class=" group flex flex-col  {{$reverse?'sm:flex-row-reverse':'sm:flex-row'}} gap-4 sm:gap-8">
    <h4  {{$title->attributes->class(['sm:w-1/2 w-full  text-base whitespace-nowrap items-start flex justify-start'])}}>
        {{$title}}
    </h4>
 
    <div  class="sm:w-1/2">
        <p  class="text-sm xl:text-base">
            {{$description}}
        </p>
    </div>
 </div>
