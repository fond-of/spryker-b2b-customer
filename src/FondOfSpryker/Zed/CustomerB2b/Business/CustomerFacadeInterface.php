<?php

namespace FondOfSpryker\Zed\CustomerB2b\Business;

use Generated\Shared\Transfer\CustomerResponseTransfer;
use Spryker\Zed\Customer\Business\CustomerFacadeInterface as SprykerCustomerFacadeInterface;

interface CustomerFacadeInterface extends SprykerCustomerFacadeInterface
{
    /**
     * @api
     *
     * @param string $customerExternalReference
     *
     * @return \Generated\Shared\Transfer\CustomerResponseTransfer
     */
    public function findCustomerByExternalReference(string $customerExternalReference): CustomerResponseTransfer;
}
