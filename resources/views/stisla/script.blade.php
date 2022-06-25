<!-- General JS Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="{{ asset('assets/js/stisla.js') }}"></script>

<!-- Template JS File -->
<script src="{{ asset('assets/js/scripts.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('assets/js/page/forms-advanced-forms.js') }}"></script>
<script src="{{ asset('assets/js/page/components-table.js') }}"></script>
<script src="{{ asset('assets/js/page/bootstrap-modal.js') }}"></script>
<script src="{{ asset('assets/js/page/auth-register.js') }}"></script>
<script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>
<!--Search Pegawai-->
<script>
    function search_pegawai(query = '') {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ url('/search-pegawai') }}",
            method: 'POST',
            data: {
                query: query
            },
            success: function (response) {
                $('#resultpegawai').html(response);
            }
        })
    }
    $(document).on('keyup', '#pegawaisearch', function () {
        var word = $(this).val();
        search_pegawai(word);
    });
</script>
{{-- Search Kepala --}}
<script>
    function search_kepala(query = '') {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ url('/search-kepala') }}",
            method: 'POST',
            data: {
                query: query
            },
            success: function (response) {
                $('#resultkepala').html(response);
            }
        })
    }
    $(document).on('keyup', '#kepalasearch', function () {
        var word = $(this).val();
        search_kepala(word);
    });
</script>