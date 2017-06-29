1. git init
2. git clone git@bitbucket.org:vetlik/test_task.git 
3. composer install
4. yii/migrate
5. yii migrate/up --migrationPath=@vendor/costa-rico/yii2-images/migrations

admin по дефолту: 
username:root; password:root;

для добавления admin через cli:
yii create_user/create_user
последующие вызовы только с параметрами
 