
<article {{$attributes->merge(['class'=> "
        docs-prose
        prose prose-sm md:prose-base 2xl:prose-md
        prose-a:text-blue-500

        prose-img:rounded-xl dark:prose-ol:text-white
        dark:prose-li:text-gray-300  prose-li:text-gray-900/90 dark:prose-ul:text-gray-200
        prose-li:marker:text-gray-500/80   dark:prose-li:marker:text-gray-400 dark:prose-strong:text-white
        prose-strong:font-medium prose-strong:text-gray-900   prose-h1:text-2xl prose-h2:text-xl
        prose-h3:text-lg prose-h4:text-lg prose-h5:text-text-base prose-h6:text-base
        prose-headings:text-gray-800 prose-headings:py-1 dark:prose-headings:text-gray-100
        dark:prose-headings:font-semibold prose-headings:font-bold prose-blockquote-p:text-gray-
        prose-blockquote:bg-zinc-100 dark:prose-blockquote:bg-zinc-700/95
        prose-blockquote-p:dark:text-xl prose-blockquote-p:font-medium prose-p:text-gray-600
        dark:prose-p:text-gray-300    dark:prose-hr:border-gray-700 prose-table:min-w-full
        prose-table:overflow-x-scroll prose-thead:bg-zinc-50 dark:prose-thead:bg-zinc-700
        prose-thead:rounded-lg prose-th:w-[200px] lg:prose-th:w-auto prose-th:px-2
        even:prose-td:bg-grey-50 dark:prose-tr:border-gray-700"])}}>
    {{$slot}}
</article>

@once
    <style>
        .docs-prose :where(:not(pre) > code) {
            font-weight: inherit;
            font-size: inherit;
            line-height: inherit;
            font-family: inherit;
            color: rgb(82 82 91);
            background: rgb(244 244 245);
            border: 1px solid rgb(228 228 231);
            padding: 0.18rem 0.45rem;
            border-radius: 0.5rem;
            white-space: normal;
        }

        .dark .docs-prose :where(:not(pre) > code) {
            color: rgb(228 228 231);
            background: rgba(63, 63, 70, 0.72);
            border-color: rgba(82, 82, 91, 0.95);
        }

        .docs-prose :where(:not(pre) > code)::before,
        .docs-prose :where(:not(pre) > code)::after {
            content: none;
        }

    </style>
@endonce

{{--
     prose-code:text-[0.9rem] prose-pre:m-0 prose-pre:p-0 prose-code:my-0  prose-code:font-normal
--}}
