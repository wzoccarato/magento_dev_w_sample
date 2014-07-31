<?php
/**
 * Created by PhpStorm.
 * User: walter
 * Date: 11/06/14
 * Time: 14.08
 */

class Mdg_Giftregistry_Helper_Data extends Mage_Core_Helper_Abstract {

    public function getEventsTypes()
    {
        $collection=Mage::getModel('mdg_giftregistry/type')->getCollection();
        return $collection;
    }

}
