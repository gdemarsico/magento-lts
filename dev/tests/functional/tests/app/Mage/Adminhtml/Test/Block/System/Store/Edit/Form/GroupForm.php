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

namespace Mage\Adminhtml\Test\Block\System\Store\Edit\Form;

use Magento\Mtf\Block\Form;
use Magento\Mtf\Client\Locator;

/**
 * Form for New Store Group creation.
 */
class GroupForm extends Form
{
    /**
     * Website name selector in dropdown.
     *
     * @var string
     */
    protected $website = '//option[contains(.,"%s")]';

    /**
     * Check that Website visible in Website dropdown.
     *
     * @param string $websiteName
     * @return bool
     */
    public function isWebsiteVisible($websiteName)
    {
        return $this->_rootElement->find(sprintf($this->website, $websiteName), Locator::SELECTOR_XPATH)->isVisible();
    }
}
