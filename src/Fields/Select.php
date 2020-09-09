<?php

namespace Marshmallow\Channels\Channable\Fields;

use Laravel\Nova\Fields\Select as NovaSelect;
use Marshmallow\Channels\Channable\Fields\Traits\Fields;

class Select extends NovaSelect
{
	use Fields;

	public function options($options)
	{
		if (class_exists($options)) {
			$this->displayUsing(function ($value, $resource, $attribute) use ($options) {
				return $options::label(
					app('channable')->channel($this->channel)->set($resource)->get($value, $resource, $attribute)
				);
			});
			return parent::options($options::options());
		}

		return parent::options($options);
	}
}
