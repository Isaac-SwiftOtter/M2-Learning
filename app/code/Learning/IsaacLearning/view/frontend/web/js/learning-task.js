define([
    'jquery'
], function ($) {
    return function taskSaved() {
        $("#save-button").click(function () {
            alert("Confirm saving new task?");
        })
    }
});