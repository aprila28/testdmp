@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="row">
                        <form action="{{url('/positions')}}" method="POST">
                            @csrf
                            <div class="col">
                                <label for="description" class="col-sm-2 col-form-label">Description</label>
                                <input type="text" class="form-control" name="description" id="description_field" placeholder="Filter by title, benefits, companies, expertise">
                            </div>
                            <div class="col">
                                <label for="location" class="col-sm-2 col-form-label">Location</label>
                                <input type="text" class="form-control" name="location" id="location_field" placeholder="Filter by city, state, zip code or country">
                            </div>
                            <div class="col">
                                <!-- <input type="submit" class="form-control" value="submit"> -->
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </form>
                    </div>
                    <hr>
                    <div class="row">
                        <table class="table table-striped">
                            <!-- <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Handle</th>
                                </tr>
                            </thead> -->
                            <tbody>
                                @foreach($datas as $data)
                                <tr>
                                    <th>
                                        <h4><a href="{{$data['url']}}" id="jobname">{{$data['title']}}</a></h4>
                                        <button type="button" class="btn btn-primary detailbyid" data-id="{{$data['id']}}">Show Detail</button>
                                        <p class="source">
                                            <a class="company" href="">{{$data['company']}}</a>
                                            –
                                            <strong class="fulltime">{{$data['type']}}</strong>
                                        </p>
                                    </th>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        $('.detailbyid').click(function() {
            // alert($(this).data('id'));
            window.location.href = "{{url('detailjob')}}/" + $(this).data('id');
        });
    });
</script>