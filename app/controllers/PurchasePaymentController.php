<?php
namespace app\controllers;

use app\models\DefaultModel;
use app\models\Key;
use app\models\Order;
use app\models\Purchase;
use framework\Mailer\Mailer;

class PurchasePaymentController
{
    public Order $order;
    public DefaultModel $defaultModel;
    public Key $gameKey;
    public Purchase $purchase;
    public Mailer $mailer;

    public function __construct()
    {
        $this->order = new Order();
        $this->defaultModel = new DefaultModel();
        $this->gameKey = new Key();
        $this->purchase = new Purchase();
        $this->mailer = new Mailer();
    }

    public function pay()
    {
        $purchase_id = $_POST['pay-btn'];
        $body = "\nThank you for your purchase!" . "\n" . "That is your keys:" . "\n\n";
        $orders = $this->order->orderMapper(intval($purchase_id));
        foreach($orders as $key => $value)
        {
            for($i = 0; $i < intval($orders[$key]->product_amount); $i++)
            {
                $this->gameKey->create($orders[$key]->id);
            }
        }
        $this->purchase->switchStatusToCompleted($purchase_id);
        $keys = $this->gameKey->getAllKeysByPurchaseId($purchase_id);

        foreach ($keys as $key => $key1) {
            foreach ($keys[$key] as $key2 => $value) {
                $body .= $keys[$key][$key2]->key_body . "\n";
            }
        }

        $this->mailer->sendMail("$purchase_id", "$body");
        header("Location: viewMyOrders");
    }

}