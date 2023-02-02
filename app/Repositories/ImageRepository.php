<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class ImageRepository implements Contracts\ImageRepositoryContract
{
    public function attach(Model $model, string $methodName, array $images = [], string $directory = null)
    {
        if (! method_exists($model, $methodName)) {
            throw new \Exception($model::class . " does not have the method [{$methodName}]");
        }

        if (!empty($images)) {
            foreach ($images as $image) {
                // $product->images()
                // $user->avatar()
                call_user_func([$model, $methodName])->create(['directory' => $directory, 'path' => $image]);
            }
        }
    }
}
