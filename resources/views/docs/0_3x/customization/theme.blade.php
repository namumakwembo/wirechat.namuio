

<x-docs-layout>

<x-markdown>

# Theme

WireChat supports full theme customization, allowing you to tailor the chat interface to match the look and feel of your application. Whether you're using dark mode, light mode, or your own custom palette, WireChat gives you the flexibility to define your own design system.

## Purpose of Theme Variables

WireChat uses CSS variables to define colors for both light and dark themes. These are scoped and prefixed (e.g., `--wc-light-primary`) to avoid naming collisions and make your styles predictable and maintainable.

| Variable                 | Description                                                                 |
|--------------------------|-----------------------------------------------------------------------------|
| `--wc-brand-primary`     | Brand primary color (used for icons, messagebox highlights, or button states)   |
| `--wc-light-primary`     | Main background color for light mode (e.g., white or `bg-white`)             |
| `--wc-light-secondary`   | Slightly darker background layer (e.g., `bg-gray-100`)                       |
| `--wc-light-accent`      | Accent layer, often used for hover or cards (e.g., `bg-gray-50`)             |
| `--wc-light-border`      | Border color used in light mode                                              |
| `--wc-dark-primary`      | Main background color for dark mode (e.g., `bg-zinc-900`)                    |
| `--wc-dark-secondary`    | Slightly lighter background in dark mode (e.g., `bg-zinc-800`)               |
| `--wc-dark-accent`       | Accent layer in dark mode (e.g., `bg-zinc-700`)                              |
| `--wc-dark-border`       | Border color in dark mode                                                    |

## Recommendations

- **Primary**: Use for main backgrounds. On light mode, this is typically `#fff`; in dark mode, `bg-zinc-900` or `bg-gray-950`.
- **Secondary**: Use for components like message containers or sidebars.
- **Accent**: Use for lighter UI elements like cards or hover backgrounds.
- **Border**: Used consistently for outlines, separators, and message boxes.

---

## Customizing Your Theme

To customize the theme, start by creating your own [custom layout]({{ route('customization.layout') }}). Within your layout, you can override the default theme configuration.

The best place to define your custom theme variables is **after** the `@wirechatStyles` directive in the `<head>` of your layout. This ensures your overrides take precedence over the default styles.

```blade
<head>
    /* ... */
    @wirechatStyles
    <style>
        :root {
            --wc-brand-primary:'#f59e0b';       
            
            --wc-light-primary: #fff;  /* white */
            --wc-light-secondary: oklch(0.985 0.002 247.839);/* --color-gray-100 */
            --wc-light-accent: oklch(0.985 0.002 247.839);/* --color-gray-50 */
            --wc-light-border: oklch(0.928 0.006 264.531);/* --color-gray-200 */

            --wc-dark-primary: oklch(0.21 0.006 285.885); /* --color-zinc-900 */
            --wc-dark-secondary: oklch(0.274 0.006 286.033);/* --color-zinc-800 */
            --wc-dark-accent: oklch(0.37 0.013 285.805);/* --color-zinc-700 */
            --wc-dark-border: oklch(0.37 0.013 285.805);/* --color-zinc-700 */
        }
    </style>
</head>
```

You can also define your own classes in your stylesheet that leverage these variables:

```css
.custom-bubble {
    background-color: var(--wc-light-secondary);
    border-color: var(--wc-light-border);
}
```



</x-markdown>
    
    
    
</x-docs-layout>