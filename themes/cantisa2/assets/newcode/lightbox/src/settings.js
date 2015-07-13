
        // Settings
        // ========
        settings: {

          // Data Settings
          // -------------
          // The data for the plugin can either be provided directly via the `data` attribute,
          // or via JSON by defining the URL in the `api` attribute below. The data structure is
          // the same for both data sources. It consists of `deck` objects with the following structure:
          //
          //     [
          //       { // deck with id 1
          //         id: 1, items: [
          //           { img: "img/1.jpg", width: 1000, height: 700, caption: "lorem ipsum 1" },
          //           { img: "img/2.jpg", width: 1300, height: 666, caption: "lorem ipsum 2" }
          //         ]
          //       },
          //       { // deck with id 2
          //         id: 2, items: [
          //           { img: "img/1.jpg", width: 1000, height: 700, caption: "lorem ipsum 1", thumb: "img/1-thumb.jpg", thumbcaption: "thumb 1" },
          //           { img: "img/2.jpg", width: 1300, height: 666, caption: "lorem ipsum 2", thumb: "img/2-thumb.jpg", thumbcaption: "thumb 2" }
          //         ]
          //       },
          //       // additional decks ...
          //     ]
          //
          // Each deck needs to have a unique `id` attribute (to later be callable), as well as an
          // `items` array. An item may have the following attributes:
          // * `img` the path to the image (required)
          // * `width` and `height` of the image, necessary to resize
          //    the *lightbox module* according to the image's aspect ratio (required)
          // * `caption` the image description (optional)
          // * `thumb` an image for the *index module*, otherwise `img` is used (optional)
          // * `thumbcaption` a description for the *index module* (optional)
          data:                             [],
          api:                              null,


          // General Settings
          // ----------------
          // *General settings that are not specific to the index or lightbox module.*

          // Whether debug information should be displayed.
          debug:                            false,

          // How the plugin resizes itself. The `resize` attribute may take one
          // of the following values:
          // * `"smartresize"` debounced resizing for better performance
          // * `true` resize the plugin on every window resize event
          // * `false` to deactivate auto-resize, in case you are triggering
          //    the resizing of the plugin within your own code by calling
          //    `$.ScalableLightbox("resize");`
          resize:                           "smartresize",

          // Whether the plugin should react to hashes on pageload and also change the
          // URL accordingly, if the *index or lightbox module* is called.
          hash:                             true,

          // The base path for image URL's. If the variable is set, the `baseImgPath` will
          // be placed in front of all `img` and `thumb` paths of every deck. **Attention:**
          // Please provide a slash at the end of the path.
          baseImgPath:                      "",



          // Index Module Settings
          // ---------------------
          // *Settings related to the functionality of the index module.*
          index: {
            // Whether the *index module* is activated.
            enabled:                        true,

            // If the *index module* is displayed on top of an overlay div.
            overlay:                        true,

            // The layout of the thumbs, valid values are `"float"` and `"masonry"`.
            // For the masonry option, you need to include the masonry plugin.
            layout:                         "float",

            thumb: {
              // Whether thumbs themselves have an overlay.
              overlay:                      true,

              // The width of a thumbnail (the height is calculated automatically
              // out of the `width` and `height` of the corresponding deck item).
              width:                        280,

              // What should be displayed as a caption of the thumb. Valid attributes are:
              // * `"none"` no caption is displayed
              // * `"caption"` the caption of the data item is displayed
              // * `"thumbcaption"` the thumb caption of the data item is used
              // * `"number"` the number of the item is displayed (e.g. 2 / 10)
              //    according to `captionNumberFmt` below
              caption:                      "number",

              // In case `caption` is set to `"number"`, how the number should be
              // displayed. Use `%n%` to display the thumbs position and `%total%`
              // to show the total items in the current deck. For example, `"%n% of %total%"`,
              // will display: *1 of 10*, *2 of 10*, etc.
              captionNumberFmt:             "%n% / %total%",

              // The position of the caption. Valid attributes are:
              // * `"above"` above the thumb (use `captionVerticalMargin` for vertical spacing)
              // * `"top"` at the top border of the thumb
              // * `"center"` at the center of the thumb
              // * `"bottom"` at the bottom of the thumb
              // * `"below"` below the thumb (use `captionVerticalMargin` for vertical spacing)
              captionPosition:              "below",

              // The margin to the thumbnail, in case a caption is positioned
              // `"above"` or `"below"`.
              captionVerticalMargin:        5
            },

            controls: {
              // Whether a click or touch outside an index element as well as
              // ESC key closes the *index module*.
              close:                        true
            }
          },


          // Lightbox Module Settings
          // ------------------------
          // *Settings related to the functionality of the lightbox module.*
          lightbox: {
            // Whether the *lightbox module* is activated.
            enabled:                        true,

            // If the *lightbox module* is displayed on top of an overlay div.
            overlay:                        true,

            // The padding for the lightbox images to the browser window. The values
            // are divided by 2, to have an equal padding on each side.
            padding: {
              horizontal:                   100,
              vertical:                     100,

              // The paddings for window width's below 450 pixel, or window height's
              // below 400 pixel.
              horizontalMobile:             50,
              verticalMobile:               50,
            },

            // There are three caption positions provided (left, center, right)
            // for the lightbox. Valid attributes are:
            // * `"none"` no caption is displayed
            // * `"caption"` the caption of the data item is displayed
            // * `"thumbcaption"` the thumbcaption of the data item is used
            // * `"number"` the number of the item is displayed (e.g. 2 / 10)
            //    according to `captionNumberFmt`
            // * `index` a link to the *index module* (if enabled) is displayed,
            //    change the link text, by changing `captionIndexTxt` accordingly
            img: {
              captionLeft:                  "index",
              captionCenter:                "caption",
              captionRight:                 "number",
              captionNumberFmt:             "%n% / %total%",
              captionIndexTxt:              "Index",

              // The position of the caption. Valid attributes are:
              // * `"above"` above the lightbox (use `captionVerticalMargin` for spacing)
              // * `"top"` at the top border of the lightbox
              // * `"center"` at the center of the lightbox
              // * `"bottom"` at the bottom of the lightbox
              // * `"below"` below the lightbox (use `captionVerticalMargin` for spacing)
              captionPosition:              "below",

              // The margin to the thumbnail, in case a caption is positioned
              // `"above"` or `"below"`.
              captionVerticalMargin:        5
            },

            controls: {
              // Whether a click, touch outside as well as ESC key closes the module.
              close:                        true,

              // Whether click events for moving left and right are enabled.
              clicks:                       true,

              // Whether left and right keyboard arrows are used for navigation.
              keys:                         true
            }
          },


          // Callbacks
          // ---------
          // *General callbacks*. These functions are executed every time when a call to
          // a corresponding public function is finished. In order to use nonrecurring callbacks,
          // you may send them along with the call the corresponding public function.
          callbacks: {
            loaded:                         null,
            open:                           null,
            close:                          null,
            resize:                         null
          },


          // Class Names
          // -----------
          // *The CSS class names that are used for the HTML structure of the plugin.*
          // The attribute names should be self explaining, otherwise please study
          // the HTML structure and class names in your browser.
          classNames: {
            clearfix:                       "clearfix",
            pluginActive:                   "sl-active",
            container:                      "sl-container",

            indexOverlay:                   "sl-index-overlay",
            indexWrapper:                   "sl-index-wrapper",
            indexDecksContainer:            "sl-index-decks-container",
            indexDeck:                      "sl-index-deck",
            indexItem:                      "sl-index-item",
            indexItemImg:                   "sl-index-item-img",
            indexItemIndicator:             "sl-index-item-indicator",
            indexItemOverlay:               "sl-index-item-overlay",
            indexItemCaption:               "sl-index-item-caption",
            indexItemCaptionInner:          "sl-index-item-caption-inner",

            lightboxOverlay:                "sl-lightbox-overlay",
            lightboxWrapper:                "sl-lightbox-wrapper",
            lightboxDecksContainer:         "sl-lightbox-decks-container",
            lightboxDeck:                   "sl-lightbox-deck",
            lightboxItem:                   "sl-lightbox-item",
            lightboxItemIndicator:          "sl-lightbox-item-indicator",
            lightboxItemCaptionContainer:   "sl-lightbox-caption-container",
            lightboxIndexLink:              "sl-lightbox-index-link",
            lightboxCursor:                 "sl-lightbox-cursor"
          },


          // Transitions
          // -----------
          // *Durations of transitions used for the different animations of the plugin.*
          transitions: {
            // Duration to fade the index overlay in or out (if activated, see `overlay`
            // attribute of the index settings above).
            fadeInIndexOverlay:             500,
            fadeOutIndexOverlay:            500,

            // Duration to fade the *index module* in or out by calling the
            // `open()` or `close()` functions.
            fadeInIndex:                    500,
            fadeOutIndex:                   500,

            // Duration to fade in a index item once the img or thumb has been loaded.
            fadeInIndexItemLoaded:          250,

            // Duration to fade the lightbox overlay in or out (if activated, see `overlay`
            // attribute of the lightbox settings above).
            fadeInLightboxOverlay:          500,
            fadeOutLightboxOverlay:         500,

            // Duration to fade the *lightbox module* in or out by calling the
            // `open()` or `close()` functions.
            fadeInLightbox:                 500,
            fadeOutLightbox:                500,

            // Duration to fade in a lightbox item once the img has been loaded.
            fadeInLightboxItemLoaded:       250,

            // Duration for the transition from prev image to the next in the lightbox
            fadeLightboxItem:               250
          }

        },
