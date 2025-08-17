Perfect! Here’s a **clear README section** for your version control system for the docs — it explains **how versions are structured, how to add/update, and what to change**. You can include this in your repo (e.g., `README.md` under a “Docs Version Control” section).

---

## Docs Version Control

### Overview

This project uses a **versioned documentation system**. Each version has:

* **Route version** → used in the URL prefix (`0.1x`, `0.2x`, etc.)
* **View folder version** → used in the view directory (`0_1x`, `0_2x`, etc.)

The mapping is defined in `config/docs.php` as:

```php
'versions' => [
    '0.1x' => '0_1x',
    '0.2x' => '0_2x',
    '0.3x' => '0_3x', // latest version
],
```

* **Latest version** → automatically uses an empty route prefix (`''`) so `/docs/installation` points to the newest docs.
* **Older versions** → maintain their own route prefixes: `/docs/0.2x/installation`.

---

### Adding a New Version

1. **Create a new view folder** under `resources/views/docs/` using underscores:

   ```
   resources/views/docs/0_4x/
   ```

2. **Copy existing docs templates** into the new folder. Update content as needed for the new version.

3. **Update the config**:

   ```php
   'versions' => [
       '0.1x' => '0_1x',
       '0.2x' => '0_2x',
       '0.3x' => '0_3x',
       '0.4x' => '0_4x', // new version
   ],
   ```

4. **Update `DocsVersion` or `Docs` references** if you need to specifically initialize a version (optional):

   ```php
   $docs = new \App\Support\DocsVersion('0.4x');
   ```

5. **Route prefixes** are handled automatically:

    * Latest version (highest by semantic comparison) → no route prefix.
    * Older versions → keep their own prefixes.

---

### Updating an Existing Version

1. Navigate to the corresponding view folder (`0_1x`, `0_2x`, etc.).
2. Update content as required.
3. No config changes are needed unless you rename or remove a version.

---

### Generating Routes in Views

Use the `Docs::route()` helper to generate URLs that automatically respect versioning:

```blade
<a href="{{ \App\Services\Docs::route('installation') }}">Installation</a>
```

* Automatically removes the prefix for the latest version.
* Automatically adds the prefix for older versions.

---

### Notes / Best Practices

* **Do not hardcode empty route versions**; rely on `DocsVersion::getRouteVersion()` and `Docs::route()` instead.
* **Use underscores in view folder names**, dots in route versions.
* **Always update `config/docs.php`** when adding or removing versions.
* **The latest version** is automatically determined from `config/docs.php` using semantic comparison, so you don’t have to manually mark it as latest.

---
