const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const autoprefixer = require('gulp-autoprefixer');
const cleanCSS = require('gulp-clean-css');
const sourcemaps = require('gulp-sourcemaps');
const rename = require('gulp-rename');
const notify = require('gulp-notify');
const concat = require('gulp-concat');
//const uglify = require('gulp-uglify');
const uglify = require('gulp-uglify-es').default;
const eslint = require('gulp-eslint');

// Path to theme folder
var themeFolder = '../webroot/wp-content/themes/kphews-v2.0';

// Path to main.scss
var styleSRC = themeFolder+'/sass/main.scss';

// Compile & Minify SASS
gulp.task('sass', function(){
	return gulp.src(styleSRC)
		.pipe(sourcemaps.init())
		.pipe(sass({
			errLogToConsole: true,
			outputStyle: 'compressed',
			precision: 10
		}).on('error', notify.onError({title:'Sass Error',sound:'submarine'})))
		//.pipe(sourcemaps.write({includeContent:false}))
		//.pipe(sourcemaps.init({loadMaps:true}))
		.pipe(autoprefixer({cascade:false, remove:true}))
		.pipe(rename('style.css'))
		.pipe(cleanCSS({format:'keep-breaks'}))
		.pipe(sourcemaps.write('/'))
		.pipe(gulp.dest(themeFolder));
});

// Path to main.js
var jsSRC = themeFolder+'/js/functions.js';
var jsDST = themeFolder+'/js';

// Minify JS
gulp.task('customJS', function(){
	return gulp.src(jsSRC)
		.pipe(sourcemaps.init())
		.pipe(uglify().on('error', notify.onError({title:'JS Error',sound:'submarine'})))
		.pipe(rename({
			basename: 'functions',
			suffix: '.min'
		}))
		.pipe(sourcemaps.write('/'))
		.pipe(gulp.dest(jsDST));
});

// ESLint
gulp.task('jslint', function(){
	return gulp.src(jsSRC)
	.pipe(eslint({
	 'env':{
		 'es6': true,
		 'browser': true
	 },
	 'parserOptions':{
		 'ecmaVersion': 2015
	 },
	 'extends': 'eslint:recommended',
	 'rules':{
		 //'quotes': ['warn', 'single'],
		 'no-console': ['warn', {allow: ['warn','error']}],
		 'semi': ['warn', 'always']
	 }
	 }))
	.pipe(eslint.format())
	.pipe(eslint.failOnError());
 });

// Watcher
gulp.task('watch', function(){
	gulp.watch(themeFolder+'/sass/**/*.scss', gulp.series(['sass']));
	gulp.watch(themeFolder+'/js/functions.js', gulp.series(['customJS']));
});

// Build
gulp.task('build', gulp.series('sass','customJS'));