import './bootstrap';

import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm';

import ScrollHighlighter from './scroll-highlighter.js'

// Provide your own defaults
Alpine.plugin(ScrollHighlighter({
    offset: 120,
    highlightClasses: 'scale-110 transition-colors text-blue-600 dark:text-blue-500'
  }))

// Must be BEFORE Alpine.start():


Livewire.start()

