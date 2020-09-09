<?php

namespace Marshmallow\Channels\Channable\Traits;

trait ProductResourceChannel
{
	protected function addChannelTabs(): array
	{
		if (!config('product.channels')) {
			return [];
		}

		if (empty(config('product.channels'))) {
			return [];
		}

		$channel_tabs = [];
		foreach (config('product.channels') as $channel) {
			$channel_tabs[$channel::novaTabName()] = $channel::novaTabFields();
		}

		return $channel_tabs;
	}
}
