<?php namespace App\Models;
use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'Order';
    protected $primaryKey = 'id';
    protected $allowedFields = ['idTool', 'orderGroupId'];


}

