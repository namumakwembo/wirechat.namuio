
<x-docs-layout>

<x-markdown>

# Attachments

The **Attachments** feature allows users to seamlessly share files and media in conversations, enhancing the communication experience.

---

### Enabling Attachments

To enable attachments in your application, ensure the following options are set to `true` in the Wirechat [configuration]({{ route('customization.config') }}):

- `allow_media_attachments`  
- `allow_file_attachments`  

---

### Sending Attachments

Users can share photos, videos, or documents in conversations by following these steps:

1. Open an individual or group chat.  
2. Click the **attachment icon**, then choose:  
    - **Photos & Videos**: Select images or videos from your device.  
    - **Files**: Select documents (e.g., PDFs, text files).  
3. Preview attachments and add or remove files as needed.  
4. Click **Send** to share.  

---

### Customizing Attachment Settings

Wirechat provides extensive customization options for handling attachments. These settings can be modified in the `wirechat.php` configuration file:

#### Configuration Example

```php
'attachments' => [
    'storage_folder' => 'attachments', 
    'storage_disk' => 'public', 
    'max_uploads' => 10,  

    // Media configuration
    'media_mimes' => ['png', 'jpg', 'jpeg', 'gif', 'mov', 'mp4'],
    'media_max_upload_size' => 12288, // 12 MB

    // File configuration
    'file_mimes' => ['zip', 'rar', 'txt', 'pdf'],
    'file_max_upload_size' => 12288, // 12 MB
],
```

#### Key Settings  

- **`storage_folder`**: Directory where attachments will be stored.  
- **`storage_disk`**: The storage disk (e.g., `public`, `s3`) used for attachments.  
- **`max_uploads`**: Maximum number of attachments allowed per request.  
- **`media_mimes`**: Permitted MIME types for media files (photos, videos).  
- **`media_max_upload_size`**: Maximum file size (in KB) for media uploads.  
- **`file_mimes`**: Permitted MIME types for documents (e.g., PDFs, ZIPs).  
- **`file_max_upload_size`**: Maximum file size (in KB) for document uploads.  

---

### Validation for Attachments

Wirechat validates attachments at two levels:

1. **Client-Side Validation**: Ensures users only upload files that meet the defined rules before the request is sent.  
2. **Server-Side Validation**: Uses Laravel and Livewire backend validation for additional security and accuracy.  

#### Synchronizing Validation Rules

When customizing attachment validation rules, ensure the client-side rules are synchronized with the backend by updating the settings in your Livewire configuration.  

</x-markdown>

</x-docs-layout>