<?php

namespace Marshmallow\Channels\Channable\Fields\Traits;

trait Options
{
	public static function label($key)
	{
		if (!isset((new self)->toArray()[$key])) {
			return 'N/A';
		}
		return (new self)->toArray()[$key];
	}

	public static function options()
	{
		return (new self)->toArray();
	}
}
