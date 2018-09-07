@extends('proposal.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h3 style="color:skyblue"><strong>Show Proposal</strong></h3>
				<hr>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('proposal.index') }}"> Back</a>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Salutation:</strong>
                {{ $proposal->salutation }}
            </div>
        </div>	
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $proposal->lastname }}, {{ $proposal->firstname }}
				<br>			
                <strong>Email Address:</strong>
                {{ $proposal->email }}		
				<br>			
                <strong>Contact Phone Number:</strong>
                {{ $proposal->phonenumber }}		
				<br>			
                <strong>Position:</strong>
                {{ $proposal->position }}						
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Institution:</strong>
                {{ $proposal->institution }} 
				<br>			
                <strong>Postal Address:</strong>
                {{ $proposal->postageaddress }}						
				<br>			
                <strong>Paper Title:</strong>
                {{ $proposal->papertitle }}
				<br>			
                <strong>Paper Type:</strong>
                {{ $proposal->papertype }}				
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Proposal Summary:</strong>
                {{ $proposal->summary }}
            </div>
        </div>		
       <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Author's Biostatement:</strong>
                {{ $proposal->biostatement }}
            </div>
        </div>				
    </div>
@endsection