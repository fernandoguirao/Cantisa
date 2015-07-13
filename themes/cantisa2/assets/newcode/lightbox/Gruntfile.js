
module.exports = function(grunt) {

  // grunt config
  grunt.initConfig({

    pkg: grunt.file.readJSON('package.json'),

    banner: '//     <%= pkg.title || pkg.name %> - v<%= pkg.version %> - <%= grunt.template.today("yyyy-mm-dd") %>\n' +
      '\n' +
      '//     (c) <%= grunt.template.today("yyyy") %> <%= pkg.author %>\n'+
      '//     Licensed under the <%= _.pluck(pkg.licenses, "type").join(", ") %> license\n' +
      '//     <%= pkg.homepage %>\n' +
      '\n\n',


    concat: {
      dev: {
        options: {
          banner: '<%= banner %>',
          stripBanners: false
        },
        src: [
          'src/prefix.js',
          'src/debug.js',
          'src/instance.js',
          'src/settings.js',
          'src/core.js',
          'src/navigation.js',
          'src/resize.js',
          'src/bindings.js',
          'src/template.js',
          'src/helper.js',
          'src/instanceclose.js',
          'src/suffix.js'
        ],
        dest: 'jquery.<%= pkg.name %>.js'
      }
    },


    uglify: {
      build: {
        options: {
          banner: '<%= banner %>',
          report: 'gzip'
        },
        files: {
          'jquery.<%= pkg.name %>.min.js': ['jquery.<%= pkg.name %>.js']
        }
      }
    },


    cssmin: {
      minify: {
        src:  'jquery.<%= pkg.name %>.css',
        dest: 'jquery.<%= pkg.name %>.min.css'
      }
    },


    jshint: {
      options: {
        boss:       true,
        curly:      true,
        eqeqeq:     true,
        eqnull:     true,
        immed:      true,
        noarg:      true,
        onevar:     true,
        quotmark:   'double',
        smarttabs:  true,
        trailing:   true,
        undef:      true,
        unused:     true,

        browser:    true,
        devel:      true,
        jquery:     true,
        strict:     true,
        predef:     ["Modernizr", "define", "require"]
      },
      dev: {
        src: ['jquery.<%= pkg.name %>.js']
      }
    },


    watch: {
      scripts: {
        files: ['src/**/*.js'],
        tasks: ['dev'],
        options: {
          interrupt: true
        }
      }
    }

  });

  // grunt plugins
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-jshint');

  // define tasks
  grunt.registerTask('default', ['watch']);
  grunt.registerTask('dev', ['concat', 'jshint']);
  grunt.registerTask('build', ['concat', 'uglify', 'cssmin']);

};
