<?php
/**
 * Created by PhpStorm.
 * User: walter
 * Date: 21/06/14
 * Time: 18.35
 */

class Mdg_Giftregistry_Model_Mysql4_Entity_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        $this->Init('mdg_giftregistry/entity');
        parent::_construct();
    }
}