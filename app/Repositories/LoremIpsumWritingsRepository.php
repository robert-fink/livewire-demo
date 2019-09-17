<?php

namespace App\Repositories;

use App\Contracts\WritingsContract;

class LoremIpsumWritingsRepository implements WritingsContract
{
    /**
     * @return array
     */
    public function get()
    {
        $lipsum = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id libero malesuada, aliquam libero eu, scelerisque dui. Proin id eleifend eros, eu placerat erat. Nullam ac est nisl. Aenean tempor neque in vulputate lobortis. Nulla mattis finibus libero sed euismod. Aenean viverra massa ut risus eleifend, eget consequat sem congue. Vivamus dictum eros in tortor lacinia hendrerit. Duis dignissim vitae ante et ultrices. Nulla convallis laoreet felis, ac hendrerit quam pulvinar nec. Etiam quis neque volutpat, suscipit dui nec, elementum tellus. Cras lacinia risus ac massa ornare volutpat. Fusce vel magna lorem. Sed metus mauris, mollis rhoncus justo vitae, ultricies porta mi. Integer suscipit dictum leo sed rhoncus.';

        $lipsum_length = strlen($lipsum);

        $writings = [];

        for ($i = 0; $i < 10; $i++){

            $start = mt_rand(0, $lipsum_length);

            $end = mt_rand($start, $lipsum_length);

            $writings[] = [
                'name' => auth()->user()->name ?? null,
                'title' => 'Lorem Ipsum ' . $i,
                'entry' => substr($lipsum, $start, $end),
                'created_at' => now()->subDays($i)->toDateTimeString(),
                'published' => true
            ];
        }

        return $writings ?? null;
    }
}
