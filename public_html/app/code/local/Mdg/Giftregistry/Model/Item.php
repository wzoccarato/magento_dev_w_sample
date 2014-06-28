<?php
/**
 * Created by PhpStorm.
 * User: walter
 * Date: 21/06/14
 * Time: 18.18
 */

class Mdg_Giftregistry_Model_Item extends Mage_Core_Model_Abstract
{
    public function __construct()
    {
        $this->_init('mdg_giftregistry/item');
        parent::_construct();
    }
}
