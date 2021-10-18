
/**
 * Transforms a string from the custom syntax of the articles of this project to a html
 * @param {String} text 
 * @returns 
 */
module.exports.beautifyText = function(text) {
  // TODO: format with regex
  const boldSymbol = "**";
  const boldTags = { opening: "<strong>", closing: "</strong>" };
  const linkSymbol = "~~";
  const linkTags = {
    opening: (url) => `<a rel="external" target="_blank" href="${url}">`,
    closing: "</a>",
  };

  let boldIndex = { opening: text.indexOf(boldSymbol), closing: -1 };
  let linkIndex = { opening: text.indexOf(linkSymbol), closing: -1 };

  let ctr = 0;
  while (boldIndex.opening >= 0 || linkIndex.opening >= 0) {
    if (boldIndex.opening >= 0) {
      boldIndex.opening = text.indexOf(boldSymbol);
      boldIndex.closing = text.indexOf(
        boldSymbol,
        boldIndex.opening + boldSymbol.length
      );
    }
    if (linkIndex.opening >= 0) {
      linkIndex.opening = text.indexOf(linkSymbol);
      linkIndex.closing = text.indexOf(
        linkSymbol,
        linkIndex.opening + linkSymbol.length
      );
    }
    if (
      (boldIndex.opening - linkIndex.opening) *
        (boldIndex.closing - linkIndex.opening) *
        (boldIndex.opening - linkIndex.closing) *
        (boldIndex.closing - linkIndex.closing) <
      0
    ) {
      // tags intersect. Not supported
      return '<span style="error">Error when formatting text. Bold and link tags intersect.</span>';
    }

    if (
      boldIndex.closing > 0 &&
      (linkIndex.closing < 0 || boldIndex.closing < linkIndex.closing)
    ) {
      text = text
        .replace(boldSymbol, boldTags.opening)
        .replace(boldSymbol, boldTags.closing);
      boldIndex.opening = text.indexOf(boldSymbol);
      boldIndex.closing = -1;
    } else if (
      linkIndex.closing > 0 &&
      (boldIndex.closing < 0 || linkIndex.closing < boldIndex.closing)
    ) {
      let urlStart = text.indexOf(
        "[",
        linkIndex.opening + linkSymbol.length
      );
      let urlEnd = -1;
      let url = "#";
      if (urlStart >= 0 && urlStart < linkIndex.closing) {
        urlEnd = text.indexOf("]", urlStart);
        if (urlEnd >= 0 && urlEnd < linkIndex.closing) {
          url = text.substring(urlStart + 1, urlEnd);
          text = text.replace(`[${url}]`, "");
        }
      }
      text = text
        .replace(linkSymbol, linkTags.opening(url))
        .replace(linkSymbol, linkTags.closing);
      linkIndex.opening = text.indexOf(linkSymbol);
      linkIndex.closing = -1;
    }
    if (ctr > 50) break; // should never happen
    ctr++;
  }
  return text;
}