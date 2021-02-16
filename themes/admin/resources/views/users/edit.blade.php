@extends('admin::app')

@section('content')

<div class="wrapper wrapper-content">
        <div class="container">
            <div class="ibox">
                <div class="ibox-content settings">
                	@if ($errors->any())
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif
                	<form class="form" role="form" method="POST" action="{{ route('admin.users.update') }}">
	                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
	                    <input type="hidden" name="uid" value="{{$user->id }}">
	                    <div class="row">
	                        <div class="col-md-6">
	                            
	                            <h2 class="m-b-md">Edit {{ $user->name }} data</h2>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" id="email" name="email" class="form-control" value="{{ $user->email }}">
                                </div>

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" name="name" class="form-control" value="{{ $user->name }}">
                                </div>

	                            <h2 class="m-b-md"></h2>
                                <div class="form-group">
                                    <label for="permission" class="display-block">Permission</label>
                                    <select name="permission" id="permission" class="form-control">
                                        <option @if ( $user->permission == "user" ) selected @endif value="user">User</option>
                                        <option @if ( $user->permission == "moderate" ) selected @endif value="moderate">Moderate</option>
                                        <option @if ( $user->permission == "admin" ) selected @endif value="admin">Admin</option>
                                    </select>
                                </div>
	                                

	                    		<button type="submit" class="btn btn-normal">Update</button>
	                        </div> <!-- end of lvl-up -->
	                    </div> <!-- end of row -->
	                    
	                </form>
                </div> <!-- end of ibox-content -->
            </div> <!-- end of ibox -->
        </div> <!-- end of container -->
    </div> <!-- end of wrapper wrapper-content -->
@stop