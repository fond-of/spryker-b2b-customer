<?php

declare(strict_types = 1);

namespace FondOfSpryker\Zed\CustomerB2b\Business\CustomerB2b;

use Generated\Shared\Transfer\CustomerResponseTransfer;
use Spryker\Zed\Customer\Business\Customer\CustomerReaderInterface as SprykerCustomerReaderInterface;

interface CustomerB2bReaderInterface extends SprykerCustomerReaderInterface
{
    /**
     * @param string $customerExternalReference
     *
     * @return \Generated\Shared\Transfer\CustomerResponseTransfer
     */
    public function findCustomerByExternalReference(string $customerExternalReference): CustomerResponseTransfer;
}
