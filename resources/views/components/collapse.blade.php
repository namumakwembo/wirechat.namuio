@props(['label','open'=>true])

<div x-data="{ open: @js($open) }">
    <button id="controlsAccordionItemOne" type="button" class="flex w-full items-center justify-between gap-4 bg-surface-alt p-4 text-left underline-offset-2 hover:bg-surface-alt/75 focus-visible:bg-surface-alt/75 focus-visible:underline focus-visible:outline-hidden dark:bg-surface-dark-alt dark:hover:bg-surface-dark-alt/75 dark:focus-visible:bg-surface-dark-alt/75 dark:text-white" aria-controls="accordionItemOne" x-on:click="open = ! open" x-bind:class="open ? 'text-on-surface-strong dark:text-on-surface-dark-strong font-bold'  : 'text-on-surface dark:text-on-surface-dark font-medium'" x-bind:aria-expanded="open ? 'true' : 'false'">
        {{$label}}
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke="currentColor" class="size-4 shrink-0 transition" aria-hidden="true" x-bind:class="open  ?  'rotate-180'  :  ''">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
        </svg>
    </button>
    <div x-cloak x-show="open" id="accordionItemOne" role="region" aria-labelledby="controlsAccordionItemOne" x-collapse>
        <div class="px-4">
            {{$slot}}
        </div>
    </div>
</div>
