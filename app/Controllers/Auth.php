<?php namespace App\Controllers;
use App\Services\IonAuthGoogle;
#use IonAuth\Config\IonAuth;
use App\Services\GoogleClient;
use Google_Service_Oauth2;
use IonAuth\Libraries\IonAuth;
use function MongoDB\BSON\toJSON;
use App\Models\ReaderModel;
use Aws\S3\S3Client;

class Auth extends \IonAuth\Controllers\Auth
{
    /**
     * If you want to customize the views,
     *  - copy the ion-auth/Views/auth folder to your Views folder,
     *  - remove comment
     */
    protected $viewsFolder = 'auth';
    protected $google_client;

    public function __construct()
    {
        parent::__construct();
        $this->ionAuth = new IonAuthGoogle();
        $this->google_client = new GoogleClient();

    }

    function randomPassword() {
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        /*for ($i = 0; $i < 8; $i++) {
            array_push($pass,$alphabet[rand(0, strlen($alphabet)-1)]);
        }*/
        return $alphabet;
    }

    public function google_login()
{
    $code = $this->request->getVar('code');
    if(!empty($code)) {
        //Получение токена доступа от клиента Google API
        $token = $this->google_client->getGoogleClient()->fetchAccessTokenWithAuthCode($code);

        if (!isset($token["error"])) {
            $this->google_client->getGoogleClient()->setAccessToken($token['access_token']);
            $google_service = new \Google_Service_Oauth2($this->google_client->getGoogleClient());
            $data = $google_service->userinfo->get();
            //Вызов функции аутентификации с полученным от Google API Google ID
            if ($this->ionAuth->loginGoogle($data['id'])) {
                //if the login is successful
                //redirect them back to the home page
                $this->session->setFlashdata('message', $this->ionAuth->messages());
                return redirect()->to('/')->withCookies();
            }
            else {
                //если аутентификация не пройдена с полученным id, значит в таблице такого google_id еще нет и надо создать учетную запись
                //для этого вызывается функция регистрации
                $this->ionAuth->register($data['email'], $this->randomPassword(), $data['email'], ['google_id' => $data['id'],
                    'first_name' => $data['givenName'],
                    'last_name' => $data['familyName'],
                    'picture_url' => $data['picture'],
                    'locale' => $data['locale'],
                    'company' => $data['hd']
                    ], [1]);
                //после создания учетной записи снова пытаемся выполнить логин
                if ($this->ionAuth->loginGoogle($data['id'])) {
                    //if the login is successful
                    //redirect them back to the home page
                    $this->session->setFlashdata('message', $this->ionAuth->messages());
                    return redirect()->to('/')->withCookies();
                }
                else $this->session->setFlashdata('message', $this->ionAuth->errors($this->validationListTemplate));

            }
        }
    }
    return redirect()->back()->withInput();

}

   protected function renderPage(string $view, $data = null, bool $returnHtml = true): string
    {
        $data['ionAuth'] = new IonAuth(); //Добавление в массив $data объекта IonAuth()
        $data['authUrl'] = $this->google_client->getGoogleClient()->createAuthUrl();
        //echo (json_encode($data['ionAuth']));
        $viewdata = $data ?: $this->data;
        $viewHtml = view($view, $viewdata);

        if ($returnHtml)
        {
            return $viewHtml;
        }
        else
        {
            echo $viewHtml;
        }
    }

    public function getProfile()
    {
        $data['ionAuth'] = new IonAuth();
        echo view('auth/profile', $data);
    }

    public function register_user()
    {
        $this->data['title'] = lang('Auth.create_user_heading');
        /*  Закомментировать
                if (! $this->ionAuth->loggedIn() || ! $this->ionAuth->isAdmin())
                {
                    return redirect()->to('/auth');
                }
        */
        $tables                        = $this->configIonAuth->tables;
        $identityColumn                = $this->configIonAuth->identity;
        $this->data['identity_column'] = $identityColumn;
        $first_name  = $this->request->getPost('Имя');
        $last_name   = $this->request->getPost('Фамилия');
        $company     = $this->request->getPost('Компания');
        $phone       = $this->request->getPost('Телефон');
        $email       = strtolower($this->request->getPost('email'));
        $password    = $this->request->getPost('Пароль');

        
        if ($this->request->getPost() )
        {
            
            $identity = ($identityColumn === 'email') ? $email : $this->request->getPost('identity');


            $additionalData = [
                'first_name' => $first_name,
                'last_name'  => $last_name,
                'company'    => $company,
                'phone'      => $phone,
            ];
        }
        if ($this->request->getPost() && $this->ionAuth->register($identity, $password, $email, $additionalData))
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
                        'Bucket' => 'weblib', //чтение настроек окружения из файла .env
                        //генерация случайного имени файла
                        'Key' => getenv('S3_KEY') . '/file' . rand(100000, 999999) . '.' . $ext,
                        'Body' => fopen($file->getRealPath(), 'r+')
                    ]);

                }



                $model = new ReaderModel();
                
                $model->save([
                    'FIO' => $first_name.' '.$last_name,
                    'picture_url' => $insert['ObjectURL'],
                ]);


            $this->session->setFlashdata('message', $this->ionAuth->messages());
            echo $insert['ObjectURL'];
            return redirect()->to('/auth');
        }
        else
        {
            // display the create user form
            // set the flash data error message if there is one
            $this->data['message'] = $this->validation->getErrors() ? $this->validation->listErrors($this->validationListTemplate) : ($this->ionAuth->errors($this->validationListTemplate) ? $this->ionAuth->errors($this->validationListTemplate) : $this->session->getFlashdata('message'));

            $this->data['first_name'] = [
                'name'  => 'first_name',
                'id'    => 'first_name',
                'type'  => 'text',
                'value' => set_value('first_name'),
            ];
            $this->data['last_name'] = [
                'name'  => 'last_name',
                'id'    => 'last_name',
                'type'  => 'text',
                'value' => set_value('last_name'),
            ];
            $this->data['identity'] = [
                'name'  => 'identity',
                'id'    => 'identity',
                'type'  => 'text',
                'value' => set_value('identity'),
            ];
            $this->data['email'] = [
                'name'  => 'email',
                'id'    => 'email',
                'type'  => 'email',
                'value' => set_value('email'),
            ];
            $this->data['company'] = [
                'name'  => 'company',
                'id'    => 'company',
                'type'  => 'text',
                'value' => set_value('company'),
            ];
            $this->data['phone'] = [
                'name'  => 'phone',
                'id'    => 'phone',
                'type'  => 'text',
                'value' => set_value('phone'),
            ];
            $this->data['password'] = [
                'name'  => 'password',
                'id'    => 'password',
                'type'  => 'password',
                'value' => set_value('password'),
            ];
            $this->data['password_confirm'] = [
                'name'  => 'password_confirm',
                'id'    => 'password_confirm',
                'type'  => 'password',
                'value' => set_value('password_confirm'),
            ];
            
            return $this->renderPage($this->viewsFolder . DIRECTORY_SEPARATOR . 'register_user', $this->data);
        }
    }

}