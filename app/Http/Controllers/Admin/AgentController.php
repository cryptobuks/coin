<?php
namespace App\Http\Controllers\Admin;

use App\Agent as AgentModel;
use Illuminate\Support\Facades\DB;

class AgentController extends Controller
{

    /**返回页面
     *
     */
    public function list()
    {
        return view('admin.agent.list');
    }


    /**返回列表数据
     * @return \Illuminate\Http\JsonResponse
     */
    public function listData()
    {
        $limit = request()->input('limit', 10);
        $list = AgentModel::with('user')->paginate($limit);
        foreach ($list as $k => $v)
        {
            $list[$k]['account_number'] = $v['user']['account_number'];
        }
        return $this->layuiData($list);
    }

    /*
    *添加代理
    */
    public function add()
    {

        if (request()->isMethod('GET')) {

            $id = request()->input('id', 0);
            if (empty($id)) {
                $result = new AgentModel();
            } else {
                $result = AgentModel::find($id);
            }

            // 获取最高等级
            $levelInfo = DB::table('agent')->select('level')->orderBy('level', 'desc')->get()->first();
            if($levelInfo){
                $level = $levelInfo->level;
            }else{
                $level = 3;
            }

            return view('admin.agent.add')->with(['result' => $result, 'level' => $level]);
        }

        if (request()->isMethod('POST')) {
            $data['name']          = request()->input('name', '');
            $data['icon']         = request()->input('icon', '');
            $data['start_price']       = request()->input('start_price', 0);
            $data['now_price']          = request()->input('now_price', 0);
            $data['circulation']        = request()->input('circulation', 0);
            $data['rise_fall_probability']        = request()->input('rise_fall_probability', 0);
            $data['min_increase']            = request()->input('min_increase', 0);
            $data['max_increase']            = request()->input('max_increase', 0);
            $data['end_date']            = request()->input('end_date', '');
            $data['exchange_start_dete']            = request()->input('exchange_start_dete', '');
            $data['status']            = request()->input('status', 0);

            foreach ($data as $k => $v) if ($k!= 'status' && !$v) return $this->error('请填写完整表单');


            if (!is_numeric($data['min_increase']) || !is_numeric($data['max_increase'])) return $this->error('今日价格最大最小涨幅只能是数字');
            if ($data['max_increase'] < $data['min_increase']) return $this->error('错误的最大最小涨幅设置');
            if (!is_numeric($data['rise_fall_probability'])) return $this->error('今日价格涨跌几率只能是数字');


            $id = request()->input('id', 0);

            if ($id) {
                $offerProductGoods = AgentModel::find($id);
            } else {
                $offerProductGoods = new AgentModel();
            }


            DB::beginTransaction();
            try {

                $offerProductGoods->name             = $data['name'];
                $offerProductGoods->icon             = $data['icon'];
                $offerProductGoods->start_price      = $data['start_price'];
                $offerProductGoods->now_price        = $data['now_price'];
                $offerProductGoods->circulation      = $data['circulation'];
                $offerProductGoods->rise_fall_probability = $data['rise_fall_probability'];
                $offerProductGoods->min_increase     = $data['min_increase'];
                $offerProductGoods->max_increase     = $data['max_increase'];
                $offerProductGoods->end_date         = $data['end_date'];
                $offerProductGoods->exchange_start_dete   = $data['exchange_start_dete'];
                $offerProductGoods->status           = $data['status'];

                $info = $offerProductGoods->save();
                if (!$info) throw new \Exception('保存失败');

                DB::commit();
                return $this->success('保存成功');
            } catch (\Exception $e) {
                DB::rollback();
                return $this->error($e->getMessage());
            }
        }
    }

    public function start(){
        $id = request()->input('id', 0);
        $offerProduct = AgentModel::find($id);
        switch ($offerProduct->status){
            case  0:
                $offerProduct->status = 1;
                break;
            case 1:
                $offerProduct->status = 0;
                break;
        }
        $offerProduct->save();
        return $this->success('保存成功');
    }


}