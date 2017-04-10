<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use \App\Comment;
use \App\Content;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Response;
use File;


class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $req)
    {
        $c = new \App\Content();
      	$c->user_id = Auth::user()->id;
      	$c->title = $req->title;
        $c->summary = $req->summary;



        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($_FILES['fileToUpload']['name']);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
          $check = filesize($_FILES["fileToUpload"]["tmp_name"]);
          if($check !== false) {
            //echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
          } else {
            echo "File is not a pdf.";
            $uploadOk = 0;
          }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
          echo "Sorry, file already exists.";
          $uploadOk = 0;
          return;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
          echo "Sorry, your file is too large.";
          $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "pdf") {
          echo "Sorry, only pdf is allowed.";
          $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
          echo "Sorry, your file was not uploaded.";
          // if everything is ok, try to upload file
        } else {
          if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $c->filename = $target_file;
            $c->save();
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
          } else {
            echo "Sorry, there was an error uploading your file.";
          }
        }
        return redirect('/home');
      }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Content $content)
    {
        return view('contents.show', compact('content'));
    }

    public function showpdf(Request $req)
    {
      $filename = $req->filename;

      $path = '../uploads/'.$filename;

      return Response::make(file_get_contents($path), 200, [
        'Content-Type' => 'application/pdf',
        'Content-Disposition' => 'inline; filename="'.$filename.'"'
      ]);
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
    public function destroy(Request $req)
    {
      DB::table('contents')->where('id', '=', $req->content_id)->delete();
      File::delete($req->name);
      return back();
    }
}
