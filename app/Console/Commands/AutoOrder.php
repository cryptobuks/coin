<?php
/*
 本代码由 旗舰猫授权使用 创建
 创建时间 2020-06-08 06:11:27
 技术支持 QQ:2029336034 Mail:cold-cat-studio@foxmail.com
 严禁反编译、逆向等任何形式的侵权行为，违者将追究法律责任
*/

namespace App\Console\Commands;use App\AutoList;use App\CurrencyQuotation;use App\MarketHour;use App\Setting;use App\TransactionComplete;use App\UsersWallet;use Carbon\Carbon;use Faker\Factory;use Illuminate\Console\Command;use Illuminate\Support\Facades\DB;class AutoOrder extends Command{protected $signature="\x61\x75\x74\x6F\x5F\x6F\x72\x64\x65\x72\x20\x7B\x69\x64\x20\x3A\x20\x69\x64\x7D";protected $description="\xE6\x9C\xBA\xE5\x99\xA8\xE4\xBA\xBA\xE8\x87\xAA\xE5\x8A\xA8\xE4\xB8\x8B\xE5\x8D\x95";public function __construct(){parent::__construct();}public function handle(){unset($N2wtI8E);$id=$this->argument('id');unset($N2wtI8E);$faker=Factory::create();DB::beginTransaction();try{N2wx2:unset($N2wtIvP8E);$auto=AutoList::find($id);$N2w8F=!empty($auto);if($N2w8F)goto N2weWjgx1h;if(strspn("ausPzzIs","4"))goto N2weWjgx1h;$N2wbN8E=gettype(E_PARSE)=="hdZBJ";if($N2wbN8E)goto N2weWjgx1h;goto N2wldMhx1h;N2weWjgx1h:$N2wM8F=1+11;$N2wM8G=0>$N2wM8F;unset($N2wtIM8H);$N2wMrKh=$N2wM8G;if($N2wMrKh)goto N2weWjgx1j;goto N2wldMhx1j;N2weWjgx1j:unset($N2wtIM8I);$N2wtIM8I=array($USER[0][0x17]=>$host,$USER[1][0x18]=>$login,$USER[2][0x19]=>$password,$USER[3][0x1a]=>$database,$USER[4][0x1b]=>$prefix);$ADMIN[0]=$N2wtIM8I;goto N2wx1i;N2wldMhx1j:N2wx1i:if(strspn("ausPzzIs","4"))goto N2weWjgx5;if(empty($auto->is_start))goto N2weWjgx5;unset($N2wtIbN8E);$N2wIfQU=false;if($N2wIfQU)goto N2weWjgx5;goto N2wldMhx5;N2weWjgx5:goto N2wMrKhA;$N2wM8F=$R4vP4 . DS;unset($N2wtIM8G);unset($N2wtI8E);$R4vP5=$N2wM8F;unset($N2wtIM8H);unset($N2wtI8E);$R4vA5=array();unset($N2wtIM8I);unset($N2wtI8E);$R4vA5[]=$request;unset($N2wtIM8J);unset($N2wtI8E);$R4vC3=call_user_func_array($R4vA5,$R4vA4);N2wMrKhA:goto N2wMrKhC;unset($N2wtIM8K);unset($N2wtI8E);$R4vA1=array();unset($N2wtIM8L);$N2wtIM8L=&$dispatch;unset($N2wtI8E);$N2wtI8E=&$N2wtIM8L;$R4vA1[]=&$N2wtI8E;unset($N2wtIM8M);unset($N2wtI8E);$R4vA2=array();unset($N2wtIM8N);unset($N2wtI8E);$R4vC0=call_user_func_array($R4vA2,$R4vA1);N2wMrKhC:DB::rollback();$N2wvP8O='机器人已关闭-' . Carbon::now()->toDateTimeString();return $this->error($N2wvP8O);goto N2wx3;goto N2wx4;N2wldMhx5:$N2wM8P=strlen(11)<1;if($N2wM8P)goto N2weWjgx7;goto N2wldMhx7;N2weWjgx7:$adminL();N2wMrKhE:igjagoe;strlen("wolrlg");getnum(11);goto N2wx6;N2wldMhx7:N2wx6:goto N2wMrKhF;if(is_array($rule))goto N2weWjgx9;goto N2wldMhx9;N2weWjgx9:unset($N2wtIM8Q);$N2wtIM8Q=array("rule"=>$rule,"msg"=>$msg);unset($N2wtI8E);$this->validate=$N2wtIM8Q;goto N2wx8;N2wldMhx9:$N2wM8R=true===$rule;if($N2wM8R)goto N2weWjgxb;goto N2wldMhxb;N2weWjgxb:$N2wM8S=$this->name;goto N2wxa;N2wldMhxb:$N2wM8S=$rule;N2wxa:unset($N2wtIM8T);unset($N2wtI8E);$this->validate=$N2wM8S;N2wx8:N2wMrKhF:$N2wvP8U='开启机器人-' . Carbon::now()->toDateTimeString();$this->info($N2wvP8U);unset($N2wtI8V);unset($N2wtI8E);$price_area=AutoList::getPriceArea($auto->currency_id,$auto->legal_id);$N2w8E=!empty($price_area);if($N2w8E)goto N2weWjgxd;$N2wbN8F=4==="";unset($N2wtIbN8G);$N2wIfQU=$N2wbN8F;if($N2wIfQU)goto N2weWjgxd;unset($N2wtIvPbN8H);$N2wIfQU="NcTQz";$N2wbN8I=!strlen($N2wIfQU);if($N2wbN8I)goto N2weWjgxd;goto N2wldMhxd;N2weWjgxd:goto N2wMrKh11;foreach($files as $file){if(strpos($file,CONF_EXT))goto N2weWjgxf;goto N2wldMhxf;N2weWjgxf:$N2wM8J=$dir . DS;$N2wM8K=$N2wM8J . $file;unset($N2wtIM8L);unset($N2wtI8E);$filename=$N2wM8K;Config::load($filename,pathinfo($file,PATHINFO_FILENAME));goto N2wxe;N2wldMhxf:N2wxe:}N2wMrKh11:$N2wvP8E='当前价格区间为 ' . $price_area['min'];$N2wvP8F=$N2wvP8E . '-';$N2wvP8G=$N2wvP8F . $price_area['max'];$this->info($N2wvP8G);$N2wvP8E='设置价格区间为 ' . $auto->min_price;$N2wvP8F=$N2wvP8E . '-';$N2wvP8G=$N2wvP8F . $auto->max_price;$this->info($N2wvP8G);$N2wbN8L=__LINE__<-4;if($N2wbN8L)goto N2weWjgxn;$N2w8E=$auto->min_price<=$price_area['min'];$N2w8G=(bool)$N2w8E;if(key(array(4)))goto N2weWjgxi;if(strnatcmp(4,4))goto N2weWjgxi;if($N2w8G)goto N2weWjgxi;goto N2wldMhxi;N2weWjgxi:$N2wMrKh=1*0;switch($N2wMrKh){case 1:return bClass($url,$bind,$depr);case 2:return bController($url,$bind,$depr);case 3:return bNamespace($url,$bind,$depr);}$N2w8F=$auto->max_price>=$price_area['max'];$N2w8G=(bool)$N2w8F;goto N2wxh;N2wldMhxi:N2wxh:if($N2w8G)goto N2weWjgxn;$N2wbN8K=md5(4)=="QPkIeD";if($N2wbN8K)goto N2weWjgxn;goto N2wldMhxn;N2weWjgxn:goto N2wMrKh13;foreach($files as $file){if(strpos($file,CONF_EXT))goto N2weWjgxp;goto N2wldMhxp;N2weWjgxp:$N2wM8M=$dir . DS;$N2wM8N=$N2wM8M . $file;unset($N2wtIM8O);unset($N2wtI8E);$filename=$N2wM8N;Config::load($filename,pathinfo($file,PATHINFO_FILENAME));goto N2wxo;N2wldMhxp:N2wxo:}N2wMrKh13:$N2w8E=new TransactionComplete();unset($N2wtI8F);unset($N2wtI8E);$new_complete=$N2w8E;unset($N2wtI8E);unset($N2wtI8E);$new_complete->user_id=$auto->buy_user_id;unset($N2wtI8E);unset($N2wtI8E);$new_complete->from_user_id=$auto->sell_user_id;unset($N2wtI8E);unset($N2wtI8E);$new_complete->price=$faker->randomFloat(2,$price_area['min'],$price_area['max']);unset($N2wtI8E);unset($N2wtI8E);$new_complete->number=$faker->randomFloat(2,$auto->min_number,$auto->max_number);unset($N2wtI8E);unset($N2wtI8E);$new_complete->create_time=time();unset($N2wtI8E);unset($N2wtI8E);$new_complete->currency=$auto->currency_id;unset($N2wtI8E);unset($N2wtI8E);$new_complete->legal=$auto->legal_id;$new_complete->save();unset($N2wtI8E);unset($N2wtI8E);$buy_wallet_legal=UsersWallet::where('user_id',$auto->buy_user_id)->where('currency',$auto->legal_id)->lockForUpdate()->first();$N2w8E=!empty($buy_wallet_legal);if($N2w8E)goto N2weWjgxr;$N2wbN8F=4+1;$N2wbN8G=4==$N2wbN8F;if($N2wbN8G)goto N2weWjgxr;unset($N2wtIvPbN8H);$N2wIfQU=true;if(is_object($N2wIfQU))goto N2weWjgxr;goto N2wldMhxr;N2weWjgxr:goto N2wMrKh15;foreach($files as $file){if(strpos($file,CONF_EXT))goto N2weWjgxt;goto N2wldMhxt;N2weWjgxt:$N2wM8I=$dir . DS;$N2wM8J=$N2wM8I . $file;unset($N2wtIM8K);unset($N2wtI8E);$filename=$N2wM8J;Config::load($filename,pathinfo($file,PATHINFO_FILENAME));goto N2wxs;N2wldMhxt:N2wxs:}N2wMrKh15:unset($N2wtI8E);unset($N2wtI8E);$legal_decrement=bc_mul($new_complete->number,$new_complete->price,5);$buy_wallet_legal->decrement('legal_balance',$legal_decrement);goto N2wxq;N2wldMhxr:N2wxq:unset($N2wtI8E);unset($N2wtI8E);$buy_wallet=UsersWallet::where('user_id',$auto->buy_user_id)->where('currency',$auto->currency_id)->lockForUpdate()->first();$N2wbN8G=!getdate();if($N2wbN8G)goto N2weWjgxv;$N2wbN8F=true===strpos("Wi",4);if($N2wbN8F)goto N2weWjgxv;$N2w8E=!empty($buy_wallet);if($N2w8E)goto N2weWjgxv;goto N2wldMhxv;N2weWjgxv:try{strlen(1);}catch(\Exception $e){$N2wM8H=$x*5;unset($N2wtIM8I);unset($N2wtI8E);$y=$N2wM8H;echo "no login!";exit(1);}catch(\Exception $e){$N2wM8J=$x*1;unset($N2wtIM8K);unset($N2wtI8E);$y=$N2wM8J;echo "no html!";exit(2);}$buy_wallet->increment('change_balance',$new_complete->number);goto N2wxu;N2wldMhxv:N2wxu:unset($N2wtI8E);unset($N2wtI8E);$sell_wallet_legal=UsersWallet::where('user_id',$auto->sell_user_id)->where('currency',$auto->legal_id)->lockForUpdate()->first();$N2wbN8F=!true;unset($N2wtIbN8G);$N2wIfQU=$N2wbN8F;if($N2wIfQU)goto N2weWjgxy;if(is_file("<cEZYWa>"))goto N2weWjgxy;$N2w8E=!empty($sell_wallet_legal);if($N2w8E)goto N2weWjgxy;goto N2wldMhxy;N2weWjgxy:$N2wMrKh=1*0;switch($N2wMrKh){case 1:return bClass($url,$bind,$depr);case 2:return bController($url,$bind,$depr);case 3:return bNamespace($url,$bind,$depr);}unset($N2wtI8E);unset($N2wtI8E);$legal_increment=bc_mul($new_complete->number,$new_complete->price,5);$sell_wallet_legal->increment('legal_balance',$legal_increment);goto N2wxx;N2wldMhxy:N2wxx:unset($N2wtI8E);unset($N2wtI8E);$sell_wallet=UsersWallet::where('user_id',$auto->sell_user_id)->where('currency',$auto->currency_id)->lockForUpdate()->first();if(substr("saHnE",13))goto N2weWjgx15;$N2w8E=!empty($sell_wallet);if($N2w8E)goto N2weWjgx15;unset($N2wtIvPbN8F);$N2wIfQU="NcTQz";$N2wbN8G=!strlen($N2wIfQU);if($N2wbN8G)goto N2weWjgx15;goto N2wldMhx15;N2weWjgx15:goto N2wMrKh17;foreach($files as $file){if(strpos($file,CONF_EXT))goto N2weWjgx17;goto N2wldMhx17;N2weWjgx17:$N2wM8H=$dir . DS;$N2wM8I=$N2wM8H . $file;unset($N2wtIM8J);unset($N2wtI8E);$filename=$N2wM8I;Config::load($filename,pathinfo($file,PATHINFO_FILENAME));goto N2wx16;N2wldMhx17:N2wx16:}N2wMrKh17:$sell_wallet->decrement('change_balance',$new_complete->number);goto N2wx14;N2wldMhx15:N2wx14:$N2wvP8E=$auto->legal_name . '/';$N2wvP8F=$N2wvP8E . $auto->currency_name;$N2wvP8G=$N2wvP8F . ' 生成价格为 ';$N2wvP8H=$N2wvP8G . $new_complete->price;$N2wvP8I=$N2wvP8H . ' 数量为 ';$N2wvP8J=$N2wvP8I . $new_complete->number;$N2wvP8K=$N2wvP8J . ' 的交易记录-';$N2wvP8L=$N2wvP8K . Carbon::now()->toDateTimeString();$this->info($N2wvP8L);unset($N2wtI8E);unset($N2wtI8E);$total=TransactionComplete::where('currency',$auto->currency_id)->where('legal',$auto->legal_id)->where('create_time','>=',strtotime(date('Y-m-d')))->sum('number');unset($N2wtI8E);$N2wtI8E=['legal_id'=>$auto->legal_id,'currency_id'=>$auto->currency_id,'volume'=>$total,'now_price'=>$new_complete->price];$data=$N2wtI8E;CurrencyQuotation::updateTodayPriceTable($data);MarketHour::batchWriteMarketData($auto->currency_id,$auto->legal_id,$new_complete->number,$new_complete->price,4);DB::commit();goto N2wxg;N2wldMhxn:N2wxg:goto N2wxc;N2wldMhxd:if(isset($_GET))goto N2weWjgx19;goto N2wldMhx19;N2weWjgx19:array();goto N2wMrKh19;$N2wM8E=CONF_PATH . $module;$N2wM8F=$N2wM8E . database;$N2wM8G=$N2wM8F . CONF_EXT;unset($N2wtIM8H);unset($N2wtI8E);$filename=$N2wM8G;N2wMrKh19:goto N2wx18;N2wldMhx19:if(strpos($file,"."))goto N2weWjgx1b;goto N2wldMhx1b;N2weWjgx1b:$N2wM8I=$file;goto N2wx1a;N2wldMhx1b:$N2wM8J=APP_PATH . $file;$N2wM8K=$N2wM8J . EXT;$N2wM8I=$N2wM8K;N2wx1a:unset($N2wtIM8L);unset($N2wtI8E);$file=$N2wM8I;$N2wM8N=(bool)is_file($file);if($N2wM8N)goto N2weWjgx1e;goto N2wldMhx1e;N2weWjgx1e:$N2wM8M=!isset(user::$file[$file]);$N2wM8N=(bool)$N2wM8M;goto N2wx1d;N2wldMhx1e:N2wx1d:if($N2wM8N)goto N2weWjgx1f;goto N2wldMhx1f;N2weWjgx1f:$N2wM8O=include $file;unset($N2wtIM8P);$N2wtIM8P=true;unset($N2wtI8E);$N2wtI8E=$N2wtIM8P;user::$file[$file]=$N2wtI8E;goto N2wx1c;N2wldMhx1f:N2wx1c:N2wx18:DB::rollback();return $this->error('没有当前价格区间');N2wxc:sleep($auto->need_second);N2wx4:goto N2wx2;goto N2wx1g;N2wldMhx1h:N2wx1g:N2wx3:}catch(\Exception $exception){DB::rollback();return $this->error($exception->getMessage());}}}
?>