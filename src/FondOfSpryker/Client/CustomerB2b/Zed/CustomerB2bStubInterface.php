<?php

namespace FondOfSpryker\Client\CustomerB2b\Zed;

use Generated\Shared\Transfer\CustomerResponseTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use Spryker\Client\Customer\Zed\CustomerStubInterface as SprykerCustomerStubInterface;

interface CustomerB2bStubInterface extends SprykerCustomerStubInterface
{
    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerResponseTransfer
     */
    public function findCustomerByExternalReference(CustomerTransfer $customerTransfer): CustomerResponseTransfer;
}
