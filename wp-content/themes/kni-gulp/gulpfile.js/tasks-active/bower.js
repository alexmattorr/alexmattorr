// ==== BOWER ==== //

var gulp        = require('gulp')
  , plugins     = require('gulp-load-plugins')({ camelize: true })
  , config      = require('../../gulpconfig').bower
;

// This task is executed on `bower update` which is in turn triggered by `npm update`; use this to copy and transform source files managed by Bower
gulp.task('bower');
