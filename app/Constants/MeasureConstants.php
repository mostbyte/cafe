<?php

namespace App\Constants;

class MeasureConstants
{

    const KILO = 'kilo';
    const PIECE = 'piece';
    const LITRE = 'litre';
    const METRE = 'metre';

    public static function list () {
        return [
            self::KILO,
            self::PIECE,
            self::LITRE,
            self::METRE,
        ];
    }

    public static function translatedList(): array
    {
        return [
            self::KILO => 'кило',
            self::PIECE => 'штука',
            self::LITRE => 'литр',
            self::METRE => 'метр',
        ];
    }
}
