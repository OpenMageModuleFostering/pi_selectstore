<?php
class PI_Stepincheckout_Block_Sales_Order_Total extends Mage_Core_Block_Template
{
    /**
     * Get label cell tag properties
     *
     * @return string
     */
    public function getLabelProperties()
    {
        return $this->getParentBlock()->getLabelProperties();
    }

    /**
     * Get order store object
     *
     * @return Mage_Sales_Model_Order
     */
    public function getOrder()
    {
        return $this->getParentBlock()->getOrder();
    }

    /**
     * Get totals source object
     *
     * @return Mage_Sales_Model_Order
     */
    public function getSource()
    {
        return $this->getParentBlock()->getSource();
    }

    /**
     * Get value cell tag properties
     *
     * @return string
     */
    public function getValueProperties()
    {
        return $this->getParentBlock()->getValueProperties();
    }

    /**
     * Initialize reward points totals
     *
     * @return Enterprise_Reward_Block_Sales_Order_Total
     */
    public function initTotals()
    {
        if ((float) $this->getOrder()->getSelectedStore()) {
            $source = $this->getSource();
            
            $storeDetail = Mage::getModel('stepincheckout/selectstore')->load($source->getSelectedStore());
            
            $value = $storeDetail->getPrice();


            $this->getParentBlock()->addTotal(new Varien_Object(array(
                'code'   => 'selected_store',
                'strong' => false,
                'label'  => Mage::helper('stepincheckout')->__('Selected Store'),
                'value'  => $value
            )));
        }

        return $this;
    }
}
