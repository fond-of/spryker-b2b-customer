<?php

namespace FondOfSpryker\Zed\CustomerB2b\Business;

use FondOfSpryker\Zed\CustomerB2b\Business\CustomerB2b\CustomerB2BReader;
use FondOfSpryker\Zed\CustomerB2b\Business\CustomerB2b\CustomerB2bReaderInterface;
use Spryker\Zed\Customer\Business\CustomerBusinessFactory as SprykerCustomerBusinessFactory;

/**
 * @method \FondOfSpryker\Zed\CustomerB2b\CustomerB2bConfig getConfig()
 * @method \FondOfSpryker\Zed\CustomerB2b\Persistence\CustomerB2bRepositoryInterface getRepository()
 * @method \FondOfSpryker\Zed\CustomerB2b\Persistence\CustomerB2bEntityManagerInterface getEntityManager()
 * @method \FondOfSpryker\Zed\CustomerB2b\Persistence\CustomerB2bQueryContainerInterface getQueryContainer()
 */
class CustomerB2bBusinessFactory extends SprykerCustomerBusinessFactory
{
    /**
     * @return \FondOfSpryker\Zed\CustomerB2b\Business\CustomerB2b\CustomerB2bReaderInterface
     */
    public function createFondOfCustomerReader(): CustomerB2bReaderInterface
    {
        return new CustomerB2BReader(
            $this->getEntityManager(),
            $this->getRepository(),
            $this->createAddress()
        );
    }
}
