var gulp = require('gulp'),
    sass = require('gulp-sass'),
    cssmin = require('gulp-cssmin'),
    uglify = require('gulp-uglify'),
    replace = require('gulp-replace'),
    concat = require('gulp-concat');

gulp.task('scss', function () {
    return gulp.src('sass/style.scss')
        .pipe(sass())
        .pipe(cssmin())
        .pipe(replace('/*!','/*'))
        .pipe(gulp.dest('../'));
});

gulp.task('mce', function () {
    return gulp.src('sass/custom-editor-style.scss')
        .pipe(sass())
        .pipe(cssmin())
        .pipe(replace('/*!','/*'))
        .pipe(gulp.dest('../static/'));
});

gulp.task('js', function(){
    return gulp.src([
            'js/libs/owl.carousel.min.js',
            'js/libs/jquery_parallax.js',
            'js/libs/youtubebackground.js',
            'js/libs/magnific-popup.js',
            'js/Main.js',
            'js/*.js'
        ])
        .pipe(concat('static/script.js'))
        .pipe(uglify())
        .pipe(gulp.dest('../'));
});
