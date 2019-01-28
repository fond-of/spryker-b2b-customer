<?php

namespace FondOfSpryker\Zed\CustomerB2b\Business\Customer;

use Generated\Shared\Transfer\CustomerResponseTransfer;
use Spryker\Zed\Customer\Business\Customer\CustomerReaderInterface as SprykerCustomerReaderInterface;

interface CustomerReaderInterface extends SprykerCustomerReaderInterface
{
    /**
     * @param string $customerExternalReference
     *
     * @return \Generated\Shared\Transfer\CustomerResponseTransfer
     */
    public function findCustomerByExternalReference(string $customerExternalReference): CustomerResponseTransfer;
}
