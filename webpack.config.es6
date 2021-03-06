const path = require("path");
const _ = require('lodash');
const webpack = require("webpack");
const CleanWebpackPlugin = require('clean-webpack-plugin');
const CopyWebpackPlugin = require('copy-webpack-plugin');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const ExtractTextPlugin = require('extract-text-webpack-plugin');

const environment = JSON.stringify(process.env.NODE_ENV).replace(/[\s'"]+/g, '') || 'development';
console.info('Environment: "' + environment + '"');

const minify = {
  developement: {
    removeComments: false,
    removeEmptyAttributes: false,
    removeEmptyElements: false,
    collapseWhitespace: false,
    collapseBooleanAttributes: false,
    minifyURLs: false,
    minifyCSS: false,
    minifyJS: false,
  },
  production: {
    keepClosingSlash: true,
    removeComments: true,
    removeEmptyAttributes: true,
    removeEmptyElements: false,
    collapseWhitespace: true,
    conservativeCollapse: true,
    preserveLineBreaks: true,
    collapseBooleanAttributes: true,
    minifyURLs: true,
    minifyCSS: true,
    minifyJS: true,
    sortAttributes: true,
    sortClassName: true,
  }
};
const uglify = new webpack.optimize.UglifyJsPlugin({
  debug: true,
  minimize: true,
  sourceMap: false,
  output: {
    comments: false
  },
  beautify: false,
  comments: false,
  compress: {
    sequences   : true,
    booleans    : true,
    loops       : true,
    unused      : true,
    warnings    : false,
    drop_console: true,
    unsafe      : true
  }
});
const modules = [
  path.resolve(__dirname, './src'),
  'node_modules'
];

const extensions = [
  '.js',
  '.min.js',
  '.es6',
  '.css',
  '.styl',
  '.pug',
];
// const environment = webpack.DefinePlugin({
//   'process.env': {
//     'NODE_ENV': JSON.stringify(process.env.NODE_ENV || 'development')
//   }
// });

const clean = new CleanWebpackPlugin(
  ['www'],
  {
    // root: __dirname,
    verbose: true,
    dry: false,
    exclude: ['']
  }
);
const copy = new CopyWebpackPlugin([
  {
    from: path.resolve('src/.htaccess'),
    to: path.resolve('www')
  },
  {
    from: path.resolve('src/images/favicon/favicon.ico'),
    to: path.resolve('www')
  },
  // {
  //   from: path.resolve('src/js/lib'),
  //   to: path.resolve('www/js/lib')
  // },
  {
    from: path.resolve('src/php'),
    to: path.resolve('www/php')
  },
  {
    from: path.resolve('src/images'),
    to: path.resolve('www/images')
  }
]);
const styles = new ExtractTextPlugin("css/styles.css");

const templates = new HtmlWebpackPlugin(
  {
    template: path.resolve('src/index.pug'),
    filename: 'index.php',
    filetype: 'pug',
    inject: false,
    minify: minify[environment]
  }
);
let plugins = [
  clean,
  copy,
  templates,
  styles
];

if(environment == 'production') {
  plugins.push(uglify);
}



const css_options = {
  developement: {
    minimize: false,
  },
  production: {
    minimize:  true || {
      discardComments: {
        removeAll: true
      }
    }
  }
};
const extract_text_plugin_loaders = [
  {
    loader: 'css-loader',
    options: css_options[environment]
  },
  {
    loader: 'csslint-loader'
  },
  {
    loader: 'stylus-loader'
  }
];

const config = {
  context: path.resolve('./src'),
  entry: {
    script: "./js/script",
  },
  output: {
    publicPath: '/',
    path: path.join(__dirname, "www"),
    filename: 'js/[name].js',
    chunkFilename: 'js/[id].chunk.js'
  },
  resolve: {
    modules: modules,
    extensions: extensions,
  },
  module: {
    rules: [
      {
        test: /\.(es6|js)$/,
        exclude: /node_modules/,
        use: [
          'babel-loader',
          'eslint-loader'
        ]
      },
      {
        test: /\.styl$/,
        use: ExtractTextPlugin.extract({
          fallback: 'style-loader',
          use: extract_text_plugin_loaders
        })
      },
      {
        test: /\.pug$/,
        include: [
          path.resolve(__dirname, "src")
        ],
        use: ['raw-loader', 'pug-html-loader?pretty=' + (environment == 'developement')]
      },
      {
        test: /\.(png)$/,
        use: 'file-loader?name=[path][name].[ext]'
      }
    ]
  },
  plugins: plugins,
  watch: true,
  watchOptions: {
    aggregateTimeout: 100,
  },
  devtool: (environment == 'developement') ? 'source-map' : ''
};

module.exports = config;