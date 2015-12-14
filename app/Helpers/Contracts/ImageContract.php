<?php

namespace App\Helpers\Contracts;

Interface ImageContract
{
	/**
	 * Get all paginated images
	 *
	 * @param  string  $state image state, show|hide|new, default show
	 * @return JSON
	 */
	public function all($state = 'show');

	/**
	 * Get a single image image.
	 * 
	 * @param  integer  $id image id
	 * @param  string  $state image state, show|hide|new, default show
	 * @return JSON
	 */
	public function singular($id, $state = 'show');
}