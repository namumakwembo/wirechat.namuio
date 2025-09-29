<x-docs-layout>

<x-markdown>

# Attachments

The **Attachments** feature allows users to seamlessly share files and media in conversations, enhancing the communication experience.

---

<x-section-heading label="Enabling Attachments" />

Wirechat allows you to control how attachments are handled on a per-panel basis.
You can enable **all attachments at once**, or selectively enable **file** or **media** attachments only.

---

<x-sub-section-heading label="Enable Attachments" />

Calling `attachments()` enables both file and media attachments.
Setting this to `false` will completely disable attachments for the panel.

```php
use Wirechat\Wirechat\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        //..
        ->attachments();
}
````

---

<x-sub-section-heading label="File Attachments Only" />

Use `fileAttachments()` if you want to allow only document uploads such as PDFs, ZIPs, or text files.

```php
use Wirechat\Wirechat\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        //..
        ->fileAttachments();
}
```

---

<x-sub-section-heading label="Media Attachments Only" />

Use `mediaAttachments()` to allow users to upload images and videos while disabling file uploads.

```php
use Wirechat\Wirechat\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        //..
        ->mediaAttachments();
}
```

---

<x-section-heading label="Sending Attachments" />

Users can share photos, videos, or documents in conversations by following these steps:

1. Open an individual or group chat.
2. Click the **attachment icon**, then choose:

* **Photos & Videos**: Select images or videos from your device.
* **Files**: Select documents (e.g., PDFs, text files).
3. Preview attachments and add or remove files as needed.
4. Click **Send** to share.

---

<x-section-heading label="File System Configuration" />

WireChat separates **storage configuration** into two layers for consistency and easier maintenance.

The global WireChat filesystem settings are defined in the `wirechat` config file.
This ensures that storage behavior remains consistent across models, jobs, observers, and URL generation.

```php
// config/wirechat.php
return [
    'attachments' => [
        'storage_disk'   => 'public',    // e.g., 'public', 's3'
        'storage_folder' => 'attachments', // or '/'
        'visibility'     => 'public',    // 'public' or 'private'
    ],
];
```

---

<x-section-heading label="Upload  Settings" />

<x-sub-section-heading label="Max Uploads" />

Control how many files a user can attach per request using **`maxUploads()`**:

```php
$panel->maxUploads(5);
```

This limits the number of attachments allowed in a single message.

---

<x-sub-section-heading label="Media MIME Types" />

Define the allowed media file types that users can upload in conversations.

```php
$panel->mediaMimes(['png', 'jpg', 'jpeg', 'gif', 'mov', 'mp4']);
```

This ensures only the specified file formats are accepted for media attachments.

---

<x-sub-section-heading label="Media Maximum Upload Size" />

Set the maximum upload size (in KB) for media files.

```php
$panel->mediaMaxUploadSize(12288); // 12 MB
```

Uploads exceeding this size will be rejected by the system.

---

<x-sub-section-heading label="File MIME Types" />

Define the allowed document types that users can attach in conversations.

```php
$panel->fileMimes(['zip', 'rar', 'txt', 'pdf']);
```

Only these file types are permitted for file attachments.

---

<x-sub-section-heading label="File Maximum Upload Size" />

Set the maximum upload size (in KB) for document attachments.

```php
$panel->fileMaxUploadSize(12288); // 12 MB
```

Any file larger than this will be blocked from upload.

---

<x-section-heading label="Validation for Attachments" />

Wirechat validates attachments at two levels:

1. **Client-Side Validation** – Ensures users only upload files that meet the defined rules.
2. **Server-Side Validation** – Uses Laravel and Livewire backend validation for additional security.

> 💡 Always keep validation rules in sync with your **panel** settings.
> For security and consistency, disk and visibility are **never panel-controlled** — they are always loaded from config.

</x-markdown>

</x-docs-layout>
