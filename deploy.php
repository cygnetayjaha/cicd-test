<?php
namespace Deployer;
// This is test
// This is test
// This is test
// This is test
// This is test
// This is test
// This is test
// This is test
// This is test

require 'recipe/common.php';

// Project name
set('application', 'my_project');

// Project repository
set('repository', 'https://github.com/cygnetayjaha/cicd.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true);

// Shared files/dirs between deploys
set('shared_files', []);
set('shared_dirs', []);

// Writable dirs by web server
set('writable_dirs', []);


// Hosts
//->set('deploy_path', '~/{{application}}');
host('https://github.com/cygnetayjaha/cicd.git')
    //->user('ubuntu')
    //->port(22)
    ->forwardAgent()
    ->set('deploy_path', '/var/www/html');


// Tasks

desc('Deploy your project');
task('deploy', [
    'deploy:info',
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:writable',
    'deploy:vendors',
    'deploy:clear_paths',
    'deploy:symlink',
    'deploy:unlock',
    'cleanup',
    'success'
]);

// [Optional] If deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');


task('test', function () {
    writeln('Hello world');
});