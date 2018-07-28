<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['status', 'client_email', 'partner_id', 'delivery_dt'];

    public function products()
    {
        return $this->hasManyThrough(Product::class, OrderProduct::class, 'order_id','id', 'id','product_id' );
    }

    public function partners()
    {
        return $this->belongsTo(Partner::class,'partner_id','id');
    }

    public function getOrderProducts()
    {
        //dd($this->products()->toSql());
        return $this->products()->get(['name','order_products.price','order_products.quantity']);
    }

    public function getOrderCosts($ordercost = 0)
    {
        $products = $this->getOrderProducts();

        foreach($products as $product):
            $ordercost += $product->price * $product->quantity;
        endforeach;

        return $ordercost;
    }

    public function getPartner()
    {
        return $this->partners()->get(['name'])->first();
    }

    public function getPartnerName()
    {
        return $this->getPartner()->name;
    }

    public function getOrderStatus()
    {

        switch ($this->status) {
            case 0:
                return "Новый";
                break;
            case 10:
                echo "Подтвержден";
                break;
            case 20:
                echo "Завершен";
                break;
        }
    }
}
