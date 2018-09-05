@extends('proposal.layout')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h3 style="color:skyblue"><strong>Edit Proposal</strong></h3>
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
	
    <form action="{{ route('proposal.update',$proposal->id) }}" method="POST">
        @csrf
        @method('PUT')


         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
				    <strong>Salutation:</strong>
				    <select class="form-control" name="salutation" value="{{ $proposal->salutation }}">
                      <option>Professor</option>
                      <option>Dr.</option>
                      <option>Mr.</option>
                      <option>Ms.</option>
					  <option>Mrs.</option>
                    </select>
                    <strong>Last Name:</strong>
                    <input type="text" name="lastname" value="{{ $proposal->lastname }}" class="form-control" placeholder="Last Name">

                    <strong>First Name:</strong>
                    <input type="text" name="firstname" value="{{ $proposal->firstname }}" class="form-control" placeholder="First Name">
                </div>				
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
				    <strong>Institution:</strong>
				    <select class="form-control" name="institution" value="{{ $proposal->institution }}">
                      <option></option>
                      <option>City University of Hong Kong</option>
                      <option>Hong Kong Baptist University</option>
                      <option>Lingnan University</option>
					  <option>The Chinese University of Hong Kong</option>
					  <option>The Education University of Hong Kong</option>
					  <option>The Hong Kong Polytechnic University</option>
					  <option>The Hong Kong University of Science and Technology</option>
					  <option>The University of Hong Kong</option>
                    </select>				
                    <strong>Paper Title:</strong>
                    <textarea class="form-control" style="height:150px" name="papertitle" placeholder="Proposal-> title">{{ $proposal->papertitle }}</textarea>
					<br>
                   <strong>Paper Type:</strong>
                    <select class="form-control" name="papertype" value="{{ $proposal->papertype }}"> 
                      <option>Proposal</option>					
					  <option>Abstract</option>
                    </select>					  
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>


    </form>


@endsection