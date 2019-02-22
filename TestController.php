<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       $title=$request->all()['Title'];
       $page=1;
       
       $client = new Client();
       $res = $client->get('https://jsonmock.hackerrank.com/api/movies/search/?Title='.$title.'&page='.$page);
       $arr=json_decode($res->getBody()->getContents(), true);
       if(count($arr['data']) == '10'){
        $page=$page+1;
        $res = $client->get('https://jsonmock.hackerrank.com/api/movies/search/?Title='.$title.'&page='.$page);
        $arr2=json_decode($res->getBody()->getContents(), true);
       $finalarr['data']=array_merge($arr['data'],$arr2['data']);
    
       
       }
      
       $titleArray=[];
       foreach ($finalarr['data'] as  $value) {
        
          array_push($titleArray,$value['Title']);
           
       }
        
       sort($titleArray);
       $count=count($titleArray);
       for($x = 0; $x < $count; $x++) {
        echo $titleArray[$x];
         echo "<br>";
        }
    

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
