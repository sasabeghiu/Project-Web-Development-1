<?php
#[AllowDynamicProperties]
class Order
{
    private int $order_id;
    private int $user_id;
    private string $user_email;
    private string $user_firstname;
    private string $user_lastname;
    private string $user_address;
    private string $user_country;
    private string $user_zipcode;
    private int $order_totalprice;
    private DateTimeInterface $created_at;

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
     * Get the value of user_id
     */
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * Set the value of user_id
     *
     * @return  self
     */
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * Get the value of user_email
     */
    public function getUser_email()
    {
        return $this->user_email;
    }

    /**
     * Set the value of user_email
     *
     * @return  self
     */
    public function setUser_email($user_email)
    {
        $this->user_email = $user_email;

        return $this;
    }

    /**
     * Get the value of user_firstname
     */
    public function getUser_firstname()
    {
        return $this->user_firstname;
    }

    /**
     * Set the value of user_firstname
     *
     * @return  self
     */
    public function setUser_firstname($user_firstname)
    {
        $this->user_firstname = $user_firstname;

        return $this;
    }

    /**
     * Get the value of user_lastname
     */
    public function getUser_lastname()
    {
        return $this->user_lastname;
    }

    /**
     * Set the value of user_lastname
     *
     * @return  self
     */
    public function setUser_lastname($user_lastname)
    {
        $this->user_lastname = $user_lastname;

        return $this;
    }

    /**
     * Get the value of user_address
     */
    public function getUser_address()
    {
        return $this->user_address;
    }

    /**
     * Set the value of user_address
     *
     * @return  self
     */
    public function setUser_address($user_address)
    {
        $this->user_address = $user_address;

        return $this;
    }

    /**
     * Get the value of user_country
     */
    public function getUser_country()
    {
        return $this->user_country;
    }

    /**
     * Set the value of user_country
     *
     * @return  self
     */
    public function setUser_country($user_country)
    {
        $this->user_country = $user_country;

        return $this;
    }

    /**
     * Get the value of user_zipcode
     */
    public function getUser_zipcode()
    {
        return $this->user_zipcode;
    }

    /**
     * Set the value of user_zipcode
     *
     * @return  self
     */
    public function setUser_zipcode($user_zipcode)
    {
        $this->user_zipcode = $user_zipcode;

        return $this;
    }

    /**
     * Get the value of order_totalprice
     */
    public function getOrder_totalprice()
    {
        return $this->order_totalprice;
    }

    /**
     * Set the value of order_totalprice
     *
     * @return  self
     */
    public function setOrder_totalprice($order_totalprice)
    {
        $this->order_totalprice = $order_totalprice;

        return $this;
    }

    /**
     * Get the value of created_at
     */
    public function getCreated_at()
    {
        $this->created_at = new DateTimeImmutable();
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
