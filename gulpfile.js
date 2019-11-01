'use strict';

/* do NOT change the order of the pipes as this could cause unwanted effects */
var pkg = require('./package.json'),
  // del = require('del'),
  // eslint = require('gulp-eslint'),
  // fileExists = require('file-exists'),
  autoprefixer = require('gulp-autoprefixer'),
  bless = require('gulp-bless'),
  cached = require('gulp-cached'),
  cleanCSS = require('gulp-clean-css'),
  concat = require('gulp-concat'),
  copy = require('gulp-copy'),
  gulp = require('gulp'),
  notify = require('gulp-notify'),
  plumber = require('gulp-plumber'),
  rename = require('gulp-rename'),
  sass = require('gulp-sass'),
  scssLint = require('gulp-scss-lint'),
  sourcemaps = require('gulp-sourcemaps'),
  uglify = require('gulp-uglify');

//  Images
gulp.task('imgbuild', function() {
  return gulp.src(pkg.img.src)
    .pipe(copy(pkg.img.dest, {
      'prefix': 3
    })) // needs to be copy, not just ".dest" as mac often throws errors when the folder doesn't exist
    .pipe(notify({
      'message': 'IMG build complete',
      'onLast': true // otherwise the notify will be fired for each file in the pipe
    }));
});

// Fonts
gulp.task('fontsbuild', function() {
  return gulp.src(pkg.fonts.src)
    .pipe(copy(pkg.fonts.dest, {
      'prefix': 3
    })) // needs to be copy, not just ".dest" as mac often throws errors when the folder doesn't exist
    .pipe(notify({
      'message': 'Fonts build complete',
      'onLast': true // otherwise the notify will be fired for each file in the pipe
    }));
});

// Javascript
gulp.task('eslint', function() {
  return gulp.src(pkg.js.hint.src)
    .pipe(plumber({
      'errorHandler': onError
    }))
    .pipe(eslint())
    .pipe(eslint.format())
    .pipe(eslint.failAfterError());
});

gulp.task('jsbuild', done => {
  pkg.js.files.forEach(function(o) {
    return gulp.src(o.src)
      .pipe(plumber())
      .pipe(concat(o.file))
      .pipe(gulp.dest(o.dest))
      .pipe(notify({
        'message': 'JS: ' + o.file + ' build complete',
        'onLast': true // otherwise the notify will be fired for each file in the pipe
      }));
  });
  done();
});

gulp.task('js', gulp.parallel('jsbuild'));

// CSS
gulp.task('scsslint', function() {
  return gulp.src(pkg.sass.hint.src)
    .pipe(cached('scssLint'))
    .pipe(scssLint());
});

gulp.task('sassbuild', done => {
  pkg.sass.files.forEach(function(o) {
    return gulp.src(o.src)
      .pipe(plumber())
      .pipe(sourcemaps.init()) // can't get them to work in conjunction with bless
      .pipe(sass().on('error', sass.logError))
      .pipe(autoprefixer({
        'browserslist': pkg.sass.autoprefixer.overrideBrowserslist
      }))
      .pipe(rename(o.file))
      .pipe(cleanCSS())
      .pipe(sourcemaps.write('.')) // can't get them to work in conjunction with bless
      .pipe(gulp.dest(o.dest))
      .pipe(notify({
        'message': 'Sass: ' + o.file + ' build complete',
        'onLast': true // otherwise the notify will be fired for each file in the pipe
      }));
  });
  done();
});

gulp.task('sass', gulp.parallel('sassbuild'));

// build all task
gulp.task('build', gulp.parallel('imgbuild', 'fontsbuild', 'jsbuild', 'sassbuild'));

// default task
gulp.task('default', gulp.series(gulp.parallel('imgbuild', 'fontsbuild', 'js', 'sass'), function() {
  gulp.watch(pkg.img.watch, gulp.series('imgbuild'));
  gulp.watch(pkg.fonts.watch, gulp.series('fontsbuild'));
  gulp.watch(pkg.js.watch, gulp.series('js'));
  gulp.watch(pkg.sass.watch, gulp.series('sass')).on('change', function () {
    notify("Sass building...").write('');
  });
}));
