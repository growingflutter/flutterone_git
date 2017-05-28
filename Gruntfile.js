module.exports = function(grunt){

    grunt.initConfig({
      connect: {
        site: { // �I�v�V�������ݒ��ׁ̈A���I�u�W�F�N�g
        }
      },
        // �Ď��^�X�N
        watch : {
            js : {
                files: '_jsdev/**/*.js',
                tasks : ['uglify:common'] // uglify�^�X�N�����s�Bcommon��
            },
            scss : {
                files: '_scss/**/*.scss',
                tasks : ['compass'] // uglify�^�X�N�����s�Bcommon��
            },
            options: {
                livereload: true // �ύX�������΃����[�h������
            }
        },

        // js��uglify�i���k�j�^�X�N
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


    // �^�X�N�ǂݍ���
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-compass');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-connect');

    // �f�t�H���g�^�X�N�̐ݒ�
    grunt.registerTask('default',['connect','watch']);
}
