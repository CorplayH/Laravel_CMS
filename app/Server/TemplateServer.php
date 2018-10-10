<?php
/**
 * Created by PhpStorm.
 * User: Will
 * Date: 9/10/18
 * Time: 21:29
 */

namespace App\Server;


class TemplateServer
{
    
    public function config()
    {
        $templates = glob(public_path('templates/*'));
//        dd($templates);
        //定义一个空数组,用来接收有效模板的配置文件数据
        $configs = [];
        //检查每套模板里面是否有配置文件,如果有配置文件,根据配置文件里面内容获取对应的数据
        foreach ($templates as $k => $template) {
            //检查$template每个模板里面是否有配置文件,如果有,将配置文件的值取出来,然后组合成一个数组,返回去
            if ($config = $this->parseConfig($template)){
                $configs[] = $config;
            }
        }
        //将得到的配置项数据返回
        return $configs;
    }
    
    
    /**
     * 检测每个模板文件是否有配置文件,如果有,处理配置文件
     */
    public function parseConfig($dir){
        //定义模板中的配置文件
        $filename = $dir . '/packagist.json';
        //判断是否存在配置文件
        if (is_file($filename)){
            //将配置文件中的内容获取出来
            $config = file_get_contents($filename);
            //将获取的配置文件数据转成php的数组
            $config = json_decode($config,true);
            //对配置文件的数据进行处理
            $config['preview'] = asset('templates/' . basename($dir) . '/' . $config['preview']);
            //将当前模板的目录名称加入到config配置项的值中去
            $config['name'] = basename($dir);
            //获取到了每个模板中的配置文件后,将处理后的配置文件返回
            return $config;
        }
    }
}
