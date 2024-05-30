define([
    'jquery',
    'uiComponent',
    'ko',
    'Ferreira_ChangeQty/js/action/get-special-product',
    'Ferreira_ChangeQty/js/action/update-qty-special-product'
    ], function (
        $,
        Component,
        ko,
        getSpecialProduct,
        updateQtySpecialProduct
    ) {
        'use strict';
        return Component.extend({

            sku: ko.observable(),
            title: ko.observable(),
            price: ko.observable(),
            image: ko.observable(),
            qty: ko.observable(),
            isEdit: ko.observable(false),
            visible: ko.observable(true),

            initialize: function () {
                this._super();
                this.getSpecialProduct();
                this.edit();
                this.cancel();
                this.update();
            },

            getSpecialProduct: function() {
                let self = this;
                getSpecialProduct().done(function(res) {
                    let result = JSON.parse(res);

                    if (result.length == 0) {
                        self.visible(false);
                        return;
                    }

                    self.title(result.title);
                    self.price(result.price);
                    self.qty(result.qty);
                    self.image(result.image);
                    self.sku(result.sku);
                });
            },

            edit: function() {
                let self = this;
                $(document).on("click", "#edit", function() {
                    self.isEdit(true);
                });
            },

            cancel: function() {
                let self = this;
                $(document).on("click", "#cancel", function() {
                    self.isEdit(false);
                });
            },

            update: function() {
                let self = this;
                $(document).on("click", "#update", function() {
                    let qty = $("input#qty").val();
                    let sku = $("input#sku").val();

                    if (qty == "") {
                        return;
                    }

                    updateQtySpecialProduct(qty, sku).done(function(result) {
                        self.qty(result);
                        self.isEdit(false);
                    });
                });
            }
        });
    }
);
