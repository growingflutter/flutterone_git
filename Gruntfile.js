module.exports = function(grunt){

    grunt.initConfig({

        // 監視タスク
        watch : {
            js : {
                files: '_jsdev/**/*.js',
                tasks : ['uglify:common'] // uglifyタスクを実行。commonを
            },
            scss : {
                files: '_scss/**/*.scss',
                tasks : ['compass'] // uglifyタスクを実行。commonを
            }
        },

        // jsのuglify（圧縮）タスク
        uglify : {
            common :{ 
                files:{
                  'common/js/global.js' : [
                      '_jsdev/global/*.js'
                  ]
                }
            }
        },

        compass: {
          compile: {
            options: {
              config: 'config.rb'
            }
          }
        },

        cssmin: {
            target: {
                files: [{
                  expand: true,
                  cwd: 'common/css',
                  src: ['**/*.css', '!**/!*.min.css'],
                  dest: 'common/css',
                  ext: '.min.css'
                }]
            }
        }

    })


    // タスク読み込み
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-compass');
    grunt.loadNpmTasks('grunt-contrib-cssmin');

    // デフォルトタスクの設定
    grunt.registerTask('default',['watch']);
}