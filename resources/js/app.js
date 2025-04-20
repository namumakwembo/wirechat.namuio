import './bootstrap';

import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm';

import HighlightScroll from 'highlight-scroll'

  // Optionally, attach Livewire and Alpine to the window for global access
  window.Livewire = Livewire
  window.Alpine = Alpine
// Provide your own defaults
Alpine.plugin(HighlightScroll({
    offset: 120,
    highlightClasses: 'scale-110 transition-all font-bold text-slate-600 dark:text-white'
  }));

// Must be BEFORE Alpine.start():

Livewire.start()



    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll("pre").forEach((pre) => {
            // Wrap pre in a div to position the button
            let wrapper = document.createElement("div");
            wrapper.classList.add("relative");
            pre.parentNode.insertBefore(wrapper, pre);
            wrapper.appendChild(pre);

            // Create the copy button
            let button = document.createElement("button");
            button.className = "absolute top-2 right-2 bg-gray-300 dark:bg-zinc-600 z-10 text-black border border-zince-200 dark:border-gray-800 px-2 py-1 text-xs cursor-pointer rounded-sm opacity-70 transition-opacity duration-200 hover:opacity-100";
 
            const copyIcon= `
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 dark:text-white">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 7.5V6.108c0-1.135.845-2.098 1.976-2.192.373-.03.748-.057 1.123-.08M15.75 18H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08M15.75 18.75v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5A3.375 3.375 0 0 0 6.375 7.5H5.25m11.9-3.664A2.251 2.251 0 0 0 15 2.25h-1.5a2.251 2.251 0 0 0-2.15 1.586m5.8 0c.065.21.1.433.1.664v.75h-6V4.5c0-.231.035-.454.1-.664M6.75 7.5H4.875c-.621 0-1.125.504-1.125 1.125v12c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V16.5a9 9 0 0 0-9-9Z" />
              </svg>
            `;
            const coppiedIcon=`
             <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5  dark:text-white">
                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
              </svg>             
            `;
            button.innerHTML = copyIcon;

            // Copy functionality
            button.addEventListener("click", async () => {
                try {
                    await navigator.clipboard.writeText(pre.innerText);
                    button.innerHTML = coppiedIcon;
                    setTimeout(() => (button.innerHTML = copyIcon), 2000);
                } catch (err) {
                    console.error("Failed to copy:", err);
                }
            });

            // Add button to wrapper
            wrapper.appendChild(button);
        });
    });


  //   document.addEventListener("DOMContentLoaded", function () {
  //     function updateShikiStyles() {
  //         const darkModeActive = document.documentElement.classList.contains("dark");
  
  //         document.querySelectorAll(".dark .shiki > code > span > span").forEach((span) => {
  //             if (darkModeActive) {
  //                 span.dataset.originalColor = span.style.color; // Store original color
  //                 span.style.color = "white"; // Override color in dark mode
  //             } else {
  //                 if (span.dataset.originalColor) {
  //                     span.style.color = span.dataset.originalColor; // Restore original color in light mode
  //                     delete span.dataset.originalColor; // Cleanup attribute
  //                 } else {
  //                     span.style.color = ""; // Reset if no stored value
  //                 }
  //             }
  //         });
  //     }
  
  //     // Run on page load
  //     updateShikiStyles();
  
  //     // Watch for theme changes dynamically
  //     const observer = new MutationObserver(updateShikiStyles);
  //     observer.observe(document.documentElement, { attributes: true, attributeFilter: ["class"] });
  // });
  

//   document.addEventListener("DOMContentLoaded", function () {
//     function updateShikiStyles() {
//         const darkModeActive = document.documentElement.classList.contains("dark");

//         document.querySelectorAll(".shiki > code > span > span").forEach((span) => {
//             if (darkModeActive) {
//                 span.style.setProperty("mix-blend-mode", "multiply", "important"); // Lighten colors
//             } else {
//                 span.style.removeProperty("mix-blend-mode"); // Restore in light mode
//             }
//         });
//     }

//     // Run on page load
//     updateShikiStyles();

//     // Watch for theme changes dynamically
//     const observer = new MutationObserver(updateShikiStyles);
//     observer.observe(document.documentElement, { attributes: true, attributeFilter: ["class"] });
// });

import { createHighlighter } from "shiki";

async function applyShikiHighlighting() {
    const highlighter = await createHighlighter({
        themes: {
            light: "github-light",
            dark: "github-dark"
        },
        langs: ["php"]
    });

    document.querySelectorAll("pre code").forEach((block) => {
        const code = block.textContent;
        const html = highlighter.codeToHtml(code, {
            lang: "php",
            themes: {
                light: "github-light",
                dark: "github-dark"
            }
        });

        block.innerHTML = html;
    });
}

// Apply on page load
document.addEventListener("DOMContentLoaded", applyShikiHighlighting);

// Re-apply when theme changes
const observer = new MutationObserver(applyShikiHighlighting);
observer.observe(document.documentElement, { attributes: true, attributeFilter: ["class"] });
