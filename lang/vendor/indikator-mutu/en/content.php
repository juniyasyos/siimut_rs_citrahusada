<?php

return [
    // Labels & Titles
    'title' => 'Work Unit',
    'plural' => 'Work Units',
    'navigation_group' => 'Indikator Mutu',
    'description' => 'Manage work units in the system',

    // Actions
    'actions' => [
        'create' => 'Add Work Unit',
        'edit' => 'Edit Work Unit',
        'delete' => 'Delete Work Unit',
        'restore' => 'Restore Work Unit',
        'force_delete' => 'Permanently Delete',
        'view' => 'View Details',
    ],

    // Fields
    'fields' => [
        'id' => 'ID',
        'unit_name' => 'Work Unit Name',
        'description' => 'Description',
        'created_at' => 'Created At',
        'updated_at' => 'Updated At',
    ],

    // Messages & Notifications
    'messages' => [
        'created' => 'Work unit successfully added.',
        'updated' => 'Work unit successfully updated.',
        'deleted' => 'Work unit successfully deleted.',
        'restored' => 'Work unit successfully restored.',
        'force_deleted' => 'Work unit has been permanently deleted!',
        'confirm_delete' => 'Are you sure you want to delete this work unit?',
    ],

    // Filters & Search
    'filters' => [
        'search' => 'Search Work Unit...',
        'trashed' => 'Show Deleted',
    ],

    // Errors
    'errors' => [
        'not_found' => 'Work unit not found.',
        'cannot_delete' => 'This work unit cannot be deleted because it is still in use.',
    ],
];
