var gulp = require('gulp');
var uglify = require('gulp-uglify');
var pipeline = require('readable-stream').pipeline;
var rename = require('gulp-rename');

var source = './assets/src/';
var destination = './assets/dist/';

gulp.task('default', defaultTask);

function defaultTask(done) {
  done();
}

gulp.task('build', function () {
  return pipeline(
        gulp.src(source + 'js/*.js'),
        uglify(),
        rename({ suffix: '.min' }),
        gulp.dest(destination + 'js/')
  );
});
