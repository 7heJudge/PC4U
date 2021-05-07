<?php

namespace App\Models;

class Cart
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        if($oldCart){
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }
    public function add($item, $id, $qtyPr = 1){
        $qtyPr = $qtyPr < 1 ? 1 : $qtyPr;
        $storedItem = ['quantity' => 0, 'price' => $item->price, 'item' => $item];
        if($this->items){
            if (array_key_exists($id, $this->items)){
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['quantity'] += $qtyPr;
        $storedItem['price'] = $item->price * $storedItem['quantity'];
        $this->items[$id] = $storedItem;
        $this->totalQty += $qtyPr;
        $this->totalPrice += $item->price * $storedItem['quantity'];
    }
}