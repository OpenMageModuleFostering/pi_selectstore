<?php 

require_once ('Mage/Checkout/controllers/OnepageController.php');

class PI_Stepincheckout_IndexController extends Mage_Checkout_OnepageController
{
    public function indexAction()
    {
        //echo 1;
    }
    
    public function saveStoreAction()
    {
        if ($this->_expireAjax()) {
            return;
        }
        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
 
            $result = $this->getOnepage()->saveSelectedStore($data);
 
            if (!isset($result['error'])) {
                $result['goto_section'] = 'payment';
                $result['update_section'] = array(
                    'name' => 'payment-method',
                    'html' => $this->_getPaymentMethodsHtml()
                );
            }
            
 
            $this->getResponse()->setBody(Mage::helper('core')->jsonEncode($result));
       }
    }
}