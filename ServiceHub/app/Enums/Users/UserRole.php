<?php

namespace App\Enums\Users;

enum UserRole: string
{
    case CUSTOMER = 'customer';
    case PROVIDER = 'provider';
    case ADMIN = 'admin';
}
