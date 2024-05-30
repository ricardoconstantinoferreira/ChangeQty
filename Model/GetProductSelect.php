<?php

declare(strict_types=1);

namespace Ferreira\ChangeQty\Model;

use Magento\Framework\Pricing\Helper\Data as PriceData;
use Magento\InventorySalesAdminUi\Model\GetSalableQuantityDataBySku;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Serialize\Serializer\Json;
use Ferreira\ChangeQty\Api\GetProductSelectInterface;
use Ferreira\ChangeQty\Helper\Data as DataHelper;

class GetProductSelect implements GetProductSelectInterface
{
    /**
     * @param PriceData $priceData
     * @param GetSalableQuantityDataBySku $getSalableQuantityDataBySku
     * @param ProductRepositoryInterface $productRepository
     * @param Json $json
     * @param DataHelper $dataHelper
     */
    public function __construct(
        private PriceData $priceData,
        private GetSalableQuantityDataBySku $getSalableQuantityDataBySku,
        private ProductRepositoryInterface $productRepository,
        private Json $json,
        private DataHelper $dataHelper
    ) {}

    /**
     * Get values special product
     *
     * @return string
     * @throws NoSuchEntityException
     */
    public function execute(): string
    {
        try {
            $data = [];
            $skuSpecial = $this->dataHelper->getSpecialProductSku();

            if (!empty($skuSpecial)) {
                $product = $this->productRepository->get($skuSpecial);
                $dataQty = $this->getSalableQuantityDataBySku->execute($skuSpecial);

                $data['sku'] = $skuSpecial;
                $data['title'] = $product->getName();
                $data['price'] = $this->priceData->currency($product->getPrice(), true , false);
                $data['image'] = "pub/media/catalog/product/".$product->getData('image');
                $data['qty'] = current($dataQty)['qty'];
            }

            return $this->json->serialize($data);
        } catch (\Exception $e) {
            throw new NoSuchEntityException(__($e->getMessage()));
        }
    }
}
