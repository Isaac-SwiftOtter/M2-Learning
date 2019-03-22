define([
    'jquery'
], function (
    $
) {
    'use strict';
    
    return {
        orderAttributesFieldsData: function () {
            var orderAttributesFieldValues = window.checkoutConfig.custom_order_attributes_codes;
            var fieldDataArray = [];

            orderAttributesFieldValues.forEach(function (code) {
                var fieldName = "custom_field_" + code;
                fieldDataArray.push(
                    code + " : " + jQuery('[name = ' + fieldName + ']').val()
                )
            });

            return fieldDataArray;
        }
    }
});

