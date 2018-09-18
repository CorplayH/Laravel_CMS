<div id="app">
    {{--{{get_class ($model)}}--}}
    <div class="card">
        <div class="card-header">
            评论
        </div>
        <div class="card-body">
            <div class="comment mb-3" v-for="(v,k) in comments">
                <div class="row">
                    <div class="col-auto">

                        <!-- Avatar -->
                        <a class="avatar" href="profile-posts.html">
                            <img :src="v.user.icon" alt="..." class="avatar-img rounded-circle">
                        </a>

                    </div>
                    <div class="col ml--2">

                        <!-- Body -->
                        <div class="comment-body col-12">

                            <div class="row">
                                <div class="col">

                                    <!-- Title -->
                                    <h5 class="comment-title">
                                        @{{v.user.name}}
                                    </h5>

                                </div>
                                <div class="col-auto">

                                    <!-- Time -->
                                    <time class="comment-time">
                                        @{{v.created_at}}
                                    </time>

                                </div>
                            </div> <!-- / .row -->

                            <!-- Text -->
                            <p class="comment-text">
                                @{{ v.content }}
                            </p>

                        </div>

                    </div>
                </div> <!-- / .row -->
            </div>
        </div>

    </div>
    {{--判断用户是否登录，登录才可以发表评论--}}
    @auth()
        <form action="" method="post" @submit.prevent="send()">
            <div class="card">
                <div class="card-header">
                    评论
                </div>
                <div class="card-body">
                    <div class="row align-items-start">
                        <div class="col-auto">

                            <!-- Avatar -->
                            <div class="avatar">
                                <img src="{{auth ()->user ()->icon}}" alt="..." class="avatar-img rounded-circle">
                            </div>

                        </div>
                        <div class="col ml--2">

                            <!-- Input -->
                            <div id="editormd">
                                <textarea style="display:none;"></textarea>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-footer text-muted">

                    <button class="btn btn-white">发表评论</button>
                </div>
            </div>
        </form>
    @else
        <div class="card">
            <div class="card-header">
                评论
            </div>
            <div class="card-body">
                你需要先 <a href="{{route ('login')}}">登录</a> 才可发表评论
            </div>
        </div>
    @endauth
    {{--测试编辑器数据跟vue数据同步--}}
    {{--@{{field}}--}}
</div>
@push('js')
    <script>
        require(['hdjs', 'vue','axios','moment'], function (hdjs, Vue,axios,moment) {
            var vm = new Vue({
                el: '#app',
                data: {
                    model: '',//模型
                    field: {content:''},//当前评论数据
                    comments: [],//所有评论数据
                },
                mounted() {
                    //将对应的模型存储到vue的model变量
                    //$model='App\Model\Article'，请求时候如果带到url中去，最终AppModelArticle
                    this.model = '{{str_replace('\\','-',get_class ($model))}}'
                    //加载编辑器
                    hdjs.editormd("editormd", {
                        width: '100%',
                        height: 300,
                        toolbarIcons: function () {
                            return [
                                "bold", "del", "italic", "quote", "|",
                                "list-ul", "list-ol", "hr", "|",
                                "link", "hdimage", "code-block", "|",
                                "watch", "preview", "fullscreen"
                            ]
                        },
                        //后台上传地址，默认为 hdjs配置项window.hdjs.uploader
                        server: '',
                        //editor.md库位置
                        path: "{{asset('org/hdjs')}}/package/editor.md/lib/",
                        //自己增加的：https://pandao.github.io/editor.md/examples/onchange.html
                        onchange: function () {
                            //每次值发生变化，自动同步vue数据
                            //当编辑器值发生改变时候
                            //获取到编辑器的值设置给vm中field中content
                            vm.$set(vm.field, 'content', this.getValue());
                        }
                    });
                    //发送异步请求全部评论
                    url = '/common/comment?model=' + this.model + '&id={{$model['id']}}';
                    axios.get(url).then((response)=>{
                        console.log(response.data);
                        this.comments = response.data.comments;
                    })
                },
                methods: {
                    send(){
                        if(this.check()){
                            //检测评论内容是否为空
                            if(this.field.content == ''){
                                hdjs.swal({
                                    text: "请输入评论内容",
                                    button:false,
                                    icon:'warning'
                                });
                                return false;
                            }
                            //在进行评论提交
                            url = '/common/comment?model=' + this.model + '&id={{$model['id']}}';
                            axios.post(url,this.field).then((response) =>{
                                console.log(response.data);
                                //将数据追加到comments
                                this.comments.push(response.data.comment)
                            })

                        }

                    },
                    //检测发表评论时间间隔是否满足要求
                    check(){
                        var time ={{cms_config('base.comment_expire')}}
                         //获取localStorage上一次发表评论时间
                        let old = parseInt(localStorage.getItem('comment_send_time'));
                        if(old && old+time>moment().unix()){
                            //不允许发评论
                            hdjs.swal({
                                text: "请在"+(old+time-moment().unix())+"秒之后再发送",
                                button:false,
                                icon:'warning'
                            });
                            return false;
                        }
                        //允许发评论
                        //将此次评论时间存储到localStorage
                        localStorage.setItem('comment_send_time',moment().unix());
                        return true;
                    }
                },
            })
        })

    </script>
@endpush
