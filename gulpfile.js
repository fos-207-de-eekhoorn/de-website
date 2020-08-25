'use strict';
 
var pkg = require('./package.json'),
    gulp = require('gulp'),
    sass = require('gulp-sass'),
    copy = require("gulp-copy"),
    rename = require("gulp-rename"),
    notify = require("gulp-notify");

sass.compiler = require('node-sass');

// Sass
// ------------------------------------------------
gulp.task('sass', function () {
    return gulp.src(pkg.sass.files.src)
        .pipe(sass().on('error', sass.logError))
        .pipe(rename(pkg.sass.files.file))
        .pipe(gulp.dest(pkg.sass.files.dest))
        .pipe(notify({
          'message': 'Sass build complete',
          'onLast': true
        }));
});
gulp.task('sass:watch', function () {
    gulp.watch(pkg.sass.watch, gulp.series('sass'));
});

//  Images
// ------------------------------------------------
gulp.task('img', function() {
    return gulp.src(pkg.img.files.src)
        .pipe(copy(pkg.img.files.dest, {'prefix': 3}))
        .pipe(notify({
            'message': 'IMG build complete',
            'onLast': true
        }));
});
gulp.task('img:watch', function () {
    gulp.watch(pkg.img.watch, gulp.series('img'));
});

//  Documents
// ------------------------------------------------
gulp.task('docs', function() {
    return gulp.src(pkg.docs.files.src)
        .pipe(copy(pkg.docs.files.dest, {'prefix': 3}))
        .pipe(notify({
            'message': 'Docs build complete',
            'onLast': true
        }));
});
gulp.task('docs:watch', function () {
    gulp.watch(pkg.docs.watch, gulp.series('docs'));
});

//  Fonts
// ------------------------------------------------
gulp.task('fonts', function() {
    return gulp.src(pkg.fonts.files.src)
        .pipe(copy(pkg.fonts.files.dest, {'prefix': 3}))
        .pipe(notify({
            'message': 'Fonts build complete',
            'onLast': true
        }));
});
gulp.task('fonts:watch', function () {
    gulp.watch(pkg.fonts.watch, gulp.series('fonts'));
});

//  Default tasks
// ------------------------------------------------
gulp.task('default', gulp.parallel(
    'sass',
    'img',
    'docs',
    'fonts'
));
gulp.task('dev', gulp.series(
    'default',
    'sass:watch',
    'img:watch',
    'docs:watch',
    'fonts:watch'
));