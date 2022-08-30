@extends('admin._layoutNew')

@section('page-head')
<style>
    .layui-form-label {
        width: 150px;
    }
    .layui-input-block {
        margin-left: 180px;
    }
</style>
@endsection

@section('page-content')
    <form class="layui-form" action="">
        <div class="layui-form-item">
            <label class="layui-form-label">用户手机号</label>
            <div class="layui-input-block">
                <input type="text" name="phone" autocomplete="off" placeholder="" class="layui-input" value="{{$result->phone}}" disabled>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">邮箱</label>
            <div class="layui-input-block">
                <input type="text" name="email" autocomplete="off" placeholder="" class="layui-input" value="{{$result->email}}" disabled>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">密码</label>
            <div class="layui-input-block">
                <input type="text" name="password" autocomplete="off" placeholder="" class="layui-input" value="">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">是否代理</label>
            <div class="layui-input-block">
                <select lay-filter="agent_level" name="agent_level" lay-verify="required" lay-filter="risk_mode">
                    <option value=""></option>
                    <option value="0" {{ (!$agent) ? 'selected' : '' }} >非代理</option>
                    <option value="1" {{ (!empty($agent['level']) && $agent['level'] == 1) ? 'selected' : '' }} >一级代理</option>
                    <option value="2" {{ (!empty($agent['level']) && $agent['level'] == 2) ? 'selected' : '' }} >二级代理</option>
                </select>
            </div>
        </div>

        <div class="layui-form-item" id="parent_agent_box" style="display: {{$agent && $agent['level'] == 2 ? '' : 'none'}};">
            <label class="layui-form-label">上级代理</label>
            <div class="layui-input-block">
                <select name="parent_agent" id="parent_agent" lay-verify="{{ !empty($agent) && $agent->level >= 2 ? 'required' : ''}}" lay-filter="parent_agent">
                    <option value=""></option>
                    @foreach($agent_list as $item)
                        <option value="{{$item->id}}" {{ !empty($agent['level']) && ($agent['parent_agent_id'] && $agent['parent_agent_id'] == $item->id) ? 'selected' : '' }} >{{$item->account_number}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="layui-form-item" id="recharge_distribution_box" style="display: {{$agent ? '' : 'none'}};">
            <label class="layui-form-label">佣金比例（%）</label>
            <div class="layui-input-block">
                <input type="text" name="recharge_distribution" autocomplete="off" placeholder="" class="layui-input"  value="{{$agent->recharge_distribution ?? ''}}">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">风控类型</label>
            <div class="layui-input-block">
                <select name="risk" lay-verify="required" lay-filter="risk_mode">
                    <option value=""></option>
                    <option value="0" {{ ($result->risk ?? 0) == 0 ? 'selected' : '' }} >无</option>
                    <option value="1" {{ ($result->risk ?? 1) == 1 ? 'selected' : '' }} >盈利</option>
                    <option value="-1" {{ ($result->risk ?? 2) == -1 ? 'selected' : '' }} >亏损</option>
                </select>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">法币交易账号</label>
            <div class="layui-input-block">
                <input type="text" name="account_number" autocomplete="off" placeholder="" class="layui-input" value="{{$result->account_number}}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">法币交易密码</label>
            <div class="layui-input-block">
                <input type="text" name="pay_password" autocomplete="off" placeholder="" class="layui-input" value="">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">身份证号</label>
            <div class="layui-input-block">
                <input type="text" name="card_id" autocomplete="off" placeholder="" class="layui-input" value="@if(!empty($result->card_id)){{$result->card_id}}@endif" @if(empty($result->card_id)) disabled @endif>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">银行卡卡号</label>
            <div class="layui-input-block">
                <input type="text" name="bank_account" autocomplete="off" placeholder="" class="layui-input" value="@if(!empty($res->bank_account)){{$res->bank_account}}@endif" >
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">银行卡所在行</label>
            <div class="layui-input-block">
                <input type="text" name="bank_name" autocomplete="off" placeholder="" class="layui-input" value="@if(!empty($res->bank_name)){{$res->bank_name}}@endif" >
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">支付宝账号</label>
            <div class="layui-input-block">
                <input type="text" name="alipay_account" autocomplete="off" placeholder="" class="layui-input" value="@if(!empty($res->alipay_account)){{$res->alipay_account}}@endif" >
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">微信昵称</label>
            <div class="layui-input-block">
                <input type="text" name="wechat_nickname" autocomplete="off" placeholder="" class="layui-input" value="@if(!empty($res->wechat_nickname)){{$res->wechat_nickname}}@endif" >
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">微信账号</label>
            <div class="layui-input-block">
                <input type="text" name="wechat_account" autocomplete="off" placeholder="" class="layui-input" value="@if(!empty($res->wechat_account)){{$res->wechat_account}}@endif" >
            </div>
        </div>

        <!-- <div class="layui-form-item">
            <div class="layui-inline">
                <label class="layui-form-label">是否设为客服</label>
                <div class="layui-input-block">
                    <input type="radio" name="is_service" class="sports" value="1" title="是" {{ $result->is_service == 1 ? 'checked' : '' }}>
                    <input type="radio" name="is_service" class="sports" value="0" title="否" {{ $result->is_service == 0 ? 'checked' : '' }}>
                </div>
            </div>
        </div> -->
        <input type="hidden" name="id" value="{{$result->id}}">
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" lay-submit="" lay-filter="demo1">立即提交</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
    </form>

@endsection

@section('scripts')
    <script>
        layui.use(['upload', 'form'], function(){
            var upload = layui.upload,
            form = layui.form;
            var agentLevelList = <?php echo json_encode($agentLevelList); ?>;
            form.on('select(agent_level)', function(data) {
                $('#parent_agent').val('');
                $('#parent_agent_box').hide();
                $('#recharge_distribution_box').hide();
                $('#parent_agent').attr('lay-verify', '');
                $('[name="recharge_distribution"]').val(agentLevelList[data.value]);
                if(data.value != 0)
                {
                    $('#recharge_distribution_box').show();
                }
                if(data.value == 2) {
                    $('#parent_agent').attr('lay-verify', 'required');
                    $('#parent_agent_box').show();
                }
            });

            //执行实例
            var uploadInst = upload.render({
                elem: '#upload_test' //绑定元素
                ,url: '{{URL("api/upload")}}' //上传接口
                ,done: function(res){
                    //上传完毕回调
                    if (res.type == "ok"){
                        $("#thumbnail").val(res.message)
                        $("#img_thumbnail").show()
                        $("#img_thumbnail").attr("src",res.message)
                    } else{
                        alert(res.message)
                    }
                }
                ,error: function(){
                    //请求异常回调
                }
            });
        });


        layui.use(['form','laydate'],function () {
            var form = layui.form
                ,$ = layui.jquery
                ,laydate = layui.laydate
                ,index = parent.layer.getFrameIndex(window.name);
            //监听提交
            form.on('submit(demo1)', function(data){
                console.log(data.field);
                var data = data.field;
                $.ajax({
                    url:'{{url('admin/user/edit')}}'
                    ,type:'post'
                    ,dataType:'json'
                    ,data : data
                    ,success:function(res){
                        if(res.type=='error'){
                            layer.msg(res.message);
                        }else{
                            parent.layer.close(index);
                            parent.window.location.reload();
                        }
                    }
                });
                return false;
            });
        });
    </script>

@endsection