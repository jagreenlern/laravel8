<?php

namespace App\Controllers;

use Illuminate\Http\Request;
use App\Libs\Controller;

use App\Model\HeaderImage;
use Illuminate\Support\Facades\Storage;

class HeaderImageController extends Controller{
 

    public function before(){
        if(!file_exists("storage/images/header_images")){
            \File::makeDirectory("storage/images/header_images", $mode = 0777, true, true);
        }
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug){

        $this->view->title(trans('Header Images'));
        //Carga media/header_images.php y pasamos muchos arrays despues en la vista
        return $this->view->render('media/header_images',[
            'slider_images' => collect(HeaderImage::orderBy('order')->get()),
            'dirs' => array_slice(scandir('storage/images/header_images'),2),
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($file){


            $header_image = new HeaderImage();
            $header_image->title = "def";
            $header_image->image = $file;


            if($header_image->save()){
                return $this->redirectToSelf()->withMessage(['success' => trans('message.successfully_added_headerimage')]);
            }else{
                return $this->redirectToSelf()->withMessage(['danger' => trans('message.something_went_wrong')]);
            }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        //
    }


    /**
     * Remove the specified resource from database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id){
        
        if(HeaderImage::find($id)->delete()){
            return $this->redirectToSelf()->withMessage(['success' => trans('message.successfully_deleted_blogpost')]);
        }


        return $this->redirectToSelf()->withMessage(['danger' => trans('message.something_went_wrong')]);
    }



}
