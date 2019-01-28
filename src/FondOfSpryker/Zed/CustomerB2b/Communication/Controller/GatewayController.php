<?php

namespace FondOfSpryker\Zed\CustomerB2b\Communication\Controller;

use Generated\Shared\Transfer\CustomerResponseTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use Spryker\Zed\Customer\Communication\Controller\GatewayController as SprykerGatewayController;

/**
 * @method \FondOfSpryker\Zed\CustomerB2b\Business\CustomerFacadeInterface getFacade()
 * @method \FondOfSpryker\Zed\CustomerB2b\Communication\CustomerCommunicationFactory getFactory()
 */
class GatewayController extends SprykerGatewayController
{
    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerResponseTransfer
     */
    public function findCustomerByExternalReferenceAction(CustomerTransfer $customerTransfer): CustomerResponseTransfer
    {
        return $this->getFacade()->findCustomerByExternalReference($customerTransfer->getExternalReference());
    }
}
