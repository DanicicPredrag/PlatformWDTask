<?php

namespace App\Http\Controllers;

use App\Activities;

use App\TimeSpent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ActivitiesController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function indexAction(){
        $activities = Activities::get();
        return view('tables.activities')->with('activities' , $activities);
    }

    /**
     * @param $activity_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function activityGetAction($activity_id){
        $activity = Activities::where('activity_id', '=',$activity_id)->with('time_spent')->first();
        return view('tables.activity_time_spent')->with('activity' , $activity);

    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function activityFormAction() {
        return view('forms.activity_create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function activityPostAction(Request $request) {

        $validator = Validator::make($request->all(), Activities::VALIDATION_RULES_CREATE);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->getMessageBag());
        }

        $activity = new Activities();
        $activity->title = $request->title;
        if($activity->save()) {
            return redirect(route('home'));
        }

        dd('there was some kind of error');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function timeSpentFormAction() {
        $activities = Activities::get();

        return view('forms.time_spent')->with('activities' , $activities);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function timeSpentPostAction(Request $request) {

        $validator = Validator::make($request->all(), TimeSpent::VALIDATION_RULES_CREATE);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator->getMessageBag());
        }

        $time_spent = new TimeSpent();
        $time_spent->activity_id = $request->activity_id;
        $time_spent->time_spent = $request->time_spent;
        $time_spent->description = $request->description;
        if ($time_spent->save()){
            return redirect(route('activity',  $request->activity_id));
        }
        dd('there was some kind of error');

    }

}

