<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Guest;
use App\Que;
use App\Table;
use App\GuestRoute;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Expr\Cast\String_;


class GuestsController extends Controller
{
    public function index()
    {
        $items = Guest::all();
        return $items;
    }

    public function getAll()
    {
        $items = Guest::where("status", "<>", "finished")->with('routes.branch')->get();
        $branches = Branch::all();
        $items->branches = $branches;
        Storage::disk('local')->put('all.json', $items);
        return view('registration.all')->with(['branches' => $branches, 'file' => 'all.json']);
    }
    public function all()
    {
        $items = Guest::where("is_inside", '<', 999)->with('routes.branch')->get();
        $branches = Branch::all();
        $items->branches = $branches;
        Storage::disk('local')->put('all.json', $items);
        return view('registration.all')->with(['branches' => $branches, 'file' => 'all.json']);
    }
    public function getAllJson()
    {
        $items = Guest::where("is_inside", '=', 1)->with('routes.branch')->get();
        $branches = Branch::all();
        $items->branches = $branches;
        Storage::disk('local')->put('all.json', $items);
        return $items;
    }

    public function getRegistration()
    {
        $items = Guest::where("is_inside", 0)->where("status", "!=", "finished")->with('routes.branch')->get();
        $branches = Branch::where("position_id", 2)->get();
        $items->branches = $branches;
        Storage::disk('local')->put('registration.json', $items);
        return view('registration.index')->with(['branches' => $branches, 'file' => 'registration.json']);
    }

    public function getUnregisteredIds(){
        $items = \DB::table('guests')->select('id', 'is_inside')->get();
        return $items;
    }

    public function getDistribution($id, $table)
    {

//        $items = \DB::select('
//            SELECT *
//            FROM guests g
//            LEFT JOIN guests_routes gr ON(
//                g.id = gr.guest_id
//                AND NOT EXISTS (
//                    SELECT 1 FROM guests_routes i
//                    WHERE i.guest_id = g.id
//                    AND i.id > gr.id
//                )
//            )
//            Where gr.branche_id = '.$id.'
//            OR gr.table_id = '.$table.'
//        ');
        $branches = Branch::all();
        $currentGuest = Que::where('table_id', $table)->orderBy('the_time')->limit(1)->first();
        if(isset($currentGuest->guest_id))
            $items = Guest::find($currentGuest->guest_id);
        else
            $items = null;
        Storage::disk('local')->put($table.'.json', json_encode($items));
        $testDriveBranches = Branch::where('position_id', 3)->get();
        if($id < 100)
            return view('distribution.index')->with(['branches' => $branches, 'file' => $table.'.json', 'table' => $table, 'branche' => $id, 'testDriveBranches' => $testDriveBranches]);
        else
            return view('testDrive.index')->with(['branches' => $branches, 'file' => $table.'.json', 'table' => $table, 'branche' => $id, 'testDriveBranches' => $testDriveBranches]);
    }

    public function getTestDrive($id, $table){
        $branches = Branch::all();
        $currentGuest = Que::where('table_id', $table)->orderBy('the_time')->limit(1)->first();
        if(isset($currentGuest->guest_id))
            $items = Guest::find($currentGuest->guest_id);
        else
            $items = null;
        Storage::disk('local')->put($table.'.json', json_encode($items));
        $testDriveBranches = Branch::where('position_id', 3)->get();
        return view('testDrive.index')->with(['branches' => $branches, 'file' => $table.'.json', 'table' => $table, 'branche' => $id, 'testDriveBranches' => $testDriveBranches]);
    }

    public function getBranche($id, $table)
    {
        $branches = Branch::all();
        $tables_ids = [];
        $guests = [];
        $tables = Table::where('branche_id', $id)->get();
        foreach($tables as $tbl) {
            $tables_ids[] = $tbl->id;
        }
        $currentGuest = Que::whereIn('table_id', $tables_ids)->orderBy('the_time')->get();
        foreach($currentGuest as $guest){
            $guests[] = $guest->guest_id;
        }
        $items = Guest::whereIn('id', $guests)->where('status', '!=', 'finished')->get();
        return view('distribution.branche')->with(['items' => $items, 'branches' => $branches, 'branche' => $id, 'table' => $table]);
    }

    public function getAllBranches($table)
    {
        $branches = Branch::all();
        $tables_ids = [];
        $guests = [];
        $branches_ids = [];

        foreach($branches as $branche) {
            if($branche->position_id == 2)
                $branches_ids[] = $branche->id;
        }

        $tables = \DB::table('tables')->whereIn('branche_id', $branches_ids)->get();
        foreach($tables as $tbl) {
            $tables_ids[] = $tbl->id;
        }
        $currentGuest = Que::whereIn('table_id', $tables_ids)->orderBy('the_time')->get();
        foreach($currentGuest as $guest){
            $guests[] = $guest->guest_id;
        }
        $items = Guest::whereIn('id', $guests)->where('status', '!=', 'token')->get();
        return view('distribution.distribution')->with(['items' => $items, 'branches' => $branches, 'branche' => Table::find($table)->branche_id, 'table' => $table]);
    }

