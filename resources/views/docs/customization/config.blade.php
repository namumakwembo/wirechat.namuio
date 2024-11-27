
<x-docs-layout>

<x-markdown>

# Configuration

You can customize the wirechat configuration file , in here you can customize options such as themse , routes  & features

If you have not yet published the config , you can run the following command

```bash
php artisan vendor:publish --tag=wirechat-config
```

`config/wirechat.php`

```

return [

    /*
     * Tables prefix
     */
    'table_prefix' => 'wire_',

    /* Model class name for Users */
    'user_model' => \App\Models\User::class,

    /**
     * Broadcasting:
     * define queue config*/
    'broadcasting' => [
        'messages_queue' => 'messages',  // Prioritize for real-time messaging in chat rooms
        'notifications_queue' => 'default',  // Notifications for new messages outside chatrooms
    ],
    /**
     * Color:
     * This is the theme color that will be used in the chat
     * Default : #3b82f6 //blue-500
     *  */
    'color' => '#a855f7',

    /**
     * Home route:
     * This is the route to redirect to when exit button is clicked in the chat*/
    'redirect_route' => '/',

    'routes' => [
        'prefix' => '/chats',
        'middleware' => ['web', 'auth'],
    ],

    /**
     * Features:
     * You can configure the feature you want to allow for wirechat */
    'show_new_chat_modal_button' => true,  
    'show_new_group_modal_button' => true,  

    'allow_chats_search' => true, 
    'allow_media_attachments' => true, 
    'allow_file_attachments' => true,

    'user_searchable_fields' => ['name'], 
    'max_group_members' => 3000,

    /**
     * Attachments:
     **/
    'attachments' => [
        'storage_folder' => 'attachments',
        'storage_disk' => 'public',
        'max_uploads' => 10,

        //Media config
        'media_mimes' => (array) ['png', 'jpg', 'jpeg', 'gif', 'mov', 'mp4'],
        'media_max_upload_size' => 12288, // 12MB

        //Files config
        'file_mimes' => (array) ['zip', 'rar', 'txt', 'pdf'],
        'file_max_upload_size' => 12288, //12 MB
    ],

];

```
            


</x-markdown>
        
</x-docs-layout>