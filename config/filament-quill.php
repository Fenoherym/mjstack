<?php

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Load Stylesheet
    |--------------------------------------------------------------------------
    |
    | Set to false if you want to manually include the stylesheet.
    |
    */
    'load_styles' => true,

    /*
    |--------------------------------------------------------------------------
    | Theme
    |--------------------------------------------------------------------------
    |
    | Available themes: 'snow' (default), 'bubble'
    |
    */
    'default_theme' => 'snow',

    /*
    |--------------------------------------------------------------------------
    | File Attachments
    |--------------------------------------------------------------------------
    |
    | Here you can configure how uploaded files (like images) should be stored.
    | These will be used when inserting media into the editor (like images).
    |
    */
    'file_attachments' => [
        'disk' => 'public',
        'directory' => 'quill-uploads',
        'visibility' => 'public',
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins
    |--------------------------------------------------------------------------
    |
    | Enable or disable optional plugins.
    |
    */
    'plugins' => [
        'imageUploader' => true,
    ],
];
