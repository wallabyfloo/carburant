<?php

/**
 * Fonction de définition de la version du plugin
 * @return type
 */
function plugin_version_carburant(){
    return array('name'           => "carburant",
                 'version'        => '1.0.0',
                 'author'         => 'Benoit Rodriguez',
                 'license'        => 'GPLv2+',
                 'homepage'       => 'https://equipements.sdis14.fr/front/central.php',
                 'minGlpiVersion' => '0.90.1');// For compatibility
}

/**
 * Fonction de test des prérequis à l'exécution du plugin
 * Obligatoire
 */

function plugin_carburant_check_prerequisites(){
    if (GLPI_VERSION >= 0.90.1)
        return true;
    echo "A besoin de la version 0.90.1 au minimum";
    return false; 
}        

/**
 * Fonction de vérification de la configuration initiale
 * Non modifié par rapport à celle de l'exemple
 * @param type $verbose
 * @return boolean
 */
function plugin_carburant_check_config($verbose=false){
	if (true){ // Your configuration check
		return true;
	}
	if ($verbose){
		echo 'Installed / not configured';
	}
	return false;
}

/**
 * Fonction d'initialisation du plugin
 * @global array $PLUGIN_HOOKS
 */
function plugin_init_carburant(){
	global $PLUGIN_HOOKS;

	$PLUGIN_HOOKS['csrf_compliant']['carburant'] = true;

} 
?>