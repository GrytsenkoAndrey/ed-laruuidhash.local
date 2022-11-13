<?php
declare(strict_types=1);

namespace App\Support\Facade;

class Hashid extends \Illuminate\Support\Facades\Facade
{
    protected static function getFacadeAccessor()
    {
        return 'hashid';
    }
}
