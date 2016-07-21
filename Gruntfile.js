module.exports= function (grunt){
  grunt.initConfig({
    concat: {
      js: {
        src: ['js/a.js', 'js/b.js'],
        dest: 'dist/built.js',
      },
      css: {
        src: ['css/a.css', 'css/b.css'],
        dest: 'dist/built.css',
      },
    },
    watch: {
      styles: {
        files: ['bower_components/bootstrap/less/bootstrap.less'], // which files to watch
        tasks: ['less'],
        options: {
          nospawn: true
        }
      },
      js: {
        files: ['**/*.js'],
        tasks: ['concat'],
      },
      css: {
        files: ['**/*.css'],
        tasks: ['concat'],
      },
    },
    minified : {
      files: {
        src: [
        'css/bootstrap.css'
        ],
        dest: 'css/',
      },
      options : {
       ext: '.min.css'
     }
   },
   less: {
     development: {
       options: {
         compress: true,
         yuicompress: true,
         optimization: 2
       },
       files: {
         "css/bootstrap.css": "bower_components/bootstrap/less/bootstrap.less" // destination file and source file
       }
     }
   }
  });
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-minified');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-less');
  grunt.registerTask('default', ['less']);
};
