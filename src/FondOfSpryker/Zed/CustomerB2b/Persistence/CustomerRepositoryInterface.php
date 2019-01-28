<?php

namespace FondOfSpryker\Zed\CustomerB2b\Persistence;

use Generated\Shared\Transfer\CustomerTransfer;
use Spryker\Zed\Customer\Persistence\CustomerRepositoryInterface as SprykerCustomerRepositoryInterface;

interface CustomerRepositoryInterface extends SprykerCustomerRepositoryInterface
{
    /**
     * @param string $customerExternalReference
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer|null
     */
    public function findCustomerByExternalReference(string $customerExternalReference): ?CustomerTransfer;
}
