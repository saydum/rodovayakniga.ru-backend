<?php

namespace App\Traits;

use Illuminate\Foundation\Http\FormRequest;

trait ImageUploadTrait
{
    public function imageUpload(FormRequest $request) : array
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
