<?php

namespace App\Http\Controllers;

use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;
use Facebook\Facebook;
use Illuminate\Http\Request;

class FacebookController extends Controller
{
    // Method to send Get request to url
    public function doCurl($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = json_decode(curl_exec($ch), true);
        curl_close($ch);
        return $data;
    }


    public function index(Request $request)
    {
        $code = $request->input('code');
        $data = $this->accountKitLogin($code);
        return response()->json($data);
    }

    // Initialize
    public function accountKitLogin($code)
    {
        $app_id = '1913147185381863';
        $secret = 'e1d8729d782fa126bbb795ed951db4fb';
        $version = 'v1.2'; // 'v1.1' for example

        // Exchange authorization code for access token
        $token_exchange_url = 'https://graph.accountkit.com/' . $version . '/access_token?' .
            'grant_type=authorization_code' .
            '&code=' . $code .
            "&access_token=AA|$app_id|$secret";
        $data = $this->doCurl($token_exchange_url);

        if (!isset($data['id'])) return $data;
        $user_id = $data['id'];
        $user_access_token = $data['access_token'];
        $refresh_interval = $data['token_refresh_interval_sec'];

        // Get Account Kit information
        $me_endpoint_url = 'https://graph.accountkit.com/' . $version . '/me?' .
            'access_token=' . $user_access_token;
        $data = $this->doCurl($me_endpoint_url);
        $phone = isset($data['phone']) ? $data['phone']['number'] : '';
        $email = isset($data['email']) ? $data['email']['address'] : '';
        return $data;

    }
        public function loginForm(){
        return view('login');
            }


        public function fbShow(){
            # /js-login.php
            $fb = new Facebook([
                'app_id' => '1913147185381863',
                'app_secret' => '7eba290cef3adacfbcfe19787673ab0a',
                'default_graph_version' => 'v2.10',
            ]);

            $helper = $fb->getJavaScriptHelper();

            try {
                $accessToken = $helper->getAccessToken();
            } catch (FacebookResponseException $e) {
                // When Graph returns an error
                echo 'Graph returned an error: ' . $e->getMessage();
                exit;
            } catch (FacebookSDKException $e) {
                // When validation fails or other local issues
                echo 'Facebook SDK returned an error: ' . $e->getMessage();
                exit;
            }

            if (!isset($accessToken)) {
                echo 'No cookie set or no OAuth data could be obtained from cookie.';
                exit;
            }

            $response = $fb->get('/me', $accessToken);
            $me = $response->getGraphUser();
            return response()->json($me->asArray());
        }

}