const gulp = require('gulp');
const autoprefixer = require('autoprefixer');
const browsersync = require('browser-sync').create();
const cssnano = require('cssnano');
const plumber = require('gulp-plumber');
const postcss = require('gulp-postcss');
const rename = require('gulp-rename');
const sass = require('gulp-sass');
var merge = require('merge-stream');
var sourcemaps = require('gulp-sourcemaps');

function browserSync(done) {
	browsersync.init({
    proxy: '127.0.0.1:8000',
    notify: false,
    files: [
      'resources/views/**/*.php',
      'public/template/assets/dist/js/**/*.js',
      'public/template/assets/dist/css/**/*.css',
      'public/template/assets/dist/img/**/*.png',
      'public/template/assets/static/**/*.png',
      'public/template/assets/dist/img/**/*.jpg',
      'public/template/assets/static/**/*.jpg',
      'public/template/assets/dist/img/**/*.svg',
      'public/template/assets/static/**/*.svg',
      'public/template/assets/dist/img/**/*.gif',
      'public/template/assets/static/**/*.gif'
    ],
    watchOptions: {
      usePolling: true,
      interval: 500
    }
	});
	done();
}
function css() {
	return gulp
		.src('public/template/assets/dist/css/*.css')
		.pipe(browsersync.stream());
}

function php() {
	return gulp
		.src('resources/views/*.php')
		.pipe(browsersync.stream());
}

function watchFiles() {
  gulp.watch('public/template/assets/dist/css/*.scss', css);
  gulp.watch('resources/views/*.php', php);
  gulp.browserSyncReload;
}

const watch = gulp.parallel(watchFiles, browserSync);

exports.watch = watch;
exports.serve = browserSync;
