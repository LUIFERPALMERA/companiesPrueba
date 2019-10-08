<?php

namespace App\Http\Controllers;
use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\User;
use App\Mail;
use App\Mail\MailNotify;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        //
        $companies = Company::paginate(10);
        return view('companies.index')->with(compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return \App::getLocale();
        //return $request->all();
        $request->validate([
            'logo' => 'dimensions:min_width=100,min_height=100|max:2000|mimes:jpeg,bmp,png',
            'name' => 'required|max:455',
            'email'=> 'nullable|max:255|unique:companies,email|email',
            'website'=> 'nullable|url',
        ]);

        $company = new Company();
        $company->name = $request->name;
        $company->email  = $request->email;
        
        if($request->logo != null){
            $date = Carbon::now();
            $ruta = $request->name."-".date("Ymd-His").".".$request->logo->getClientOriginalExtension();
            \Storage::disk('public')->put($ruta,  \File::get($request->logo));
            $company->logo = "/storage/".$ruta;
        }
        
        $company->website = $request->website;
        $company->save();
        $name = $company->name;
        $user = User::where('email','admin@admin.com')->first();
        \Mail::to($user)->send(new MailNotify($name));

        return redirect()->route('companies.index')->with('success_message', __('form.action_successful'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $company= Company::find($id);
        return view('companies.show')->with(['company'=>$company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $company= Company::find($id);
        return view('companies.edit')->with(['company'=>$company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $validator = Validator::make(
            $request->all(),
            [
                'id' => 'required|exists:companies',
                'logo' => 'dimensions:min_width=100,min_height=100|max:5000|mimes:jpeg,bmp,png',
                'name' => 'required|max:455',
                'email'=> 'nullable|email|max:255|unique:companies,email,'.$request->id,
                'website'=> 'nullable|url',
            ]
        );
        //si hay errores returna array de errores
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $company = Company::find($request->id);
        $company->name = $request->name;
        $company->email  = $request->email;
        if($request->logo != null){
            $date = Carbon::now();
            $ruta = $request->name."-".date("Ymd-His").".".$request->logo->getClientOriginalExtension();
            \Storage::disk('public')->put($ruta,  \File::get($request->logo));
            $company->logo = "/storage/app/public/".$ruta;
        }
        $company->website = $request->website;
        $company->save();

        return redirect()->route('companies.index')->with('success_message', __('form.action_successful'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $validator = Validator::make(
            $request->all(),
            [
                'id' => 'required|exists:companies',
            ]
        );
        //si hay errores returna array de errores
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }
        $company = Company::find($request->id);

        Company::destroy($request->id);
        return redirect()->route('companies.index')->with('success_message', __('form.action_successful'));
    }
}
