<?php

namespace Marshmallow\Channels\Channable;

use Illuminate\Database\Eloquent\Model;
use Laravel\Nova\Http\Requests\NovaRequest;
use Marshmallow\Channels\Channable\Contracts\NovaChannel;

class Channable
{
	protected $model;
	protected $channel;

	public function set(Model $model)
	{
		$this->model = $model;
		return $this;
	}

	public function channel(NovaChannel $channel)
	{
		$this->channel = $channel;
		return $this;
	}

	public function get($value, $resource, $attribute)
	{
		$attribute = $this->channel->cleanColumnName($attribute);
		$morph_relationship_name = $this->channel->morphRelationshipName();
		if ($resource->{$morph_relationship_name}) {
			return $resource->{$morph_relationship_name}->{$attribute};
		}

		$defaults = $this->channel->getDefaults();
		if (isset($defaults[$attribute])) {
			$default_helper = $defaults[$attribute];
			if (method_exists($resource, $default_helper)) {
				return $resource->{$default_helper}();
			} elseif (isset($resource->{$default_helper})) {
				return $resource->{$default_helper};
			}
			return $default_helper;
		}

		return;
	}

	public function store(NovaRequest $request, $request_param, $database_column)
	{
		$morph_relationship_name = $this->channel->morphRelationshipName();
		$data = [
			$database_column => $request->{$request_param},
		];

		$model = $this->model->fresh();

		if (!$model->{$morph_relationship_name}) {
			$model->$morph_relationship_name()->create($data);
		} else {
			$model->$morph_relationship_name()->update($data);
		}
	}

	public function observe($action, $model)
	{
		//
	}
}
