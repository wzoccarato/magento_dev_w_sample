<?php
/**
 * Created by PhpStorm.
 * User: walter
 * Date: 29/06/14
 * Time: 22.36
 */

class Mdg_Giftregistry_Block_List extends Mage_Core_Block_Template
{
    public function getCustomerRegistries()
    {
        $collection = null;
        $currentCustomer = Mage::getSingleton('customer/session')->getCustomer();
        if($currentCustomer)
        {
            $collection = Mage::getModel('mdg_giftregistry/entity')->getCollection()
                ->addFieldToFilter('customer_id', $currentCustomer->getId());
        }
        return $collection;
    }
}