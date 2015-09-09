      };

      $.data(document.body, "ScalableLightbox", instance);
    }


    // Plugin Bridge
    // =============

    // Method Call
    // -----------
    // Check if the called method is available and that it is not a private method.
    if (typeof options === "string") {

      args = Array.prototype.slice.call(arguments, 1);


      if (!$.isFunction(instance[options]) || options.charAt(0) === "_") {

        _debug("error", "No such method '" + options + "' exists!");

      } else {

        if (instance.initPlugin) {
          return instance[options].apply(instance, args);
        } else {
          _debug("error", "Method '" + options + "' called prior to plugin initialization!");
        }


      }

    // Initial Call
    // -----------
    // In case the options parameter is an object, it is passed to the `_init` function.
    } else {

      return instance._init(
        options, (typeof arguments[1] !== "undefined") ? arguments[1] : false
      );

    }

  };
