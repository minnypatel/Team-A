<?php
namespace Controller;

const TEMPLATE_EXTENSION = '.phtml';
const TEMPLATE_FOLDER = 'Views/';

function display($template, $variables = [], $extension = TEMPLATE_EXTENSION) {
	extract($variables);
	ob_start();
	include TEMPLATE_FOLDER . $template . $extension;
	return ob_get_clean();
}
