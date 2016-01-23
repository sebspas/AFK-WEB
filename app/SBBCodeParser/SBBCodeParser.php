<?php
/**
 * SSBBCodeParser
 * 
 * BBCode parser classes.
 *
 * @copyright (C) 2011 Sam Clarke (samclarke.com)
 * @license http://www.gnu.org/licenses/lgpl.html LGPL version 3 or higher
 *
 * @TODO: Add inline/block to tags and forbid adding block elements to inline ones.
 * Maybe split the inline elemnt and put the block element inbetween?
 * @TODO: Have options for limiting nesting of tags
 * @TODO: Have whitespace trimming options for tags
 */

/*
 * This library is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 * 
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library.  If not, see <http://www.gnu.org/licenses/>.
 */
 
require('classes/Exception.php');
require('classes/Exception/MissingEndTag.php');
require('classes/Exception/InvalidNesting.php');

require('classes/Node.php');
require('classes/Node/Text.php');
require('classes/Node/Container.php');
require('classes/Node/Container/Tag.php');
require('classes/Node/Container/Document.php');

require('classes/BBCode.php');

$GLOBALS['parser'] = new \SBBCodeParser\Node_Container_Document();

$GLOBALS['parser']->add_emoticons(array(
	':)' => 'asset/images/emoticons/smile.png',
	'=)' => 'asset/images/emoticons/smile.png',
	':angry:' => 'asset/images/emoticons/angry.png',
	':angel:' => 'asset/images/emoticons/angel.png',
	':(' => 'asset/images/emoticons/sad.png',
	'<3' => 'asset/images/emoticons/heart.png',
	';)' => 'asset/images/emoticons/wink.png',
	':P' => 'asset/images/emoticons/tongue.png'	
));

function get_text($str) {
	$str = preg_replace('`\[youtube\](.+)\[\/youtube\]`isU', '', $str);
	$str = preg_replace('`\[(.+)\](.+)\[/(.+)\]`isU', '$2', $str);
	$str = preg_replace('`\[(.+)\](.+)`isU', '$2', $str);
	$str = preg_replace('`(.+)\[/(.+)\]`isU', '$1', $str);
	$str = preg_replace('`\[color=(.+)\](.+)`isU', '$2', $str);
	return substr($str, 0,150);
}