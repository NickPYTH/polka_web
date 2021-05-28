<?php namespace App\Services;

use Google_Client;

class GoogleClient
{
    private $google_client;
    public function __construct()
    {
        $this->google_client = new Google_Client();
        $this->google_client->setClientId('885216988180-bsgbgot6eq45tbuf4p1r7nld3b7rpu0h.apps.googleusercontent.com');
        $this->google_client->setClientSecret('hq2S5TT_HEFPBf3v37TZmUtT');
        $this->google_client->setRedirectUri(base_url().'/auth/google_login');
        $this->google_client->addScope('email');
        $this->google_client->addScope('profile');
    }
    public function getGoogleClient()
    {
        return $this->google_client;
    }

}