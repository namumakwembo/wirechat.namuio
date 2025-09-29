Ah! Now I see why your `getViewFolder()` was returning the wrong value. In the updated config:

```php
'versions' => [
    '0_2x' => '0.2x',
    '0_3x' => '0.3x',
],
```

* **Keys** are the **view folders** (`0_2x`, `0_3x`)
* **Values** are the **route versions** (`0.2x`, `0.3x`)

So when you try `$versions[$this->routeVersion]`, it won’t work anymore because `$this->routeVersion` is something like `'0.2x'`, which is **a value**, not a key.

Here’s the correct way to get the view folder:

```php
public function getViewFolder(): string
{
    $versions = config('docs.versions', []);

    // Find the key (view folder) that matches the route version
    $folder = array_search($this->routeVersion, $versions);

    // Fallback to the first folder (latest) if not found
    return $folder ?: array_key_first($versions);
}
```

✅ Example:

```php
$this->routeVersion = '0.2x';
$folder = $this->getViewFolder(); // returns '0_2x'
```

This fixes the `View [docs.0.2x.setup] not found` error because your Blade calls should now use the **folder name**, e.g.:

```php
view("docs.$folder.setup");
```

If you want, I can also rewrite the full `DocsVersion` class and `Docs` service to **fully align with this new keys/values structure**, so all helpers (`current()`, `route()`, `viewFolder()`) work correctly. Do you want me to do that?
