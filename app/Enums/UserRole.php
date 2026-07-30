<?php

namespace App\Enums;

enum UserRole: string
{
    case Administrator = 'administrator';
    case AssetManager = 'asset_manager';
    case Employee = 'employee';
}
