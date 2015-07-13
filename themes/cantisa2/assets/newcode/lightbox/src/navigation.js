
        // Navigation Methods
        // ==================

        // Prev Method
        // -----------
        // **Public method**, for navigating to the previous
        // item of the currently displayed lightbox. Invoke
        // by calling `$.ScalableLightbox("prev");`
        prev: function() {
          this._navigateTo("prev");
        },


        // Next Method
        // -----------
        // **Public method**, for navigating to the next
        // item of the currently displayed lightbox. Invoke
        // by calling `$.ScalableLightbox("next");`
        next: function() {
          this._navigateTo("next");
        },


        // Goto Method
        // -----------
        // **Public method**, for navigating to the i-th
        // item (starting at 0) of the currently displayed lightbox.
        // Invoke by calling `$.ScalableLightbox("goto", index);`
        // If the number is higher then the total items in the current
        // deck, it navigates to the last item.
        goto: function(index) {
          this._navigateTo(index);
        },


        // Navigate To Method
        // -----------------
        // **Private method**, that does the heavy lifting
        // for the previously defined, public methods.
        _navigateTo: function(direction) {

          var self = this,
              prev = 0,
              next = 0,
              classNames  = this.options.classNames,
              transitions = this.options.transitions;


          if (this.currentBlocking) {
            return false;
          }

          if (!this.options.lightbox.enabled) {
            return false;
          }

          // if the lightbox is not active, no navigation method can be used
          if (this.lightboxState !== "opened") {
            this._debug("info", "The lightbox module has to be active (displayed) " +
              "when using a navigation method!");

            return false;
          }

          // Prevent navigation left/right if there is only one item.
          if (typeof direction === "string" &&
              this.currentDeck.items.length === 1) {
            return false;
          }

          this.currentBlocking = true;

          if (typeof direction === "number") {

            next = direction;
            prev = this.$lightboxDecksContainer
              .find("#" + classNames.lightboxDeck +
                    "-" + this.currentDeck.id + " " +
                    "." + classNames.lightboxItem +
                    ".fadein")
              .index();

            // if number is below zero or larger then total items
            // go to the last item in the current deck
            if (next >= this.currentDeck.items.length ||
                next < 0) {
              next = this.currentDeck.items.length - 1;
            }

            if (prev === next) {
              prev = -1;
            }

          } else if (direction === "prev") {

            next = this.currentIndex - 1;
            prev = this.currentIndex;


            if (next < 0) {
              next = this.currentDeck.items.length - 1;
              prev = 0;
            }

          } else if (direction === "next") {

            next = this.currentIndex + 1;
            prev = next - 1;

            if (next === this.currentDeck.items.length) {
              prev = this.currentDeck.items.length - 1;
              next = 0;
            }

          }

          this.currentIndex = next;

          if (prev >= 0) {

            this.$lightboxDecksContainer
              .find("#" + classNames.lightboxDeck +
                    "-" + this.currentDeck.id + " " +
                    "." + classNames.lightboxItem)
              .eq(prev)
              .fadeOut(transitions.fadeLightboxItem)
              .removeClass("fadein");

          }


          this.$lightboxDecksContainer
            .find("#" + classNames.lightboxDeck +
                  "-" + this.currentDeck.id + " " +
                  "." + classNames.lightboxItem)
            .eq(next)
            .fadeIn(
              transitions.fadeLightboxItem,
              function() {
                self.currentBlocking = false;
              }
            ).addClass("fadein");

          this._adjustLightboxCaption();
          this.resize();
          this._changeHash("lightbox");

        },


        // Adjust Lightbox Caption Method
        // ------------------------------
        // **Private method**, for changing the lightbox captions according
        // to current item.
        _adjustLightboxCaption: function() {

          var captions = this.options.lightbox.img;

          this.$lightboxCaptionLeft.html(
            this._getCaptionTxt("lightbox", captions.captionLeft)
          );

          this.$lightboxCaptionCenter.html(
            this._getCaptionTxt("lightbox", captions.captionCenter)
          );

          this.$lightboxCaptionRight.html(
            this._getCaptionTxt("lightbox", captions.captionRight)
          );

        },


        // Get Caption Text Method
        // -----------------------
        // **Private method**, for getting the correct caption text
        // displayed.
        _getCaptionTxt: function(module, type, data, i, total) {

          var txt = "", caption, thumbcaption;

          if (module === "lightbox") {
            data = this.currentDeck.items[this.currentIndex];
          }

          caption = (typeof data.caption !== "undefined") ?
            data.caption : "";

          thumbcaption = (typeof data.thumbcaption !== "undefined") ?
            data.thumbcaption : caption;


          switch (type) {
          case "index":
            // No *index module* link, if we are at the *index module* or
            // if we are at the *lightbox module*, but the index is not
            // enabled.
            if (module === "index" ||
                !this.options.index.enabled) {
              break;
            }

            txt  = "<a href=\"#\" class=\"";
            txt += this.options.classNames.lightboxIndexLink;
            txt += "\">" + this.options.lightbox.img.captionIndexTxt;
            txt += "</a>";

            break;

          case "number":
            if (module === "index") {

              txt = this.options.index.thumb.captionNumberFmt
                      .replace(/%n%/gi, i + 1)
                      .replace(/%total%/gi, total);

            } else if (module === "lightbox") {

              txt = this.options.lightbox.img.captionNumberFmt
                      .replace(/%n%/gi, this.currentIndex + 1)
                      .replace(/%total%/gi, this.currentDeck.items.length);

            }

            break;

          case "caption":
            txt = caption;

            break;

          case "thumbcaption":
            txt = thumbcaption;

            break;
          }

          return txt;

        },


        // Hash Listener Method
        // --------------------
        // **Private method**, that listens to the URL hash on page load
        // and loads the corresponding *index or lightbox module*.
        _hashListener: function() {

          var regex1, regex2, match1, match2;

          if (this.options.hash) {

            regex1 = /#lightbox\/index\/(\d*)/;
            regex2 = /#lightbox\/(\d*)\/(\d*)/;
            match1 = regex1.exec(window.location.hash);
            match2 = regex2.exec(window.location.hash);

            if (match1) {

              this.open({
                module:   "index",
                deck:     parseInt(match1[1], 10)
              });

            } else if (match2) {

              this.open({
                module:   "lightbox",
                deck:     parseInt(match2[1], 10),
                index:    parseInt(match2[2], 10)
              });

            }

          }

        },


        // Change Hash Method
        // ------------------
        // **Private method**, for changing the hash of the URL according
        // to the currently opened module.
        _changeHash: function(module) {

          if (this.options.hash) {

            if (module === "index") {

              window.location.hash = "#lightbox/index/" + this.currentDeck.id;

            } else if (module === "lightbox") {

              window.location.hash = "#lightbox/" + this.currentDeck.id + "/" +
                this.currentIndex;

            } else if (module === "close") {

              window.location.hash = "";

            }

          }

        },



