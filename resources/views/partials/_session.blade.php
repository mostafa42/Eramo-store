
    <script type="module">
        // toastr.success("{{ session('success') }}");
        // toastr.options.closeButton = true;
        import { HidePreLoader } from "/layouts/admin/js/main.js";


        let successMessage = '{{ session("success") }}';
        let errorMessage = '{{ session("failed") }}';

        HidePreLoader();


        if(successMessage && successMessage.length){
                 Swal.fire({
                            position: 'top-center',
                            icon: 'success',
                            title: successMessage,
                            showConfirmButton: false,
                            timer: 3000
                            })
        }

        if(errorMessage && errorMessage.length){
            Swal.fire({
                icon: 'error',
                   title: "{{ __('OOPS') }}",
                    text:errorMessage,
                    });
        }







    </script>



