<?php
/**
 * OpenMage
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magento.com so we can send you a copy immediately.
 *
 * @category    Mage
 * @package     Mage_Catalog
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (http://www.magento.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Product url key attribute backend
 *
 * @category   Mage
 * @package    Mage_Catalog
 * @author     Magento Core Team <core@magentocommerce.com>
 */

class Mage_Catalog_Model_Attribute_Backend_Customlayoutupdate extends Mage_Eav_Model_Entity_Attribute_Backend_Abstract
{

    /**
     * Product custom layout update attribute validate function.
     * In case invalid data throws exception.
     *
     * @param Varien_Object $object
     * @return bool
     * @throws Mage_Eav_Model_Entity_Attribute_Exception
     */
    public function validate($object)
    {
        $attributeName = $this->getAttribute()->getName();
        $xml = trim($object->getData($attributeName));

        if (!$this->getAttribute()->getIsRequired() && empty($xml)) {
            return true;
        }

        /** @var Mage_Adminhtml_Model_LayoutUpdate_Validator $validator */
        $validator = Mage::getModel('adminhtml/layoutUpdate_validator');
        if (!$validator->isValid($xml)) {
            $messages = $validator->getMessages();
            //Add first message to exception
            $massage = array_shift($messages);
            $eavExc = new Mage_Eav_Model_Entity_Attribute_Exception($massage);
            $eavExc->setAttributeCode($attributeName);
            throw $eavExc;
        }
        return true;
    }
}
