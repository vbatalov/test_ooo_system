<?php

namespace App\Actions\User;

use App\Actions\Optimize\ImageOptimizer;
use App\Http\Requests\UpdatePhotoUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Spatie\Image\Exceptions\CouldNotLoadImage;

class UpdatePhotoUserAction
{
    public function __construct(public UpdatePhotoUserRequest $request)
    {
    }

    /**
     * @throws CouldNotLoadImage
     */
    public function handle(): array
    {
        $user_id = auth()->user()->id;

        // save pic
        $patch = $this->request->file("image")->store("images/$user_id", "public");

        // optimize pic
        ImageOptimizer::optimize(Storage::disk('public')->path($patch), 256, 256);

        // save patch locally
        User::find($user_id)->update([
            "photo" => $patch
        ]);

        // return patch
        return [
            "patch" => $patch
        ];
    }
}
