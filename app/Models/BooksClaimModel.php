<?php namespace App\Models;
use CodeIgniter\Model;

class BooksClaimModel extends Model
{
    protected $table = 'BooksClaim';
    protected $primaryKey = 'id';
    protected $allowedFields = ['orderGroupId', 'clientEmail', 'price'];


}
