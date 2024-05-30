<?php

declare(strict_types=1);

namespace Ferreira\ChangeQty\Api;

interface GetProductSelectInterface
{

    /**
     * Get values special product
     *
     * @api
     *
     * @return string
     */
    public function execute(): string;
}
