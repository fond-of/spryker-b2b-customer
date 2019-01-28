<?php

namespace FondOfSpryker\Client\CustomerB2b;

use Generated\Shared\Transfer\CustomerResponseTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use Spryker\Client\Customer\CustomerClient as SprykerCustomerClient;

/**
 * @method \FondOfSpryker\Client\CustomerB2b\CustomerFactory getFactory()
 */
class CustomerClient extends SprykerCustomerClient implements CustomerClientInterface
{
    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerResponseTransfer
     */
    public function findCustomerByExternalReference(CustomerTransfer $customerTransfer): CustomerResponseTransfer
    {
        return $this->getFactory()
            ->createZedCustomerStub()
            ->findCustomerByExternalReference($customerTransfer);
    }
}
