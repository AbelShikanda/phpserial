@extends('admin.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>CLient Details</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">CLients Details</h3>
                    <p id="demo"></p>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">clients Table</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 10px">#</th>
                                                        <th>Expiry date</th>
                                                        <th>Countdown</th>
                                                        <th style="width: 40px">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($user as $user)
                                                        @foreach ($countdown as $count)
                                                            <tr>
                                                                <td>#</td>
                                                                <td>
                                                                    {{ $count->countdown }}
                                                                </td>
                                                                <td>
                                                                    <p id="demo_{{ $user->id }}"></p>
                                                                    <script>
                                                                        // Retrieve the countdown element for the current user
                                                                        var countdownElement_{{ $user->id }} = "{{ $count->countdown }}";

                                                                        // Set the countdown date for the current user
                                                                        var countDownDate_{{ $user->id }} = new Date(countdownElement_{{ $user->id }}).getTime();

                                                                        // Update the countdown every 1 second
                                                                        var x_{{ $user->id }} = setInterval(function() {
                                                                            // Get today's date and time
                                                                            var now = new Date().getTime();

                                                                            // Find the distance between now and the countdown date
                                                                            var distance = countDownDate_{{ $user->id }} - now;

                                                                            // Time calculations for days, hours, minutes and seconds
                                                                            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                                                                            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                                                            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                                                            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                                                                            // Output the result in the element with id="demo_{{ $user->id }}"
                                                                            document.getElementById("demo_{{ $user->id }}").innerHTML = days + "d " + hours + "h " +
                                                                                minutes + "m " + seconds + "s ";

                                                                            // If the countdown is over, write some text 
                                                                            if (distance < 0) {
                                                                                clearInterval(x_{{ $user->id }});
                                                                                document.getElementById("demo_{{ $user->id }}").innerHTML = "EXPIRED";
                                                                                // updateStatusWhenTimerOver();
                                                                            }
                                                                        }, 1000);
                                                                    </script>
                                                                </td>
                                                                <td>
                                                                    @if ($users_appr->is_appr)
                                                                        <span class="badge badge-success">Approved</span>
                                                                    @else
                                                                        <span class="badge badge-danger">Rejected</span>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer clearfix">
                                            <ul class="pagination pagination-sm m-0 float-right">
                                                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- /.card -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
