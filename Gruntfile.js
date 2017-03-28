module.exports = function(grunt) {

	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		phpunit: {
			classes: {
				dir: 'test/ArticleControllerTest.php'
			},
			options: {
				bin: 'vendor/bin/phpunit',
				configuration: 'phpunit.xml',
				colors: true,
				testsuite:'myTest'
			}
		}
	});

	grunt.loadNpmTasks('grunt-phpunit');
};