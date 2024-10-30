<?php
use Illuminate\Support\Str;

// Helper function to store files
function storeFile($file, $prefix)
{
    $uniqueName = $prefix . '-' . Str::uuid() . '.' . $file->getClientOriginalExtension();
    $file->storeAs('public/'.$prefix, $uniqueName);  // Store in public disk
    return $uniqueName;
}