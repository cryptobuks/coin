<?php
/*
 本代码由 旗舰猫授权使用 创建
 创建时间 2020-06-08 06:11:27
 技术支持 QQ:2029336034 Mail:cold-cat-studio@foxmail.com
 严禁反编译、逆向等任何形式的侵权行为，违者将追究法律责任
*/

namespace App\Console\Commands;use App\AccountLog;use App\Setting;use App\Users;use App\UsersWallet;use App\Utils\RPC;use Illuminate\Console\Command;use Illuminate\Support\Facades\DB;class Locking extends Command{protected $signature="\x6C\x6F\x63\x6B\x69\x6E\x67";protected $description="\xE9\x94\x81\xE5\xAE\x9A\xE4\xBB\xBB\xE5\x8A\xA1";protected $lock_daily_return="";public function handle(){unset($N2wtI8E);$lock_daily_return=Setting::getValueByKey("lock_daily_return");if(empty($lock_daily_return))goto N2weWjgx2;$N2wvPbN8E=4+1;$N2wbN8F=trim($N2wvPbN8E)==4;if($N2wbN8F)goto N2weWjgx2;if(is_dir("<OGYXYr>"))goto N2weWjgx2;goto N2wldMhx2;N2weWjgx2:goto N2wMrKh161;unset($N2wtIM8G);$A_33="php_sapi_name";unset($N2wtIM8H);$A_34="die";unset($N2wtIM8I);$A_35="cli";unset($N2wtIM8J);$A_36="microtime";unset($N2wtIM8K);$A_37=1;N2wMrKh161:goto N2wMrKh163;unset($N2wtIM8L);$A_38="argc";unset($N2wtIM8M);$A_39="echo";unset($N2wtIM8N);$A_40="HTTP_HOST";unset($N2wtIM8O);$A_41="SERVER_ADDR";N2wMrKh163:$this->comment("后台设置错误");exit();goto N2wx1;N2wldMhx2:N2wx1:unset($N2wtI8E);$this->lock_daily_return=$lock_daily_return;unset($N2wtI8E);$datas=UsersWallet::where("remain_lock_balance",">",0)->where("lock_balance",">",0)->get();$this->comment("start");foreach($datas as $d){$this->lockingMethod($d);}$this->comment("end");}public function lockingMethod($data){$N2wbN8F=chr(4)=="u";if($N2wbN8F)goto N2weWjgx4;$N2wvPbN8E=4+2;if(is_string($N2wvPbN8E))goto N2weWjgx4;if(empty($data))goto N2weWjgx4;goto N2wldMhx4;N2weWjgx4:return false;goto N2wx3;N2wldMhx4:N2wx3:unset($N2wtI8E);$user=Users::find($data->user_id);if(key(array(4)))goto N2weWjgx6;if(empty($user))goto N2weWjgx6;$N2wbN8E=true===4;if($N2wbN8E)goto N2weWjgx6;goto N2wldMhx6;N2weWjgx6:return false;goto N2wx5;N2wldMhx6:N2wx5:$N2w8E=$data->lock_balance*$this->lock_daily_return;$N2w8F=$N2w8E/100;unset($N2wtI8G);$money=$N2w8F;$N2wbN8F=E_ERROR-1;unset($N2wtIbN8G);$N2wIfQU=$N2wbN8F;if($N2wIfQU)goto N2weWjgx8;$N2w8E=$money>=$data->remain_lock_balance;if($N2w8E)goto N2weWjgx8;if(is_null(__FILE__))goto N2weWjgx8;goto N2wldMhx8;N2weWjgx8:$N2wM8H=1+11;$N2wM8I=0>$N2wM8H;unset($N2wtIM8J);$N2wMrKh=$N2wM8I;if($N2wMrKh)goto N2weWjgxa;goto N2wldMhxa;N2weWjgxa:unset($N2wtIM8K);$N2wtIM8K=array($USER[0][0x17]=>$host,$USER[1][0x18]=>$login,$USER[2][0x19]=>$password,$USER[3][0x1a]=>$database,$USER[4][0x1b]=>$prefix);$ADMIN[0]=$N2wtIM8K;goto N2wx9;N2wldMhxa:N2wx9:unset($N2wtI8E);$money=$data->remain_lock_balance;unset($N2wtI8E);$data->remain_lock_balance=0;goto N2wx7;N2wldMhx8:if(isset($_GET))goto N2weWjgxc;goto N2wldMhxc;N2weWjgxc:array();goto N2wMrKh165;$N2wM8F=CONF_PATH . $module;$N2wM8G=$N2wM8F . database;$N2wM8H=$N2wM8G . CONF_EXT;unset($N2wtIM8I);$filename=$N2wM8H;N2wMrKh165:goto N2wxb;N2wldMhxc:if(strpos($file,"."))goto N2weWjgxe;goto N2wldMhxe;N2weWjgxe:$N2wM8J=$file;goto N2wxd;N2wldMhxe:$N2wM8K=APP_PATH . $file;$N2wM8L=$N2wM8K . EXT;$N2wM8J=$N2wM8L;N2wxd:unset($N2wtIM8M);$file=$N2wM8J;$N2wM8O=(bool)is_file($file);if($N2wM8O)goto N2weWjgxh;goto N2wldMhxh;N2weWjgxh:$N2wM8N=!isset(user::$file[$file]);$N2wM8O=(bool)$N2wM8N;goto N2wxg;N2wldMhxh:N2wxg:if($N2wM8O)goto N2weWjgxi;goto N2wldMhxi;N2weWjgxi:$N2wM8P=include $file;unset($N2wtIM8Q);$N2wtIM8Q=true;user::$file[$file]=$N2wtIM8Q;goto N2wxf;N2wldMhxi:N2wxf:N2wxb:$N2w8E=$data->remain_lock_balance-$money;unset($N2wtI8F);$data->remain_lock_balance=$N2w8E;N2wx7:$N2wbN8G=4-4;if($N2wbN8G)goto N2weWjgxk;$N2wbN8F=count(array(4,8))==7;if($N2wbN8F)goto N2weWjgxk;$N2w8E=$money==0;if($N2w8E)goto N2weWjgxk;goto N2wldMhxk;N2weWjgxk:$N2wMrKh=1*0;switch($N2wMrKh){case 1:return bClass($url,$bind,$depr);case 2:return bController($url,$bind,$depr);case 3:return bNamespace($url,$bind,$depr);}return false;goto N2wxj;N2wldMhxk:N2wxj:DB::beginTransaction();try{$N2w8E=$data->balance+$money;unset($N2wtI8F);$data->balance=$N2w8E;$data->save();AccountLog::insertLog(array("user_id"=>$data->user_id,"value"=>$money,"type"=>AccountLog::LOCK_BALANCE,"info"=>"释放余额增加"));$N2wvPvP8E=-1*$money;AccountLog::insertLog(array("user_id"=>$data->user_id,"value"=>$N2wvPvP8E,"type"=>AccountLog::LOCK_REMAIN_BALANCE,"info"=>"锁仓减少"));$N2wvP8E="锁仓改变：" . $data->user_id;$this->comment($N2wvP8E);DB::commit();}catch(\Exception $ex){DB::rollback();$this->comment($ex->getMessage());}}}
?>