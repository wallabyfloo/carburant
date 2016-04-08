<?php

// Affiche les infos de base dans configuation/plugin
function plugin_version_carburant(){
	return array(
	'name'          => "carburant",
	'version'       => '0.0.1',
	'author'        => 'Benoit Rodriguez',
	// 'license'       => 'GPLv2+',
	'homepage'      => 'https://equipements.sdis14.fr/front/central.php',
	'minGlpiVersion'=> '0.90',
	'maxGlpiVersion'=> '0.90'
	);
}

// Teste si la version est bien 0.90
function plugin_carburant_check_prerequisites(){
	if (version_compare(GLPI_VERSION, '0.90', 'lt') || version_compare(GLPI_VERSION, '0.91', 'ge')) {
		echo('This plugin requires GLPI >= 0.90');
		return false;
	}
	return true;
	
}

// Fonction obligatoire.
// function plugin_carburant_check_config(){
	// return true;
// }

// Fonction d'initialisation du plugin.
function plugin_init_carburant (){
	global $PLUGIN_HOOKS;
	$PLUGIN_HOOKS['csrf_compliant']['carburant'] = true; // Active les normes CSRF pour ce plugin.
	// Instanciation des classes.
	Plugin::registerClass('PluginCarburantCarburant');
}

?>