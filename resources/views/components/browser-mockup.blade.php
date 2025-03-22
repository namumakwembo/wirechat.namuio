<div {{$attributes->merge(['class'=>'w-full h-auto'])}}>
<div class="w-full h-11 rounded-t-lg bg-gray-200 dark:bg-gray-800 flex justify-start items-center space-x-1.5 px-3">
<span class="w-3 h-3 rounded-full bg-red-400"></span>
<span class="w-3 h-3 rounded-full bg-yellow-400"></span>
<span class="w-3 h-3 rounded-full bg-green-400"></span>
</div>
<div class="bg-white dark:bg-gray-900  border rounded-b-lg dark:border-gray-700/80 w-full h-full grow">
{{$slot}}
</div>
</div>