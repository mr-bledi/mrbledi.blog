<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PagesController extends Controller {
  public function getIndex(){
    $posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
    return view('pages.home')->withPosts($posts);
  }
  public function getAbout(){
      $first = 'Bledar';
      $last = 'Meda';

      $fullname = $first . " " . $last;
      $email = 'contact@mr-bledi.xyz';
      $data = [];
      $data['email'] = $email;
      $data['fullname'] = $fullname;
      return view('pages.about')->withData($data);
  }
  public function getContact(){
    return view ('pages.contact');
  }

}
?>
