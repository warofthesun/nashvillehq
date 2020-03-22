var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var browserSync = require('browser-sync').create();
const purgecss = require('gulp-purgecss');

function style(){
  return gulp.src('library/scss/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe( autoprefixer( 'last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4' ) )
    .pipe(gulp.dest('./'))
    .pipe(browserSync.stream());
}

function watch(){
  browserSync.init({
      port: 8000,
      proxy: "http://localhost:8000"
    });
    gulp.watch("library/scss/**/*.scss", style).on("change", browserSync.reload);
    gulp.watch("./*.php").on("change", browserSync.reload);
}

gulp.task('purgecss-rejected', () => {
    return gulp.src('./style.css')
        .pipe(purgecss({
            content: ['./**/**/*.php'],
            rejected: true
        }))
        .pipe(gulp.dest('library/unused-styles/'))
})

exports.style = style;
exports.watch = watch;
