@extends('layouts.app')
@section('content')
  <div class="jumbotron text-center">
  <h1>Project Creation</h1>
</div>
  
<div class="container">
  <div class="row">
        <div class="col-lg-12">
            <h2>Project Creation Form</h2>
            <form class="" action="{{ route('create') }}" method="post">
                @csrf
                <div class="col-lg-3">
                    <div class="form-group">
                    <label  >Project Name</label>
                    <input type="text" class="form-control" required id="name" name="name" placeholder="Name">
                </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label >Attributes</label>
                        <input type="text" class="form-control" id="attributes" placeholder="Attributes NO">
                    </div>
                </div>
                <input type="hidden" name="inputArrKeys[]" id="inputArrKeys">
                <input type="hidden" name="inputArrVals[]" id="inputArrVals">
                <div class="col-lg-9" id="attr_no">

                </div>

                <br>
                <div class="col-lg-9">
                    <button type="submit" id="submit_btn" class="btn btn-primary mb-2">Submit</button>
                </div>
            </form>
        </div>
        <br>
        <br>
    @if(!empty($projects))
        <div class="col-lg-12">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Project Name</th>
                  <th scope="col">Attributes</th>
                </tr>
              </thead>
              <tbody>
            
                @foreach($projects as $project)
                    <tr>
                        <td>{{ $project->id }}</td>
                        <td>{{ $project->name }}</td>
                        <td>{{ $project->getAttr() }}</td>
                        
                    </tr>
                @endforeach
              </tbody>
            </table>
            {{ $projects->links() }}
        </div>
    @endif

  </div>
</div>

@endsection