<div class="pb-4 flex flex-col grow overflow-y-auto scrollbar-theme">

    <nav class="grow flex flex-col flex-1  px-2 space-y-1">

        @if(docs()->version()=='0_2x')
            @include('docs.0_2x.__app.navigation')
        @elseif(docs()->version()=='0_3x')
            @include('docs.0_3x.__app.navigation')
        @endif

    </nav>
</div>
