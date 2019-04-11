<?php

declare(strict_types = 1);

namespace FondOfSpryker\Zed\CustomerB2b\Business;

use Generated\Shared\Transfer\CustomerResponseTransfer;
use Spryker\Zed\Customer\Business\CustomerFacade as SprykerCustomerFacade;

/**
 * @method \FondOfSpryker\Zed\CustomerB2b\Business\CustomerB2bBusinessFactory getFactory()
 * @method \FondOfSpryker\Zed\CustomerB2b\Persistence\CustomerB2bRepositoryInterface getRepository()
 */
class CustomerB2bFacade extends SprykerCustomerFacade implements CustomerB2bFacadeInterface
{
    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param string $customerExternalReference
     *
     * @return \Generated\Shared\Transfer\CustomerResponseTransfer
     */
    public function findCustomerByExternalReference(string $customerExternalReference): CustomerResponseTransfer
    {
        return $this->getFactory()
            ->createFondOfCustomerReader()
            ->findCustomerByExternalReference($customerExternalReference);
    }

    /**
     * @param string $customerReference
     *
     * @return \Generated\Shared\Transfer\CustomerResponseTransfer
     */
    public function findCustomerByReference(string $customerReference): CustomerResponseTransfer
    {
        return $this->getFactory()
            ->createFondOfCustomerReader()
            ->findCustomerByReference($customerReference);
    }
}
