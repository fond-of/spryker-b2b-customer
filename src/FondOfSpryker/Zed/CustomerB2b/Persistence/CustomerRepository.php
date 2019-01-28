<?php

namespace FondOfSpryker\Zed\CustomerB2b\Persistence;

use Generated\Shared\Transfer\CustomerTransfer;
use Spryker\Zed\Customer\Persistence\CustomerRepository as SprykerCustomerRepository;

/**
 * @method \Spryker\Zed\Customer\Persistence\CustomerPersistenceFactory getFactory()
 */
class CustomerRepository extends SprykerCustomerRepository implements CustomerRepositoryInterface
{
    /**
     * @param string $customerExternalReference
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer|null
     */
    public function findCustomerByExternalReference(string $customerExternalReference): ?CustomerTransfer
    {
        $customerEntity = $this->getFactory()->createSpyCustomerQuery()->findOneByExternalReference($customerExternalReference);

        if ($customerEntity === null) {
            return null;
        }

        return $this->getFactory()
            ->createCustomerMapper()
            ->mapCustomerEntityToCustomer($customerEntity->toArray());
    }
}
