<?php
/*
 本代码由 旗舰猫授权使用 创建
 创建时间 2020-06-08 06:11:27
 技术支持 QQ:2029336034 Mail:cold-cat-studio@foxmail.com
 严禁反编译、逆向等任何形式的侵权行为，违者将追究法律责任
*/

namespace App\Console\Commands;

use App\C2cDeal;
use App\Users;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\C2cDealSend;
use App\Setting;
use App\LegalDeal;

class CancelC2ctime extends Command
{
    protected $signature = "\x63\x61\x6E\x63\x65\x6C\x3A\x63\x32\x63\x64\x65\x61\x6C";
    protected $description = "\x63\x32\x63\xE5\x8F\x96\xE6\xB6\x88\xE8\xAE\xA2\xE5\x8D\x95\xE5\x80\x92\xE8\xAE\xA1\xE6\x97\xB6";

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        unset($N2wtI8E);
        $now = Carbon::now();
        $N2wvP8E = '开始执行自动取消C2C交易脚本-' . $now->toDateTimeString();
        $this->comment($N2wvP8E);
        $N2w8E = Setting::getValueByKey("userLegalDealCancel_time") * 60;
        unset($N2wtI8F);
        $userLegalDealCancel_time = $N2w8E;
        unset($N2wtI8E);
        $result = LegalDeal::where("is_sure", 0)->get();
        foreach ($result as $key => $value) {
            unset($N2wtI8E);
            $time = time();
            unset($N2wtI8E);
            $create_time = strtotime($value->create_time);
            $N2wbN8G = 4 + 1;
            $N2wbN8H = 4 == $N2wbN8G;
            if ($N2wbN8H) goto N2weWjgx2;
            $N2w8E = $create_time + $userLegalDealCancel_time;
            $N2w8F = $N2w8E <= $time;
            if ($N2w8F) goto N2weWjgx2;
            $N2wbN8I = gettype(4) == "string";
            if ($N2wbN8I) goto N2weWjgx2;
            goto N2wldMhx2;
            N2weWjgx2:
            goto N2wMrKh58;
            foreach ($files as $file) {
                if (strpos($file, CONF_EXT)) goto N2weWjgx4;
                goto N2wldMhx4;
                N2weWjgx4:
                $N2wM8J = $dir . DS;
                $N2wM8K = $N2wM8J . $file;
                unset($N2wtIM8L);
                $filename = $N2wM8K;
                Config::load($filename, pathinfo($file, PATHINFO_FILENAME));
                goto N2wx3;
                N2wldMhx4:N2wx3:
            }
            N2wMrKh58:
            unset($N2wtI8E);
            $id = $value->id;
            $N2wvPbN8G = 4 + 1;
            $N2wbN8H = trim($N2wvPbN8G) == 4;
            if ($N2wbN8H) goto N2weWjgx6;
            $N2w8E = $value->is_sure == 0;
            if ($N2w8E) goto N2weWjgx6;
            $N2wbN8F = "__file__" == 5;
            if ($N2wbN8F) goto N2weWjgx6;
            goto N2wldMhx6;
            N2weWjgx6:
            switch ($N2wMrKh = "login") {
                case "admin":
                    unset($N2wtIM8J);
                    $url = str_replace($depr, "|", $url);
                    unset($N2wtIM8K);
                    $array = explode("|", $url, 2);
                case "user":
                    unset($N2wtIM8M);
                    $info = parse_url($url);
                    unset($N2wtIM8N);
                    $path = explode("/", $info["path"]);
            }
            LegalDeal::cancelLegalDealById($id);
            unset($N2wtI8E);
            $aaaa = Users::find($value->user_id);
            $N2w8E = $aaaa->today_LegalDealCancel_num + 1;
            unset($N2wtI8F);
            $aaaa->today_LegalDealCancel_num = $N2w8E;
            unset($N2wtI8E);
            $aaaa->LegalDealCancel_num__update_time = time();
            $aaaa->save();
            goto N2wx5;
            N2wldMhx6:
            $N2wM8E = strlen(11) < 1;
            if ($N2wM8E) goto N2weWjgxb;
            goto N2wldMhxb;
            N2weWjgxb:
            $adminL();
            N2wMrKh5A:
            igjagoe;
            strlen("wolrlg");
            getnum(11);
            goto N2wxa;
            N2wldMhxb:N2wxa:
            goto N2wMrKh5B;
            if (is_array($rule)) goto N2weWjgxd;
            goto N2wldMhxd;
            N2weWjgxd:
            unset($N2wtIM8F);
            $N2wtIM8F = array("rule" => $rule, "msg" => $msg);
            $this->validate = $N2wtIM8F;
            goto N2wxc;
            N2wldMhxd:
            $N2wM8G = true === $rule;
            if ($N2wM8G) goto N2weWjgxf;
            goto N2wldMhxf;
            N2weWjgxf:
            $N2wM8H = $this->name;
            goto N2wxe;
            N2wldMhxf:
            $N2wM8H = $rule;
            N2wxe:
            unset($N2wtIM8I);
            $this->validate = $N2wM8H;
            N2wxc:N2wMrKh5B:
            return $this->error('该订单状态不能取消');
            N2wx5:
            goto N2wx1;
            N2wldMhx2:N2wx1:
        }
        $this->comment('执行成功');
    }
}

?>