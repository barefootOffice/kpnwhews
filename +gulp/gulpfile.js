var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var cleanCSS = require('gulp-clean-css');
var sourcemaps = require('gulp-sourcemaps');
var rename = require('gulp-rename');
var notify = require('gulp-notify');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var eslint = require('gulp-eslint');

// Path to theme folder
var siteRoot = '../webroot/wp-content/themes/KPHEW-v2';

// Path to main.scss
var styleSRC = siteRoot+'/sass/main.scss';
var styleDST = siteRoot;

// Compile & Minify SASS
gulp.task('sass', function(){
	return gulp.src(styleSRC)
		.pipe(sourcemaps.init())
		.pipe(sass({
			errLogToConsole: true,
			outputStyle: 'compact',
			precision: 10
		}).on('error', notify.onError({title:'Sass Error',sound:'submarine'})))
		//.pipe(sourcemaps.write({includeContent:false}))
		//.pipe(sourcemaps.init({loadMaps:true}))
		.pipe(autoprefixer({cascade:false, remove:true}))
		.pipe(rename({
			basename: 'style'
		}))
		.pipe(cleanCSS({format:'keep-breaks'}))
		.pipe(sourcemaps.write('/'))
		.pipe(gulp.dest(styleDST));
});

// Path to main.js
var jsSRC = siteRoot+'/js/main.js';
var jsDST = siteRoot+'/js';

// Minify JS
gulp.task('customJS', function(){
	return gulp.src(jsSRC)
		.pipe(sourcemaps.init())
		.pipe(uglify().on('error', notify.onError({title:'JS Error',sound:'submarine'})))
		.pipe(rename({
			basename: 'main',
			suffix: '.min'
		}))
		.pipe(sourcemaps.write('/'))
		.pipe(gulp.dest(jsDST));
});

// ESLint
gulp.task('jslint', function(){
  return gulp.src(jsSRC)
  .pipe(eslint({
	'rules':{
		//'quotes': ['warn', 'single'],
		'no-console': ['warn', {allow: ['warn','error']}],
		'semi': ['warn', 'always']
	},
	'extends': 'eslint:recommended'
	}))
  .pipe(eslint.format())
  .pipe(eslint.failOnError());
});



// Watcher
gulp.task('watch', function(){
	gulp.watch(siteRoot+'/sass/**/*.scss', gulp.series(['sass']));
	gulp.watch(siteRoot+'/js/main.js', gulp.series(['customJS']));
});

// Build
gulp.task('build', gulp.series('sass','customJS'));