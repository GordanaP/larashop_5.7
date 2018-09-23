<?php

namespace App\Services\Utilities\ShoppingCart;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;

class CartItem implements Arrayable, Jsonable
{
    /**
     * The cart item rowId.
     *
     * @var string
     */
    public $rowId;

    /**
     * The cart item id.
     *
     * @var int
     */
    public $id;

    /**
     * The cart item qty.
     *
     * @var int
     */
    public $qty;

    /**
     * The cart item name.
     *
     * @var string
     */
    public $name;

    /**
     * The cart item price.
     *
     * @var float
     */
    public $price;

    /**
     *  Instantiate a new model instance.
     *
     * @param int     $id
     * @param string    $name
     * @param float     $price
     * @return  void
     */
    public function __construct($id, $name, $price)
    {
        $this->rowId    = $this->generateRowId($id);
        $this->id       = $id;
        $this->name     = $name;
        $this->price    = $price;
    }

    /**
     * Set the cart item quantity.
     *
     * @param int $qty
     */
    public function setQuantity($qty)
    {
        $this->qty = $qty;
    }

    /**
    * Get the cart item attribute.
    *
    * @param string $attribute
    * @return mixed
    */
   public function __get($attribute)
   {
       if(property_exists($this, $attribute)) {
           return $this->{$attribute};
       }

       if($attribute === 'subtotal') {
           return $this->qty * $this->price;
       }

       return null;
   }

    /**
     * Create a new instance of the cart item from the attributes.
     *
     * @param int $id
     * @param string     $name
     * @param float      $price
     * @return App\Services\Utilities\ShoppingCart\CartItem
     */
    public static function fromAttributes($id, $name, $price)
    {
        return new self($id, $name, $price);
    }

    /**
     * Convert the instance to an array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'rowId'    => $this->rowId,
            'id'       => $this->id,
            'name'     => $this->name,
            'qty'      => $this->qty,
            'price'    => $this->price,
            'subtotal' => $this->subtotal
        ];
    }

    /**
     * Convert the object to its JSON representation.
     *
     * @param int $options
     * @return string
     */
    public function toJson($options = 0)
    {
        return json_encode($this->toArray(), $options);
    }

    /**
     * Generate a unique cart item id.
     *
     * @param int $id
     * @return string
     */
    protected function generateRowId($id)
    {
        return md5($id);
    }
}