<?php
/**
 * Created by PhpStorm.
 * User: walter
 * Date: 29/06/14
 * Time: 19.09
 */

class Mdg_Giftregistry_ViewController extends Mage_Core_Controller_Front_Action
{
    public function viewAction()
    {
        $registryId = $this->getRequest()->getParam('registry_id');
        if($registryId){
            $entity = Mage::getModel('mdg_giftregistry/entity');
            if($entity->load($registryId))
            {
                Mage::register('loaded_registry', $entity);
                //++ verifica -- da togliere
                $verifica = Mage::registry('loaded_registry');
                $loadedRegistry = Mage::getSingleton('customer/session')->getLoadedRegistry();
                Mage::getSingleton('customer/session')->setData(array('loaded_registry' => $entity));
                $loadedRegistry = Mage::getSingleton('customer/session')->getLoadedRegistry();
                //-- verifica -- da togliere
                $this->loadLayout();
                $this->_initLayoutMessages('customer/session');
                $this->renderLayout();
                return $this;
            } else {
                $this->_forward('noroute');
                return $this;
            }
        }
        return $this->_redirect('*/*/');
    }
}