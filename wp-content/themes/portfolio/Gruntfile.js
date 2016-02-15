module.exports = function(grunt) {
  require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    svgmin: {
      production: {
        options: {
          removeViewBox: false,
          removeUselessStrokeAndFill: false
        },
        files: [{
          expand: true,
          cwd: 'assets/svg/',
          src: ['**/*.svg'],
          dest: 'dist/assets/svg/',
          ext: '.svg'
        }]
      }
    },

    grunticon: {
      options: {
        pngcrush: true
      },
      production: {
        files: [{
          expand: true,
          cwd: 'dist/assets/svg',
          src: ['*.svg', '*.png'],
          dest: 'dist/assets/svg'
        }],
        options: {
          pngfolder: "fallback",
          loadersnippet: "grunticon.loader.js"
        }
      }
    },
    sass: {
      production: {
        options: {
          sourcemap: true
        },

        files: {
          'dist/assets/style/style.css': 'assets/sass/style.scss'
        }
      }

    },
    autoprefixer: {
      production: {
        src: 'dist/assets/style/style.css',
        dest: 'dist/assets/style/style.css'
      }
    },
    cmq: {
      production: {
        files: {
          'dist/assets/style/min/style.css': 'dist/assets/style/style.css'
        }
      },
    },
    cssmin: {
      compress: {
        files: {
          'dist/assets/style/min/style.css': ['dist/assets/style/min/style.css'],
        }
      }
    },
    bower_concat: {
      build: {
        bowerOptions: {
          offline: true
        },
        dest: 'tmp/lib.js',
        dependencies: {
          'underscore': 'jquery'
        }
      }
    },
    concat_sourcemap: {
      options: {
        sourceRoot: "",
        sourcesContent: true
      },
      lib: {
        src: [
          'tmp/lib.js'
        ],

        dest: 'dist/assets/scripts/lib.js'

      },
      app: {
        src: [
          'assets/app/app.js',
          'assets/app/modules/**/*.js'
        ],
        dest: 'dist/assets/scripts/app.js'
      }
    },
    uglify: {
      options: {
        mangle: true,
        // compress: true,
        preserveComments: false
      },
      build: {
        files: {
          'dist/assets/scripts/app.min.js': ['dist/assets/scripts/app.js'],
          'dist/assets/scripts/lib.min.js': ['dist/assets/scripts/lib.js']
        }
      }
    },
    jshint: {
      beforeconcat: {
        options: {
          expr: {
            ExpressionStatements: true
          },
          asi: true
        },
        src: ['assets/scripts/**/*.js', 'assets/app/**/*.js']
      },
      afterconcat: {
        options: {
          expr: {
            ExpressionStatements: true
          },
          asi: true
        },
        src: ['dist/assets/scripts/app.js']
      }
    },
    watch: {
      styles: {
        files: [
          'assets/sass/**/*.scss',
          'assets/app/**/*.js',
          'assets/app.js'
        ],
        tasks: [
          'styles',
          'scripts',
          'uglify',
          'copy',
          'clean'
        ]
      },
      light: {
        files: [
          'assets/sass/**/*.scss'
        ],
        tasks: [
          'styles',
          'copy',
          'clean'
        ]
      },
      options: {
        debounceDelay: 150
      }
    },

    copy: {
      main: {
        files: [
          {
            expand: true,
            src: 'assets/img/**',
            dest: 'dist/',
            filter: 'isFile'
          },
          {
            expand: true,
            src: 'assets/fonts/**',
            dest: 'dist/',
            filter: 'isFile'
          },
          {
            expand: true,
            src: 'assets/library/**',
            dest: 'dist/',
            filter: 'isFile'
          },
          {
            expand: true,
            src: 'assets/scripts/**',
            dest: 'dist/',
            filter: 'isFile'
          },
          {
            expand: true,
            cwd: 'dist/',
            src: ['assets/svg/*.txt'],
            dest: 'dist/assets/svg/',
            rename: function(dest, src) {
              return dest + 'grunticon.loader.js';
            }
          },
          {
            expand: true,
            cwd: 'dist/',
            src: ['assets/svg/*.txt'],
            dest: 'dist/assets/svg/',
            rename: function(dest, src) {
              return dest + 'grunticon.loader.js';
            }
          }
        ]
      },

      versionedScripts: {
        options: {
          flatten: true
        },
        files: {
          'dist/assets/scripts/jnpr-<%= pkg.version %>.js': 'dist/assets/scripts/jnpr.min.js',
          'dist/assets/library/lib-<%= pkg.version %>.js': 'dist/assets/library/lib.js',
          'dist/assets/style/style-<%= pkg.version %>.css': 'dist/assets/style/style.min.css'
        }
      }

    },

    clean: ['tmp/']
  });

  grunt.registerTask('default', ['dev']);
  grunt.registerTask('svg_min', ['svgmin', 'grunticon']);
  grunt.registerTask('scripts', ['bower_concat', 'concat_sourcemap']);
  grunt.registerTask('styles', ['sass', 'autoprefixer', 'cmq', 'cssmin']);  
  grunt.registerTask('dev', [
    'clean',
    'styles',
    'scripts',
    'uglify',
    'copy',
    'clean',
    'watch'
  ]);

  grunt.registerTask('light', [
    'clean',
    'styles',
    'copy',
    'clean',
    'watch:light'
  ]);
};