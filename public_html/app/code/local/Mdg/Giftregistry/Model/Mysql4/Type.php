<?php
/**
 * Created by PhpStorm.
 * User: walter
 * Date: 21/06/14
 * Time: 17.48
 */

class Mdg_Giftregistry_Model_Mysql4_Type extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {
        $this->_init('mdg_giftregistry/type','type_id');
    }
}