@extends('proposal.layout')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h3 style="color:skyblue"><strong>Add New Proposal</strong></h3>
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
    <form action="{{ route('proposals.store') }}" method="POST">
        
        @csrf


         <div class="row">
			    <div style="color:pink;"><strong>Author's Personal Section</strong></div>
                
				<div class="col-xs-12 col-sm-2 col-md-2">  
                <div class="form-group">                  
					<strong>Salutation:</strong>
                    <select type="text" name="salutation" class="form-control" >
                      <option value='1' {{ old('salutation') == 1 ? 'selected' : '' }}>Professor</option>
                      <option value='2' {{ old('salutation') == 2 ? 'selected' : '' }}>Dr.</option>
                      <option value='3' {{ old('salutation') == 3 ? 'selected' : '' }}>Mr.</option>
                      <option value='4' {{ old('salutation') == 4 ? 'selected' : '' }}>Ms.</option>
					  <option value='5' {{ old('salutation') == 5 ? 'selected' : '' }}>Mrs.</option>
                    </select>	
                </div>				
				</div>	
		
				<div class="col-xs-12 col-sm-4 col-md-4">   
                <div class="form-group {{ $errors->has('lastname') ? 'has-error' : '' }}">                 
					<strong>Last Name:</strong>
                    <input type="text" name="lastname" class="form-control" placeholder="e.g. CHAN"
                       value="{{ strtoupper(old('lastname')) }}" >
                	 <span class="text-danger">{{ $errors->first('lastname') }}</span>
                </div>
				</div>

				<div class="col-xs-12 col-sm-3 col-md-3">
                <div class="form-group {{ $errors->has('firstname') ? 'has-error' : '' }}">  
					<strong>First Name:</strong>
					<input type="text" name="firstname" class="form-control" placeholder="e.g. Tai Man" 
                          value="{{	ucwords(old('firstname')) }}">
                    <span class="text-danger">{{ $errors->first('firstname') }}</span>
				</div>
                </div>

				<div class="col-xs-12 col-sm-3 col-md-3">
					<strong>Middle Name:</strong>
					<input type="text" name="middlename" class="form-control" value="{{	ucwords(old('middlename')) }}">
				</div>	
                
		</div><br>
		
        <div class="row">	
             	
				<div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group {{ $errors->has('emailaddress') ? 'has-error' : '' }}">  
					<strong>Email Address:</strong>
					<input type="text" name="email" class="form-control" value="{{ old('email') }}">
                    <span class="text-danger">{{ $errors->first('email') }}</span>
				</div>
                </div>	
				<div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group {{ $errors->has('phonenumber') ? 'has-error' : '' }}">  
					<strong>Contact Phone Number (Local):</strong>
					<input type="text" name="phonenumber" class="form-control" placeholder="enter 8-digit no., e.g. 91239123"
                        value="{{ old('phonenumber') }}">
                    <span class="text-danger">{{ $errors->first('phonenumber') }}</span>
				</div>
                </div>			
        </div>			
				
				
        <div class="row">	
	
				<div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group {{ $errors->has('position') ? 'has-error' : '' }}">  
					<strong>Position:</strong>
					<input type="text" name="position" class="form-control" placeholder="e.g. Assistant Professor"
                       value="{{ ucwords(old('position')) }}">
                    <span class="text-danger">{{ $errors->first('position') }}</span>
				</div>	
                </div>

				<div class="col-xs-12 col-sm-12 col-md-12" >     
                <div class="form-group {{ $errors->has('institution') ? 'has-error' : '' }}">                 
					<strong>Institution:</strong>
                    <select type="text" name="institution" class="form-control" style="height: 2.4em;" >
                      <option></option>
                      <option value='1' {{ old('institution') == 1 ? 'selected' : '' }}>
                          City University of Hong Kong</option>
                      <option value='2' {{ old('institution') == 2 ? 'selected' : '' }}>
                          Hong Kong Baptist University</option>
                      <option value='3' {{ old('institution') == 3 ? 'selected' : '' }}>
                          Lingnan University</option>
					  <option value='4' {{ old('institution') == 4 ? 'selected' : '' }}>
                          The Chinese University of Hong Kong</option>
					  <option value='5' {{ old('institution') == 5 ? 'selected' : '' }}>
                          The Education University of Hong Kong</option>
					  <option value='6' {{ old('institution') == 6 ? 'selected' : '' }}>
                          The Hong Kong Polytechnic University</option>
					  <option value='7' {{ old('institution') == 7 ? 'selected' : '' }}>
                          The Hong Kong University of Science and Technology</option>
					  <option value='8' {{ old('institution') == 8 ? 'selected' : '' }}>
                          The University of Hong Kong</option>
                    </select>
                    <span class="text-danger">{{ $errors->first('institution') }}</span>
				</div>
                </div>

				<div class="col-xs-12 col-sm-12 col-md-12" > 
                <div class="form-group {{ $errors->has('postaladdress') ? 'has-error' : '' }}">    
                    <strong>Postal Address:</strong>
                    <textarea class="form-control" rows="2" name="postaladdress" 
                       value="{{ old('postaladdress') }}" placeholder="enter postal address.."></textarea>
                    <span class="text-danger">{{ $errors->first('postaladdress') }}</span>				
				</div>	
             </div>				
		</div><br>
            
        <div class="row">
			<div style="color:pink;"><strong>Proposal Section</strong></div>	
            			
              <div class="col-xs-12 col-sm-9 col-md-9">   
                <div class="form-group {{ $errors->has('papertitle') ? 'has-error' : '' }}">  	  
						<strong>Paper Title:</strong>
						<textarea class="form-control" rows="2" name="papertitle" 
                           value="{{ ucwords(old('papertitle')) }}" placeholder="required, enter paper title.."></textarea>
                    <span class="text-danger">{{ $errors->first('papertitle') }}</span>
				  </div>
			  </div>
			  
			  <div class="col-xs-12 col-sm-3 col-md-3" >   
                <div class="form-group {{ $errors->has('papertype') ? 'has-error' : '' }}">  			  
						<strong>Paper Type:</strong>
						<select type="text" name="papertype" class="form-control" style="height: 2.4em;" >
						  <option value='1' {{ old('papertype') == 1 ? 'selected' : '' }}>Proposal</option>
						  <option value='2' {{ old('papertype') == 2 ? 'selected' : '' }}>Abstract</option>	
						</select>
                    <span class="text-danger">{{ $errors->first('papertype') }}</span>
				  </div>
              </div>
			  <div class="col-xs-12 col-sm-12 col-md-12" >   
                <div class="form-group {{ $errors->has('abstract') ? 'has-error' : '' }}">  			  
						<strong>Proposal / Abstract:</strong>
						<textarea name="abstract" class="form-control" rows="5" 
                            placeholder="required, describe your proposal or abstract..">{{ old('abstract') }}</textarea>
						
                    <span class="text-danger">{{ $errors->first('abstract') }}</span>
				  </div>
              </div>			  
 			  <div class="col-xs-12 col-sm-12 col-md-12" >   
                <div class="form-group {{ $errors->has('summary') ? 'has-error' : '' }}">  			  
						<strong>Summary:</strong>
						<textarea name="summary" class="form-control" rows="5" 
                            placeholder="required, write your proposal summary..">{{ old('summary') }}</textarea>						
                    <span class="text-danger">{{ $errors->first('summary') }}</span>
				</div>
              </div>	           
			  <div class="col-xs-12 col-sm-12 col-md-12" >   
                <div class="form-group {{ $errors->has('summary') ? 'has-error' : '' }}">  			  
						<strong>Author's Biostatement:</strong>
						<textarea name="biostatement" class="form-control" rows="3" 
                            placeholder="required, write your own biostatement..">{{ old('biostatement') }}</textarea>						
                    <span class="text-danger">{{ $errors->first('biostatement') }}</span>
				</div>
              </div>            				
        </div>	

        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>	
        </div><br>

	
    </form>


@endsection