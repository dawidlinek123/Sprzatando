<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return Auth::user()->announcements;
        // $announcement=Auth::user()->announcements;
    //    return collect(Storage::disk('uploads')->allFiles(6));
    //    )->sortBy(function ($file) {
            // return $file->getCTime();
        // });
        return view('dashboard.my_announcements',['announcements'=>Auth::user()->announcements]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.add_announcement',['categories'=>Categories::all()]);
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
        $data=$request->validate([
            'title'=>'required|max:255',
            'localization'=>'required',
            'price'=>"numeric|min:1|required",
            "description"=>"required|max:500",
            "expiring_at"=>"required|date",
            "category_id"=>"required|exists:categories,id"
        ]);
        // return $data;
        $data['creator_id']=Auth::id();
        $announcement=Announcement::create($data);
        for($i=1;$i<4;$i++){
            if($request->hasFile('img'.$i)){
                $request->file('img'.$i)->store($announcement->id,'uploads');
            }
        }
        return back()->with('status',"Pomyślnie dodano nowe ogłoszenie");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function show(Announcement $announcement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcement $announcement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Announcement $announcement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $announcement)
    {
        //
    }
}
