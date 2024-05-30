<?php

declare(strict_types=1);

namespace Ferreira\ChangeQty\Api;

interface UpdateQtyProductSelectInterface
{

    /**
     * Update qty product
     *
     * @api
     *
     * @param int $qty
     * @param string $sku
     * @return int
     */
    public function execute(int $qty, string $sku): int;
}
