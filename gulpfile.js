var gulp = require('gulp');
var uglify = require('gulp-uglify');
var cleanCSS = require('gulp-clean-css');
var rename       = require('gulp-rename');

//JS圧縮
/*
gulp.task('minify-js', function() {
    return gulp.src("js/*.js")
        .pipe(uglify())
        .pipe(gulp.dest('dist/js/'));
        //.pipe(gulp.dest('js')); 上書きする場合
});
*/

//CSS圧縮
gulp.task('minify-css', function() {
    return gulp.src([
        'css/*.css',
        '!css/font-awesome.css',
        '!css/font-awesome.min.css',
        '!css/amazonjs.css'
        ])
        .pipe(cleanCSS())
        .pipe(rename({ extname: '.min.css' }))
        .pipe(gulp.dest('css/dist/'));
        //.pipe(gulp.dest('css')); 上書きする場合
});

gulp.task('watch', function(){
 var targets = [
    '*.php',
    'css/*.css',
    'js/*.js'
  ];
  // gulp.watch(targets ['minify-css']);
  gulp.watch('css/*.css', ['minify-css']);
});
// gulp.task('default', ['minify-css']);