<?php

declare(strict_types=1);

namespace Ferreira\ChangeQty\Model;

use Magento\CatalogInventory\Api\StockRegistryInterface;
use Ferreira\ChangeQty\Api\UpdateQtyProductSelectInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\InventorySalesAdminUi\Model\GetSalableQuantityDataBySku;

class UpdateQtyProductSelect implements UpdateQtyProductSelectInterface
{

    /**
     * @param StockRegistryInterface $stockRegistry
     * @param GetSalableQuantityDataBySku $getSalableQuantityDataBySku
     */
    public function __construct(
        private StockRegistryInterface $stockRegistry,
        private GetSalableQuantityDataBySku $getSalableQuantityDataBySku
    ) {}

    /**
     * Update qty product
     *
     * @param int $qty
     * @param string $sku
     * @return int
     * @throws NoSuchEntityException
     */
    public function execute(int $qty, string $sku): int
    {
        try {
            $stockItem = $this->stockRegistry->getStockItemBySku($sku);
            $stockItem->setQty($qty);
            $this->stockRegistry->updateStockItemBySku($sku, $stockItem);

            $dataQty = $this->getSalableQuantityDataBySku->execute($sku);

            return (int)current($dataQty)['qty'];
        } catch (\Exception $e) {
            throw new NoSuchEntityException(__($e->getMessage()));
        }
    }
}
