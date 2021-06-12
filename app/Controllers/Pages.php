<?php
namespace App\Controllers;
use App\Models\ClientModel;
use CodeIgniter\Model;
use IonAuth\Libraries\IonAuth;
use function MongoDB\BSON\toJSON;
use App\Models\BooksModel;
use Aws\S3\S3Client;

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

        if (!is_null($this->request->getPost('per_page'))) 
        {
            session()->setFlashdata('per_page', $this->request->getPost('per_page'));
            $per_page = $this->request->getPost('per_page');
        }
        else {
            $per_page = session()->getFlashdata('per_page');
            session()->setFlashdata('per_page', $per_page); 
            if (is_null($per_page)) $per_page = '10';
        }
        $data['per_page'] = $per_page;

        if (!is_null($this->request->getPost('search')))
        {
            session()->setFlashdata('search', $this->request->getPost('search'));
            $search = $this->request->getPost('search');
        }
        else {
            $search = session()->getFlashdata('search');
            session()->setFlashdata('search', $search);
            if (is_null($search)) $search = '';
        }
        $data['search'] = $search;
        
        helper(['form','url']);
        $books_model = new BooksModel();
        $data ['tools'] = $books_model->get_all_books($search)->paginate($per_page, 'group1');
        $data ['pager'] = $books_model->pager;

        helper(['form','url']);
        echo view('pages/'.$page, $data);

    }

    public function add(){
        if (!$this->ionAuth->loggedIn())
        {
            return redirect()->to('/auth/login');
        }
        if ($this->request->getMethod() === 'get'){
            helper(['form']);
            $data ['validation'] = \Config\Services::validation();
            echo view('pages/add', $this->withIon($data));
        }
        else{
            $name = $this->request->getPost('name');
            $description = $this->request->getPost('description');
            $price = $this->request->getPost('price');
            $file = $this->request->getFile('picture');
                if ($file->getSize() != 0) {
                    $s3 = new S3Client([
                        'version' => 'latest',
                        'region'  => 'us-east-1',
                        'endpoint' => 'http://polka.tplinkdns.com:9000/',
                        'use_path_style_endpoint' => true,
                        'credentials' => [
                                'key'    => 'minioadmin',
                                'secret' => 'minioadmin',
                            ],
                    ]);

                    $ext = explode('.', $file->getName());
                    $ext = $ext[count($ext) - 1];
                    //загрузка файла в хранилище
                    $insert = $s3->putObject([
                        'Bucket' => 'libra', //чтение настроек окружения из файла .env
                        //генерация случайного имени файла
                        'Key' => getenv('S3_KEY') . '/file' . rand(100000, 999999) . '.' . $ext,
                        'Body' => fopen($file->getRealPath(), 'r+')
                    ]);

                    $model = new BooksModel();
                
                    $model->save([
                        'Name' => $name,
                        'Description' => $description,
                        'Price' => $price,
                        'pictureUrl' => $insert['ObjectURL'],
                    ]);

                    return redirect()->to('/');
        }
        
    }
    }

    public function delete($id)
    {
        if (!$this->ionAuth->loggedIn())
        {
            return redirect()->to('/auth/login');
        }
        $model = new BooksModel();
        $model->delete($id);
        return redirect()->to('/');
    }
}