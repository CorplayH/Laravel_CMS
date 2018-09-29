define(['vue'],function (Vue) {
    return function (data) {
        // console.log(data);
        new Vue({
            el:'#app',
            data:{
                menus : data,
                activeMenu:{},
            },
            methods: {
                addTopMenu(){
                    if( this.menus.button.length<3) {
                        item = {type: 'view', name: '一级菜单', url: '', sub_button: []};
                        this.menus.button.push(item);
                        this.activeMenu = item;
                    }
                },
                delTopMenu(k){
                    this.menus.button.splice(k,1);
                },
                //添加二级菜单
                addSubMenu(v){
                    if(v.sub_button.length<5){
                        item = {type:'view',name:'二级菜单',url:''};
                        v.sub_button.push(item);
                        this.activeMenu = item;
                    }
                },
                //删除二级
                delSubMenu(TopMenu,SubMenuIndex){
                    TopMenu.sub_button.splice(SubMenuIndex,1);
                },
                active(v){
                    this.activeMenu=v;
                }
            }
        });
    };
});
