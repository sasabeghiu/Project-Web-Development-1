<?php
class Order_Item
{
    private int $id;
    private int $order_id;
    private int $product_id;
    private int $product_qty;
    private int $product_price;
    private string $created_at;

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of order_id
     */
    public function getOrder_id()
    {
        return $this->order_id;
    }

    /**
     * Set the value of order_id
     *
     * @return  self
     */
    public function setOrder_id($order_id)
    {
        $this->order_id = $order_id;

        return $this;
    }

    /**
     * Get the value of product_id
     */
    public function getProduct_id()
    {
        return $this->product_id;
    }

    /**
     * Set the value of product_id
     *
     * @return  self
     */
    public function setProduct_id($product_id)
    {
        $this->product_id = $product_id;

        return $this;
    }

    /**
     * Get the value of product_qty
     */
    public function getProduct_qty()
    {
        return $this->product_qty;
    }

    /**
     * Set the value of product_qty
     *
     * @return  self
     */
    public function setProduct_qty($product_qty)
    {
        $this->product_qty = $product_qty;

        return $this;
    }

    /**
     * Get the value of product_price
     */
    public function getProduct_price()
    {
        return $this->product_price;
    }

    /**
     * Set the value of product_price
     *
     * @return  self
     */
    public function setProduct_price($product_price)
    {
        $this->product_price = $product_price;

        return $this;
    }

    /**
     * Get the value of created_at
     */
    public function getCreated_at()
    {
       // $this->created_at = new DateTimeImmutable();
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }
}