    public function registerGuest($id, $branch){
        $guest = Guest::find($id);
        $guest->is_inside = 1;
        $guest->status = 'הגיע';
        $dt = new \DateTime;
        $guest->time_reg = $dt->format('Y-m-d H:i:s');
        $guest->save();

        $guestRoute = new GuestRoute;
        $guestRoute->guest_id = $id;
        $guestRoute->position_id = 1;
        $guestRoute->branche_id = $branch;
        $guestRoute->save();

        $table = Table::where('branche_id', $branch)->where('active', 1)->limit(1)->orderBy('current_que')->orderBy('id')->first();
        $table->current_que = $table->current_que + 1;
        $table->guests_count = $table->guests_count + 1;
        $table->save();


        $que = new Que;
        $que->guest_id = $id;
        $que->table_id = $table->id;
        $que->save();
    }
    public function changeGuestBranche($id, $branch){
        $que = Que::where('guest_id', $id)->limit(1)->first();
        $previous_table_id = $que->table_id;
        $tableP = Table::find($previous_table_id);
        $tableP->current_que = $tableP->current_que - 1;
        $tableP->save();

        $guestRoute = new GuestRoute;
        $guestRoute->guest_id = $id;
        if($branch > 100)
            $guestRoute->position_id = 3;
        else
            $guestRoute->position_id = 2;
        $guestRoute->branche_id = $branch;
        $guestRoute->save();

        $table = Table::where('branche_id', $branch)->where('active', 1)->limit(1)->orderBy('current_que')->orderBy('id')->first();
        $table->current_que = $table->current_que + 1;
        $table->guests_count = $table->guests_count + 1;
        $table->save();



        $que = Que::where('guest_id', $id)->firstOrFail();
        $que->guest_id = $id;
        $que->table_id = $table->id;
        $que->save();
    }
    public function store(Request $request)
    {
        $item = new Guest;
        $item->name = $request->name;
        $item->phone = $request->phone;
        $item->city = $request->city;
        $item->is_inside = 1;
        $item->status = 'הגיע';
        $dt = new \DateTime;
        $item->time_reg = $dt->format('Y-m-d H:i:s');
        $item->save();

        $guestRoute = new GuestRoute;
        $guestRoute->guest_id = $item->id;
        $guestRoute->position_id = 1;
        $guestRoute->branche_id = $request->branch;
        $guestRoute->save();


        $table = Table::where('branche_id',$request-> branch)->limit(1)->orderBy('current_que')->orderBy('id')->first();
        $table->current_que = $table->current_que + 1;
        $table->guests_count = $table->guests_count + 1;
        $table->save();


        $que = new Que;
        $que->guest_id = $item->id;
        $que->table_id = $table->id;
        $que->save();

        return $item;
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function take($branche, $table, $id)
    {
        $guest = Guest::find($id);
        $guest->status = 'token';
        $guest->save();

        $guestRoute = new GuestRoute;
        $guestRoute->guest_id = $id;
        if($branche > 100)
            $guestRoute->position_id = 3;
        else
            $guestRoute->position_id = 2;
        $guestRoute->branche_id = $branche;
        $guestRoute->table_id = $table;
        $guestRoute->save();

        $que = Que::where('guest_id', $id)->first();

        $fromTable = Table::find($que->table_id);
        $fromTable->current_que = $fromTable->current_que - 1;
        $fromTable->guests_count = $fromTable->guests_count - 1;
        $fromTable->save();

        $toTable = Table::find($table);
        $toTable->current_que = $toTable->current_que + 1;
        $toTable->guests_count = $toTable->guests_count + 1;
        $toTable->save();

        $que->table_id = $table;
        $que->the_time = Carbon::now()->subMonths(1);
        $que->save();
    }

    public function takeTestDrive($branche, $table, $id)
    {
        $guest = Guest::find($id);
        $guest->status = 'token';
        $guest->save();

        $guestRoute = new GuestRoute;
        $guestRoute->guest_id = $id;
        if($branche > 100)
            $guestRoute->position_id = 3;
        else
            $guestRoute->position_id = 2;
        $guestRoute->branche_id = $branche;
        $guestRoute->table_id = $table;
        $guestRoute->test_drive = 1;
        $guestRoute->save();

        $que = Que::where('guest_id', $id)->first();

        $fromTable = Table::find($que->table_id);
        $fromTable->current_que = $fromTable->current_que - 1;
        $fromTable->guests_count = $fromTable->guests_count - 1;
        $fromTable->save();

        $toTable = Table::find($table);
        $toTable->current_que = $toTable->current_que + 1;
        $toTable->guests_count = $toTable->guests_count + 1;
        $toTable->save();

        $que->table_id = $table;
        $que->the_time = Carbon::now()->subMonths(1);
        $que->save();
    }

    public function release($branche, $table, $id)
    {
        $guest = Guest::find($id);
        $guest->status = 'הגיע';
        $guest->save();

        $guestRoute = new GuestRoute;
        $guestRoute->guest_id = $id;
        $guestRoute->position_id = 1;
        $guestRoute->branche_id = $branche;
        $guestRoute->table_id = null;
        $guestRoute->save();

        $que = Que::where('guest_id', $id)->first();
        $que->the_time = Carbon::now()->addMinutes(5);
        $que->save();
    }

    public function nextStep($branche, $table, $id)
    {
        $guest = Guest::find($id);
        $guest->status = 'waiting test drive';
        $guest->save();


        $table = Table::find($table);
        $table->current_que = $table->current_que - 1;
        $table->save();

        $table = Table::where('branche_id', $branche)->limit(1)->orderBy('current_que')->orderBy('id')->first();
        $table->current_que = $table->current_que + 1;
        $table->guests_count = $table->guests_count + 1;
        $table->save();

        $guestRoute = new GuestRoute;
        $guestRoute->guest_id = $id;
        $guestRoute->position_id = 3;
        $guestRoute->branche_id = $branche;
        $guestRoute->table_id = $table->id;
        $guestRoute->save();


        $que = Que::where('guest_id', $id)->first();
        $que->guest_id = $id;
        $que->table_id = $table->id;
        $que->save();

    }

    public function finish($branche, $table, $id)
    {
        $guest = Guest::find($id);
        $guest->status = 'finished';
        $guest->is_inside = 0;
        $guest->save();

        $guestRoute = new GuestRoute;
        $guestRoute->guest_id = $id;
        $guestRoute->position_id = null;
        $guestRoute->branche_id = null;
        $guestRoute->table_id = null;
        $guestRoute->save();

        $que = Que::where('guest_id', $id)->first()->delete();

        $table = Table::find($table);
        $table->current_que = $table->current_que - 1;
        $table->save();
    }

    public function currentQue()
    {
        $result = [];
        $tables = Table::all();
        foreach($tables as $table){
            $currentGuest = Que::where('table_id', $table->id)->orderBy('the_time')->limit(1)->first();
            if(isset($currentGuest->guest_id))
                $guest = Guest::find($currentGuest->guest_id);
            else
                $guest = [];
            $result[$table->id] = $guest;
        }
        return json_encode($result);
    }

    public function finishWork($table)
    {
        $item = Table::find($table);
        $item->active = 0;
        $item->save();

        $ques = Que::where('table_id', $table)->get();
        $guests = [];
        foreach($ques as $que){
            $item->current_que = $item->current_que - 1;

            $currentTable = Table::where('branche_id', $item->branche_id)->where('active', 1)->limit(1)->orderBy('current_que')->orderBy('id')->first();
            $currentTable->current_que = $currentTable->current_que + 1;
            $currentTable->guests_count = $currentTable->guests_count + 1;
            $currentTable->save();

            $que->table_id = $currentTable->id;
            $que->save();
        }
        return redirect()->back();
    }

    public function startWork($table)
    {
        $item = Table::find($table);
        $item->active = 1;
        $item->save();
        return redirect()->back();
    }

    public function putGuestBackToDistribution($id)
    {
        $guest = Guest::find($id);

        $currentQue = Que::where('guest_id', $id)->limit(1)->orderBy('the_time')->first();
        $previousTable = Table::find(GuestRoute::where('guest_id', $id)->where('position_id', 2)->limit(1)->orderBy('the_time', 'desc')->first()->table_id);

        $guest = Guest::find($id);
        $guest->is_inside = 1;
        $guest->status = 'after test drive';
        $guest->save();

        $guestRoute = new GuestRoute;
        $guestRoute->guest_id = $id;
        $guestRoute->position_id = 2;
        $guestRoute->branche_id = $previousTable->branche_id;
        $guestRoute->save();


        $previousTable->current_que = $previousTable->current_que + 1;
        $previousTable->guests_count = $previousTable->guests_count + 1;
        $previousTable->save();


        $numberOfQue = count(Que::where('table_id', $previousTable->id)->get());

        if(intval($numberOfQue) > 2){
            $lastTwo = Que::where('table_id', $previousTable->id)->limit(3)->orderBy('the_time', 'desc')->get();
            $the_time =  Carbon::parse($lastTwo[2]->the_time)->addSecond();
        }
        else{
            $the_time =  Carbon::now()->addMinutes(5);
        }
        $currentQue->the_time = $the_time;
        $currentQue->table_id = $previousTable->id;
        $currentQue->save();


        return redirect()->back();
    }
}