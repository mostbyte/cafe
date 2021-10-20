<?php

namespace App\Services;

use App\Table;

class TablesService
{
    public function create(array $validated){
        $storeData = [
            'coordinates' => json_encode([
                'x' => $validated['x'],
                'y' => $validated['y'],
            ]),
            'size' => json_encode([
                'width' => $validated['width'],
                'height' => $validated['height']
            ]),
            'price' => $validated['price'],
            'name' => $validated['name'],
        ];
        return Table::query()->create($storeData);
    }
}
