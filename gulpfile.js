/* Variable Defination */
var project   		= require('./package.json');
var gulp 			= require('gulp');
var rtlcss    		= require('gulp-rtlcss');
var wpPot 			= require('gulp-wp-pot');
var clean   		= require('gulp-clean');
var zip 			= require('gulp-zip');

// Generate rtl style
gulp.task('rtl', function () {
    return gulp.src([
        'assets/css/*.css',
        '!assets/css/owl.carousel.css',
        '!assets/css/owl.carousel.min.css',
        '!assets/css/owl.theme.default.css',
        '!assets/css/owl.theme.default.min.css',
        '!assets/css/font-awesome.min.css',
        '!assets/css/rtl.css'
    ])
    .pipe(rtlcss())
    .pipe(gulp.dest('assets/css-rtl/'));
});

gulp.task('rtl2', function () {
    return gulp.src(['admin.css', 'elementor.css', 'listing.css', 'gutenberg.css'], {cwd: 'assets/css/'})
        .pipe(rtlcss())
        .pipe(gulp.dest('assets/css-rtl/'));
});

// Generate pot file
gulp.task('pot', function () {
    return gulp.src(['**/*.php', '!__*/**', '!src/**', '!assets/**'])
        .pipe(wpPot( {
            domain: project.name,
            bugReport: 'techlabpro15@gmail.com',
            team: 'RadiusTheme <info@radiustheme.com>'
        } ))
        .pipe(gulp.dest('languages/'+project.name+'.pot'));
});

// Clean build folder
gulp.task('clean', function () {
    return gulp.src('__build/*.*', {read: false})
        .pipe(clean());
});

// Compress package file
gulp.task('zip', function () {
    return gulp.src(['**', '!__*/**', '!node_modules/**', '!src/**', '!gulpfile.js', '!package.json', '!package-lock.json', '!info.txt', '!sftp-config.json', '!test-file.txt'], { base: '..' })
        .pipe(zip(project.name+'.zip'))
        .pipe(gulp.dest('__build'));
});

// Build package
gulp.task('run', gulp.series(gulp.parallel('pot'),'rtl'));
gulp.task('build', gulp.series(gulp.parallel('run','clean'),'zip'));

// Defult Task
gulp.task('default', gulp.series('run'));