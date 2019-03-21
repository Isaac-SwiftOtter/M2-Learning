define([
    'jquery'
], function ($) {
    'use strict';

    return {
        customerAttributeFieldCodes: function (config) {
            console.log(config.attributeFieldIds);
            return config.attributeFieldDataConfigId;
        },

        customerAttributeFieldNames: function (config) {
            console.log(config.attributeFieldNames);
            return config.attributeFieldDataId;
        }

        // configValueAttributeFieldNames : function (config) {
        //     return config.attributeFieldNames;
        // },
        //
        // configValueAttributeFieldCodes : function (config) {
        //     return config.attributeFieldCodes
        // }
    }
});