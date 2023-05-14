<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Html\Builder;
use App\Http\Controllers\Controller;
use App\Models\ReminderNotification;
use Illuminate\Support\Facades\Auth;
use App\DataTables\ReminderDataTable;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ReminderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Builder $builder, ReminderDataTable $dataTable,Request $request)
    {
        // dd($request->all());
        $html = $builder->columns([
            ['data' => 'reminder_notification_id', 'name' => 'reminder_notification_id','title' => 'ID'],
            ['data' => 'title', 'name' => 'title','title' => 'Title'],
            ['data' => 'description', 'name' => 'description','title' => 'Description'],
            ['data' => 'schedule_time', 'name' => 'schedule_time','title' => 'Notification Schedule Time'],
            ['data' => 'created_at', 'name' => 'created_at','title' => 'Scaned At'],
            ['data' => 'action', 'name' => 'action', 'orderable' => false, 'searchable' => false,'title' => 'Action'],
        ])->parameters([
            'order' => [0,'desc'],
            'responsive' => true,
        ]);

        if(request()->ajax()) {
            $users = ReminderNotification::where('user_id',Auth::id())->select('*');

            return $dataTable->dataTable($users)->toJson();
        }
        return view('reminder.list',compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reminder.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            // 'user_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'schedule_time' => 'required'
        );
        $messages = [
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            // dd($request->all());
            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
        } else {
            // dd($request->all());
            $notification = new ReminderNotification();
            $notification->title = $request->title;
            $notification->description = $request->description;
            $notification->schedule_time = $request->schedule_time;
            $notification->user_id = Auth::id();
            if($notification->save()) {
                Session::flash('message', 'Notification Schedule Successfully !');
                Session::flash('alert-class', 'success');
                return redirect()->route('reminders.index');
            } else {
                Session::flash('message', 'Oops !! Something went wrong!');
                Session::flash('alert-class', 'error');
                return redirect('reminders');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = ReminderNotification::find($id);
        if(!empty($user)){
            return view('reminder.view')->with(compact('user'));
        }else{
            Session::flash('message', 'Data not found!');
            Session::flash('alert-class', 'error');
            return redirect('admin/reminders');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = ReminderNotification::find($id);
        if(!empty($user)){
            return view('reminder.edit')->with(compact('user'));
        }
        else{
            Session::flash('message', 'Notification not found!');
            Session::flash('alert-class', 'error');
            return redirect('reminders');
        }
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
        $rules = array(
            // 'user_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'schedule_time' => 'required'
        );
        $messages = [
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            // dd($request->all());
            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
        } else {

            $notification = ReminderNotification::find($id);
            $notification->title = $request->title;
            $notification->description = $request->description;
            $notification->schedule_time = $request->schedule_time;
            if($notification->save()) {
                Session::flash('message', 'Notification Update Successfully !');
                Session::flash('alert-class', 'success');
                return redirect()->route('reminders.index');
            } else {
                Session::flash('message', 'Oops !! Something went wrong!');
                Session::flash('alert-class', 'error');
                return redirect('reminders');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(isset($id)){
            $user = ReminderNotification::find($id);
            if($user->delete())
            {
                return true;
            }
            else{
                return 'Something went to wrong';
            }
        }
    }
}
