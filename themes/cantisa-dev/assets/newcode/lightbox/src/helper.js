
        // Helper Methods
        // ==============

        // Debug Method
        // ------------
        // **Private method**. Internal debug method that augments
        // the closure `_debug` function. Whether information is displayed
        // in the browser's console, depends on `debug` setting.
        _debug: function(type, msg) {

          if (this.options.debug) {
            _debug(type, msg);
          }

        },


        // Capitalize Method
        // -----------------
        // **Private method** to capitalize first char of a string.
        _capitalize: function(string) {
          return string.charAt(0).toUpperCase() + string.slice(1);
        },


        // Create Masonry Method
        // ---------------------
        // **Private method** to create a masonry if `layout` of the
        // *index module* settings is set to `masonry` and the masonry
        // plugin is present.
        _createMasonry: function() {

          var self = this,
              classNames = this.options.classNames,
              func = function() {
                self.$indexDecksContainer
                  .find("." + classNames.indexDeck)
                  .addClass("masonry")
                  .masonry({
                    itemSelector:   "." + classNames.indexItem,
                    isFitWidth:     true,
                    isResizable:    false
                  });

                self.initMasonry = true;
              };

          if (typeof window.define === "function" && window.define.amd) {

            require(["masonry"], function() {
              func();
            }, function() {
              self._debug("error", "Masonry is activated, however the " +
              "jQuery Masonry plugin via requirejs is missing!");
            });

          } else if ($.fn.masonry &&
              this.options.index.layout === "masonry") {

            func();

          } else if (this.options.index.layout === "masonry") {

            this._debug("error", "Masonry is activated, however the " +
              "jQuery Masonry plugin is missing!");

          }

        }