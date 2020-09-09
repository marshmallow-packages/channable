<?php

namespace Marshmallow\Channels\Channable\Contracts;

interface NovaChannel
{
	public function novaTabName(): string;
	public function getDefaults(): array;
	public function morphRelationshipName(): string;
	public function translationPrefix(): string;
	public function novaTabFields(): array;
}
