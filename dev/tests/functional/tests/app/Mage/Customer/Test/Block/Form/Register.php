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

namespace Mage\Customer\Test\Block\Form;

use Magento\Mtf\Block\Form;
use Magento\Mtf\Client\Locator;
use Magento\Mtf\Fixture\FixtureInterface;

/**
 * Register new customer on Frontend.
 */
class Register extends Form
{
    /**
     * 'Submit' form button.
     *
     * @var string
     */
    protected $submit = '.buttons-set .button';

    /**
     * Create new customer account and fill billing address if it exists.
     *
     * @param FixtureInterface $fixture
     * @return void
     */
    public function registerCustomer(FixtureInterface $fixture)
    {
        $mapping = $this->dataMapping($fixture->getData());
        unset($mapping['id']);
        $this->_fill($mapping);
        $this->_rootElement->find($this->submit, Locator::SELECTOR_CSS)->click();
    }
}
