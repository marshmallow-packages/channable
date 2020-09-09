<?php

namespace Marshmallow\Channels\Channable\Facades;

class Channable extends \Illuminate\Support\Facades\Facade
{
    protected static function getFacadeAccessor()
    {
        return \Marshmallow\Channels\Channable\Channable::class;
    }
}
