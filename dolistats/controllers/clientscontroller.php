<?php 

namespace controllers;


use services\ClientsService;
use yasmf\HttpHelper;
use yasmf\View;

class ClientsController
{

    private $clientsService;

    /**
     * Create and initialize an ClientsController object
     */
    public function __construct(ClientsService $clientsService)
    {
        $this->clientsService = $clientsService;
    }

    /**
     * Return de default view
     * @return View the default view
     */
    public function index() {
        $apiUrl = HttpHelper::getParam('apiUrl');
        $apiKey = HttpHelper::getParam('apiKey');
        $username = HttpHelper::getParam('username');
        $view = new View("views/rechercheclients");
        $view->setVar('username', $username);
        $view->setVar('apiUrl', $apiUrl);
        $view->setVar('apiKey', $apiKey);
        return $view;
    }

    public function recherche() {
        $recherche = htmlspecialchars(HttpHelper::getParam('recherche'));
        $apiUrl = HttpHelper::getParam('apiUrl');
        $apiKey = HttpHelper::getParam('apiKey');
        $username = HttpHelper::getParam('username');
        $resultat = $this->clientsService->getClients($recherche, $apiUrl, $apiKey);
        $httpStatus = $this->clientsService->getHttpStatus($recherche, $apiUrl, $apiKey);
        $view = new View("views/rechercheclients");
        $view->setVar('apiUrl', $apiUrl);
        $view->setVar('apiKey', $apiKey);
        $view->setVar('username', $username);
        $view->setVar('resultat', $resultat);
        $view->setVar('recherche', $recherche);
        $view->setVar('httpStatus', $httpStatus);
        return $view;
    }
}
