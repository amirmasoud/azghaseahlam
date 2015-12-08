<?php

namespace App\Helpers\Contracts;

Interface ImageContract
{
	/**
	 * Get all paginated images
	 * @return JSON
	 */
	public function get();

	/**
	 * Get an image
	 * @param integer  $id image id
	 * @return JSON
	 */
	public function singular($id);
}