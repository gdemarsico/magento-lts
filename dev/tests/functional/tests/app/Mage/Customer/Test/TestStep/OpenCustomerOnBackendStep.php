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

namespace Mage\Customer\Test\TestStep;

use Mage\Customer\Test\Fixture\Customer;
use Mage\Customer\Test\Page\Adminhtml\CustomerIndex;
use Magento\Mtf\TestStep\TestStepInterface;

/**
 * Open customer on backend.
 */
class OpenCustomerOnBackendStep implements TestStepInterface
{
    /**
     * Customer fixture.
     *
     * @var Customer
     */
    protected $customer;

    /**
     * Customer index page.
     *
     * @var Customer
     */
    protected $customerIndex;

    /**
     * @constructor
     * @param Customer $customer
     * @param CustomerIndex $customerIndex
     */
    public function __construct(Customer $customer, CustomerIndex $customerIndex)
    {
        $this->customer = $customer;
        $this->customerIndex = $customerIndex;
    }

    /**
     * Open customer account.
     *
     * @return void
     */
    public function run()
    {
        $this->customerIndex->open();
        $this->customerIndex->getCustomerGridBlock()->searchAndOpen(['email' => $this->customer->getEmail()]);
    }
}
