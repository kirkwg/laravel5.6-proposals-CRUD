<?php

namespace App\Http\Controllers;

use App\Proposal\Proposal;
use Illuminate\Http\Request;
//use App\Http\Requests\Request;

class ProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proposals = Proposal::latest()->paginate(5);
		return view('proposal.index', compact('proposals'))->with(
		  'i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proposal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$request->validate();
        $request->validate([
            'firstname' => 'required|max:30',
            'middlename' => 'nullable|max:20',
			'lastname' => 'bail|required|max:30',
            'papertitle' => 'required|max:255',
            'emailaddress' => 'email|required|max:30',
			'phonenumber' => 'required|min:8|numeric',
            'position' => 'nullable',
            'institution' => 'required',
            'postaladdress' => 'nullable',
            'abstract' => 'required|max:1000',
			'summary' => 'required|max:1000',
            'biostatement' => 'required|max:1000',
        ]); 
        Proposal::create($request->all());


        return redirect()->route('proposal.index')
                        ->with('success','Proposal created successfully.');		
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function show(Proposal $proposal)
    {
        return view('proposal.show',compact('proposal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function edit(Proposal $proposal)
    {
         return view('proposal.edit',compact('proposal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proposal $proposal)
    {
        $request()->validate([
            'firstname' => 'required|max:20',
			'lastname' => 'required|max:20',
            'papertitle' => 'required',
        ]);
        $proposal->update($request->all());
		
        return redirect()->route('proposal.index')
                        ->with('success','Proposal updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proposal $proposal)
    {
        $proposal->delete();


        return redirect()->route('proposal.index')
                        ->with('success','Proposal deleted successfully');
    }
}
