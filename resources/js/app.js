import './bootstrap';
//import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm';
//import HighlightScroll from 'highlight-scroll'
import './copycode.js';
import hljs from 'highlight.js/lib/core';


// Alpine.plugin(HighlightScroll({
//     offset: 120,
//     highlightClasses: 'scale-110 transition-all font-bold text-slate-600 dark:text-white'
// }));
// Livewire.start();
// Alpine.start();

//Import only what you need
import javascript from 'highlight.js/lib/languages/javascript';
import php from 'highlight.js/lib/languages/php';
import css from 'highlight.js/lib/languages/css';
import xml from 'highlight.js/lib/languages/xml'; // for html/blade
import bash from 'highlight.js/lib/languages/bash';
import shell from 'highlight.js/lib/languages/shell';
// import hljs from "highlight.js";

// Register them
hljs.registerLanguage('javascript', javascript);
hljs.registerLanguage('php', php);
hljs.registerLanguage('css', css);
hljs.registerLanguage('html', xml);
hljs.registerLanguage('blade', xml); // alias blade -> html
hljs.registerLanguage('bash', bash);
hljs.registerLanguage('sh', shell);

// Highlight after DOM is ready

console.log("✅ app.js loaded");

document.addEventListener('DOMContentLoaded', () => {
    hljs.highlightAll();

    console.log('✅ DOMContentLoaded reached');
    console.log('✅ Highlight js loaded');
});



