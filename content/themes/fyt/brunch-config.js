// See http://brunch.io for documentation.
exports.files = {
  javascripts: {
      joinTo: {
        'js/vendor.js': /^(?!app)/,
        'js/app.js': /^app/
      }
  },
  stylesheets: {
    joinTo: {
        'css/app.css': /^app/,
        'css/vendor.css': /^(?!app)/
    }
  }
};

exports.plugins = {
    // sass: {
    //     options: {
    //         includePaths: ['node_modules/font-awesome/scss']
    //     }
    // },
    browserSync: {
        files: [
            '*'
        ]
    },
    copycat: {
        'fonts': ['node_modules/font-awesome/fonts']
    }
};

exports.npm = {
    styles: {
        'normalize.css': ['normalize.css'],
        'font-awesome': ['css/font-awesome.css']
    },
    // Je demande à brunch de déclarer ces variables globales
    // Reviens à faire dans mon js "var $ = require('jquery');"
    globals: {
      '$': 'jquery', // $ = jquery
      'jQuery': 'jquery', // jQuery = jquery
      // 'jarallax': 'jarallax', // On déclare en global le fichier JS de Jarallax 
      'bootstrap': 'bootstrap' // on déclare en global le fichier JS de Bootstrap globalement
    }
}

exports.modules = {
  autoRequire: {
    'js/app.js': ['initialize']
  }
}
