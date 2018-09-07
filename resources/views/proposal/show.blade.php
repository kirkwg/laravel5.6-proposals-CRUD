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

	<div class="container">

	  <h6>Proposal Record ID: {{ $proposal->id }}</h6>
	  <table class="table table-bordered">
		<!--thead><tr>
					<th>Field</th>
					<th>Content</th>
		</tr></thead-->

		<tbody>
			 <tr>
					<td><strong>Salutation</strong></td>
					<td>{{ Config::get('constants.salutations.' . $proposal->salutation)  }}</td>
			 </tr>		
			 <tr>
					<td><strong>Name</strong></td>
					<td>{{ $proposal->lastname }}, {{ $proposal->firstname }}
					    {{ $proposal->middlename }}</td>
			 </tr>
			 <tr>
					<td><strong>Email</strong></td>
					<td>{{ $proposal->email }}</td>
			 </tr>
			 <tr>
					<td><strong>Contact Phone No.</strong></td>
					<td>{{ $proposal->phonenumber }}</td>
			 </tr>
			 <tr>
					<td><strong>Position</strong></td>
					<td>{{ $proposal->position }}</td>
			 </tr>
			 <tr>
					<td><strong>Institution</strong></td>
					<td>{{ Config::get('constants.institutions.' . $proposal->institution) }}</td>
			 </tr>
			 <tr>
					<td><strong>Postal Address</strong></td>
					<td>{{ $proposal->postaladdress }}</td>
			 </tr>
			 <tr>
					<td><strong>Paper Title</strong></td>
					<td>{{ $proposal->papertitle }}</td>
			 </tr>
			 <tr>
					<td><strong>Abstract</strong></td>
					<td>{{ $proposal->abstract }}</td>
			 </tr>			 
			 <tr>
					<td><strong>Proposal Summary</strong></td>
					<td>{{ $proposal->summary }}</td>
			 </tr>
			 <tr>
					<td><strong>Author's Biostatement</strong></td>
					<td>{{ $proposal->biostatement }}</td>
			 </tr>	
			 <tr>
					<td><strong>Created Date</strong></td>
					<td>{{ $proposal->created_at }}</td>
			 </tr>			 
		</tbody>
	  </table>

	</div>


@endsection