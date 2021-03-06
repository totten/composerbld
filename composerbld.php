<?php

require_once 'composerbld.civix.php';
use CRM_Composerbld_ExtensionUtil as E;

/**
 * Implements hook_civicrm_config().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_config/ 
 */
function composerbld_civicrm_config(&$config) {
  $al = Civi::settings()->get('composerAutoload'); // TODO: Define this setting in core?
  if (!$al || $al === 'independent') {
    include_once __DIR__ . '/vendor/autoload.php';
  }
  _composerbld_civix_civicrm_config($config);
}

/**
 * This just a function that uses some of the assets loaded via composer.
 * It doesn't do anything useful. Just observe that (1) the autolaoder
 * works and (2) the assets can be located.
 *
 * To run it in the CLI:
 *
 * $ cv en composerbld
 * $ cv ev 'composerbld_do_stuff();'
 */
function composerbld_do_stuff() {
  $c = new \Pimple\Container();
  $c['time'] = function($c) {
    return date('Y-m-d H:i:s', time());
  };
  $c['some-url'] = function($c) {
    return E::url('extern/mustache/mustache.min.js');
  };
  $c['some-path'] = function($c) {
    return E::path('extern/mustache/mustache.min.js');
  };
  print_r([
    'time' => $c['time'],
    'some-url' => $c['some-url'],
    'some-path' => $c['some-path'],
  ]);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_xmlMenu
 */
function composerbld_civicrm_xmlMenu(&$files) {
  _composerbld_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_install
 */
function composerbld_civicrm_install() {
  _composerbld_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_postInstall
 */
function composerbld_civicrm_postInstall() {
  _composerbld_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_uninstall
 */
function composerbld_civicrm_uninstall() {
  _composerbld_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_enable
 */
function composerbld_civicrm_enable() {
  _composerbld_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_disable
 */
function composerbld_civicrm_disable() {
  _composerbld_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_upgrade
 */
function composerbld_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _composerbld_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_managed
 */
function composerbld_civicrm_managed(&$entities) {
  _composerbld_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_caseTypes
 */
function composerbld_civicrm_caseTypes(&$caseTypes) {
  _composerbld_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_angularModules
 */
function composerbld_civicrm_angularModules(&$angularModules) {
  _composerbld_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_alterSettingsFolders
 */
function composerbld_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _composerbld_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Implements hook_civicrm_entityTypes().
 *
 * Declare entity types provided by this module.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_entityTypes
 */
function composerbld_civicrm_entityTypes(&$entityTypes) {
  _composerbld_civix_civicrm_entityTypes($entityTypes);
}

/**
 * Implements hook_civicrm_thems().
 */
function composerbld_civicrm_themes(&$themes) {
  _composerbld_civix_civicrm_themes($themes);
}

// --- Functions below this ship commented out. Uncomment as required. ---

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_preProcess
 *
function composerbld_civicrm_preProcess($formName, &$form) {

} // */

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_navigationMenu
 *
function composerbld_civicrm_navigationMenu(&$menu) {
  _composerbld_civix_insert_navigation_menu($menu, 'Mailings', array(
    'label' => E::ts('New subliminal message'),
    'name' => 'mailing_subliminal_message',
    'url' => 'civicrm/mailing/subliminal',
    'permission' => 'access CiviMail',
    'operator' => 'OR',
    'separator' => 0,
  ));
  _composerbld_civix_navigationMenu($menu);
} // */
