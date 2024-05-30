define([
    'mage/storage'
], function(storage) {
    'use strict';

    return function () {
        return storage.get(
            '/rest/V1/product-select/get-product-select/',
            false
        );
    }
});
