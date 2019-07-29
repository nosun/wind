<?php

namespace App\Admin\Controllers;

use App\Admin\Forms\Analysis;
use Encore\Admin\Layout\Content;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\ServerException;
use Illuminate\Http\Request;

class AnalysisController
{
    public function showForm(Content $content)
    {
        return $content
            ->title('智能分析')
            ->body(new Analysis());
    }

    public function getResult(Request $request)
    {

        $client = new Client();

        $api = config('admin.analysis_api');

        $post = $request->post();

        unset($post['_form_']);
        unset($post['_token']);

        $postNew = (function ($post) {
            $data = [];
            foreach ($post as $key => $value) {
                $key = ucfirst($this->camelize($key));
                $data[$key] = (float)$value;
            }
            return $data;
        })($post);


        try {

            $response = $client->post($api, [
                'form_params' => $postNew
            ]);

            if ($response->getStatusCode() == 200) {
                admin_success((string)($response->getBody()));
            } else {
                admin_error("Api Error, Please Check");
            }
        } catch (ClientException $e) {
            admin_error("Api Error, Please Check");
        } catch (ConnectException $e) {
            admin_error("Api Error, Please Check");
        } catch (ServerException $e) {
            admin_error("Api Error, Please Check");
        }

        return back();
    }

    protected function camelize($uncamelized_words, $separator = '_')
    {
        $uncamelized_words = $separator . str_replace($separator, " ", strtolower($uncamelized_words));
        return ltrim(str_replace(" ", "", ucwords($uncamelized_words)), $separator);
    }

    protected function unCamelize($camelCaps, $separator = '_')
    {
        return strtolower(preg_replace('/([a-z])([A-Z])/', "$1" . $separator . "$2", $camelCaps));
    }
}

