 {{-- <!-- Vendor JS Files -->
 <script src="{{ asset('public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
 <script src="{{ asset('public/assets/vendor/php-email-form/validate.js') }}"></script>
 <script src="{{ asset('public/assets/vendor/aos/aos.js') }}"></script>
 <script src="{{ asset('public/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
 <script src="{{ asset('public/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
 <script src="{{ asset('public/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

 <!-- Main JS File -->
 <script src="{{ asset('public/assets/js/main.js') }}"></script> --}}

 <script>
    // removeError
    function removeError(id) {
        var errElement = document.getElementById(id);
        if (errElement) {
            errElement.style.display = 'none'
        }
    }
</script>

  <!-- Vendor JS Files -->
  <script src="{{asset('/public/mytheme/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('/public/mytheme/assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('/public/mytheme/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('/public/mytheme/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>

  <!-- Main JS File -->
  <script src="{{asset('/public/mytheme/assets/js/main.js')}}"></script>