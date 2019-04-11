<?php

declare(strict_types = 1);

namespace FondOfSpryker\Zed\CustomerB2b;

use FondOfSpryker\Zed\CustomerB2b\Communication\Plugin\CustomerB2b\CustomerB2bLocaleHydrationPlugin;
use Pyz\Zed\Customer\CustomerDependencyProvider as PyzCustomerDependencyProvider;
use Spryker\Zed\Kernel\Container;

/**
 * @method \FondOfSpryker\Zed\CustomerB2b\CustomerB2bConfig getConfig()
 */
class CustomerB2bDependencyProvider extends PyzCustomerDependencyProvider
{
    public const CUSTOMER_HYDRATION_PLUGINS = 'CUSTOMER_HYDRATION_PLUGINS';
    public const LOCALE_FACADE_ORIGINAL = 'LOCALE_FACADE_ORIGINAL';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);

        $container = $this->addCustomerB2bHydrationPlugins($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideCommunicationLayerDependencies(Container $container): Container
    {
        $container = parent::provideCommunicationLayerDependencies($container);

        $container = $this->addOriginalLocaleFacade($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addCustomerB2bHydrationPlugins(Container $container): Container
    {
        $container[self::CUSTOMER_HYDRATION_PLUGINS] = function () {
            return $this->getCustomerB2bHydrationPlugins();
        };

        return $container;
    }

    /**
     * @return \FondOfSpryker\Zed\CustomerB2b\Dependency\Plugin\CustomerB2bHydrationPluginInterface[]
     */
    protected function getCustomerB2bHydrationPlugins(): array
    {
        return [
            new CustomerB2bLocaleHydrationPlugin(),
        ];
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addOriginalLocaleFacade(Container $container): Container
    {
        $container[self::LOCALE_FACADE_ORIGINAL] = static function (Container $container) {
            return $container->getLocator()->locale()->facade();
        };

        return $container;
    }
}
