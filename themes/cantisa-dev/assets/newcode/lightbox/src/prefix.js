;(function(factory) {

  /* jshint strict: false */

  if (typeof define === "function" && define.amd) {

    // AMD. Register as an anonymous module.
    define(["jquery"], factory($, window));

  } else {

    // Browser globals.
    factory(jQuery, window);

  }

}(function($, window, undefined) {

  "use strict";