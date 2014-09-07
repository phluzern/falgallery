<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'PHLU.' . $_EXTKEY,
	'Gallery',
	array(
		'Gallery' => 'list, show',
		
	),
	// non-cacheable actions
	array(
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'PHLU.' . $_EXTKEY,
	'Selector',
	array(
		'Gallery' => 'list',

	),
	// non-cacheable actions
	array(

	)
);
