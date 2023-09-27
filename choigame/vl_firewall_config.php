<?
//List of Search Engine Agents
$UserAgent = array(
	'Googlebot',
	'msnbot',
	'slurp',
	'fast-webcrawler',
	'Googlebot-Image',
	'teomaagent1',
	'directhit',
	'lycos',
	'ia_archiver',
	'gigabot',
	'whatuseek',
	'Teoma',
	'scooter',
	'Ask Jeeves',
	'slurp@inktomi',
	'gzip(gfe) (via translate.google.com)',
	'Mediapartners-Google',
	'crawler@alexa.com'
);

//Your forum *domain only*
//Define domain with and without www
//Do not add trail at the end
//Example : 'google.com' , 'www.google.com'
$Forum_domain = array(
	'http://',
	'http://www.',

);

//2nd Layer Flood Protection enable ?
//1 to enable , 2 to disable
$config['vl_firewall_2nd_layer'] = 1 ;

//Amount of time in second to show restrict message if a Flooding attack is determined
$config['vl_firewall_wait_time'] = 10 ;

//Amount of penalty to be considered a Flooding attack. 
//Every time multiple requests sent to the forum in less than few a second, penalty count increased by 1.
$config['vl_firewall_penalty_allow'] = 6;

?>