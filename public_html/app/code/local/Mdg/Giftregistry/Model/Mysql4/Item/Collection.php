<?php
/**
 * Created by PhpStorm.
 * User: walter
 * Date: 21/06/14
 * Time: 18.28
 */

class Mdg_Giftregistry_Model_Mysql4_Item_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        $this->Init('mdg_giftregistry/item');
        parent::_construct();
    }
}