@extends('user.layout')
@section('page_content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: "Payment Failed!",
                text: "Your subscription is pending!",
                icon: "error",
                confirmButtonColor: "#FFD700",
                confirmButtonText: "Back Home",
                allowOutsideClick: false,  // Prevents closing when clicking outside
                allowEscapeKey: false,     // Prevents closing with the 'Esc' key
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('home') }}";  // Update 'home' with your actual route name
                }
            });
        });
    </script>   
@endsection