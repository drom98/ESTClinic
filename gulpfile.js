const gulp = require('gulp');
const babel = require('gulp-babel');
const cleancss = require('gulp-clean-css');
const sass = require('gulp-sass');
const concat = require('gulp-concat');

gulp.task('concatJS', function() {
  return gulp.src('javascript/*.js')
    .pipe(concat('main.js'))
    .pipe(gulp.dest('dist/js'));
});

gulp.task('babel', function() {
  return gulp.src('javascript/*.js')
    .pipe(babel({
      presets: ['@babel/env']
    }))
    .pipe(concat('main.js'))
    .pipe(gulp.dest('dist/js'));
});

gulp.task('sass', function() {
  return gulp.src('sass/*.scss')
    .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
    .pipe(gulp.dest('dist/css'));
});

gulp.task('build', gulp.series(['sass', 'babel']));

gulp.task('watch', function() {
  gulp.watch('javascript/*.js', gulp.parallel('babel'));
  gulp.watch('sass/*.scss', gulp.parallel('sass'));
});
