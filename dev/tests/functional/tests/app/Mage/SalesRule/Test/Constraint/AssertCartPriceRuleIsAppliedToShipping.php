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

namespace Mage\SalesRule\Test\Constraint;

/**
 * Assert that price rule is applied to shipping amount.
 */
class AssertCartPriceRuleIsAppliedToShipping extends AbstractCartPriceRuleApplying
{
    /* tags */
    const SEVERITY = 'low';
    /* end tags */

    /**
     * Assert that calculated grand total(including shipping) equals with grand total.
     *
     * @return void
     */
    public function assert()
    {
        $subTotal = $this->checkoutCart->getTotalsBlock()->getData('subtotal');
        $grandTotal = $this->checkoutCart->getTotalsBlock()->getData('grand_total');
        $shippingPrice = $this->checkoutCart->getTotalsBlock()->getData('shipping_price');
        $discount = $this->checkoutCart->getTotalsBlock()->getData('discount');
        $calculatedGrandTotal = number_format(((float)$subTotal + (float)$shippingPrice - (float)$discount), 2);
        \PHPUnit_Framework_Assert::assertEquals(
            $calculatedGrandTotal,
            $grandTotal,
            "Calculated grand total: '$calculatedGrandTotal' not equals with grand total: '$grandTotal' \n"
            . "Price rule hasn't been applied to shipping amount."
        );
    }

    /**
     * Returns a string representation of the object.
     *
     * @return string
     */
    public function toString()
    {
        return "Price rule is applied to shipping amount.";
    }
}
