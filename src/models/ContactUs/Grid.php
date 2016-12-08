<?php

/**
 * @namespace
 */
namespace Application\ContactUs;

/**
 * Grid based on SQL
 *
 * @category Application
 * @package  ContactUs
 */
class Grid extends \Bluz\Grid\Grid
{
    /**
     * @var string
     */
    protected $uid = 'contact_us';

    /**
     * init
     *
     * @return self
     */
    public function init()
    {
        $adapter = new \Bluz\Grid\Source\SqlSource();
        $adapter->setSource('SELECT * FROM contact_us');

        $this->setAdapter($adapter);
        $this->setDefaultLimit(25);
        $this->setAllowOrders(['id', 'name', 'email', 'mark_read', 'mark_answered', 'created', 'updated']);
        $this->setAllowFilters(['name', 'email', 'mark_read', 'mark_answered']);
        return $this;
    }
}
