/* global require */
'use strict';

// VARIABLES

var gulp = require('gulp'),
    less = require('gulp-less'),
    // jade = require('gulp-jade'),
    jade = require('gulp-jade-php'),
    concat = require('gulp-concat'),
    browserSync = require('browser-sync'),
    reload = browserSync.reload,
    combineMediaQueries = require('gulp-combine-media-queries'),
    autoprefixer = require('gulp-autoprefixer'),
    cssmin = require('gulp-cssmin'),
    notify = require('gulp-notify'),
    imagemin = require('gulp-imagemin'),
    changed = require('gulp-changed'),
    pngcrush = require('imagemin-pngquant');


// LESS

gulp.task('less', function() {
  gulp.src('./src/less/app.less')
  .pipe(less({
    compress: true
  }))
  .pipe(combineMediaQueries())
  .pipe(autoprefixer())
  .pipe(cssmin())
  .pipe(gulp.dest('./assets/css/'))
  .pipe(browserSync.reload({stream:true}))
  .pipe(notify({ message: 'less compiled' }));
  gulp.src('./src/less/globals/ie/*.less')
  .pipe(less({
    compress: true
  }))
  .pipe(combineMediaQueries())
  .pipe(autoprefixer())
  .pipe(cssmin())
  .pipe(gulp.dest('./assets/css/ie/'))
  .pipe(browserSync.reload({stream:true}))
  .pipe(notify({ message: 'less compiled' }));
});
 

// JADE

gulp.task('templates', function() {
  return gulp.src('./lib/*.jade')
    .pipe(jade({
      pretty: true,
      locals: {
        title: 'OMG THIS IS THE TITLE'
      }
    }))
    .pipe(gulp.dest('./'))
    .pipe(notify({ message: 'jade compiled' }));
});

// IMAGES

// minify new images
gulp.task('imagemin', function() {
  var imgSrc = './src/images/**/*',
      imgDst = './assets/images';
 
  gulp.src(imgSrc)
    .pipe(changed(imgDst))
    .pipe(imagemin({
          progressive: true,
          svgoPlugins: [{removeViewBox: false}],
          use: [pngcrush()]
      }))
    .pipe(gulp.dest(imgDst));
});

// JAVASCRIPT

gulp.task('scripts', function() {
  return gulp.src([ 
    './src/bower_components/velocity/velocity.min.js',
    './src/bower_components/background-video/jquery.backgroundvideo.min.js', 
    './src/bower_components/jquery-easing/jquery.easing.min.js',
    './src/bower_components/waypoints/lib/jquery.waypoints.min.js',
    './src/bower_components/slick.js/slick/slick.min.js',
    // './src/bower_components/slick.js/scalable-lightbox/jquery.scalable-lightbox.min.js',
    /*'./src/bower_components/fullpage.js/jquery.fullPage.min.js',
    './src/bower_components/fullpage.js/vendors/jquery.slimscroll.min.js',*/
    './src/js/app.js'
    ])
    .pipe(concat({ path: 'app.js'}))
    .pipe(gulp.dest('./assets/js'));
});

// SERVER

// Watch files for changes
gulp.task('watch', ['browser-sync'], function() {
  // Watch JADE files
  gulp.watch('./lib/**/*.jade', ['templates']);
  // Watch Sass files
  gulp.watch('./src/less/**/*', ['less']);
  // Watch JS files
  gulp.watch('src/js/**/*', ['scripts']);

  // Watch image files
  // gulp.watch('src/images/raster/*', ['images']);
  // // Watch SVG files
  // gulp.watch('src/images/vector/*', ['svgs']);
  // Watch HTML
  // gulp.watch('./*.html', reload);
  gulp.watch('./*.php', reload);
});

gulp.task('browser-sync', function() {
    browserSync.init(['./assets/css/**.*', './assets/js/**.*'], {
        // SI NO HAY SERVIDOR EXTERNO:
        server: {
            baseDir: './'
        }
        /*proxy: {
          host: "localhost",
          port:3000
        }*/
    });
});

// DEFAULTS

gulp.task('default', ['less','templates','scripts','imagemin','watch','browser-sync']);