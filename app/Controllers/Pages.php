<?php
namespace App\Controllers;
use IonAuth\Libraries\IonAuth;
use function MongoDB\BSON\toJSON;
class Pages extends BaseController
{   
    public function view($page = 'main')
    {
        if ( ! is_file(APPPATH.'/Views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
        }
        #echo json_encode($this->withIon());
        $data['ionAuth'] = new IonAuth();
        helper(['form','url']);
        echo view('pages/'.$page, $data);

    }
}