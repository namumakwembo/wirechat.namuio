import './bootstrap';
import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm';

import HighlightScroll from 'highlight-scroll'
// Provide your own defaults
import './copycode.js';

Alpine.plugin(HighlightScroll({
    offset: 120,
    highlightClasses: 'scale-110 transition-all font-bold text-slate-600 dark:text-white'
}));

Livewire.start()

import hljs from 'highlight.js/lib/common';
// import 'highlight.js/styles/github.css';       // light theme
// import 'highlight.js/styles/github-dark.css';  // dark theme

// Run highlight after DOM content is loaded
document.addEventListener('DOMContentLoaded', () => {
    hljs.highlightAll();
});

