<?php

namespace Marshmallow\Channels\Channable\Fields;

use Laravel\Nova\Fields\Textarea as NovaTextarea;
use Marshmallow\Channels\Channable\Fields\Traits\Fields;

class Textarea extends NovaTextarea
{
	use Fields;
}
