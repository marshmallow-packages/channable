<?php

namespace Marshmallow\Channels\Channable\Fields;

use Laravel\Nova\Fields\Currency as NovaCurrency;
use Marshmallow\Channels\Channable\Fields\Traits\Fields;

class Currency extends NovaCurrency
{
	use Fields;
}
