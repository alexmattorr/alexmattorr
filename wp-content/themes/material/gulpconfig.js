// Project paths
var project = 'kni-gulp',
  src = './src/',
  build = './build/',
  dist = './dist/' + project + '/',
  bower = './bower_components/',
  composer = './vendor/';

// Project settings
module.exports = {

  browsersync: {
    files: [build + '/**', '!' + build + '/**.map'],
    notify: false,
    open: false,
    port: 1111,
    proxy: 'http://kni-wp/', //Replace this on per-project basis
    watchOptions: {
      debounceDelay: 2000
    }
  },

  images: {
    build: {
      src: src + '**/*(*.png|*.jpg|*.jpeg|*.gif|*.svg)',
      dest: build
    },
    dist: {
      src: [dist + '**/*(*.png|*.jpg|*.jpeg|*.gif|*.svg)', '!' + dist +
        'screenshot.png'
      ],
      imagemin: {
        optimizationLevel: 7,
        progressive: true,
        interlaced: true
      },
      dest: dist
    }
  },

  scripts: {
    bundles: {
      core: ['core', 'vendor']
    },
    chunks: {
      core: [
        src + 'js/*.js',
        src + 'js/modules/*.js'
      ],
      vendor: [
        bower + 'html5-history-api/history.js',
        bower + 'waves/dist/waves.min.js'
        // bower+'wp-ajax-page-loader/wp-ajax-page-loader.js'
      ]
    },
    dest: build + 'js/',
    lint: {
      src: [src + 'js/**/*.js']
    },
    minify: {
      src: [build + 'js/**/*.js', '!' + build + 'js/**/*.min.js'],
      rename: {
        suffix: '.min'
      },
      uglify: {},
      dest: build + 'js/'
    },
    namespace: ''
  },

  styles: {
    build: {
      src: [src + 'scss/*.scss', '!' + src + 'scss/_*.scss'],
      dest: build
    },
    dist: {
      src: [dist + '**/*.css', '!' + dist + '**/*.min.css'],
      minify: {
        keepSpecialComments: 1,
        roundingPrecision: 3
      },
      dest: dist
    },
    compiler: 'libsass',
    autoprefixer: {
      browsers: ['> 3%', 'last 2 versions', 'ie 9', 'ios 6', 'android 4']
    },
    rename: {
      suffix: '.min'
    },
    minify: {
      keepSpecialComments: 1,
      roundingPrecision: 3
    },
    rubySass: {
      loadPath: bower,
      precision: 6,
      'sourcemap=none': true
    },
    libsass: {
      includePaths: [bower],
      precision: 6
    }
  },

  theme: {
    lang: {
      src: src + 'languages/**/*',
      dest: build + 'languages/'
    },
    php: {
      src: src + '**/*.php',
      dest: build
    }
  },

  utils: {
    clean: [build + '**/.DS_Store'],
    wipe: [dist],
    dist: {
      src: [build + '**/*', '!' + build + '**/*.min.css'],
      dest: dist
    }
  },

  watch: {
    src: {
      styles: src + 'scss/**/*.scss',
      scripts: [src + 'js/**/*.js', bower + '**/*.js'],
      images: src + '**/*(*.png|*.jpg|*.jpeg|*.gif|*.svg)',
      theme: src + '**/*.php',
    },
    watcher: 'browsersync'
  }
}
