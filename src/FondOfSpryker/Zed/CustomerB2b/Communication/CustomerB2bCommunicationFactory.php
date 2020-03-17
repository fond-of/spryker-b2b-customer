<?php

declare(strict_types = 1);

namespace FondOfSpryker\Zed\CustomerB2b\Communication;

use FondOfSpryker\Zed\CustomerB2b\CustomerB2bDependencyProvider;
use Spryker\Zed\CustomerGroup\Communication\CustomerGroupCommunicationFactory as SprykerCustomerCommunicationFactory;
use Spryker\Zed\Locale\Business\LocaleFacadeInterface;

/**
 * @method \FondOfSpryker\Zed\CustomerB2b\CustomerB2bConfig getConfig()
 * @method \FondOfSpryker\Zed\CustomerB2b\Persistence\CustomerB2bRepositoryInterface getRepository()
 * @method \FondOfSpryker\Zed\CustomerB2b\Business\CustomerB2bFacadeInterface getFacade()
 * @method \FondOfSpryker\Zed\CustomerB2b\Persistence\CustomerB2bQueryContainer getQueryContainer()
 */
class CustomerB2bCommunicationFactory extends SprykerCustomerCommunicationFactory
{
    /**
     * @throws
     *
     * @return \Spryker\Zed\Locale\Business\LocaleFacadeInterface
     */
    public function getOriginalLocaleFacade(): LocaleFacadeInterface
    {
        return $this->getProvidedDependency(CustomerB2bDependencyProvider::LOCALE_FACADE_ORIGINAL);
    }
}
