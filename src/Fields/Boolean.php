<?php

namespace Marshmallow\Channels\Channable\Fields;

use Laravel\Nova\Fields\Boolean as NovaBoolean;
use Marshmallow\Channels\Channable\Fields\Traits\Fields;

class Boolean extends NovaBoolean
{
	use Fields;
}
