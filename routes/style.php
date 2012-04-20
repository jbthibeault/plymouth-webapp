<?php

respond( function( $request, $response, $app ) {
	// Base directory of application
	$GLOBALS['BASE_DIR'] = dirname(__FILE__);

	// Base URL
	$GLOBALS['BASE_URL'] = 'http://'.$_SERVER['HTTP_HOST'].'/app/style';

	// Base URL
	$GLOBALS['WEBAPP_URL'] = 'http://'.$_SERVER['HTTP_HOST'].'/webapp';

	// Templates
	$GLOBALS['TEMPLATES'] = PSU_BASE_DIR . '/app/core/templates';
});

respond( '/', function( $request, $response, $app ) {
	define( 'PSU_CDN', ! PSU::isdev() );

	$tpl = new \PSU\Template('Example Styling');

	if(isset($_GET['message'])) $_SESSION['messages'][] = 'This is an example message';
	if(isset($_GET['error'])) $_SESSION['errors'][] = 'This is an example error message';
	if(isset($_GET['warning'])) $_SESSION['warnings'][] = 'This is an example warning message';
	if(isset($_GET['success'])) $_SESSION['successes'][] = 'This is an example success message';
	if(isset($_GET['multimessage'])) {
		$_SESSION['messages'][] = 'This is the first message.';
		$_SESSION['messages'][] = 'This is the second message.';
	}

	$tpl->display('index.tpl');
});