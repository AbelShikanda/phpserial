@extends('admin.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add Clients Details</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- general form elements disabled -->
        <div class="containter">
            <div class="row">
                <div class="col-md-6 offset-3">
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Clients Details</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form method="post" action="{{ route('dashboard.store') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <select class="form-control select2" style="width: 100%;" name="name">
                                                @foreach($users as $user)
                                                    <option value="{{ $user->id }}" @selected(old('user') == $user)>{{ $user->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Price</label>
                                            <input name="price" type="text" class="form-control" placeholder="Enter ...">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="datetime">Select Date and Time:</label></div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <div class="col-md-8 offset-3">
                                                <input type="datetime-local" id="datetime" name="date">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- input states -->
                                        <div class="form-group">
                                            <div
                                                class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                <input name="status" type="checkbox" class="custom-control-input" id="customSwitch3">
                                                <label class="custom-control-label" for="customSwitch3">Approve the client
                                                    to be able to lock and unlock their doors</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row py-4">
                                    <div class="col-md-12 offset-5">
                                        <input class="btn btn-primary btn-rounded" type="submit" value="Submit">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card -->
    </div>
    <!--/.col (right) -->
    </div>
    <!-- /.row -->
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
