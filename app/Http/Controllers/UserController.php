<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Blog;
use App\Models\Message;
use App\Models\Contact;
use App\Models\Rating;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth ;

class UserController extends Controller
{
    public function home(Request $request ){

        if ($request->isMethod('POST')) {

            $rating = new Rating;
            $rating->name = $request->name;
            $rating->star = $request->star;
            $rating->content = $request->content;
            $rating->save();
            return back()->with('success', "Message envoyé avec succès");
        }

        $ratings = Rating::where('visible',true)->orderBy('created_at','desc')->get();
        
        return view('user.files.home',compact('ratings'));
    }

    public function about(Request $request){
        
        if ($request->isMethod('POST')) {

            $contact = new Contact;
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->phone = $request->phone;
            $contact->subject = $request->subject;
            $contact->content = $request->content;
            $contact->save();
            return back()->with('success', "Message envoyé avec succès");
        }
        return view('user.files.about');
    }

    public function blog(){

        $blogs = Blog::where('is_lock',false)->paginate(12);
        
        return view('user.files.blog',compact('blogs'));
    }

    public function blog_detail($id){

        $blog = Blog::find($id);
        $recents = Blog::orderBy('created_at','desc')->paginate(6);
        
        return view('user.files.blog_detail',compact('blog','recents'));
    }

    public function call(){
        
        $gynecos = User::where('role','gyneco')->get();
        // $persons = Message::where('to_id',auth()->user()->id)->distinct()->get();
        $persons = DB::table('messages')->select(DB::raw('CASE WHEN from_id ='.auth()->user()->id.' THEN to_id ELSE from_id END as po,SUM(CASE WHEN read_at is null THEN 1 ELSE 0 END) as nbr'))->where('to_id','=',auth()->user()->id)->groupBy('po')->orderBy('created_at','desc')->get();
        // dd($persons);
        return view('user.files.call',compact('gynecos','persons'));
    }

    public function message($id){
        
        $gyneco = User::find($id);

        $mgs = Message::where('read_at',null)->where('to_id',auth()->user()->id)->where('from_id',$id)->get();
        if(count($mgs) != 0){
            foreach($mgs as $mg){
                $mg->read_at = 1;
                $mg->save();
            }
        }
        $messages = Message::where(['from_id' => auth()->user()->id, 'to_id' =>$id]) ->where('to_id',$id)
        ->orwhere('from_id',$id)
        ->where('to_id',auth()->user()->id)->orderby('created_at','asc')->paginate(15);
        
       
        // dd($messages);
        return view('user.files.message',compact('gyneco','messages'));
    }

    public function save_message(Request $request,$id){
        //return $request->input();

        $message = new Message;
        $message->from_id = auth()->user()->id;
        $message->to_id = $id;
        $message->content = $request->content;
        $message->save();
        return back()->with('success', "Message envoyé avec succès");
    }

    
    public function add_blog(){
        
        return view('user.files.add_blog');
    }

    public function myblog(){

        $blogs = Blog::where(['user_id' => auth()->user()->id])->paginate(12);
        return view('user.files.myblog',compact('blogs'));
    }

    public function save_blog(Request $request){
        //return $request->input();
            $request->validate([
            'title' => 'required|max:255',
            'image' => 'required|image|max:5000',
            'content' => 'required',
        ]);
        $blog = new Blog;
        $blog->user_id = auth()->user()->id;
        $blog->title = $request->title;
        $blog->content = $request->content;
        if($request->hasfile('image')){
                $file = $request->file('image');
                $extension = $request->file('image')->getClientOriginalExtension();
                $a = 'IMG'.date('Ymd-His');
                $filename = $a . '.' . $extension;
                $file->move('uploads/image/', $filename);
                $blog->image = $filename;
            }
        $blog->save();
        return back()->with('success', "Sauvegarder avec succès");
    }

    public function show_blog($id){

        $blog = Blog::find($id);
        return view('user.files.show_blog',compact('blog'));
    }

    public function update_blog(Request $request, $id){
        //return $request->input();
        $request->validate([
           'title' => 'required|max:255',
           'image' => 'image|max:10000',
           'content' => 'required',
       ]);
       $blog = Blog::find($id);
       $blog->title = $request->title;
       $blog->content = $request->content;
       if($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = $blog->image.'.'.$extension;
            $file->move('uploads/image/', $filename);
            $blog->image = $filename;
        }
       $blog->save();
       return redirect()->route('user.myblog')->with('success', "Sauvegarder avec succès");
    }

    public function delete_blog($id){
        
       $blog = Blog::find($id);
       $blog->delete();
        return back()->with('success','Succès');
    }

    public function profil(){
        
        return view('user.files.profil');
    }

    public function image(Request $request,$id){

        $user = User::find($id);
        // dd($request->input());
        $request->validate([
            'image' => 'required|image|max:1000',
        ]);

        if($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $request->file('image')->getClientOriginalExtension();
            $a = 'IMG'.date('Ymd-His').''.$id;
            $filename = $a . '.' . $extension;
            $file->move('uploads/image/', $filename);
            $user->image = $filename;
        }
        $user->save();

        return back()->with('success','Image de profil modifiée avec succès');
    }

    public function update_info(Request $request, $id){

        // dd($request->input());
        $user = User::find($id);
        if($user->pseudo != $request->pseudo)
            $request->validate([
                'pseudo' => 'required|max:255|unique:users',
            ]);
        if($user->email != $request->email)
            $request->validate([
                'email' => 'required|email|max:255|unique:users',
            ]);

        $request->validate([
            'name' => 'required|max:255',
            'phone' => 'required',
            'city' => 'required|max:255',
            'work' => 'required|max:255',
            'birth' => 'required',
            'sex' => 'required',
        ]);
        
        $user->update([
            'name' => $request->name,
            'pseudo' => $request->pseudo,
            'email' => $request->email,
            'phone' => $request->phone,
            'city' => $request->city,
            'work' => $request->work,
            'birth' => $request->birth,
            'sex' => $request->sex,
        ]);

        return back()->with('success','Modification réalisée avec succès');
    }

    public function update_pass(Request $request,$id){
        //return $request->input();
        $user=User::find($id);
        $request->validate([
        'older' => 'required|min:6',
        'password' => 'required|min:6',
        'confirm' => 'required|same:password|min:6'
        ]);
        if(Hash::check($request->older,$user->password))
            $user->password = Hash::make($request->password);
        else
            return back()->with('danger',"Revoir l'ancien mot de passe");
        $user->save();
        return back()->with('success',"Mot de passe modifié avec succès");
    }
}
