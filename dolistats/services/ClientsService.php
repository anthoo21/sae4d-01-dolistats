<?php
namespace services;



class ClientsService {

    public static function getCurl($recherche, $apiUrl, $apiKey) {
        $apiUrl = $apiUrl."thirdparties?sortfield=t.nom&sortorder=ASC&limit=100&sqlfilters=(t.nom%3Alike%3A'%25".$recherche."%25')";
        $curl = curl_init();
        
        curl_setopt($curl, CURLOPT_URL, $apiUrl);				// Url de l'API à appeler
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);			// Retour dans une chaine au lieu de l'afficher
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); 		// Désactive test certificat
        curl_setopt($curl, CURLOPT_FAILONERROR, true);
        
        // Parametre pour le type de requete
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET"); 		// Type de requete GET
        
        // Si des données doivent être envoyées
        if (!empty($produitParam)) {
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($produitParam));
            curl_setopt($curl, CURLOPT_POST, true);
        }
        
        $httpheader []= "Content-Type:application/json";
        
        if (!empty($apiKey)) {
            // Ajout de la clé API dans l'entete si elle existe (pour tous les appels sauf login)
            $httpheader = ['DOLAPIKEY: '.$apiKey];
        }
        curl_setopt($curl, CURLOPT_HTTPHEADER, $httpheader);
        
        $result = curl_exec($curl);								// Exécution

        return $curl;
    }

    public function getClients($recherche, $apiUrl, $apiKey) {

        $curl = $this->getCurl($recherche, $apiUrl, $apiKey);

        $result = curl_exec($curl);								// Exécution
        
        curl_close($curl);	
        $resultat=json_decode($result,true);

        return $resultat;
    }

    public function getHttpStatus($recherche, $apiUrl, $apiKey) {

        $curl = $this->getCurl($recherche, $apiUrl, $apiKey);

        $http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);	// Récupération statut 
        
        curl_close($curl);	

        return $http_status;
    }
    
    private static $defaultService;
    /**
     * @return mixed
     *  the default instance of ClientsService used by controllers
     */
    public static function getDefaultService()
    {
        if (ClientsService::$defaultService == null) {
            ClientsService::$defaultService = new ClientsService();
        }
        return ClientsService::$defaultService;
    }

}