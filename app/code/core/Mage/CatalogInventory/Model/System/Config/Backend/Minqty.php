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
 * @package     Mage_CatalogInventory
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (http://www.magento.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Minimum product qty backend model
 *
 * @category   Mage
 * @package    Mage_CatalogInventory
 * @author     Magento Core Team <core@magentocommerce.com>
 */
class Mage_CatalogInventory_Model_System_Config_Backend_Minqty extends Mage_Core_Model_Config_Data
{
    /**
    * Validate minimum product qty value
    *
    * @return $this
    */
    protected function _beforeSave()
    {
        parent::_beforeSave();
        $minQty = (int)$this->getValue() >= 0 ? (int)$this->getValue() : (int)$this->getOldValue();
        $this->setValue((string) $minQty);
        return $this;
    }
}
