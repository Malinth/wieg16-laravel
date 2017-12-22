<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Twitter extends Model{

    protected $table = 'twitters';
    protected $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = [
        "id",
        "text"
    ];



    static public function countWords ($all) {
        $tweets = $all->pluck('text');
        $string = json_encode($tweets);
        $string = substr($string, 2, -2);
      //  $string = strtolower($string);
        $arr = explode(" ", $string);

        $notThoseWords = [
            "and",
            "make",
            "last"
        ];

        $arrUnique = array_unique($arr);

        $words = array_diff($arrUnique, $notThoseWords);

        foreach ($words as $word) {

            $count = substr_count($string, $word);
            echo "There is <b>" . $count . "</b> of the word <b>" . $word . "</b><br>";
        }
    }

    static public function getTweets ($token, $word) {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.twitter.com/1.1/search/tweets.json?q='.$word'",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "authorization: Bearer ".$token,
                "cache-control: no-cache",
                "postman-token: 8497ca16-9379-fdec-9748-9a43e5477b1a"
            ),
        ));

        $response = json_decode(curl_exec($curl), true);
        $clean = [];

        foreach ($response['statuses'] as $data) {
            $clean[] = $data['text'];
        }
        return $clean;
    }

    static public function countAndSort ($tweets) {
        $superArr = [];

        foreach ($tweets as $tweet) {
            $exploded = explode(" ", $tweet);
            $superArr = array_merge($superArr ,$exploded);
        }
        $counted = array_count_values($superArr);
        arsort($counted);

        return $counted;
    }



}
