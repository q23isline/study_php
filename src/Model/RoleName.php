<?php

declare(strict_types=1);

namespace App\Model;

/**
 * RoleName
 */
enum RoleName: string
{
    case Admin = 'admin';
    case General = 'general';
}
