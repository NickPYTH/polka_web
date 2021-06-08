<?php
namespace App\Controllers;
use App\Models\ClientModel;
use Aws\S3\S3Client;
use CodeIgniter\Model;
use IonAuth\Libraries\IonAuth;
use function MongoDB\BSON\toJSON;
use App\Models\ToolsModel;

class Clients extends BaseController
{
    public function all()
    {
        //если пользователь не аутентифицирован - перенаправление на страницу входа
        if (!$this->ionAuth->loggedIn())
        {
            return redirect()->to('/auth/login');
        }
        if (!is_null($this->request->getPost('per_page'))) //если кол-во на странице есть в запросе
        {
            //сохранение кол-ва страниц в переменной сессии
            session()->setFlashdata('per_page', $this->request->getPost('per_page'));
            $per_page = $this->request->getPost('per_page');
        }
        else {
            $per_page = session()->getFlashdata('per_page');
            session()->setFlashdata('per_page', $per_page); //пересохранение в сессии
            if (is_null($per_page)) $per_page = '5'; //кол-во на странице по умолчанию
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
        $model = new ClientModel();
        $data ['rating'] = $model->getForSearch($search)->paginate($per_page, 'group1');
        $data ['pager'] = $model->pager;


        $data['ionAuth'] = new IonAuth();

        echo view('clients/all', $data);

    }

    public function delete($id)
    {
        if (!$this->ionAuth->loggedIn())
        {
            return redirect()->to('/auth/login');
        }
        $model = new ClientModel();
        $model->delete($id);
        return redirect()->to('/Clients/all');
    }

    public function edit($name)
    {
        if (!$this->ionAuth->loggedIn())
        {
            return redirect()->to('/auth/login');
        }
        $model = new ClientModel();

        helper(['form']);
        $data ['rating'] = $model->getRatingByName($name);
        $data ['validation'] = \Config\Services::validation();
        echo view('clients/edit', $this->withIon($data));

    }

    public function update()
    {
        helper(['form','url']);

        if ($this->request->getMethod() === 'post' && $this->validate([
                'FIO' => 'required',
            ]))
        {

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
                    'Bucket' => 'toolsrent', //чтение настроек окружения из файла .env
                    //генерация случайного имени файла
                    'Key' => getenv('S3_KEY') . '/file' . rand(100000, 999999) . '.' . $ext,
                    'Body' => fopen($file->getRealPath(), 'r+')
                ]);

            }



            $model = new ClientModel();

            $model->save([
                'id' => $this->request->getPost('id'),
                'FIO' => $this->request->getPost('FIO'),
                'pictureUrl' => $insert['ObjectURL'],
            ]);

            return redirect()->to('/Clients/all');
        }
        else
        {

            return redirect()->to('/Clients/edit/'.$this->request->getPost('fio'))->withInput();
        }
    }
}