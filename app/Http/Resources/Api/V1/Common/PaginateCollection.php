<?php

namespace App\Http\Resources\Api\V1\Common;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use JetBrains\PhpStorm\ArrayShape;

class PaginateCollection extends ResourceCollection
{
    /**
     * @param Request $request
     * @return array<string, int>
     */
    public function with(
        $request
    ): array {
        return [
            'code' => 200000,
        ];
    }
}
