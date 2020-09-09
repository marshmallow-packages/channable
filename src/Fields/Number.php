<?php

namespace Marshmallow\Channels\Channable\Fields;

use Laravel\Nova\Fields\Number as NovaNumber;
use Marshmallow\Channels\Channable\Fields\Traits\Fields;

class Number extends NovaNumber
{
	use Fields;
}
