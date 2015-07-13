        // Initialisation
        // ==============

        // Init Method
        // -----------
        // **Private method** which is executed initially, when an
        // `options` object is provided as the first argument of the
        // plugin call.
        _init: function(options, cb) {

          var self = this;

          if (this.initPlugin) {
            self._debug("error", "The plugin has already been " +
              "initialized!");

            return false;
          }

          // Merge user defined `options` with default `settings`.
          this.options = $.extend(true, {}, this.settings, options);

          if (!this.options.index.enabled &&
              !this.options.lightbox.enabled) {

            self._debug("error", "Neither the index module, nor the " +
              "lightbox module is enabled!");

          } else {

            // Create the container element, load data and execute
            // user callback at the end.
            this.$container = $("<div />")
              .addClass(this.options.classNames.container);

            $("body").append(this.$container);
            this._loadData(cb);

          }

        },


        // Load Data Method
        // ----------------
        // **Private method** that loads the data (esp. for JSON
        // URL call), builds up the modules HTML structure and
        // executes the callback.
        _loadData: function(cb) {

          var self = this,
              func = function() {
                if (self.options.index.enabled) {
                  self._tmplIndex();
                }

                if (self.options.lightbox.enabled) {
                  self._tmplLightbox();
                }

                self.initPlugin = true;
                self._loadDecks(cb);
                self._bind();

                return true;
              };


          if (this.options.api !== null) {

            $.ajax({
              type:     "GET",
              dataType: "json",
              url:       this.options.api,
              success:  function(json) {
                self._debug("info", "Inserted JSON Stream: ");
                self._debug("info", json);

                self.options.data = self._normalizeData(json);
                func();
              },
              error: function(bug) {
                self._debug("error", "JSON Error occured!");
                self._debug("error", bug);

                return false;
              }
            });

          } else if (this.options.data.length > 0) {

            this.options.data = this._normalizeData(this.options.data);
            func();

          } else {

            this._debug("error", "The data could not be loaded!");

          }

        },


        // Normalize Data Method
        // ---------------------
        // **Private method** used to normalize incoming data, by removing
        // empty or wrongly defined decks and calculating the items image ratios.
        _normalizeData: function(data) {

          var i = 0, j = 0, k = 0,
              totalDecks  = data.length,
              totalItems  = 0,
              deck        = null,
              item        = null,
              removeDecks = [],
              removeItems = [];

          for (i; i < totalDecks; i++) {

            deck = data[i];

            if (typeof deck.id === "undefined" ||
                typeof deck.items === "undefined" ||
                deck.items.length === 0) {

              removeDecks.push(i);

            } else {

              removeItems = [];
              totalItems = deck.items.length;

              for (j = 0; j < totalItems; j++) {

                item = deck.items[j];

                if (typeof item.img    !== "undefined" &&
                    typeof item.width  !== "undefined" &&
                    typeof item.height !== "undefined") {

                  item.ratio  = item.height / item.width;
                  item.loaded = false;

                  if (typeof item.thumb !== "undefined" &&
                      item.thumb !== null) {
                    item.thumbloaded = false;
                  } else {
                    item.thumbloaded = "same";
                  }

                } else {

                  removeItems.push(j);

                }

              }

              // All items have to be removed, therefore remove the whole deck.
              if (removeItems.length === deck.items.length) {

                removeDecks.push(i);

              // Just remove the badly defined items.
              } else {

                removeItems.reverse();
                for (k = 0; k < removeItems.length; k++) {
                  deck.items.splice(removeItems[k], 1);
                }

              }

            }

          }

          // Remove the wrongly defined decks.
          removeDecks.reverse();

          for (k = 0; k < removeDecks.length; k++) {
            data.splice(removeDecks[k], 1);
          }

          return data;

        },


        // Load Decks Method
        // -----------------
        // **Private method** to load the decks and build up their
        // HTML structure.
        _loadDecks: function(cb) {

          var decks = this.options.data,
              totalDecks = decks.length,
              i = 0;

          cb = typeof cb === "function" ? cb : false;

          // Append decks to *index module*.
          if (this.options.index.enabled) {

            for (i = 0; i < totalDecks; i++) {
              this.$indexDecksContainer.append(
                this._tmplIndexDeck(decks[i])
              );

            }

            this._resizeIndex("all");
            this._createMasonry();

          }

          // Append decks to *lightbox module*.
          if (this.options.lightbox.enabled) {

            for (i = 0; i < totalDecks; i++) {
              this.$lightboxDecksContainer.append(
                this._tmplLightboxDeck(decks[i])
              );
            }

          }

          // Initially set deck to the first one.
          this._setDeck(false);
          this._bindClicks();
          this._hashListener();

          if (cb) {
            cb();
          }

          if (typeof this.options.callbacks.loaded === "function") {
            this.options.callbacks.loaded();
          }

        },


        _loadImgs: function(module) {

          var self        = this,
              $indicators = null,
              classNames  = this.options.classNames,
              transitions = this.options.transitions,
              loader = function(item, $img, $indicator, module, mode, src) {

                $indicator.after($img);
                $indicator.hide();

                if (typeof Modernizr !== "undefined" &&
                    Modernizr.csstransitions) {
                  $img.addClass("loaded");
                } else {
                  $img.fadeIn(transitions["fadeIn" + self._capitalize(module) + "ItemLoaded"]);
                }

                if (mode === 1) {

                  item.thumbloaded = true;
                  item.loaded = true;
                  self._debug("info", "Loading image: " + src);

                } else if (mode === 2) {

                  item.thumbloaded = true;
                  self._debug("info", "Loading thumb image: " + src);

                } else if (mode === 3) {

                  item.loaded = true;
                  self._debug("info", "Loading image: " + src);

                }

              };


          if (this.options[module].enabled) {

            $indicators = this["$" + module + "DecksContainer"]
              .find("#" + classNames[module + "Deck"] +
                    "-" + this.currentDeck.id + " " +
                    "." + classNames[module + "ItemIndicator"]);


            if (module === "index") {

              $.each(this.currentDeck.items, function(i, item) {

                var $indicator = $indicators.eq(i),
                    $img = $("<img />"),
                    src;

                // Do not load again when already in the loading queue.
                if (item.thumbloaded === "loading") {
                  return false;
                }


                if (item.thumbloaded === "same") {

                  src = self.options.baseImgPath + item.img;

                  if (item.loaded === true) {

                    $indicator.after($img.attr("src", src));
                    $indicator.hide();

                    if (typeof Modernizr !== "undefined" &&
                        Modernizr.csstransitions) {
                      $img.addClass("loaded");
                    } else {
                      $img.fadeIn(transitions.fadeInIndexItemLoaded);
                    }

                    item.thumbloaded = true;

                    self._debug("info", "Appended already loaded image: " + src);

                  } else {

                    item.thumbloaded = "loading";
                    $img.one("load", function() {
                      loader(item, $img, $indicator, "index", 1, src);
                    }).attr("src", src);

                  }


                } else if (!item.thumbloaded) {

                  src = self.options.baseImgPath + item.thumb;

                  item.thumbloaded = "loading";
                  $img.one("load", function() {
                    loader(item, $img, $indicator, "index", 2, src);
                  }).attr("src", src);

                } else {
                  return false;
                }

              });

            } else if (module === "lightbox") {

              $.each(this.currentDeck.items, function(i, item) {

                var $indicator = $indicators.eq(i),
                    $img = $("<img />"),
                    src = self.options.baseImgPath + item.img;

                if (item.loaded === "loading") {
                  return false;
                }


                if (!item.loaded) {

                  item.loaded = "loading";
                  $img.one("load", function() {
                    loader(item, $img, $indicator, "lightbox", 3, src);
                  }).attr("src", src);

                } else {

                  if ($indicator.parent().find("img").length > 0) {
                    return false;
                  } else {

                    $indicator.after($img.attr("src", src));
                    $indicator.hide();

                    if (typeof Modernizr !== "undefined" &&
                        Modernizr.csstransitions) {
                      $img.addClass("loaded");
                    } else {
                      $img.fadeIn(transitions.fadeInLightboxItemLoaded);
                    }

                    item.loaded = true;

                    self._debug("info", "Appended already loaded image: " + src);
                  }

                }

              });

            }

          }

        },


        // Set Deck Method
        // ---------------
        // **Private method** to find and set the current deck.
        _setDeck: function(deckID) {

          var found = false,
              deck  = null,
              decks = this.options.data,
              totalDecks = decks.length,
              i = 0;

          if (deckID !== false) {

            for (i; i < totalDecks; i++) {

              deck = decks[i];

              if (deck.id === deckID) {
                found = true;
                this.currentDeck = deck;
                break;
              }

            }

          }

          // Set to first deck, if `deckID` not found.
          if (!found) {
            this.currentDeck  = decks[0];
            this.currentIndex = 0;
          }

        },


        // General Methods
        // ===============

        // Open Method
        // -----------
        // **Public method** to open a module or specific item of the plugin.
        // Invoke by calling `$.ScalableLightbox("open", options, callback);`
        // The `options` object may have the following attributes:
        // * `module` the module that should be opened, either `"index"`
        //    or `"lightbox"` (required)
        // * `deck` the ID of deck that should be displayed (required)
        // * `index` which item of the deck should be displayed, only
        //    if the *lightbox module* is opened (optional)
        open: function(options, cb) {

          var self  = this,
              func  = null,
              other = "",
              classNames  = this.options.classNames,
              transitions = this.options.transitions;

          cb = typeof cb === "function" ? cb : false;

          if (this.currentBlocking) {
            return false;
          }

          this.currentBlocking = true;

          options = $.extend(true, {
            module:   "lightbox",
            deck:     false,
            index:    0
          }, options);


          this._setDeck(options.deck);
          this.currentIndex = options.index;

          func = function() {

            self["$" + options.module + "DecksContainer"]
              .find("." + classNames[options.module + "Deck"])
              .hide();

            self["$" + options.module + "DecksContainer"]
              .find("#" + classNames[options.module + "Deck"] +
                    "-" + self.currentDeck.id)
              .show();


            self["$" + options.module + "Wrapper"]
              .fadeIn(
                transitions["fadeIn" + self._capitalize(options.module)],
                function() {

                  self[options.module + "State"] = "opened";
                  self._loadImgs(options.module);
                  self._bind();
                  self._changeHash(options.module);

                  if (options.module === "index") {
                    self.resize();
                  } else {
                    self.currentBlocking = false;
                    self.goto(options.index);
                  }

                  if (cb) {
                    cb();
                  } else if (typeof self.options.callbacks.open === "function") {
                    self.options.callbacks.open(options.module, self.currentDeck.id);
                  }

                }
              );

              $("body").addClass(classNames.pluginActive);

              self.currentBlocking = false;

          };

          if (options.module === "index") {
            other = "lightbox";
          } else {
            other = "index";
          }


          // The requested module is enabled.
          if (this.options[options.module].enabled) {

            if (this[other + "State"] === "opened") {
              this.close();
            }

            if (options.module === "index") {
              this._resizeIndex("current");
            }

            // The opened module has a overlay.
            if (this.options[options.module].overlay) {

              this["$" + options.module + "Overlay"]
                .fadeIn(
                  transitions["fadeIn" + self._capitalize(options.module)  + "Overlay"],
                  func
                );

            } else {

              func();

            }

          } else {

            this._debug("error", "The " + options.module + " module is not activated and can therefore" +
              " not be displayed!");

          }

        },


        // Close Method
        // ------------
        // **Public method** to close the currently opened module.
        // Invoke by calling `$.ScalableLightbox("close", callback);`
        close: function(cb) {

          var self        = this,
              module      = "index",
              classNames  = this.options.classNames,
              transitions = this.options.transitions,
              func        = null;

          cb = typeof cb === "function" ? cb : false;

          if (this.lightboxState === "opened") {

            module = "lightbox";

          } else if (this.indexState === "closed") {

            if (cb) {
              cb();
            }

            this._debug("info", "Nothing could be closed, as " +
              "everything is already closed.");

            return;
          }

          // Unbind global events (keyboard and resize).
          this._bind(true);
          $("body").removeClass(classNames.pluginActive);

          func = function() {

            self["$" + module + "DecksContainer"]
              .find("#" + classNames[module + "Deck"] +
                    "-" + self.currentDeck.id)
              .hide();

            self[module + "State"] = "closed";
            self._changeHash("close");

            if (module === "lightbox") {

              self.$lightboxDecksContainer.css({
                width:       0,
                height:      0,
                marginLeft:  0,
                marginTop:   0
              });

              self.$lightboxDecksContainer
                .find("#" + classNames.lightboxDeck +
                      "-" + self.currentDeck.id + " " +
                      "." + classNames.lightboxItem)
                .hide()
                .removeClass("fadein");


              self.$lightboxCaptionLeft.html("");
              self.$lightboxCaptionCenter.html("");
              self.$lightboxCaptionRight.html("");

            }

            if (self.prevScrollPosition.length === 2) {

              window.scrollTo(
                self.prevScrollPosition[0],
                self.prevScrollPosition[1]
              );

              self.prevScrollPosition = [];
            }

            if (cb) {
              cb();
            } else if (typeof self.options.callbacks.close === "function") {
              self.options.callbacks.close(module, self.currentDeck.id);
            }

          };


          this["$" + module + "Wrapper"]
            .fadeOut(
              transitions["fadeOut" + self._capitalize(module)],
              function() {

                if (self.options[module].overlay) {

                  self["$" + module + "Overlay"]
                    .fadeOut(
                      transitions["fadeOut" + self._capitalize(module) + "Overlay"],
                      func
                    );

                } else {

                  func();

                }
              }
            );

        },


        // Destroy Method
        // --------------
        // **Public method** to destroy the markup and event bindings
        // generated by the plugin. Invoke by calling
        // `$.ScalableLightbox("destroy", callback);`
        destroy: function(cb) {

          cb = typeof cb === "function" ? cb : false;

          // Unbind all events.
          this._bind(true);

          this._bindClicks(true);
          this._bindIndexLink(true);
          this._bindThumbLinks(true);


          // Destroy masonry if it was previously embedded.
          if ($.fn.masonry &&
              this.options.index.layout === "masonry") {

            this.$indexDecksContainer
              .find("." + this.options.classNames.indexDeck)
              .masonry("destroy");

            this.initMasonry = false;
          }

          // Remove all divs that where constructed.
          this.$container.remove();

          // remove body tag (in case it is still present)
          $("body").removeClass(this.options.classNames.pluginActive);


          if (cb) {
            cb();
          }

          this._debug("info", "Plugin has been successfully removed.");

          // Destroy data and set plugin back to not initialized.
          this.options = null;
          this.initPlugin = false;

        },

