{{-- @if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif --}}

{{-- @if (session('failed'))

    <script type="module">
        // toastr.error("{{ session('failed') }}");
        // toastr.options.closeButton = true;

        import { HidePreLoader } from "/layouts/admin/js//main.js";


Swal.fire({
  icon: 'error',
  title: "{{ __('site.OOPS') }}",
  text: '{{ session('failed') }}',
});

HidePreLoader()
    </script>



@endif --}}
