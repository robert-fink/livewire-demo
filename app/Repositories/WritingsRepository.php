<?php

namespace App\Repositories;

use App\Contracts\WritingsContract;
use App\Writings;

class WritingsRepository implements WritingsContract
{
    public function get()
    {
        $writings = Writings::with('user')->userWritings()->orderByDesc('id')->get();

        return $writings->count() > 0 ? $writings->toArray() : null;
    }
}
