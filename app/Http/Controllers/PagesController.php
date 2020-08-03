<?php

namespace App\Http\Controllers;

use App\Post;

class PagesController extends Controller {

    public function getIndex() {
        #process variable data or params
        #talk to the model
        #reveive from the model
        #compile or process dara from the model if needed
        #pass that data to the correct view
        // $posts = Post::select()->limit(5);
        $posts = Post::orderBy('created_at','desc')->limit(5)->get();
        return view('pages/welcome')->withPosts($posts);
    }

    public function getAbout() {
        $first = "Vivian";
        $last = "Lee";

        $fullname = $first . " " . $last;
        $major = "NTHU" . " " . "EE";
        $data = [];
        $data['fullname'] = $fullname;
        $data['major'] = $major;
        return view('pages/about')->withData($data);
        //with後面接的名稱要大寫
    }

    public function getContact() {
        $email = 'weiaquarius17@gmail.com';
        return view('pages/contact')->withEmail($email);
    }

    // public function postContact() {

    // }
}


