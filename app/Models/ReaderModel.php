<?php namespace App\Models;
use CodeIgniter\Model;

class ReaderModel extends Model
{
    protected $table = 'Reader';

    protected $allowedFields = ['FIO', 'picture_url'];
}

