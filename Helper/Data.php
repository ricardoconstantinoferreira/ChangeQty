<?php

declare(strict_types=1);

namespace Ferreira\ChangeQty\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{

    public const SPECIAL_PRODUCT_SKU = 'ferreira_changeprice/general/special_product_sku';

    /**
     * Get value key google api
     *
     * @return string
     */
    public function getSpecialProductSku(): string
    {
        $result = $this->scopeConfig->getValue(self::SPECIAL_PRODUCT_SKU, ScopeInterface::SCOPE_STORE);
        return (empty($result)) ? "" : $result;
    }
}
