<?php 

namespace controllers;


use services\FacturesService;
use yasmf\HttpHelper;
use yasmf\View;

class FacturesController
{

    private $facturesService;

    /**
     * Create and initialize an ClientsController object
     */
    public function __construct(FacturesService $facturesService)
    {
        $this->facturesService = $facturesService;
    }

    /**
     * Return de default view
     * @return View the default view
     */
    public function index() {
        $apiUrl = HttpHelper::getParam('apiUrl');
        $apiKey = HttpHelper::getParam('apiKey');
        $nomClient = HttpHelper::getParam('nomClient');
        $idClient = HttpHelper::getParam('idClient');
        $resultat = $this->facturesService->getFacturesClient($apiUrl, $apiKey);
        $view = new View("views/facturesclient");
        $view->setVar('apiUrl', $apiUrl);
        $view->setVar('apiKey', $apiKey);
        $view->setVar('nomClient', $nomClient);
        $view->setVar('resultat', $resultat);
        $view->setVar('idClient', $idClient);
        return $view;
    }

}