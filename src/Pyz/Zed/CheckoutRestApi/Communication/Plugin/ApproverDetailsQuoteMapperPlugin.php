<?php

/**
 * This file is part of the Spryker Commerce OS.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\CheckoutRestApi\Communication\Plugin;

use Generated\Shared\Transfer\ApproverDetailsTransfer;
use Generated\Shared\Transfer\PointOfContactTransfer;
use Generated\Shared\Transfer\QuoteTransfer;
use Generated\Shared\Transfer\RestCheckoutRequestAttributesTransfer;
use Spryker\Zed\CheckoutRestApiExtension\Dependency\Plugin\QuoteMapperPluginInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method \Spryker\Zed\CheckoutRestApi\Business\CheckoutRestApiFacadeInterface getFacade()
 * @method \Spryker\Zed\CheckoutRestApi\CheckoutRestApiConfig getConfig()
 */
class ApproverDetailsQuoteMapperPlugin extends AbstractPlugin implements QuoteMapperPluginInterface
{
    /**
     * {@inheritDoc}
     * - Maps rest request ApproverDetails to quote.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\RestCheckoutRequestAttributesTransfer $restCheckoutRequestAttributesTransfer
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    public function map(
        RestCheckoutRequestAttributesTransfer $restCheckoutRequestAttributesTransfer,
        QuoteTransfer $quoteTransfer
    ): QuoteTransfer {
        $restApproverDetailsTransfer = $restCheckoutRequestAttributesTransfer->getApproverDetails();

        if (!$restApproverDetailsTransfer) {
            return $quoteTransfer;
        }

        $approverDetailsTransfer = (new ApproverDetailsTransfer())
            ->fromArray($restApproverDetailsTransfer->toArray(), true);
        $quoteTransfer->setApproverDetails($approverDetailsTransfer);

        return $quoteTransfer;
    }
}
                                                                                                                                                                                      