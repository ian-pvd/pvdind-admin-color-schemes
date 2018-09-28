/**
 * PVD Industrial WP Admin Color Schemes
 */

// Webpack Dependencies
const path = require('path');

// Plugins
const MiniCSSExtractPlugin = require('mini-css-extract-plugin');
const OptimizeCssAssetsPlugin = require('optimize-css-assets-webpack-plugin');
const WebpackRtlPlugin = require('webpack-rtl-plugin');

// Config
module.exports = {
  mode: 'production',
  entry: {
    industrial: './themes/industrial/index.js',
    'industrial-dark': './themes/industrial-dark/index.js'
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
  },
  plugins: [
    new MiniCSSExtractPlugin({
      filename: '[name]/colors.css'
    }),
    new WebpackRtlPlugin({
      filename: '[name]/colors-rtl.css'
    })
  ]
};
