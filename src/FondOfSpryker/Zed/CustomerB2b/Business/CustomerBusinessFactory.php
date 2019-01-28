<?php

namespace FondOfSpryker\Zed\CustomerB2b\Business;

use FondOfSpryker\Zed\CustomerB2b\Business\Customer\CustomerReader;
use FondOfSpryker\Zed\CustomerB2b\Business\Customer\CustomerReaderInterface;
use Spryker\Zed\Customer\Business\CustomerBusinessFactory as SprykerCustomerBusinessFactory;

/**
 * @method \FondOfSpryker\Zed\CustomerB2b\CustomerConfig getConfig()
 * @method \FondOfSpryker\Zed\CustomerB2b\Persistence\CustomerRepositoryInterface getRepository()
 */
class CustomerBusinessFactory extends SprykerCustomerBusinessFactory
{
    /**
     * @return \Spryker\Zed\Customer\Business\Customer\CustomerReaderInterface
     */
    public function createFondOfCustomerReader(): CustomerReaderInterface
    {
        return new CustomerReader(
            $this->getEntityManager(),
            $this->getRepository(),
            $this->createAddress()
        );
    }
}
