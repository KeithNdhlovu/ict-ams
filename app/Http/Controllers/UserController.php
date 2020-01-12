<?php

namespace App\Http\Controllers;

use App\EndUser;
use App\Device;
use App\Asset;
use App\Company;
use Validator;
use Auth;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return redirect('/devices');
    }

    /**
     * Show the devices page.
     *
     * @return \Illuminate\Http\Response
     */
    public function devices(Request $request)
    {

        $devices = Device::with(['user', 'user.company'])->get();
        if ($request->has('company')) {
            
            $devices = $devices->filter(function($device) use ($request) {
                return $device->user->company_id == $request->get('company');
            });
        }

        $companies = Company::all();
        return view('devices', [
            'isSearch' => $request->has('company'),
            'devices' => $devices,
            'companies' => $companies,
        ]);
    }

    /**
     * Show the end users page.
     *
     * @return \Illuminate\Http\Response
     */
    public function showUsers(Request $request)
    {

        $endUsers = EndUser::all();
        return view('users', [
            'users' => $endUsers,
        ]);
    }

    /**
     * Show the devices page.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAddUser(Request $request)
    {

        $companies = Company::all();
        return view('addUser', [
            'companies' => $companies,
        ]);
    }

    /**
     * Show the report page.
     *
     * @return \Illuminate\Http\Response
     */
    public function report(Request $request)
    {

        $devices = Device::with('user')->get();
        return view('report', [
            'devices' => $devices,
        ]);
    }
    
    /**
     * Show the add device page.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAddDevice(Request $request)
    {
        $endUsers = EndUser::all();

        return view('addDevice', [
            'endUsers' => $endUsers,
        ]);
    }

    /**
     * Show the edit device page.
     *
     * @return \Illuminate\Http\Response
     */
    public function showEditDevice(Request $request, $id)
    {
        $endUsers = EndUser::all();
        $device = Device::findOrFail($id);

        return view('editDevice', [
            'endUsers' => $endUsers,
            'device' => $device
        ]);
    }
 
    /**
     * Show the edit device page.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile(Request $request)
    {
        $user = Auth::user();

        return view('profile', [
            'user' => $user,
        ]);
    }

    /**
     * Delete the device.
     *
     * @return \Illuminate\Http\Response
     */
    public function doDeleteDevice(Request $request, $id)
    {
        $device = Device::findOrFail($id);

        $device->delete();
        
        return redirect('/devices');
    }
    
    /**
     * Create the devices page.
     *
     * @return \Illuminate\Http\Response
     */
    public function doAddDevice(Request $request)
    {
        $data = $request->all();
        
        $validator = Validator::make($data, Device::createRules());

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $device = Device::create([
            'device_type' => $data['device_type'],
            'serial_number' => $data['serial_number'],
            'asset_number' => $data['asset_number'],
            'device_status' => $data['device_status'],
            'comments' => $data['comments'],
            'telephone_number' => $data['telephone_number'],
            'user_id' => $data['user_id'],
        ]);

        return redirect('/devices')->with('success', 'Successfully created device.');
    }

    /**
     * Create the end users page.
     *
     * @return \Illuminate\Http\Response
     */
    public function doAddUser(Request $request)
    {
        $data = $request->all();
        
        $validator = Validator::make($data, EndUser::createRules());

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        EndUser::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'department_name' => $data['department_name'],
            'employment_status' => $data['employment_status'],
            'company_id' => $data['company_id'],
        ]);

        return redirect('/users')->with('success', 'Successfully created end-user.');
    }
    
    /**
     * Create the devices page.
     *
     * @return \Illuminate\Http\Response
     */
    public function doEditDevice(Request $request, $id)
    {
        $data = $request->all();
        $device = Device::findOrFail($id);

        if ($request->has('device_type'))
            $device->device_type = $data['device_type'];

        if ($request->has('serial_number'))
            $device->serial_number = $data['serial_number'];

        if ($request->has('asset_number'))
            $device->asset_number = $data['asset_number'];

        if ($request->has('device_status'))
            $device->device_status = $data['device_status'];

        if ($request->has('comments'))
            $device->comments = $data['comments'];

        if ($request->has('telephone_number'))
            $device->telephone_number = $data['telephone_number'];
        
        if ($request->has('user_id'))
            $device->user_id = $data['user_id'];

        $device->save();
        
        return redirect('/devices')->with('success', 'Successfully Updated device.');
    }
    
    /**
     * Update profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function doUpdateProfile(Request $request)
    {
        $data = $request->all();
        $user = Auth::user();

        if ($request->has('first_name'))
            $user->first_name = $data['first_name'];

        if ($request->has('last_name'))
            $user->last_name = $data['last_name'];

        $user->save();
        
        return redirect('/profile')->with('success', 'Successfully Updated Profile.');
    }
}
