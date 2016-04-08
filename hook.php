<?php

// Fonction d'installation du plugin.
function plugin_carburant_install(){
	
	global $DB; // Variable interne à GLPI, permet de simplifier l'accès à la base de données (instance de PDO).
	
	if(!TableExists("glpi_plugin_carburant_maintable")){ // Créé la table principale, si elle n'existe pas.
		// Requête de la création de la table.
		$createTablePrincipale = "CREATE TABLE glpi_plugin_carburant_maintable LIKE glpi_priseCarburant" // Créé une table identique à la vieille à l'installation. 
		$DB->query($createTablePrincipale) or die($DB->error());
		$remplirTablePrincipale = "INSERT INTO glpi_plugin_carburant_maintable SELECT * FROM glpi_priseCarburant" // Insère les données de la vieille table dans la nouvelle.
		$DB->query($remplirTablePrincipale) or die($DB->error());
	}
	
	if(!TableExists("glpi_plugin_carburant_historique")){ // Créé la table historique, si elle n'existe pas.
		// Requête de la création de la table.
		$createTableHistorique = "CREATE TABLE glpi_plugin_carburant_historique LIKE glpi_priseCarburant_historique" // Créé une table identique à la vieille à l'installation. 
		$DB->query($createTableHistorique) or die($DB->error());
		$remplirTableHistorique = "INSERT INTO glpi_plugin_carburant_historique SELECT * FROM glpi_priseCarburant_historique" // Insère les données de la vieille table dans la nouvelle.
		$DB->query($remplirTableHistorique) or die($DB->error());	
	}
	
	if(TableExists("glpi_priseCarburant")){ // Supprime les anciennes tables.
		$dropOldMain = "DROP TABLE glpi_priseCarburant"
		$DB->query($dropOldMain) or die($DB->error());
	}
	
	if(TableExists("glpi_priseCarburant_historique")){ // Supprime les anciennes tables.
		$dropOldHistorique = "DROP TABLE glpi_priseCarburant_historique"
		$DB->query($dropOldHistorique) or die($DB->error());
	}
	return true;
	
}

// On ne supprime en aucun cas les tables afin de conserver l'historique de toute les entrées.

function plugin_carburant_uninstall(){ // Cette fonction doit toutefois être présente.
	return true;
}

?>