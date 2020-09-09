<?php

namespace Marshmallow\Channels\Channable\Traits;

trait ResourceChannable
{
	public function columnPrefix()
	{
		return str_slug($this->novaTabName()) . '_';
	}

	public function cleanColumnName($column_name)
	{
		return str_replace($this->columnPrefix(), '', $column_name);
	}

	public function columnName($column_name)
	{
		return $this->columnPrefix() . $column_name;
	}
}
