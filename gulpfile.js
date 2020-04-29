var gulp = require( 'gulp' ),
	plumber = require( 'gulp-plumber' ),
	watch = require( 'gulp-watch' ),
	livereload = require( 'gulp-livereload' ),
	minifycss = require( 'gulp-minify-css' ),
	jshint = require( 'gulp-jshint' ),
	stylish = require( 'jshint-stylish' ),
	uglify = require( 'gulp-uglify' ),
	rename = require( 'gulp-rename' ),
	notify = require( 'gulp-notify' ),
	include = require( 'gulp-include' ),
	sass = require( 'gulp-sass' ),
	requirejsOptimize = require('gulp-requirejs-optimize');

var onError = function( err ) {
	console.log( 'An error occurred:', err.message );
	this.emit( 'end' );
}

gulp.task( 'scss', function() {
	return gulp.src( './scss/style.scss' )
		.pipe( plumber( { errorHandler: onError } ) )
		.pipe( sass() )
		.pipe( gulp.dest( '.' ) )
		.pipe( minifycss() )
		.pipe( rename( { suffix: '.min' } ) )
		.pipe( gulp.dest( '.' ) )
		.pipe( livereload() );
});

gulp.task('minifyjs', function () {
	gulp.src('./js/main.js')
	.pipe(requirejsOptimize({
		baseUrl: 'js',
    paths: {
        'jquery': 'vendor/jquery-3.1.1.min',
        'mixItUp': 'vendor/jquery.mixitup.min',
        'transit': 'vendor/jquery.transit.min'
    }
	}))
	.pipe(rename({ suffix: '.min' }))
	.pipe(gulp.dest('./js/'))
})

gulp.task( 'watch', function() {
  livereload.listen();
  gulp.watch( './scss/**/*.scss', [ 'scss' ] );
  gulp.watch( ['./js/*.js', '!./js/*.min.js'], [ 'minifyjs' ]);
  gulp.watch( './**/*.php' ).on( 'change', function( file ) {
	livereload.changed( file );
  } );
});

gulp.task( 'default', [ 'scss', 'minifyjs', 'watch' ], function() {

});