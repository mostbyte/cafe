<?php

namespace App\Constants;

class CheckPercentConstants
{

    const YES = 'yes';
    const NO = 'no';

    public static function list () {
        return [
            self::YES,
            self::NO,
        ];
    }

    public static function translatedList()
    {
        return [
            self::YES => 'Есть',
            self::NO => 'Нет',
        ];
    }
}
