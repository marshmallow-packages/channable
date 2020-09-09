<?php

namespace Marshmallow\Channels\Channable\Fields\Traits;

use Marshmallow\Channels\Channable\Contracts\NovaChannel;

trait Fields
{
	protected $channel;

	public static function make(...$arguments)
    {
    	$name = $arguments[0];
    	$channel = $arguments[1];
    	$translation_prefix = $channel->translationPrefix();

    	$arguments[0] = __($translation_prefix . '::nova.' . $name);
    	$arguments[1] = $channel->columnName($name);

    	$made = parent::make(...$arguments);
    	return $made->setChannableDefaults($channel, $name);
    }

	public function setChannableDefaults(NovaChannel $channel, string $name)
	{
		$this->channel = $channel;
		$translation_prefix = $channel->translationPrefix();

		$this->help(__($translation_prefix . '::nova.'. $name .'_help'));
    	$this->hideFromIndex();
    	$this->hideWhenCreating();
    	$this->resolveUsing(function ($value, $resource, $attribute) {
			return app('channable')->channel($this->channel)->set($resource)->get($value, $resource, $attribute);
		});
		$this->fillUsing(function ($request, $model, $requestAttribute, $attribute) use ($name) {
			app('channable')->channel($this->channel)->set($model)->store($request, $attribute, $name);
		});
		$this->overrule();

		return $this;
	}

	public function overrule()
	{
		//
	}
}
