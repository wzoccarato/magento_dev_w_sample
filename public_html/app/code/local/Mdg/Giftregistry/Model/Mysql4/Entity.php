<?php
/**
 * Created by PhpStorm.
 * User: walter
 * Date: 21/06/14
 * Time: 18.33
 */

class Mdg_Giftregistry_Model_Mysql4_Entity extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {
        $this->_init('mdg_giftregistry/entity','entity_id');
    }
}