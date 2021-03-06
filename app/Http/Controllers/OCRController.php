<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OCRController extends Controller
{
    public function uploadImage(Request $request)
    {
        $url = 'https://aip.baidubce.com/oauth/2.0/token';
        $request['grant_type']       = 'client_credentials';
        $request['client_id']      = 'nTs0215lYq65LTAKCcVrr81g';
        $request['client_secret'] = 'F8Gz6E09y4HMVHinyqfonG3GrHUVfpE5';

        $o = "";
        foreach ($request->all() as $k => $v) {
            $o .= "$k=" . urlencode($v) . "&";
        }
        $request = substr($o, 0, -1);
        $res = $this->requestPost($url, $request);
        var_dump($res);
    }

    public function requestPost($url, $param)
    {
        if (empty($url) || empty($param)) {
            return false;
        }

        $postUrl = $url;
        $curlPost = $param;
        $curl = curl_init(); //初始化curl
        curl_setopt($curl, CURLOPT_URL, $postUrl); //抓取指定网页
        curl_setopt($curl, CURLOPT_HEADER, 0); //设置header
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); //要求结果为字符串且输出到屏幕上
        curl_setopt($curl, CURLOPT_POST, 1); //post提交方式
        curl_setopt($curl, CURLOPT_POSTFIELDS, $curlPost);
        $data = curl_exec($curl); //运行curl

        curl_close($curl);

        return $data;
    }

    public function uploadFile(Request $request)
    {
        $templateSign = "1";
        $url = 'https://aip.baidubce.com/rest/2.0/solution/v1/iocr/recognise?access_token=24.03824e0518ca61842b170c87f8f75ff5.2592000.1641991563.282335-25340740';
        $img = file_get_contents($request['invoice_file']);
        $img = base64_encode($img);
        $image_b64 = urlencode($img);
        $recognise_api_url = "https://aip.baidubce.com/rest/2.0/solution/v1/iocr/recognise";
        $recognise_bodys = "access_token=24.03824e0518ca61842b170c87f8f75ff5.2592000.1641991563.282335-25340740" . "&templateSign=7f173efbd054bc81624dcdc040155c7d" . "&image=" . $image_b64;
        $bodys = array(
            'image' => $img
        );

        $res2 = $this->requestPost($recognise_api_url, $recognise_bodys);

        $datas = [];
        
        foreach (json_decode($res2)->data->ret as $data) {
            $datas[$data->word_name] = $data->word;
        }

        return view('show_result', compact('img', 'res2', 'datas'));
    }

    public function showFuzzyMatch()
    {
        return view('fuzzy-match');
    }

    public function searchKeyword(Request $request)
    {
        $products = DB::table('products')
        ->whereFuzzy('description', $request->description)
        ->orderByFuzzy(['description'])
        ->first();

            dd($products);
        return view('ajax-fuzzy-match');
    }
}
