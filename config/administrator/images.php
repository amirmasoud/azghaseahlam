<?php

/**
 * Actors model config
 */
return array(
	'title'  => 'Images',
	'single' => 'Image',
	'model'  => App\Image::class,

	/**
	 * The display columns
	 */
	'columns' => array(
		'thumbnail' => array(
			'title' 	=> 'Thumbnail',
			'output' 	=> function($thumbnail) {
				if ($thumbnail != '')
					return '<img src="' . $thumbnail . '" alt="no thumbnail" />';
				},
			'sortable' => false,
		),
		'caption_text' => array(
			'title' 		=> 'Caption Text',
		),
		'standard_resolution' => array(
			'title' => 'Standard Resolution',
		),
		'link' => array(
			'title' => 'Link',
		),
		'low_resolution' => array(
			'title' => 'Low Resolution',
		),
		'created_at' => array(
			'title' 		=> 'Created at',
		),
		'updated_at' => array(
			'title' 		=> 'Updated at',
		),
	),

	/**
	 * The editable fields
	 */
	'edit_fields' => array(
		'id',
		'link' => array(
			'title' => 'Title',
			'type' 	=> 'text',
			'limit' => 255,
		),
		'low_resolution' => array(
			'title' => 'Low Resolution',
			'type' 	=> 'text',
			'limit' => 255,
		),
		'standard_resolution' => array(
			'title' => 'Standard Resolution',
			'type' 	=> 'text',
			'limit' => 255,
		),
		'thumbnail' => array(
			'title' => 'Thumbnail',
			'type' 	=> 'text',
			'limit' => 255,
		),
		'caption_text' => array(
		    'title' => 'Caption Text',
		    'type' 	=> 'wysiwyg',
		)
	),

	/**
	 * The filterable fields
	 *
	 * @type array
	 */
/*	'filters' => array(
	    'title' => array(
	        'title' => 'Name',
	    ),
	    'subtitle' => array(
	        'title' => 'Subtitle',
	        'type' 	=> 'text',
	    ),
	    'user' => array(
	        'title' 	 => 'Author',
	        'type' 		 => 'relationship',
	        'name_field' => 'name',
	    ),
	    'body' => array(
	        'title' => 'Body',
	        'type' 	=> 'text',
	    ),
	    'created_at' => array(
	    	'title' => 'Created at',
	    	'type'	=> 'date',
	    ),
	    'updated_at' => array(
	    	'title' => 'Updated at',
	    	'type'	=> 'date',
	    )
	),*/

	'form_width' => 600
);
