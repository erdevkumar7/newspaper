@extends('organizer.layout')
@section('page_content')
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col">
            <div class="card card-registration my-4">
                <div class="row g-0">
                    <div class="col-xl-12 d-flex justify-content-center align-items-center">
                        <!-- Use Flexbox and height -->
                        <div class="card-body p-md-5 text-black text-center">
                            <!-- Add text-center for horizontal alignment -->
                            <h2 class="qr-head">Welcome, Organizer!</h2>
                            <p>Thanks for Your Support for the event.</p>
                           
                            <form action="{{ route('organizer.logout') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <button type="submit" class="btn btn-warning mt-4">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
