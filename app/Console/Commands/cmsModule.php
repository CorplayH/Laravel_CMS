<?php

namespace App\Console\Commands;

use App\Model\Module;
use App\User;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class cmsModule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cmsModule';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '生成模块命令行';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //获取Http里的所有模块
        $modules = glob('app/Http/Controllers/*');
        foreach ($modules as $module){
            //获取模块下 System 目录
            $dir = $module . '/System';
            if(is_dir($dir)){
                //获取模块名称 (文件夹名)
                $moduleName = basename($module);
                //获取 设置名称  和权限
                $config = include ($dir . '/config.php');
                $permissions = include ($dir . '/permission.php');
                //把模块存入 模块表, 其所有权限也存入
                Module::firstOrNew(['name' => $moduleName])->fill(
                    ['title' => $config['app'],'permission' => $permissions]
                )->save();
                foreach($permissions as $permission){
                    //组合 权限 名称 , 方便区分
                    $name = $moduleName. '-' . $permission['name'];
                    Permission::firstOrNew(['name'=>$name])->fill(
                        ['title'=> $permission['title'], 'module' => $moduleName]
                    )->save();
                }
            }
        }
//        1. 找到站长账号, 2. 初始化权限
        $role = Role::where('name','webmaster')->first();
        $allPermissions = Permission::pluck('name');
        // 往 role_has_permission 里存 数据
        $role -> syncPermissions($allPermissions);
        //指定账号为站长
        $user = User::where('email','hwjmsn@hotmail.com')->first();
        //同步 站长角色 , 需要在 User 模型里 use HasRole
        $user ->syncRoles('webmaster');
        //清除一下权限的缓存
        app()['cache']->forget('spatie.permission.cache');
        //设置命令行的一个提示信息
        $this->info('模块数据操作完毕');
    }
}
