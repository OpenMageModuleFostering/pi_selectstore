<?php

class PI_Stepincheckout_Adminhtml_SitestoreController extends Mage_Adminhtml_Controller_Action {

    public function indexAction() {
        $this->loadLayout();

        /** set active menu* */
        $this->_setActiveMenu('pistores/stores');
        $this->_addContent($this->getLayout()->createBlock('stepincheckout/adminhtml_selectstore'));
        $this->renderLayout();
    }
    
    public function editAction()
    {
        $id = $this->getRequest()->getParam('id');
        $model = Mage::getModel('stepincheckout/selectstore')->load($id);

        if ($model->getId() || $id == 0) {
            $data = Mage::getSingleton('adminhtml/session')->getFormData(true);
            if (!empty($data)) {
                $model->setData($data);
            }


            Mage::register('selectstore_data', $model);

            $this->loadLayout();
            $this->_setActiveMenu('ggpfast/store');

            $this->_addBreadcrumb(Mage::helper('adminhtml')->__('Item Manager'), Mage::helper('adminhtml')->__('Item Manager'));
            $this->_addBreadcrumb(Mage::helper('adminhtml')->__('Item News'), Mage::helper('adminhtml')->__('Item News'));

            $this->getLayout()->getBlock('head')->setCanLoadExtJs(true);

            $this->_addContent($this->getLayout()->createBlock('stepincheckout/adminhtml_selectstore_edit'))
                    ->_addLeft($this->getLayout()->createBlock('stepincheckout/adminhtml_selectstore_edit_tabs'));

            $this->renderLayout();
        } else {
            Mage::getSingleton('adminhtml/session')->addError(Mage::helper('stepincheckout')->__('Store not exist'));
            $this->_redirect('*/*/');
        }
    }
    
    public function newAction() {
        $this->_forward('edit');
    }
    
    public function saveAction() {
        $id = $this->getRequest()->getParam('id');
        if ($data = $this->getRequest()->getPost()) {            
            try {

                $model = Mage::getModel('stepincheckout/selectstore');
                $model->setData($data)
                  ->setId($id);

                $model->save();
                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('stepincheckout')->__('Store saved successfully'));
                Mage::getSingleton('adminhtml/session')->setFormData(false);

                if ($this->getRequest()->getParam('back')) {
                    $this->_redirect('*/*/edit', array('id' => $model->getId()));
                    return;
                }
                $this->_redirect('*/*/');
                return;
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                Mage::getSingleton('adminhtml/session')->setFormData($data);
                $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
                return;
            }

        }
        
        $this->_redirect('*/*/');
    }
    
    public function deleteAction() {
        if ($this->getRequest()->getParam('id') > 0) {
            try {
                $model = Mage::getModel('stepincheckout/selectstore');

                $model->setId($this->getRequest()->getParam('id'))
                        ->delete();

                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('adminhtml')->__('Store successfully deleted'));
                $this->_redirect('*/*/');
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
            }
        }
        $this->_redirect('*/*/');
    }
    
    public function massDeleteAction() {
        $storeIds = $this->getRequest()->getParam('store_id');
        if (!is_array($storeIds)) {
            Mage::getSingleton('adminhtml/session')->addError(Mage::helper('adminhtml')->__('Please select Store(s)'));
        } else {
            try {
                foreach ($storeIds as $storeId) {
                    $store = Mage::getModel('stepincheckout/selectstore')->load($storeId);
                    $store->delete();
                }
                Mage::getSingleton('adminhtml/session')->addSuccess(
                        Mage::helper('adminhtml')->__(
                                'Total of %d record(s) is successfully deleted', count($storeIds)
                        )
                );
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            }
        }
        $this->_redirect('*/*/index');
    }

}
