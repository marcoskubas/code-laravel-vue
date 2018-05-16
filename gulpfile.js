const gulp             = require('gulp');
const webpack 		   = require('webpack');
const elixir           = require('laravel-elixir');
const WebpackDevServer = require('webpack-dev-server');
const webpackConfig    = require('./webpack.config');
const webpackDevConfig = require('./webpack.dev.config');

require('laravel-elixir-vue');
require('laravel-elixir-webpack-official');

Elixir.webpack.config.module.loaders = [];

Elixir.webpack.mergeConfig(webpackConfig);
Elixir.webpack.mergeConfig(webpackDevConfig);

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

 gulp.task('webpack-dev-server', () => {
 	let config = Elixir.webpack.config;
 	new WebpackDevServer(config, {
 		watchOptions : {
 			poll 			: true,
 			agregateTimeout : 300
 		},
 		publicPath 	: config.output.publicPath,
 		noInfo 		: true,
 		stats 		: {colors : true}
 	}).listen(8080, "0.0.0.0", function(){
 		console.log('Bundling Project...');
 	});
 });

elixir((mix) => {
    mix.sass('./resources/assets/admin/sass/admin.scss')
    	.copy('./node_modules/materialize-css/fonts/roboto', './public/fonts/roboto');

    mix.browserSync({
    	host 	: '0.0.0.0',
    	proxy	: 'http://localhost:8000',
    	port 	: 3001
    });
});
