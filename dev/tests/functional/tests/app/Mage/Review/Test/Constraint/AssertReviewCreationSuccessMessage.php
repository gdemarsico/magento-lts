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

namespace Mage\Review\Test\Constraint;

use Mage\Review\Test\Page\Product\ReviewProductList;
use Magento\Mtf\Constraint\AbstractConstraint;

/**
 * Assert that create success message is displayed after review created on review product page.
 */
class AssertReviewCreationSuccessMessage extends AbstractConstraint
{
    /* tags */
    const SEVERITY = 'low';
    /* end tags */

    /**
     * Text of success create message after review created.
     */
    const SUCCESS_MESSAGE = 'Your review has been accepted for moderation.';

    /**
     * Assert that create success message is displayed after review created on review product page.
     *
     * @param ReviewProductList $reviewProductList
     * @return void
     */
    public function processAssert(ReviewProductList $reviewProductList)
    {
        \PHPUnit_Framework_Assert::assertEquals(
            self::SUCCESS_MESSAGE,
            $reviewProductList->getMessagesBlock()->getSuccessMessages()
        );
    }

    /**
     * Returns a string representation of the object.
     *
     * @return string
     */
    public function toString()
    {
        return 'Review success create message is present.';
    }
}
