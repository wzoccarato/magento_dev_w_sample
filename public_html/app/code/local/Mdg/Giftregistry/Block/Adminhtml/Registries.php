<?php
/**
 * Created by PhpStorm.
 * User: walter
 * Date: 26/08/14
 * Time: 23.28
 */

/* questa implementa il grid container block. p. 147-148 */
class Mdg_Giftregistry_Block_Adminhtml_Registries extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct(){
        $this->_controller = 'adminhtml_registries';
        $this->_blockGroup = 'mdg_giftregistry';
        $this->_headerText = Mage::helper('mdg_giftregistry')->__('Gift Registry Manager');
        parent::__construct();
    }
}