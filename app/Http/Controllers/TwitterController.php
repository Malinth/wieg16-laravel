<?php

namespace App\Http\Controllers;


use App\Twitter;
use Illuminate\Http\Request;

class TwitterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function countWordsInTweets() {
        $tweets = Twitter::all();
        echo Twitter::countWords($tweets);
        return View('twitter/index', ['tweets' => $send]);
    }

    public function searchTweets() {
        return View('twitter/index');
    }

    public function countWordsInTweetsAndSort(Request $request) {
        $TheTweets = Twitter::getTweets($request->twittertoken, $request->word);
        $sortedTweets = Twitter::countAndSort($TheTweets);
        return View('twitter/show', ['words' => $sortedTweets]);
    }
}