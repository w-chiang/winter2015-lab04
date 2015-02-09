<?php

/**
 * Data access wrapper for "orders" table.
 *
 * @author jim
 */
class Orders extends MY_Model {

    // constructor
    function __construct() {
        parent::__construct('orders', 'num');
    }

    // add an item to an order
    function add_item($num, $code) {
        
    }

    // calculate the total for an order
    function total($num) {
        $CI = &get_instance();
        $CI->load->model('orderitems');
        
        $items = $this->orderitems->some('order', $num);
        
        $result = 0.0;
        foreach ($items as $item)
        {
            $menuitem = $this->menu->get($item->item);
            $result = $result + ($item->quantity * $menuitem->price);
        }
        
        return $result;
    }

    // retrieve the details for an order
    function details($num) {
        
    }

    // cancel an order
    function flush($num) {
        
    }

    // validate an order
    // it must have at least one item from each category
    function validate($num) {
        return false;
    }

}
