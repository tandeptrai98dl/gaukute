<?php

namespace App;

class Cart
{
    public $items = null;
    public $total_qty = 0;
    public $total_price= 0;

    public function __construct($oldCart){
        if($oldCart){
            $this->items        = $oldCart->items;
            $this->total_qty    = $oldCart->total_qty;
            $this->total_price  = $oldCart->total_price;
        }
    }

    public function add($item, $id){
        $giohang = ['qty'=>0, 'price' => $item->final_price, 'item' => $item];
        if($this->items){
            if(array_key_exists($id, $this->items)){
                $giohang = $this->items[$id];
            }
        }

        if($item->promotion_price == 0) {
            $item->final_price = $item->unit_price;
        } else {
            $item->final_price = $item->promotion_price;
        }
        $giohang['qty']++;
        $giohang['price'] = $item->final_price * $giohang['qty'];

        $this->items[$id] = $giohang;
        $this->total_qty++;
        $this->total_price += $item->final_price;
    }

    public function removeItem($id){
        $this->total_qty    -= $this->items[$id]['qty'];
        $this->total_price  -= $this->items[$id]['price'];
        unset($this->items[$id]);
    }
}