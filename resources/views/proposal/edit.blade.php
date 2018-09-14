@extends('proposal.layout')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h3><strong>Edit Proposal</strong></h3>
				<hr>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('proposal.index') }}"> Back</a>
            </div>
        </div>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
	
<div class="container">	
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">		
	    <h7 class="text-danger">[Note: Author name is read-only, not editable..]</h7>
	  </div>
	  <div class="col-xs-12 col-sm-12 col-md-12">						
		<strong>Name:</strong>
		 {{ $proposal->lastname }}, {{ $proposal->firstname }} {{ $proposal->middlename }}
		<!--input type="text" name="lastname" value="{{ $proposal->lastname }}, {{ $proposal->firstname }}" readonly-->					
	  </div>	
    </div><br>
	
    <form action="{{ route('proposal.update',$proposal->id) }}" method="POST">
        @csrf
        @method('PUT')


         <div class="row">			

            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
			        <strong>Salutation:</strong>
				    <select class="form-control" name="salutation" value="{{ Config::get('constants.salutations.' . $proposal->salutation) }}"> 
                      <option value='1' {{ $proposal->salutation == 1 ? 'selected' : '' }}>Professor</option>
                      <option value='2' {{ $proposal->salutation == 2 ? 'selected' : '' }}>Dr.</option>
                      <option value='3' {{ $proposal->salutation == 3 ? 'selected' : '' }}>Mr.</option>
                      <option value='4' {{ $proposal->salutation == 4 ? 'selected' : '' }}>Ms.</option>
					  <option value='5' {{ $proposal->salutation == 5 ? 'selected' : '' }}>Mrs.</option>
                    </select>				
                </div>				
            </div>

			<div class="col-xs-12 col-sm-8 col-md-8">
                <div class="form-group {{ $errors->has('position') ? 'has-error' : '' }}">  
					<strong>Position:</strong>
					<input type="text" name="position" class="form-control" 
                       value="{{ ucwords($proposal->position) }}">
                    <span class="text-danger">{{ $errors->first('position') }}</span>
				</div>	
            </div>

			<div class="col-xs-12 col-sm-4 col-md-4">
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">  
					<strong>Email Address:</strong>
					<input type="text" name="email" class="form-control" value="{{ $proposal->email }}">
                    <span class="text-danger">{{ $errors->first('email') }}</span>
			</div>
            </div>			
			
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
				    <strong>Institution:</strong>
				    <select class="form-control" name="institution" >
                      <option value='1' {{ $proposal->institution == 1 ? 'selected' : '' }}>
                          City University of Hong Kong</option>
                      <option value='2' {{ $proposal->institution == 2 ? 'selected' : '' }}>
                          Hong Kong Baptist University</option>
                      <option value='3' {{ $proposal->institution == 3 ? 'selected' : '' }}>
                          Lingnan University</option>
					  <option value='4' {{ $proposal->institution == 4 ? 'selected' : '' }}>
                          The Chinese University of Hong Kong</option>
					  <option value='5' {{ $proposal->institution == 5 ? 'selected' : '' }}>
                          The Education University of Hong Kong</option>
					  <option value='6' {{ $proposal->institution == 6 ? 'selected' : '' }}>
                          The Hong Kong Polytechnic University</option>
					  <option value='7' {{ $proposal->institution == 7 ? 'selected' : '' }}>
                          The Hong Kong University of Science and Technology</option>
					  <option value='8' {{ $proposal->institution == 8 ? 'selected' : '' }}>
                          The University of Hong Kong</option>
                    </select>	
                </div>
			</div>
                    
			<div class="col-xs-12 col-sm-12 col-md-12" > 
                <div class="form-group {{ $errors->has('postaladdress') ? 'has-error' : '' }}">    
                    <strong>Postal Address:</strong>
                    <textarea class="form-control" rows="2" name="postaladdress" > {{ ucwords($proposal->postaladdress) }}</textarea>
                    <span class="text-danger">{{ $errors->first('postaladdress') }}</span>				
				</div>	
             </div>							

			 <div class="col-xs-12 col-sm-6 col-md-6">
               <div class="form-group {{ $errors->has('papertitle') ? 'has-error' : '' }}">  	  
					<strong>Paper Title:</strong>
					<textarea class="form-control" rows="4" name="papertitle" >{{ ucwords($proposal->papertitle) }}</textarea>
                    <span class="text-danger">{{ $errors->first('papertitle') }}</span>			  
                </div>
			</div>

		    <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group {{ $errors->has('phonenumber') ? 'has-error' : '' }}">  
					<strong>Contact Phone Number (Local):</strong>
					<input type="text" name="phonenumber" class="form-control" 
                        value="{{ $proposal->phonenumber }}">
                    <span class="text-danger">{{ $errors->first('phonenumber') }}</span>
				</div>
            </div>			

		    <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group {{ $errors->has('papertype') ? 'has-error' : '' }}">  
                   <strong>Paper Type:</strong>
					<select type="text" name="papertype" class="form-control" style="height: 2.4em;" >
						<option value='1' {{ $proposal->papertype == 1 ? 'selected' : '' }}>Proposal</option>
						<option value='2' {{ $proposal->papertype == 2 ? 'selected' : '' }}>Abstract</option>	
                        <span class="text-danger">{{ $errors->first('phonenumber') }}</span> 
                    </select>	
				</div>
            </div>
					  
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group {{ $errors->has('abstract') ? 'has-error' : '' }}">
					<strong>Proposal / Abstract:</strong>
					<textarea name="abstract" class="form-control" rows="4">{{ $proposal->abstract }}</textarea>
					<span class="text-danger">{{ $errors->first('abstract') }}</span>
                </div>
              </div>			

 			  <div class="col-xs-12 col-sm-12 col-md-12" >   
                <div class="form-group {{ $errors->has('summary') ? 'has-error' : '' }}">  			  
					<strong>Summary:</strong>
					<textarea name="summary" class="form-control" rows="4">{{ $proposal->summary }}</textarea>	
                    <span class="text-danger">{{ $errors->first('summary') }}</span>
				</div>
              </div>
			  
			  <div class="col-xs-12 col-sm-12 col-md-12" >   
                <div class="form-group {{ $errors->has('biostatement') ? 'has-error' : '' }}"> 			  
					<strong>Author's Biostatement:</strong>
					<textarea name="biostatement" class="form-control" rows="4">{{ $proposal->biostatement }}</textarea>						
                    <span class="text-danger">{{ $errors->first('biostatement') }}</span>
				</div>
              </div> 
			  
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>


    </form>
</div>

@endsection