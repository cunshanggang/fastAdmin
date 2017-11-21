<?php

namespace addons\loginbg\controller;

class Index extends \think\addons\Controller
{

    public function index()
    {
    }

    public function get_daily_bg()
    {
        //采用Infinty的图片

        $this->code = 1;

        $this->data = [
            'url' => 'http://img.infinitynewtab.com/wallpaper/' . (date("Ymd") % 4000) . '.jpg'
        ];
        return;
        //采用Bing每日一图
        $ret = Http::sendRequest("http://www.bing.com/HPImageArchive.aspx?format=js&idx=0&n=1", [], 'GET');

        if ($ret['ret'])
        {
            $json = json_decode($ret['msg'], TRUE);
            if ($json && isset($json['images'][0]))
            {
                $url = $json['images'][0]['url'];
                $startdate = $json['images'][0]['startdate'];
                $enddate = $json['images'][0]['enddate'];
                $copyright = $json['images'][0]['copyright'];
                $url = substr($url, 0, 4) != 'http' ? 'http://cn.bing.com' . $url : $url;
                $title = '';
                $intro = '';
                $ret = Http::sendRequest("http://cn.bing.com/cnhp/coverstory/", [], 'GET');
                if ($ret['ret'])
                {
                    $info = json_decode($ret['msg'], TRUE);
                    if (isset($info['title']))
                    {
                        $title = $info['title'];
                        $intro = $info['para1'];
                    }
                }
                $this->code = 1;
                $this->data = [
                    'title'     => $title,
                    'intro'     => $intro,
                    'url'       => $url,
                    'startdate' => $startdate,
                    'enddate'   => $enddate,
                    'copyright' => $copyright,
                ];
            }
        }
    }

}
