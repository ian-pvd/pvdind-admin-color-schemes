const path = require('path');

module.exports = {
  entry: {
    flat: './assets/themes/flat/index.js'
  },
  output: {
    filename: '[name]/[name].js',
    path: path.join(__dirname, 'themes/')
  }
};
