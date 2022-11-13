<?php
declare(strict_types=1);

namespace App\Support\Traits;

use App\Support\Facades\Hashid;

trait HasHashid
{
    public function getHashidAttribute()
    {
        return static::HASHID_PREFIX.$this->hashid_without_prefix;
    }

    public function getHashidWithoutPrefixAttribute()
    {
        return Hashid::encode($this->id);
    }
}
