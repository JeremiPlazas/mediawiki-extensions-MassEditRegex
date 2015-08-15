<?php
if ( ! defined( 'MEDIAWIKI' ) )
	die();
/**
 * Allow users in the Bot group to edit many articles in one go by applying
 * regular expressions to a list of pages.
 *
 * @file
 * @ingroup Extensions
 *
 * @link https://www.mediawiki.org/wiki/Extension:MassEditRegex Documentation
 *
 * @author Adam Nielsen <malvineous@shikadi.net>
 * @author Kim Eik <kim@heldig.org>
 * @copyright Copyright © 2009-2015 Adam Nielsen
 * @license https://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */

$wgExtensionCredits['specialpage'][] = array(
	'path' => __FILE__,
	'name' => 'MassEditRegex',
	'namemsg' => 'masseditregex-name',
	'version' => '8.0.2',
	'author' => array(
		'Adam Nielsen',
		'...'
		),
	'url' => 'https://www.mediawiki.org/wiki/Extension:MassEditRegex',
	'descriptionmsg' => 'masseditregex-desc',
	'license-name' => 'GPL-2.0+'
);

$wgMessagesDirs['MassEditRegex'] = __DIR__ . '/i18n';
$wgExtensionMessagesFiles['MassEditRegex'] = __DIR__ . '/MassEditRegex.i18n.php';
$wgExtensionMessagesFiles['MassEditRegexAlias'] = __DIR__ . '/MassEditRegex.alias.php';
$wgAutoloadClasses['MassEditRegex'] = __DIR__ . '/MassEditRegex.class.php';
$wgAutoloadClasses['MassEditRegexSpecialPage'] = __DIR__ . '/MassEditRegex.special.php';
$wgAutoloadClasses['MassEditRegexAPI'] = __DIR__ . '/MassEditRegex.api.php';
$wgSpecialPages['MassEditRegex'] = 'MassEditRegexSpecialPage';

// Required permission to use Special:MassEditRegex
$wgAvailableRights[] = 'masseditregex';

$wgHooks['SkinTemplateNavigation::Universal'][] = 'MassEditRegexSpecialPage::efSkinTemplateNavigationUniversal';
$wgHooks['BaseTemplateToolbox'][] = 'MassEditRegexSpecialPage::efBaseTemplateToolbox';

$wgResourceModules['MassEditRegex'] = array(
	'scripts' => array(
		'MassEditRegex.js'
	),
	'dependencies' => array(
		'mediawiki.jqueryMsg',
		'jquery.ui.dialog'
	),
	'group' => 'MassEditRegex',
	'localBasePath' => __DIR__,
	'remoteExtPath' => 'MassEditRegex',
	'messages' => array (
		'masseditregex-js-execution',
		'masseditregex-js-jobdone',
		'masseditregex-num-changes',
		'masseditregex-js-working',
		'masseditregex-js-pagenotexist',
		'masseditregex-js-mwapi-api-error',
		'masseditregex-js-mwapi-general-error',
		'masseditregex-js-mwapi-unknown-error',
	)
);

// AJAX
$wgAjaxExportList[] = 'MassEditRegexAPI::edit';
