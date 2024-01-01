<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait ImageUploadTrait
{
    public function imageUpload(mixed $request)
    {
        $validatedData = [];

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $validatedData = $request->validated();
            $validatedData['image'] = "storage/".$path;
        } else {
            $validatedData = $request->validated();
        }

        return $validatedData;
    }

}
