<?php

namespace App\Enums\Providers;

enum ProviderStatus: string
{
    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
    case suspended = 'suspended';
    case pending = 'pending';
}
