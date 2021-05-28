<?php
namespace App\Controllers;
use App\Services\IonAuthGoogle;

use CodeIgniter\Controller;
use IonAuth\Libraries\IonAuth;

class BaseController extends Controller
{

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     * //$data['authUrl'] = $this->google_client->getGoogleClient()->createAuthUrl();    
     *
     * @var array
     */
    protected $helpers = [];
    public $ionAuth;
    protected $google_client;
    /**
     * Constructor.
     */
    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        //--------------------------------------------------------------------
        // Preload any models, libraries, etc, here.
        //--------------------------------------------------------------------
        // E.g.:
        // $this->session = \Config\Services::session();
        $this->ionAuth = new IonAuth();
    }
    protected function withIon(array $data = [])
    {
        $data['ionAuth'] = $this->ionAuth;
        return $data;
    }
}
