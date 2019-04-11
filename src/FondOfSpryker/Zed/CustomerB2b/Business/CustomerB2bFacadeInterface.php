<?php

declare(strict_types = 1);

namespace FondOfSpryker\Zed\CustomerB2b\Business;

use Generated\Shared\Transfer\CustomerResponseTransfer;
use Spryker\Zed\Customer\Business\CustomerFacadeInterface as SprykerCustomerFacadeInterface;

interface CustomerB2bFacadeInterface extends SprykerCustomerFacadeInterface
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
