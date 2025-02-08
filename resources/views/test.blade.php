<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Alpine Minimal Test</title>

  <!-- Alpine v3+ (direct from CDN) -->
  <script src="https://unpkg.com/alpinejs@3.12.0/dist/cdn.min.js" defer></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    /**
     * Minimal plugin logic inline.
     * If this doesn't work, it means either Alpine isn't loading or
     * something else is interfering at a very basic level.
     */
    document.addEventListener('alpine:init', () => {
      console.log('[Plugin] Alpine has initialized, registering plugin logic.');

      // 1) Create a minimal store:
      Alpine.store('menuHighlighter', {
        items: [],      // { el, target }
        sections: [],   // { el, id }
        offset: 80,
        highlightClasses: 'underline bg-yellow-200',
        
        registerItem(el, target) {
          console.log('[menuHighlighter] registerItem() -> target=', target, el);
          this.items.push({ el, target });
        },
        
        registerSection(el, id) {
          console.log('[menuHighlighter] registerSection() -> id=', id, el);
          this.sections.push({ el, id });
        },

        onScroll() {
          console.log('[menuHighlighter] onScroll fired');
          // Just do a super simple highlight for the active item
          
          let currentId = '';

          for (let i = 0; i < this.sections.length; i++) {
            const s = this.sections[i];
            const next = this.sections[i + 1];
            
            const startPos = s.el.offsetTop - this.offset;
            const nextPos = next ? (next.el.offsetTop - this.offset) : Infinity;

            if (window.scrollY >= startPos && window.scrollY < nextPos) {
              currentId = s.id;
              break;
            }
          }

          // Clear highlight from all items
          for (let item of this.items) {
            item.el.classList.remove(...this.highlightClasses.split(' '));
          }

          // Add highlight to the active item
          if (currentId) {
            const activeItem = this.items.find(i => i.target === currentId);
            if (activeItem) {
              activeItem.el.classList.add(...this.highlightClasses.split(' '));
            }
          }
        },

        smoothScrollTo(target) {
          const el = document.getElementById(target);
          if (!el) return;
          const position = el.offsetTop - this.offset;
          window.scrollTo({ top: position, behavior: 'smooth' });
        },
      });

      // 2) Minimal directives:
      Alpine.directive('menu-item', (el, { expression }) => {
        console.log('[x-menu-item] directive init -> expression=', expression, el);
        const target = expression;
        if (!target) return;

        // Register with the store
        Alpine.store('menuHighlighter').registerItem(el, target);

        // Add click listener
        el.addEventListener('click', e => {
          e.preventDefault();
          console.log('[x-menu-item click]', target);
          Alpine.store('menuHighlighter').smoothScrollTo(target);
        });
      });

      Alpine.directive('menu-section', (el, { expression }) => {
        console.log('[x-menu-section] directive init -> expression=', expression, el);
        const id = expression;
        if (!id) return;

        // Ensure the DOM element has that ID (useful for scrolling)
        if (!el.id) {
          el.id = id;
        }

        // Register with the store
        Alpine.store('menuHighlighter').registerSection(el, id);
      });

      // 3) Add a global scroll event
      window.addEventListener('scroll', () => {
        Alpine.store('menuHighlighter').onScroll();
      });

      // 4) On page load, run an initial scroll check
      Alpine.store('menuHighlighter').onScroll();
    });
  </script>
</head>
<body x-data style="margin:0; padding:0;">

  <!-- Simple nav (fixed at top) -->
  <nav style="position: fixed; top: 0; width: 100%; background: #ccc; padding: 10px;">
    <a x-menu-item="section1" href="#" style="margin-right:10px;">Section 1</a>
    <a x-menu-item="section2" href="#" style="margin-right:10px;">Section 2</a>
    <a x-menu-item="section3" href="#">Section 3</a>
  </nav>

  <!-- Some space so we can scroll -->
  <div style="height: 80px;"></div>

  <section x-menu-section="section1" style="height:700px; background:#f9f9f9;">
    <h2>Section 1</h2>
  </section>
  <section x-menu-section="section2" style="height:700px; background:#f0f0f0;">
    <h2>Section 2</h2>
  </section>
  <section x-menu-section="section3" style="height:700px; background:#e9e9e9;">
    <h2>Section 3</h2>
  </section>

</body>
</html>
