<x-docs-layout>

<x-markdown>

# Theme

WireChat supports full theme customization, allowing you to tailor the chat interface to match the look and feel of your application. Whether you're using dark mode, light mode, or your own custom palette, WireChat gives you the flexibility to define your own design system.

---

## Changing the Colors

In the configuration, you can easily change the colors that are used. WireChat ships with **6 predefined colors** that are used everywhere within the framework.
They are customizable as follows:

```php
use Namu\WireChat\Panel;
use Namu\WireChat\Support\Color;

public function panel(Panel $panel): Panel
{
return $panel
    // ...
    ->colors([
        'primary' => Color::Blue,
        'danger' => Color::Rose,
        'gray' => Color::Gray,
        'info' => Color::Blue,
        'success' => Color::Emerald,
        'warning' => Color::Orange,
    ]);
}
````

The **primary** color is used as the main color for notifications.

---

## Overriding the Primary Color

The most common customization is overriding the **primary** color, since this is the one used across WireChat as your brand color (buttons, highlights, notification indicators, etc.).

You don’t need to redefine every color — just provide your own palette for `primary`, and the rest of the colors (`danger`, `warning`, `success`, `info`, `gray`) will continue using the global defaults.

WireChat works best with modern color formats like `oklch()`, which Tailwind also uses in its official palettes. This ensures better contrast handling and consistency in both light and dark themes.

```php
use Namu\WireChat\Panel;

public function panel(Panel $panel): Panel
{
return $panel
    //..
    ->colors([
        'primary' => [
            50 => 'oklch(0.985 0.002 247.839)',
            100 => 'oklch(0.971 0.013 17.38)',
            200 => 'oklch(0.936 0.032 17.717)',
            300 => 'oklch(0.885 0.062 18.334)',
            400 => 'oklch(0.808 0.114 19.571)',
            500 => 'oklch(0.704 0.191 22.216)', // main brand shade
            600 => 'oklch(0.637 0.237 25.331)',
            700 => 'oklch(0.505 0.213 27.518)',
            800 => 'oklch(0.444 0.177 26.899)',
            900 => 'oklch(0.396 0.141 25.723)',
            950 => 'oklch(0.258 0.092 26.042)',
            ],
        ]);
}
```

---

## Customizing WireChat Theme (CSS Variables)

WireChat uses CSS variables to define colors for both light and dark themes. These are scoped and prefixed (e.g., `--wc-light-primary`) to avoid naming collisions and make your styles predictable and maintainable.

| Variable               | Description                                                                   |
| ---------------------- | ----------------------------------------------------------------------------- |
| `--wc-brand-primary`   | Brand primary color (used for icons, messagebox highlights, or button states) |
| `--wc-light-primary`   | Main background color for light mode (e.g., white or `bg-white`)              |
| `--wc-light-secondary` | Slightly darker background layer (e.g., `bg-gray-100`)                        |
| `--wc-light-accent`    | Accent layer, often used for hover or cards (e.g., `bg-gray-50`)              |
| `--wc-light-border`    | Border color used in light mode                                               |
| `--wc-dark-primary`    | Main background color for dark mode (e.g., `bg-zinc-900`)                     |
| `--wc-dark-secondary`  | Slightly lighter background in dark mode (e.g., `bg-zinc-800`)                |
| `--wc-dark-accent`     | Accent layer in dark mode (e.g., `bg-zinc-700`)                               |
| `--wc-dark-border`     | Border color in dark mode                                                     |

---

## Recommendations

* **Primary**: Use for main backgrounds. On light mode, this is typically `#fff`; in dark mode, `bg-zinc-900` or `bg-gray-950`.
* **Secondary**: Use for components like message containers or sidebars.
* **Accent**: Use for lighter UI elements like cards or hover backgrounds.
* **Border**: Used consistently for outlines, separators, and message boxes.

---

## Customizing Your Theme in Blade

To customize the theme, start by creating your own \[custom layout]\({{ route('customization.layout') }}).
Within your layout, you can override the default theme configuration.

The best place to define your custom theme variables is **after** the `@wirechatStyles` directive in the `<head>` of your layout.
This ensures your overrides take precedence over the default styles.

```blade
<head>
    /* ... */
    @wirechatStyles(panel:'panel-id')
    <style>
        :root {
            --wc-brand-primary: '#f59e0b';

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

---

</x-markdown>

</x-docs-layout>
