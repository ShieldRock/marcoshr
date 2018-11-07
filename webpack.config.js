var Encore = require('@symfony/webpack-encore');
var CopyWebpackPlugin = require('copy-webpack-plugin'); // This line tell to webpack to use the plugin

Encore
    // Directory where compiled assets will be stored
    .setOutputPath('public/build/')
    // Public path used by the web server to access the output path
    .setPublicPath('/build')
    // Only needed for CDN's or sub-directory deploy
    //.setManifestKeyPrefix('build/')

    /*
     * ENTRY CONFIG:
     * Add 1 entry for each "page" of your app (including one that's included on every page - e.g. "app")
     * Each entry will result in one JavaScript file (e.g. app.js) and one CSS file (e.g. app.css) if you JavaScript imports CSS.
     */
    .addEntry('js/app', './assets/js/app.js')
    .addEntry('js/email', './assets/js/email.js')
    .addEntry('js/common', './assets/js/common.js')
    .addStyleEntry('css/app', './assets/css/global.scss')
    .addStyleEntry('css/customize', './assets/css/customize.css')
    .addStyleEntry('css/custom-modal-theme', './assets/css/custom-modal-theme.css')
    //.addEntry('page1', './assets/js/page1.js')
    //.addEntry('page2', './assets/js/page2.js')

    /*
     * FEATURE CONFIG:
     * Enable & configure other features below. For a full list of features, see:
     * https://symfony.com/doc/current/frontend.html#adding-more-features
     */
    .cleanupOutputBeforeBuild()
    .enableBuildNotifications()
    .enableSourceMaps(!Encore.isProduction())

    // Enables hashed filenames (e.g. app.abc123.css)
    .enableVersioning(Encore.isProduction())

    // Enables Sass/SCSS support
    .enableSassLoader()

    // Uncomment if you use TypeScript
    //.enableTypeScriptLoader()

    // Uncomment if you're having problems with a jQuery plugin
    .autoProvidejQuery()
    .autoProvideVariables({
        'window.jQuery': 'jquery'
    })

    // Add Images from assets: npm i -D copy-webpack-plugin
    .addPlugin(new CopyWebpackPlugin([
        { from: './assets/images', to: 'images' },
        { from: './assets/js/summernote', to: 'js/summernote' }
    ]))
;

module.exports = Encore.getWebpackConfig();
