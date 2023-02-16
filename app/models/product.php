<?php
class Product
{
    private int $product_id;
    private int $item_id;
    private string $product_name;
    private string $product_photo;
    private int $product_stock;
    private int $product_price;

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
     * Get the value of item_id
     */
    public function getItem_id()
    {
        return $this->item_id;
    }

    /**
     * Set the value of item_id
     *
     * @return  self
     */
    public function setItem_id($item_id)
    {
        $this->item_id = $item_id;

        return $this;
    }

    /**
     * Get the value of product_name
     */
    public function getProduct_name()
    {
        return $this->product_name;
    }

    /**
     * Set the value of product_name
     *
     * @return  self
     */
    public function setProduct_name($product_name)
    {
        $this->product_name = $product_name;

        return $this;
    }

    /**
     * Get the value of product_photo
     */
    public function getProduct_photo()
    {
        return $this->product_photo;
    }

    /**
     * Set the value of product_photo
     *
     * @return  self
     */
    public function setProduct_photo($product_photo)
    {
        $this->product_photo = $product_photo;

        return $this;
    }

    /**
     * Get the value of product_stock
     */
    public function getProduct_stock()
    {
        return $this->product_stock;
    }

    /**
     * Set the value of product_stock
     *
     * @return  self
     */
    public function setProduct_stock($product_stock)
    {
        $this->product_stock = $product_stock;

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
}
