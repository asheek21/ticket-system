<?php

namespace App\Enums;

enum AdminRoleEnum: string
{
    case SuperAdmin = 'SuperAdmin';
    case Admin = 'Admin';

    public function label(): string
    {
        return match ($this) {
            self::SuperAdmin => 'Super Admin',
            self::Admin => 'Admin',
        };
    }
}
