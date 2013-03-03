<?php
/**
 *
 * @author Jeroen Bollen jbollensb@gmail.com
 * @package BIS
 * @version 3.1.0
 * @copyright (c) 2012 Jeroen Bollen
 * @license http://opensource.org/licenses/gpl-3.0.html GNU Public License
 *
 */


/**
* @ignore
*/
define('IN_DIRECTORY', true);
$directory_root_path = './';

include_once($directory_root_path . 'common.php');
$template->outputPage('index.html');
?>