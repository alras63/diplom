const mix = require("laravel-mix");
let ImageminPlugin = require("imagemin-webpack-plugin").default;
const CopyPlugin = require("copy-webpack-plugin");

mix.webpackConfig({
    plugins: [
        new CopyPlugin({
            patterns: [{ from: "resources/videos", to: "videos" }],
        }),
        new ImageminPlugin({
            //            disable: process.env.NODE_ENV !== 'production', // Disable during development
            pngquant: {
                quality: "95-100",
            },
            test: /\.(jpe?g|png|gif|svg)$/i,
        }),
    ],
});

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
//  mix.copy("resources/css/*.css", "public/css", false);

mix.js("resources/js/app.js", "public/js")
    .react()
    .copy("resources/css/app-tailwind.css", "public/css/app-tailwind.css")
    .copy("resources/css/components-v2.css", "public/css/components-v2.css")
    .copy("resources/js/components-v2.js", "public/js/components-v2.js")
    .copy("resources/js/app-tailwind.js", "public/js/app-tailwind.js")
    .copy("resources/js/jquery-3.6.0.min.js", "public/js/jquery-3.6.0.min.js")
    .copy("resources/js/jquery.svg3dtagcloud.min.js", "public/js/jquery.svg3dtagcloud.min.js")
    .copy("resources/js/prism.js", "public/js/prism.js")
    .copy("resources/js/sly.min.js", "public/js/sly.min.js")
    .sass("resources/sass/app.scss", "public/css");
mix.copy("resources/images", "public/images", false);
