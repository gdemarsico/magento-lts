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
 * @category    Tests
 * @package     Tests_Functional
 * @copyright  Copyright (c) 2006-2020 Magento, Inc. (http://www.magento.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

namespace Mage\Adminhtml\Test\Block\Catalog\Product\Edit\Tab\Configurable\Attribute;

use Magento\Mtf\Block\Form;

/**
 * Item option form.
 */
class Option extends Form
{
    /**
     * Fill option.
     *
     * @param array $option
     * @return void
     */
    public function fillOption(array $option)
    {
        $mapping = $this->dataMapping($option);
        $this->_fill($mapping);
    }

    /**
     * Get option.
     *
     * @param array $option
     * @return array
     */
    public function getOption(array $option)
    {
        $mapping = $this->dataMapping($option);
        return $this->_getData($mapping);
    }
}
