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
		'state' => array(
			'title' => 'State'
		),
		'created_time' => array(
			'title' 		=> 'Created time',
		),
	),

	/**
	 * The editable fields
	 */
	'edit_fields' => array(
		'id',
		'caption_text' => array(
		    'title' => 'Caption Text',
		    'type' 	=> 'wysiwyg',
		),
		'state' => array(
		    'type' => 'enum',
		    'title' => 'State',
		    'options' => array(
		        'new' 	=> 'New',
		        'hide' 	=> 'Hide',
		        'show' 	=> 'Show',
		    ),
		),
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
		'created_time' => array(
			'title' => 'Created time',
			'type'  => 'datetime',
		),
	),

	/**
	 * The filterable fields
	 *
	 * @type array
	 */
	'filters' => array(
	    'caption_text' => array(
	        'title' => 'Caption Text',
	    ),
	    'state' => array(
	        'title' => 'State',
	        'type' 	=> 'enum',
		    'options' => array(
		        'new' 	=> 'New',
		        'hide' 	=> 'Hide',
		        'show' 	=> 'Show',
		    ),
	    ),
	    'created_time' => array(
	        'title' 	 => 'Created Time',
	        'type' 		 => 'datetime',
	    ),
	),

	'form_width' => 600
);
