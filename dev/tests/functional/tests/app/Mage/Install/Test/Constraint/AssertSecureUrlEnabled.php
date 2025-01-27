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

namespace Mage\Install\Test\Constraint;

use Magento\Mtf\Client\BrowserInterface;
use Magento\Mtf\Constraint\AbstractConstraint;
use Mage\Adminhtml\Test\Page\Adminhtml\Dashboard;

/**
 * Assert that Secure Urls Enabled.
 */
class AssertSecureUrlEnabled extends AbstractConstraint
{
    /**
     * Assert that Secure Urls Enabled.
     *
     * @param BrowserInterface $browser
     * @param Dashboard $dashboard
     * @return void
     */
    public function processAssert(BrowserInterface $browser, Dashboard $dashboard)
    {
        $dashboard->open();
        \PHPUnit_Framework_Assert::assertTrue(
            strpos($browser->getUrl(), 'https://') !== false,
            'Secure Url is not displayed on backend.'
        );
    }

    /**
     * Returns a string representation of the object.
     *
     * @return string
     */
    public function toString()
    {
        return 'Secure Urls are displayed successful.';
    }
}
