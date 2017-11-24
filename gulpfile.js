var gulp        = require('gulp');
var browserSync = require('browser-sync').create();

gulp.task('default', function() {
    browserSync.init({
        proxy: "http://localhost:8888"
    });
    gulp.watch("/views/*.*").on("change", browserSync.reload);
});
