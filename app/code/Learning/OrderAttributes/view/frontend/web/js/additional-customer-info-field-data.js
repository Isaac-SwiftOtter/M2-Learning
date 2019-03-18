define([
    'jquery'
], function ($) {
    'use strict';

    return {
        customerInfoFieldConfigId: function (config) {
            console.log(config.attributeFieldDataConfigId);
            return config.attributeFieldDataConfigId;
        },

        customerInfoFieldId: function (config) {
            console.log(config.attributeFieldDataId);
            return config.attributeFieldDataId;
        }
    }
});