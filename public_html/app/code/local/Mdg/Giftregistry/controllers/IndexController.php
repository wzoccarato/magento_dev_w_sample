<?php
/**
 * Created by PhpStorm.
 * User: walter
 * Date: 29/06/14
 * Time: 15.00
 */

class Mdg_Giftregistry_IndexController extends Mage_Core_Controller_Front_Action
{
    public function preDispatch()
    {
        parent::preDispatch();
        if (!Mage::getSingleton('customer/session')->authenticate($this)) {
            $this->getResponse()->setRedirect(Mage::helper('customer')->getLoginUrl());
            $this->setFlag('', self::FLAG_NO_DISPATCH, true);
        }
    }

    // questa deve soltanto visualizzare il layout
    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
        return $this;
    }

    // questa deve gestire l'input dell'utente
    public function deleteAction()
    {
        try {
            $registryId = $this->getRequest()->getParam('registry_id');
            if($registryId){
                if($registry = Mage::getModel('mdg_giftregistry/entity')->load($registryId))
                {
                    $registry->delete();
                    $successMessage =  Mage::helper('mdg_giftregistry')->__('Gift registry has been succesfully deleted.');
                    Mage::getSingleton('core/session')->addSuccess($successMessage);
                    $this->_redirect('*/*/');

                }else{
                    throw new Exception("There was a problem deleting the registry");
                }
            }
        } catch (Exception $e) {
            Mage::getSingleton('core/session')->addError($e->getMessage());
            $this->_redirect('*/*/');
        }
    }

    // questa deve soltanto visualizzare il layout
    public function newAction()
    {
        $this->loadLayout();
        $this->renderLayout();
        return $this;
    }

    // questa deve soltanto visualizzare il layout
    public function editAction()
    {
        $this->loadLayout();
        $this->renderLayout();
        return $this;
    }

    // questa deve gestire l'input dell'utente
    public function newPostAction()
    {
        try {
            $data = $this->getRequest()->getParams();
            $registry = Mage::getModel('mdg_giftregistry/entity');
            $customer = Mage::getSingleton('customer/session')->getCustomer();

            if($this->getRequest()->getPost() && !empty($data)) {
                $registry->updateRegistryData($customer, $data);
                $registry->save();
                $successMessage =  Mage::helper('mdg_giftregistry')->__('Registry Successfully Created');
                Mage::getSingleton('core/session')->addSuccess($successMessage);
            }else{
                throw new Exception("Insufficient Data provided");
            }
        } catch (Mage_Core_Exception $e) {
            Mage::getSingleton('core/session')->addError($e->getMessage());
            $this->_redirect('*/*/');
        }
        $this->_redirect('*/*/');
    }

    // questa deve gestire l'input dell'utente
    public function editPostAction()
    {
        try {
            $data = $this->getRequest()->getParams();
            $registry = Mage::getModel('mdg_giftregistry/entity');
            $customer = Mage::getSingleton('customer/session')->getCustomer();

            if($this->getRequest()->getPost() && !empty($data) )
            {
                // nei $data manca il registry_id, e questo manda tutto a puttane
                $registry->load($data['registry_id']);
                if($registry){
                    $registry->updateRegistryData($customer, $data);
                    // questa fallisce perché nel record da salvare il type_id è NULL (nel record registrato dovrebbe essere 3)
                    $registry->save();
                    $successMessage =  Mage::helper('mdg_giftregistry')->__('Registry Successfully Saved');
                    Mage::getSingleton('core/session')->addSuccess($successMessage);
                }else {
                    throw new Exception("Invalid Registry Specified");
                }
            }else {
                throw new Exception("Insufficient Data provided");
            }
        } catch (Mage_Core_Exception $e) {
            Mage::getSingleton('core/session')->addError($e->getMessage());
            $this->_redirect('*/*/');
        }
        $this->_redirect('*/*/');
    }
}