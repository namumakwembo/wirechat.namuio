import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allow your team to quickly build robust real-time web applications.
 */

import './echo';



if (!window.Alpine) {
    import('../../vendor/livewire/livewire/dist/livewire.esm').then(module => {
        const { Livewire, Alpine } = module
        // Optionally, attach Livewire and Alpine to the window for global access
        window.Livewire = Livewire
        window.Alpine = Alpine
        Livewire.start()
    }).catch(error => {
        console.error('Failed to load Livewire and Alpine:', error)
    })
}
