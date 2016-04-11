<?php

/**
 * Fonction d'installation du plugin
 * @return boolean
 */
function plugin_carburant_install() 
    {
    global $DB;
    
    // Création de la table uniquement lors de la première installation
    if (!TableExists("glpi_plugin_carburant_maintable")){

		// requête de création de la table    
		$createTablePrincipale = "CREATE TABLE glpi_plugin_carburant_maintable LIKE glpi_priseCarburant"; // Créé une table identique à la vieille à l'installation. 

		$DB->query($createTablePrincipale) or die($DB->error());

		$remplirTablePrincipale = "INSERT INTO glpi_plugin_carburant_maintable SELECT * FROM glpi_priseCarburant"; // Insère les données de la vieille table dans la nouvelle.

		$DB->query($remplirTablePrincipale) or die($DB->error());
	}
        
    // Création de la table uniquement lors de la première installation
    if (!TableExists("glpi_plugin_carburant_historique")){
		$createTableHistorique = "CREATE TABLE glpi_plugin_carburant_historique LIKE glpi_priseCarburant_historique"; // Créé une table identique à la vieille à l'installation. 
		
		$DB->query($createTableHistorique) or die($DB->error());
		
		$remplirTableHistorique = "INSERT INTO glpi_plugin_carburant_historique SELECT * FROM glpi_priseCarburant_historique"; // Insère les données de la vieille table dans la nouvelle.
		
		$DB->query($remplirTableHistorique) or die($DB->error());	
    }
        
    if(TableExists("glpi_priseCarburant")){ // Supprime les anciennes tables.
		$dropOldMain = "DROP TABLE glpi_priseCarburant";
		
		$DB->query($dropOldMain) or die($DB->error());
	}
	
	if(TableExists("glpi_priseCarburant_historique")){ // Supprime les anciennes tables.
		$dropOldHistorique = "DROP TABLE glpi_priseCarburant_historique";
		
		$DB->query($dropOldHistorique) or die($DB->error());
	}   
        
    return true;    
}
    
/**
 * Fonction de désinstallation du plugin
 * @return boolean
 */
function plugin_carburant_uninstall(){
		return true;
    }    
?>