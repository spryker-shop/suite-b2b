<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Glue\CheckoutRestApi\Processor\CheckoutUpdate;

use Generated\Shared\Transfer\QuoteTransfer;
use Generated\Shared\Transfer\RestAddressTransfer;
use Generated\Shared\Transfer\RestApproverDetailsTransfer;
use Generated\Shared\Transfer\RestCheckoutRequestAttributesTransfer;
use Generated\Shared\Transfer\RestCheckoutUpdateResponseAttributesTransfer;
use Generated\Shared\Transfer\RestCustomerTransfer;
use Generated\Shared\Transfer\RestPointOfContactTransfer;

class CheckoutUpdateMapper implements CheckoutUpdateMapperInterface
{
    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     * @param \Generated\Shared\Transfer\RestCheckoutRequestAttributesTransfer $restCheckoutRequestAttributesTransfer
     *
     * @return \Generated\Shared\Transfer\RestCheckoutUpdateResponseAttributesTransfer
     */
    public function mapRestCheckoutDataTransferToRestCheckoutUpdateResponseAttributesTransfer(
        QuoteTransfer $quoteTransfer,
        RestCheckoutRequestAttributesTransfer $restCheckoutRequestAttributesTransfer
    ): RestCheckoutUpdateResponseAttributesTransfer {
        $restCheckoutUpdateResponseAttributesTransfer = new RestCheckoutUpdateResponseAttributesTransfer();
        if ($quoteTransfer->getCustomer()) {
            $restCheckoutUpdateResponseAttributesTransfer->setCustomer(
                (new RestCustomerTransfer())->fromArray($quoteTransfer->getCustomer()->toArray(), true)
            );
        }
        $restCheckoutUpdateResponseAttributesTransfer->setIdCart($restCheckoutRequestAttributesTransfer->getIdCart());
        if ($quoteTransfer->getBillingAddress()) {
            $restCheckoutUpdateResponseAttributesTransfer->setBillingAddress(
                (new RestAddressTransfer())->fromArray($quoteTransfer->getBillingAddress()->toArray(), true)
            );
        }
        if ($quoteTransfer->getShippingAddress()) {
            $restCheckoutUpdateResponseAttributesTransfer->setShippingAddress(
                (new RestAddressTransfer())->fromArray($quoteTransfer->getShippingAddress()->toArray(), true)
            );
        }
        $restCheckoutUpdateResponseAttributesTransfer->setPayments($restCheckoutRequestAttributesTransfer->getPayments());
        $restCheckoutUpdateResponseAttributesTransfer->setShipment($restCheckoutRequestAttributesTransfer->getShipment());
        if ($quoteTransfer->getPointOfContact()) {
            $restCheckoutUpdateResponseAttributesTransfer->setPointOfContact(
                (new RestPointOfContactTransfer())->fromArray($quoteTransfer->getPointOfContact()->toArray(), true)
            );
        }
        if ($quoteTransfer->getApproverDetails()) {
            $restCheckoutUpdateResponseAttributesTransfer->setApproverDetails(
                (new RestApproverDetailsTransfer())->fromArray($quoteTransfer->getApproverDetails()->toArray(), true)
            );
        }

        return $restCheckoutUpdateResponseAttributesTransfer;
    }
}
                                                                                                                                                                                                                                                       