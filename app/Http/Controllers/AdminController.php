<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Blog;
use App\Models\Message;
use App\Models\Rating;
use App\Models\Contact;
use App\Models\Newsletter;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth ;

class AdminController extends Controller
{
    public function dashboard(){

        $count1 = User::where('role','user')->count();
        $count2 = User::where('role','teach')->count();
        $count3 = User::where('role','gyneco')->count();
        $count4 = User::where('role','admin')->count();
        $rating = Rating::count();
        $blog = Blog::count();
        $chat = Message::count();
        
        $stats = DB::table('messages')->select(DB::raw('from_id,SUM(CASE WHEN read_at is null THEN 1 ELSE 1 END) as nbr'))->groupBy('from_id')->orderBy('created_at','desc')->get();
        $info1 = array();
        foreach($stats as $stat){
            $info1 = array_merge($info1,array($stat->from_id));
        }
        $others = User::whereNotIn('id',$info1)->get();

        $graphs = DB::table('blogs')->select(DB::raw('user_id,SUM(CASE WHEN is_lock is null THEN 1 ELSE 1 END) as nbr'))->groupBy('user_id')->orderBy('created_at','desc')->get();
        $info2 = array();
        foreach($graphs as $graph){
            $info2 = array_merge($info2,array($graph->user_id));
        }
        $persos = User::whereNotIn('id',$info2)->get();
            
        // dd($others);
        return view('admin/file/dashboard',compact('count1','count2','count3','count4','rating','blog','chat','stats','others','graphs','persos'));
    }
    
