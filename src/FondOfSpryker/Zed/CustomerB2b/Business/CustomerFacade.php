<?php

namespace FondOfSpryker\Zed\CustomerB2b\Business;

use Generated\Shared\Transfer\CustomerResponseTransfer;
use Spryker\Zed\Customer\Business\CustomerFacade as SprykerCustomerFacade;

/**
 * @method \FondOfSpryker\Zed\CustomerB2b\Business\CustomerBusinessFactory getFactory()
 * @method \FondOfSpryker\Zed\CustomerB2b\Persistence\CustomerRepositoryInterface getRepository()
 */
class CustomerFacade extends SprykerCustomerFacade implements CustomerFacadeInterface
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
}
