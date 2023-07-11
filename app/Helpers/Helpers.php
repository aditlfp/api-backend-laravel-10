<?php

use Illuminate\Support\Facades\Cache;


function UploadImage($request, $NameFile)
{
    $file = $request->file($NameFile);
    $extensions = $file->getClientOriginalExtension();
    $rename = 'data' . time() . '.' . $extensions;
    $file->storeAs('images', $rename, 'public');

    return $rename;
}