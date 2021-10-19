const images = {
  thumbnails: null,
  articles: null
};

let loadThumbnailImages = () => {
  images.thumbnails = require.context("../assets/project-thumbnails/", false, /\.(png|jpg)$/);
}

let loadArticleImages = () => {
  images.articles = require.context("../assets/projects/", false, /\.(png|jpg)$/)
}

module.exports.getThumbnailImage = (filename) => {
  if (!images.thumbnails) {
    loadThumbnailImages();
  }
  if (images.thumbnails.keys().indexOf("./" + filename) >= 0) {
    return images.thumbnails("./" + filename);
  } else {
    return images.thumbnails("./error.png");
  }
}

module.exports.getArticleImage = (filename) => {
  if (!images.articles) {
    loadArticleImages();
  }
  if (images.articles.keys().indexOf("./" + filename) >= 0) {
    return images.articles("./" + filename);
  } else {
    return images.articles("./error.png");
  }
}
