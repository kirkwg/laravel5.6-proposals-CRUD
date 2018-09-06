@extends('proposal.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <!--h2>Laravel 5.6 CRUD Example from scratch</h2-->
                <h3 style="color:skyblue"><strong>Proposal System</strong></h3>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('proposal.create') }}"> Create New Proposal</a>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
	
    <table class="table  ">
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Proposal Title</th>
			<th>Institution</th>
			<th>Created at</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($proposals as $proposal)
        <tr>
            <td>{{ ++$i }}</td>
            <td style=”table-layout:fixed”>{{ $proposal->lastname }}, {{ $proposal->firstname }}</td>
            <td>{{ $proposal->papertitle }}</td>      <!-- Config::get('constants.institutions.6')-->
			<td> {{ Config::get('constants.institutions.' . $proposal->institution) }}  </td>
			<td>{{ $proposal->created_at }}</td>
            <td>
                <form action="{{ route('proposal.destroy',$proposal->id) }}" method="POST">


                    <a class="btn btn-info" href="{{ route('proposal.show',$proposal->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('proposal.edit',$proposal->id) }}">Edit</a>


                    @csrf
                    @method('DELETE')

   
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
	
	    {!! $proposals->links() !!}


@endsection