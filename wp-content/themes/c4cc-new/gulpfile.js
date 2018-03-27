// Include gulp
var gulp = require('gulp');

// Include Our Plugins
var jshint = require('gulp-jshint');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');

// Lint Task
gulp.task('lint', function() {
    return gulp.src('assets/javascript/*.js')
        .pipe(jshint())
        .pipe(jshint.reporter('default'));
});

// Compile Our Sass
gulp.task('sass', function () {
    return gulp.src('assets/sass/*.scss')
        .pipe(sass())
        .pipe(gulp.dest('assets/dist'));
});

// Concatenate & Minify JS
gulp.task('scripts', function() {
    return gulp.src('assets/javascript/*.js')
        .pipe(uglify())
        .pipe(gulp.dest('assets/dist'));
});

// Watch Files For Changes
gulp.task('watch', function() {
    gulp.watch('assets/javascript/*.js', ['lint', 'scripts']);
    gulp.watch(['assets/sass/*.scss', 'assets/sass/*/*.scss', 'assets/sass/*/*/*.scss'], ['sass']);
});

// Default Task
gulp.task('default', ['lint', 'sass', 'scripts', 'watch']);