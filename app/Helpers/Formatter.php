<?php

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

// Helper function to store files
function storeFile($file, $prefix, $oldFilePath = null)
{
    // Delete old file if it exists
    if ($oldFilePath && Storage::exists('public/' . $prefix . '/' . $oldFilePath)) {
        Storage::delete('public/' . $prefix . '/' . $oldFilePath);
    }

    // Store new file with a unique name
    $uniqueName = $prefix . '-' . Str::uuid() . '.' . $file->getClientOriginalExtension();
    $file->storeAs('public/' . $prefix, $uniqueName);  // Store in the public disk
    return $uniqueName;
}