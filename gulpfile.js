var elixir = require('laravel-elixir');
var gulp = require('gulp');
gulp.task('default', function () { 
    console.log('Hello Gulp!') 
});

elixir(function(mix) {
    mix.sass([
        'app.scss'
    ], 'public/css');
});
