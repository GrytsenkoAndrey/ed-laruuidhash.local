<?php
declare(strict_types=1);

namespace App\Support\Traits;

use App\Support\Facades\Hashid;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Str;

trait HasHashid
{
    /**
     * @return string
     */
    public function getHashidAttribute(): string
    {
        return static::HASHID_PREFIX.$this->hashid_without_prefix;
    }

    /**
     * @return mixed
     */
    public function getHashidWithoutPrefixAttribute(): mixed
    {
        return Hashid::encode($this->id);
    }

    /**
     * @param $hid
     * @return mixed
     */
    public static function fidnOrFailByHashid($hid): mixed
    {
        $hash = Str::after($hid, static::HASHID_PREFIX);
        $ids = Hashid::decode($hash);

        if (empty($ids)) {
            throw new ModelNotFoundException();
        }

        return static::findOrFail($ids[0]);
    }
}
