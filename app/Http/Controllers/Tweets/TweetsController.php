<?php

namespace App\Http\Controllers\Tweets;

use App\Http\Controllers\Controller;
use App\Http\Requests\TweetRequest;
use App\Models\Hashtag;
use App\Models\Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TweetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $tweets = Tweet::with('user')->get()->sortBy('Id', '0', true);
        return view('Index', compact('tweets'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(TweetRequest $request)
    {
        $arr = explode(" ", $request->content);
        $hashtagsIds = [];
        foreach ($arr as $ar) {
            if ($ar[0] == '#') {
                $data = Hashtag::where('name', $ar)->first();

                if ($data == null) {
                    $data = Hashtag::create([
                        'name' => $ar
                    ]);
                    array_push($hashtagsIds, $data->id);
                } else {
                    array_push($hashtagsIds, $data->id);
                }

            }
        }
        implode(" ", $arr);
        $data = Tweet::create([
            'content' => $request->content,
            'user_id' => session()->get('Id')
        ]);
        $data = Tweet::find($data->Id);
        $data->hashtags()->attach($hashtagsIds);
        return redirect()->route('Tweets.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $tweet = Tweet::find($id);
        $tweet->delete();
        return redirect()->route('User.edit', (session()->get('Id')));
    }

    public function showHash(Request $request){
        $data = Hashtag::where('name', $request->hashtag)->first();
        $tweets = Hashtag::with('tweets')->find($data->id);
        return view('showHash',compact('tweets'));
    }


}
