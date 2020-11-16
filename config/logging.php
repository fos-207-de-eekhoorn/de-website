<?php

return [

	'default' => env('LOG_CHANNEL', 'stack'),

	'channels' => [
		'stack' => [
			'driver' => 'stack',
			'channels' => ['single', 'bugsnag'],
		],

		'bugsnag' => [
			'driver' => 'bugsnag',
		],
	],

];