    public function profil(){
        return view('admin/file/profil');
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

    public function update1(Request $request,$id){

        $user = User::find($id);
        // dd($request->input());
        $request->validate([
            'name' => 'required|max:255',
            'phone' => 'required',
            'work' => 'required',
        ]);

        if($request->email != $user->email)
        $request->validate([
            'email' => 'required|email|max:255|unique:users',
        ]);
        if($request->pseudo != $user->pseudo)
        $request->validate([
            'pseudo' => 'required|max:255|unique:users',
        ]);

        $user->update([
            'name' => $request->name,
            'pseudo' => $request->pseudo,
            'email' => $request->email,
            'phone' => $request->phone,
            'work' => $request->work,
        ]);

        return back()->with('success','Information personnelle modifiée avec succès');
    }

    public function update2(Request $request,$id){
        //return $request->input();
        $user=User::find($id);
        $request->validate([
        'old' => 'required|min:8',
        'new' => 'required|min:8',
        'confirm' => 'required|same:new|min:8'
        ]);
        if(Hash::check($request->old,$user->password))
            $user->password = Hash::make($request->new);
        else
            return back()->with('danger',"Revoir l'ancien mot de passe");
        $user->save();
        return back()->with('success',"Mot de passe modifié avec succès");
    }
    
    public function list1(){

        $users = User::where('role','user')->orderBy('created_at', 'desc')->get();
        return view('admin/file/list1', compact('users'));
    }

    public function list2(){

        $users = User::where('role','gyneco')->orWhere('role','teach')->orderBy('created_at', 'desc')->get();
        return view('admin/file/list2', compact('users'));
    }

    public function add_personal(Request $request){

        // dd($request->input());
        $request->validate([
            'name' => 'required|max:255',
            'pseudo' => 'required|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'phone' => 'required',
            'city' => 'required|max:255',
            'role' => 'required',
            'sex' => 'required',
            'password' => 'required|min:8',
            'confirm' => 'required|min:8|same:password|',
        ]);


        if($request->role == "gyneco"){
            $request->validate([
                'work' => 'required|max:255',
            ]);
            if(count($request->work) == 1)
                $work = $request->work[0];
            else
                $work = $request->work[0].' '.$request->work[1];
        }else{
            $request->validate([
                'work2' => 'required|max:255',
            ]);
            $work = $request->work2;
        }
        $user = User::create([
            'name' => $request->name,
            'pseudo' => $request->pseudo,
            'email' => $request->email,
            'phone' => $request->phone,
            'city' => $request->city,
            'work' => $work,
            'role' => $request->role,
            'sex' => $request->sex,
            'password' => Hash::make($request->password),
        ]);

        return back()->with('success','Inscription réalisé avec succès');
    }

    public function update_personal(Request $request,$id){

        $user = User::find($id);
        // dd($request->input());
        $request->validate([
            'name' => 'required|max:255',
            'phone' => 'required',
            'city' => 'required|max:255',
            'role' => 'required',
            'sex' => 'required',
        ]);

        if($request->email != $user->email)
            $request->validate([
                'email' => 'required|email|max:255|unique:users',
            ]);
        if($request->pseudo != $user->pseudo)
            $request->validate([
                'pseudo' => 'required|max:255|unique:users',
            ]);

        if($request->role == "gyneco"){
            $request->validate([
                'work' => 'required|max:255',
            ]);
            if(count($request->work) == 1)
                $work = $request->work[0];
            else
                $work = $request->work[0].' '.$request->work[1];
        }else{
            $request->validate([
                'work2' => 'required|max:255',
            ]);
            $work = $request->work2;
        }

        if(!$request->password)
            $password= $user->password;
        else{
            $request->validate([
                'password' => 'required|min:8',
                'confirm' => 'required|min:8|same:password|',
            ]);
            $password= Hash::make($request->password);
        }
        
        if(!$request->password)
            $password= $user->password;
        else{
            $request->validate([
                'password' => 'required|min:8',
                'confirm' => 'required|min:8|same:password|',
            ]);
            $password= Hash::make($request->password);
        }
        
        $user->update([
            'name' => $request->name,
            'pseudo' => $request->pseudo,
            'email' => $request->email,
            'phone' => $request->phone,
            'city' => $request->city,
            'work' => $work,
            'role' => $request->role,
            'sex' => $request->sex,
            'password' => $password,
        ]);

        return back()->with('success','Inscription réalisé avec succès');
    }

    public function list3(){

        $users = User::where('role','admin')->orderBy('created_at', 'desc')->get();
        return view('admin/file/list3', compact('users'));
    }

    public function add_admin(Request $request){

        // dd($request->input());
        $request->validate([
            'name' => 'required|max:255',
            'pseudo' => 'required|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'phone' => 'required',
            'work' => 'required',
            'password' => 'required|min:8',
            'confirm' => 'required|min:8|same:password|',
        ]);

        $user = User::create([
            'name' => $request->name,
            'pseudo' => $request->pseudo,
            'email' => $request->email,
            'phone' => $request->phone,
            'work' => $request->work,
            'role' => 'admin',
            'password' => Hash::make($request->password),
        ]);

        return back()->with('success','Inscription réalisé avec succès');
    }

    public function update_admin(Request $request,$id){

        $user = User::find($id);
        // dd($request->input());
        $request->validate([
            'name' => 'required|max:255',
            'phone' => 'required',
            'work' => 'required',
            'password' => 'required|min:8',
            'confirm' => 'required|min:8|same:password|',
        ]);

        if($request->email != $user->email)
        $request->validate([
            'email' => 'required|email|max:255|unique:users',
        ]);
        if($request->pseudo != $user->pseudo)
        $request->validate([
            'pseudo' => 'required|max:255|unique:users',
        ]);

        if(!$request->password)
            $password= $user->password;
        else{
            $request->validate([
                'password' => 'required|min:8',
                'confirm' => 'required|min:8|same:password|',
            ]);
            $password= Hash::make($request->password);
        }

        $user->update([
            'name' => $request->name,
            'pseudo' => $request->pseudo,
            'email' => $request->email,
            'phone' => $request->phone,
            'work' => $request->work,
            'password' => $password,
        ]);

        return back()->with('success','Inscription réalisé avec succès');
    }

    public function lock($id){

        $user =  User::find($id);
        if($user->is_active)
            $user->update(['is_active' => false]);
        else
            $user->update(['is_active' => true]);
        
            return back()->with('success','Félicitation');

    }

    public function blog(){

        $blogs = Blog::orderBy('created_at','desc')->paginate(12);
        return view('admin/file/blog',compact('blogs'));
    }

    
    public function add_blog(){
        
        return view('admin.file.add_blog');
    }

    public function detail_blog($id){

        $blog = Blog::find($id);
        $recents = Blog::orderBy('created_at','desc')->paginate(6);
        
        return view('admin.file.detail_blog',compact('blog','recents'));
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
        return view('admin.file.show_blog',compact('blog'));
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
       return redirect()->route('admin.blog')->with('success', "Sauvegarder avec succès");
    }

    public function lock_blog( $id){

        $blog = Blog::find($id);
        if($blog->is_lock)
            $blog->is_lock = false;
        else
            $blog->is_lock = true;
        $blog->save();
       return back()->with('success', "Sauvegarder avec succès");
    }


    public function contact(){

        $comments = Contact::orderBy('created_at','desc')->get();
        return view('admin.file.contact',compact('comments'));
    }


    public function rating(){

        $ratings = Rating::orderBy('created_at','desc')->get();
        return view('admin.file.rating',compact('ratings'));
    }

    public function visible($id){
        $rating = Rating::find($id);
        if($rating->visible)
            $rating->visible = false;
        else
            $rating->visible = true;
        $rating->save();
        return back();
    }

}
