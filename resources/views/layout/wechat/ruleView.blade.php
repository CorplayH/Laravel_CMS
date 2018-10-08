<div class="card" id="rule">
    <div class="card-header">
        添加规则
    </div>
    <div class="card-body">
        <div class="form-group">
            <label>规则名称</label>
            <input type="text" class="form-control" v-model="rule.name" aria-describedby="helpId" placeholder="">
        </div>
        <label>关键词</label>
        <div class="input-group mb-3" v-for="(v,k) in rule.keywords">
            <input type="text" class="form-control" v-model="v.keyword" placeholder="关键词"
                   aria-label="Recipient's username"
                   aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-danger" type="button" @click="delKeyword(k)">删除</button>
            </div>
        </div>
    </div>
    <div class="card-footer text-muted">
        <button class="btn btn-info" type="button" @click="addKeyword()">添加关键词</button>
    </div>
    <textarea name="rule" hidden id="" cols="30" rows="10">@{{ rule }}</textarea>
</div>
@push('js')
    <script>
        require(['hdjs','vue'], function (hdjs, Vue) {
            new Vue({
                el: '#rule',
                data: {
                    rule: {!! json_encode($newRule) !!}
                },
                methods:{
                    addKeyword(){
                        var item ={keyword:''};
                        this.rule.keywords.push(item);
                    },
                    delKeyword(k){
                        this.rule.keywords.splice(k,1);
                    }

                }
            })
        })
    </script>
@endpush
