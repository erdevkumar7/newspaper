@extends('user.layout')
@section('page_content')
    <main class="main">
        <!-- Membership Section -->
        <section id="" class="my-membership section">
            <div class="container d-flex justify-content-center mt-5 mb-5">
                <div class="col-md-6"> <!-- Adjusted the width to center better -->
                    <div class="card text-center p-4" style="margin-top: 20px; margin-bottom: 20px;">
                        <h4>Your Payment Failed</h4>
                        <a href="{{ route('home') }}" class="mt-3">
                            <button type="submit" class="btn free-button">Back to home</button>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- /Membership Section -->
    </main>
@endsection