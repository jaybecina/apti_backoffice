<?php

namespace App\Services;

use App\Services\BaseService;
use App\Models\News;

use URL;

class NewsService extends BaseService
{

    public function __construct(News $news)
    {
        $this->model = $news;
    }

    public function updateNewsImage(News $news, $request)
    {
        $this->transaction(function() use ($news, $request) {
            $base_url = URL::to('/');
            $image_path = $request['news_image']->store('uploads/news', 'public');

            $news->news_image = $image_path;
            $news->news_image_url_path = $base_url ."/storage/". $image_path;
            $news->save();
            return $news;
        });
    }
}
