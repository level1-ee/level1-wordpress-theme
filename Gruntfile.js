module.exports = function(grunt) {
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		sass: {
			dist: {
				files: {
					'css/build/dev/global.css': 'css/scss/global.scss'
				}
			}
		},

		autoprefixer: {
			options: {
				browsers: ['last 2 version']
			},
			multiple_files: {
				expand: true,
				flatten: true,
				src: 'css/build/dev/*.css',
				dest: 'css/build/prefixed/'
			}
		},

		cssmin: {
			combine: {
				files: {
					'css/build/production/global.css': ['css/build/prefixed/global.css']
				}
			}
		},

		imagemin: {
			dynamic: {
				files: [{
					expand: true,
					cwd: 'img/',
					src: ['**/*.{png,jpg,gif}'],
					dest: 'img/'
				}]
			}
		},

		watch: {
			livereload: {
				options: { livereload: true },
				files: ['*.html', '*.php', 'js/**/*.js', 'fonts/**', 'img/**']
			},
			sass: {
				files: 'css/scss/*.scss',
				tasks: ['sass', 'autoprefixer']
			},
			css: {
				options: { livereload: true },
				files: ['css/build/prefixed/*.css']
			}
		}

	});


	// default task is for developing
	grunt.registerTask('default', ['sass', 'watch']);
	grunt.registerTask('production', ['sass', 'autoprefixer', 'cssmin', 'imagemin']);

	require('load-grunt-tasks')(grunt);
};