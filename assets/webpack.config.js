/**
 * PVD Industrial WP Admin Color Schemes
 */

// Webpack Dependencies
const path = require('path');

// Plugins
const MiniCSSExtractPlugin = require('mini-css-extract-plugin');
const OptimizeCssAssetsPlugin = require('optimize-css-assets-webpack-plugin');

// Config
module.exports = {
  mode: 'production',
  entry: {
    flat: './assets/themes/flat/index.js'
  },
  output: {
    filename: '[name]/[name].js',
    path: path.join(__dirname, 'themes/')
  },
  optimization: {
    minimizer: [
      new OptimizeCssAssetsPlugin({})
    ]
  },
  plugins: [
    new MiniCSSExtractPlugin({
      filename: '[name]/[name].css'
    })
  ],
  module: {
    rules: [
      {
        test: /\.scss$/,
        use: [
          MiniCSSExtractPlugin.loader,
          'css-loader',
          'sass-loader'
        ]
      }
    ]
  }
};
