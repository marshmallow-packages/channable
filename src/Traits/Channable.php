<?php

namespace Marshmallow\Channels\Channable\Traits;

use Marshmallow\Channels\BolCom\Models\ChannableBolCom;

trait Channable
{
	public function bolcomable()
    {
        return $this->morphOne(ChannableBolCom::class, 'channable_bol');
    }
}
