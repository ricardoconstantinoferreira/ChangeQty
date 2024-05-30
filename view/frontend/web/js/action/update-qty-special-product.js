define([
    'mage/storage'
], function(storage) {
    'use strict';

    return function (qty, sku) {
        return storage.put(
            '/rest/V1/product-select/update-qty-product-select/',
            JSON.stringify({
                qty: qty,
                sku: sku
            }),
            false
        );
    }
});
