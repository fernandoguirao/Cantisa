
  // Debugger function to display information in the browser's console.
  function _debug(type, msg) {

    if (window.console) {

      if (type === "error") {

        if (window.console.error) {
          window.console.error(msg);
        } else {
          window.console.log("ERROR: " + msg);
        }

      } else if (type === "warn") {

        if (window.console.warn) {
          window.console.warn(msg);
        } else {
          window.console.log("WARN: " + msg);
        }

      } else if (type === "info") {

        if (window.console.info) {
          window.console.info(msg);
        } else {
          window.console.log("INFO: "+msg);
        }

      } else if (type === "log") {
        window.console.log(msg);
      }

    }

  }
