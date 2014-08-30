<?php
/**
 * Created by PhpStorm.
 * User: walter
 * Date: 20/08/14
 * Time: 6.01
 */
class Mdg_Giftregistry_Adminhtml_RegistriesController extends
    Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
        return $this;
    }
    public function editAction()
    {
        $this->loadLayout();
        $this->renderLayout();
        return $this;
    }
    public function saveAction()
    {
        $this->loadLayout();
        $this->renderLayout();
        return $this;
    }
    public function newAction()
    {
        $this->loadLayout();
        $this->renderLayout();
        return $this;
    }

    public function massDeleteAction()
    {
        $registryIds = $this->getRequest()->getParam('registries');
        if (!is_array($registryIds)) {
            Mage::getSingleton('adminhtml/session')->
                addError(Mage::helper('mdg_giftregistry')->__('Please select one or more registries.'));
        } else {
            try {
                $registry = Mage::getModel('mdg_giftregistry/entity');
                foreach ($registryIds as $registryId) {
                    $registry->reset()->load($registryId)->delete();
                }
                Mage::getSingleton('adminhtml/session')->
                    addSuccess(Mage::helper('adminhtml')->__('Total of %d record(s) were deleted.',count($registryIds)));
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            }
        }
        $this->_redirect('*/*/index');
    }

    public function massEnableAction()
    {
        $registryIds = $this->getRequest()->getParam('registries');
        if (!is_array($registryIds)) {
            Mage::getSingleton('adminhtml/session')->
                addError(Mage::helper('mdg_giftregistry')->__('Please select one or more registries.'));
        } else {
            try {
                $registry = Mage::getModel('mdg_giftregistry/entity');
                foreach ($registryIds as $registryId) {
                    $registry->reset()->load($registryId)->enable();
                }
                Mage::getSingleton('adminhtml/session')->
                    addSuccess(Mage::helper('adminhtml')->__('Total of %d record(s) were enabled.',count($registryIds)));
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            }
        }
        $this->_redirect('*/*/index');
    }

    public function massDisableAction()
    {
        $registryIds = $this->getRequest()->getParam('registries');
        if (!is_array($registryIds)) {
            Mage::getSingleton('adminhtml/session')->
                addError(Mage::helper('mdg_giftregistry')->__('Please select one or more registries.'));
        } else {
            try {
                $registry = Mage::getModel('mdg_giftregistry/entity');
                foreach ($registryIds as $registryId) {
                    $registry->reset()->load($registryId)->disable();
                }
                Mage::getSingleton('adminhtml/session')->
                    addSuccess(Mage::helper('adminhtml')->__('Total of %d record(s) were disabled.',count($registryIds)));
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            }
        }
        $this->_redirect('*/*/index');
    }
}