

@extends('user.layout')
@section('page_content')
<main class="main">
    <!-- Membership Section -->
    <section id="" class="my-membership section">

        <div class="container">
            <div class="row gy-4">
                <div>
                    <form action="{{ route('user.logout') }}" method="POST">
                        <h1>Dashboard</h1>
                        @csrf
                        <button type="submit" class="btn btn-primary">Logout</button>
                    </form>        
                </div>
            </div>            
        </div>

    </section><!-- /Membership Section -->

</main>
@endsection