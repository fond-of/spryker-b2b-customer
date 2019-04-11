<?php

declare(strict_types = 1);

namespace FondOfSpryker\Zed\CustomerB2b\Business;

use FondOfSpryker\Zed\CustomerB2b\Business\CustomerB2b\CustomerB2bPluginExecutorInterface;
use FondOfSpryker\Zed\CustomerB2b\Business\CustomerB2b\CustomerB2bReader;
use FondOfSpryker\Zed\CustomerB2b\Business\CustomerB2b\CustomerB2bReaderInterface;
use FondOfSpryker\Zed\CustomerB2b\CustomerB2bDependencyProvider;
use Spryker\Zed\Customer\Business\CustomerBusinessFactory as SprykerCustomerBusinessFactory;
use Spryker\Zed\Locale\Business\LocaleFacadeInterface;
use FondOfSpryker\Zed\CustomerB2b\Business\CustomerB2b\CustomerB2bPluginExecutor;

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
        return new CustomerB2bReader(
            $this->getEntityManager(),
            $this->getRepository(),
            $this->createAddress(),
            $this->createCustomerB2bPluginExecutor()
        );
    }

    /**
     * @return \FondOfSpryker\Zed\CustomerB2b\Business\CustomerB2b\CustomerB2bPluginExecutorInterface
     */
    protected function createCustomerB2bPluginExecutor(): CustomerB2bPluginExecutorInterface
    {
        return new CustomerB2bPluginExecutor(
            $this->getCustomerB2bHydrationPlugins()
        );
    }

    /**
     * @return \FondOfSpryker\Zed\CustomerB2b\Dependency\Plugin\CustomerB2bHydrationPluginInterface[]
     */
    protected function getCustomerB2bHydrationPlugins(): array
    {
        return $this->getProvidedDependency(CustomerB2bDependencyProvider::CUSTOMER_HYDRATION_PLUGINS);
    }

    /**
     * @return \Spryker\Zed\Locale\Business\LocaleFacadeInterface
     */
    public function getOriginalLocaleFacade(): LocaleFacadeInterface
    {
        return $this->getProvidedDependency(CustomerB2bDependencyProvider::LOCALE_FACADE_ORIGINAL);
    }
}
