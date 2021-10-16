<?php

namespace App\Constants;

class RoleConstants
{

    const ADMIN = 'admin';
    const WAITER = 'waiter';
    const CASHIER = 'cashier';
    const MODERATOR = 'moderator';

    public static function list () {
        return [
            self::ADMIN,
            self::WAITER,
            self::CASHIER,
            self::MODERATOR,
        ];
    }
}
