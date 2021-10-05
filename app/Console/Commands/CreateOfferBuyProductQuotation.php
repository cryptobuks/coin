<?php
namespace App\Console\Commands;

use App\OfferProduct;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CreateOfferBuyProductQuotation extends Command{

    protected $signature = "createOfferBuyProductQuotation";
    protected $description = "生产认购产品行情数据";

    public function handle(){
        // 获取时间
        $advanceMin = 2; // 提前预设两分钟后的数据
        $time = time() + 60 * $advanceMin;
        $currentMin = date('i', $time);
        $currentDate = date('Y-m-d H:i', $time).':00';
        $time = strtotime($currentDate);
        $isFiveMin = ($currentMin % 5) == 0 ? true : false;
        $isFifteenMin = ($currentMin % 15) == 0 ? true : false;
        $isThirtyMin = ($currentMin % 30) == 0 ? true : false;
        $isHourMin = ($currentMin % 60) == 0 ? true : false;
        $insertData = [];
        // 获取产品数据
        $products = OfferProduct::getProducts();
        DB::beginTransaction();
        try {
            foreach ($products as $k => $v) {
                $todayPrice = $v->today_price;
                // 如果今日行情起售价为0或者为0点则更新今日起售现价为现价
                if ($v->today_price == 0 || $currentMin == '00') {
                    $updateTodayPriceResult = DB::table('offer_buy_product')->where('id', $v->id)->update(['today_price' => $v->now_price]);
                    // 如果更新失败则再更新一次
                    if (!$updateTodayPriceResult) {
                        DB::table('offer_buy_product')->where('id', $v->id)->update(['today_price' => $v->now_price]);
                    }
                    // 今日起售价也更换为现价
                    $todayPrice = $v->now_price;
                }

                // 获得浮动价格
                $price1 = $this->getNowPrice(
                    $todayPrice,
                    $v->now_price,
                    $v->rise_fall_probability / 100,
                    $v->min_increase / 100,
                    $v->max_increase / 100
                );
                $price2 = $this->getNowPrice(
                    $todayPrice,
                    $v->now_price,
                    $v->rise_fall_probability / 100,
                    $v->min_increase / 100,
                    $v->max_increase / 100
                );
                $price3 = $this->getNowPrice(
                    $todayPrice,
                    $v->now_price,
                    $v->rise_fall_probability / 100,
                    $v->min_increase / 100,
                    $v->max_increase / 100
                );

                list($highestPrice, $closePrice, $lowestPrice) = $this->getSortList([$price1, $price2, $price3]);
                $openPrice = (float)$v->now_price;

                $data = ['obp_id' => $v->id, 'highest_price' => $highestPrice, 'close_price' => $closePrice, 'lowest_price' => $lowestPrice, 'open_price' => $openPrice, 'minute' => $currentDate, 'time' => $time];
                $insertData[] = array_merge($data, ['time_type' => 1]);
                if ($isFiveMin) {
                    $insertData[] = array_merge($data, ['time_type' => 2]);
                }
                if ($isFifteenMin) {
                    $insertData[] = array_merge($data, ['time_type' => 3]);
                }
                if ($isThirtyMin) {
                    $insertData[] = array_merge($data, ['time_type' => 4]);
                }
                if ($isHourMin) {
                    $insertData[] = array_merge($data, ['time_type' => 5]);
                }

                $updateNowPriceResult = DB::table('offer_buy_product')->where('id', $v->id)->update(['now_price' => $closePrice]);
                // 如果更新失败则再更新一次
                if (!$updateNowPriceResult) {
                    DB::table('offer_buy_product')->where('id', $v->id)->update(['now_price' => $closePrice]);
                }
            }

            if ($insertData) {
                DB::table('offer_product_increase_record')->insert($insertData);
            }

            DB::commit();
        }catch (\Exception $e) {
            DB::rollBack();
        }

        return true;
    }


    private function getSortList($arr)
    {
        rsort($arr);
        return $arr;
    }

    /**
     * @param int $startPrice 行情数据起售价
     * @param float $nowPrice 行情现价
     * @param float $rade 涨幅概率（小数）
     * @param float $minBl 最小涨幅比例 （小数）
     * @param float $maxBl 最大涨幅比例 （小数）
     */
    public function getNowPrice($startPrice = 10.00, $nowPrice = 0, $rade = 0.85, $minBl = 0.6, $maxBl = 0.84)
    {
//        // 起售价
//        $startPrice = 10;
//        // 涨幅概率
//        $rade = 0.85;
//        // 最小涨幅比例
//        $minBl   = 0.6;
//        // 最大涨幅比例
//        $maxBl   = 0.84;
        // 比例转换整数值
        $blzh = 1000;
        $mins = 1440;
        // 随机涨幅比例
        $randBl = rand(($minBl * $blzh), ($maxBl * $blzh)) / ($blzh/100);
//        echo "涨幅比例：$randBl% \n";
//        echo "涨幅：" . (rand(0,100) < ($rade * 100) ? '涨': '跌')."\n";
        $totalIncreasePrice = $startPrice;
        $totalIncreasePrice += ($startPrice * $randBl / $blzh);
//        echo "今日随机涨幅金额：$totalIncreasePrice \n";

        $increasePrice = $this->convert_scientific_number_to_normal($this->filter_money($this->convert_scientific_number_to_normal($totalIncreasePrice/$mins), 10));

//        echo "涨幅金额：$increasePrice \n";
//        echo "涨幅后金额：".($startPrice+$increasePrice)."\n";
        return (rand(0,100) < ($rade * 100) ? ($nowPrice + $increasePrice) : ($nowPrice - $increasePrice));

    }


    /**
     * 将科学计数法的数字转换为正常的数字
     * 为了将数字处理完美一些，使用部分正则是可以接受的
     * @author loveyu
     * @param string $number
     * @return string
     */
    function convert_scientific_number_to_normal($number)

    {
        if(stripos($number, 'e') === false) {
            //判断是否为科学计数法
            return $number;
        }

        if(!preg_match(
            "/^([\\d.]+)[eE]([\\d\\-\\+]+)$/",
            str_replace(array(" ", ","), "", trim($number)), $matches)
        ) {
            //提取科学计数法中有效的数据，无法处理则直接返回
            return $number;
        }

        //对数字前后的0和点进行处理，防止数据干扰，实际上正确的科学计数法没有这个问题

        $data = preg_replace(array("/^[0]+/"), "", rtrim($matches[1], "0."));
        $length = (int)$matches[2];
        if($data[0] == ".") {
            //由于最前面的0可能被替换掉了，这里是小数要将0补齐
            $data = "0{$data}";
        }

        //这里有一种特殊可能，无需处理
        if($length == 0) {
            return $data;

        }

        //记住当前小数点的位置，用于判断左右移动
        $dot_position = strpos($data, ".");
        if($dot_position === false) {
            $dot_position = strlen($data);

        }

        //正式数据处理中，是不需要点号的，最后输出时会添加上去
        $data = str_replace(".", "", $data);
        if($length > 0) {
            //如果科学计数长度大于0
            //获取要添加0的个数，并在数据后面补充
            $repeat_length = $length - (strlen($data) - $dot_position);
            if($repeat_length > 0) {
                $data .= str_repeat('0', $repeat_length);
            }

            //小数点向后移n位
            $dot_position += $length;
            $data = ltrim(substr($data, 0, $dot_position), "0").".".substr($data, $dot_position);
        } elseif($length < 0) {
            //当前是一个负数
            //获取要重复的0的个数
            $repeat_length = abs($length) - $dot_position;
            if($repeat_length > 0) {
                //这里的值可能是小于0的数，由于小数点过长
                $data = str_repeat('0', $repeat_length).$data;
            }

            $dot_position += $length;//此处length为负数，直接操作
            if($dot_position < 1) {
                //补充数据处理，如果当前位置小于0则表示无需处理，直接补小数点即可
                $data = ".{$data}";
            } else {
                $data = substr($data, 0, $dot_position).".".substr($data, $dot_position);
            }
        }

        if($data[0] == ".") {
            //数据补0
            $data = "0{$data}";
        }

        return trim($data, ".");
    }

    /**
     * 字符串截取, 默认小数点后2位
     * @param $money
     * @param int $accuracy
     * @return float
     */
    private function filter_money($money,$accuracy=2)
    {
        $str_ret = 0;
        if (empty($money) === false) {
            $str_ret = sprintf("%.".$accuracy."f", substr(sprintf("%.".($accuracy+1)."f", floatval($money)), 0, -1));
        }

        return floatval($str_ret);
    }
}