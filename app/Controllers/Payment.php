<?php
namespace App\Controllers;
use App\Models\ClientModel;
use IonAuth\Libraries\IonAuth;
use function MongoDB\BSON\toJSON;
use App\Models\ToolsModel;
use App\Models\OrderModel;
use App\Models\BooksClaimModel;

class Payment extends BaseController
{   
    public function payment(){
        $data['ionAuth'] = new IonAuth();
        $items_list = [];
        $order_id = rand(1, 1000000000);
        $items_counter = $_POST['items_counter'];
        $user_email = $_POST['email'];
        $tools_model = new ToolsModel();
        $full_cost = 0;
        for ($i=1; $i <= $items_counter; $i++) { 
            if ($_POST["payment_item_".$i] != ""){
                $item = $tools_model->get_item($_POST["payment_item_".$i]);
                $cost = $tools_model->get_item($_POST["payment_item_".$i])["Price"];
                $items_list[] = [$item['id'] => $cost];
                $full_cost += $cost;
            }
        }
        $items_list_tmp = $items_list;
        foreach ($item as $items_list_tmp) {
            $order_model = new OrderModel();
            $order_model->save([
                'idTool' => $item['id'],
                'orderGroupId' => $order_id,
            ]);
            
        }
        $claim_model = new BooksClaimModel();
        $claim_model->save([
                'orderGroupId' => $order_id,
                'clientEmail' => $user_email,
                'price' => $full_cost,
            ]);
        $data['orderId'] = $order_id;
        $data['cost'] = $full_cost;
        echo view('pages/bill', $data);
    }
}