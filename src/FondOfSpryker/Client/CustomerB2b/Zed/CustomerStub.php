<?php

namespace FondOfSpryker\Client\CustomerB2b\Zed;

use Generated\Shared\Transfer\CustomerResponseTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use Spryker\Client\Customer\Zed\CustomerStub as SprykerCustomerStub;

class CustomerStub extends SprykerCustomerStub implements CustomerStubInterface
{
    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerResponseTransfer
     */
    public function findCustomerByExternalReference(CustomerTransfer $customerTransfer): CustomerResponseTransfer
    {
        /** @var \Generated\Shared\Transfer\CustomerResponseTransfer $customerResponseTransfer */
        $customerResponseTransfer = $this->zedStub->call('/customer/gateway/find-customer-by-external-reference', $customerTransfer);

        return $customerResponseTransfer;
    }
}
