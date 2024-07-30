<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function dashboard(){
        $adminRequests = User::where('is_Admin', NULL)->get();
        $revisorRequests = User::where('is_Revisor', NULL)->get();
        $writerRequests = User::where('is_Writer', NULL)->get();
        return view('admin.dashboard', compact('adminRequests', 'revisorRequests', 'writerRequests'));
    }

    public function setAdmin(User $user){
        $user->is_admin = true;
        $user->save();
        return redirect(route('admin.dashboard'))->with('message', "You made $user->name administrator");
    }
    public function setRevisor(User $user){
        $user->is_revisor = true;
        $user->save();
        return redirect(route('admin.dashboard'))->with('message', "You made $user->name revisor");
    }
    public function setWriter(User $user){
        $user->is_writer = true;
        $user->save();
        return redirect(route('admin.dashboard'))->with('message', "You made $user->name writer");
    }
    public function editTag(Request $request, Tag $tag){
        $request->validate([
            'name' => 'required|unique:tags',
        ]);

        $tag->update([
            'name' => strtolower($request->name)]);
            return redirect()->back()->with('message', "You refreshed $tag->name");
    }
    public function deleteTag(Tag $tag){
        foreach ($tag->articles as $article) {
            $article->tags()->detach($tag);
        }
        $tag->delete();
        return redirect()->back()->with('message', "You deleted $tag->name");
    }
    public function editCategory(Request $request, Category $category){
        $request->validate([
            'name' => 'required|unique:categories',
        ]);
        $category->update([
            'name' => strtolower($request->name)]);
            return redirect()->back()->with('message', "You refreshed $category->name");
    }
    public function deleteCategory(Category $category){
        $category->delete();
        return redirect()->back()->with('message', "You deleted $category->name");
    } 
    public function storeCategory(Request $request){

        Category::create([
            'name' => strtolower($request->name)]);
            return redirect()->back()->with('message', "You created $request->name");
    }

}
