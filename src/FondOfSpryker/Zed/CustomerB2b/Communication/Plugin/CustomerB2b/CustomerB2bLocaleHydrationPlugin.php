<?php

declare(strict_types = 1);

namespace FondOfSpryker\Zed\CustomerB2b\Communication\Plugin\CustomerB2b;

use FondOfSpryker\Zed\CustomerB2b\Dependency\Plugin\CustomerB2bHydrationPluginInterface;
use Generated\Shared\Transfer\CustomerTransfer;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method \FondOfSpryker\Zed\CustomerB2b\Business\CustomerB2bFacade getFacade()
 * @method \FondOfSpryker\Zed\CustomerB2b\Communication\CustomerB2bCommunicationFactory getFactory()
 */
class CustomerB2bLocaleHydrationPlugin extends AbstractPlugin implements CustomerB2bHydrationPluginInterface
{
    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    public function hydrate(CustomerTransfer $customerTransfer): CustomerTransfer
    {
        if ($customerTransfer->getFkLocale() === null) {
            return $customerTransfer;
        }

        $customerTransfer->setLocale(
            $this->getFactory()->getOriginalLocaleFacade()->getLocaleById($customerTransfer->getFkLocale())
        );

        return $customerTransfer;
    }
}
