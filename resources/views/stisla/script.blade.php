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
<script src="{{ asset('Stisla/assets/js/stisla.js') }}"></script>

<!-- JS Libraies -->
<script src="{{ asset('Stisla/node_modules/cleave.js/dist/cleave.min.js') }}"></script>
<script src="{{ asset('Stisla/node_modules/cleave.js/dist/addons/cleave-phone.us.js') }}"></script>
<script src="{{ asset('Stisla/node_modules/jquery-pwstrength/jquery.pwstrength.min.js') }}"></script>
<script src="{{ asset('Stisla/node_modules/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('Stisla/node_modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
<script src="{{ asset('Stisla/node_modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
<script src="{{ asset('Stisla/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
<script src="{{ asset('Stisla/node_modules/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('Stisla/node_modules/selectric/public/jquery.selectric.min.js') }}"></script>
<script src="{{ asset('Stisla/node_modules/summernote/dist/summernote-bs4.js') }}"></script>
<script src="{{ asset('Stisla/node_modules/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('Stisla/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('Stisla/node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>

<!-- Template JS File -->
<script src="{{ asset('Stisla/assets/js/scripts.js') }}"></script>
<script src="{{ asset('Stisla/assets/js/custom.js') }}"></script>
<script src="{{ asset('Stisla/node_modules/jquery-ui-dist/jquery-ui.min.js') }}"></script>
<script src="{{ asset('Stisla/node_modules/prismjs/prism.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ asset('Stisla/assets/js/page/forms-advanced-forms.js') }}"></script>
<script src="{{ asset('Stisla/assets/js/page/components-table.js') }}"></script>
<script src="{{ asset('Stisla/assets/js/page/bootstrap-modal.js') }}"></script>
<script src="{{ asset('Stisla/assets/js/page/auth-register.js') }}"></script>
<script src="{{ asset('Stisla/assets/js/page/modules-datatables.js') }}"></script>
{{-- <script>
    $(document).ready(function () {
        $('#provinsi').on('change', function () {
            var provID = $(this).val();
            if (provID) {
                $.ajax({
                    url: '/supplier/' + provID + '/cities/',
                    type: "GET",
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    dataType: "json",
                    success: function (data) {
                        if (data) {
                            $('#kabupaten').empty();
                            $('#kabupaten').append('<option hidden>-- Pilih Kota --</option>');
                            $.each(data, function (key, kabupaten) {
                                $('select[name="location"]').append(
                                    '<option>' + kabupaten.nama + '</option>');
                            });
                        } else {
                            $('#kabupaten').empty();
                        }
                    }
                });
            } else {
                $('#kabupaten').empty();
            }
        });
    });
</script> --}}

{{-- @isset($ceksupplier)
@foreach ($items as $key => $item)
<script>
    var i=<?php // echo $key ?>;
    $(document).ready(function () {
        $('#prov'+i).on('change', function () {
            var provinsiID = $(this).val();
            if (provinsiID) {
                $.ajax({
                    url: '/supplier/' + provinsiID + '/cities/',
                    type: "GET",
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    dataType: "json",
                    success: function (data) {
                        if (data) {
                            $('#kota'+i).empty();
                            $('#kota'+i).append('<option hidden>-- Pilih Kota --</option>');
                            $.each(data, function (key, kota) {
                                $('select[name="location"]').append(
                                    '<option>' + kota.nama + '</option>');
                            });
                        } else {
                            $('#kota'+i).empty();
                        }
                    }
                });
            } else {
                $('#kota'+i).empty();
            }
        });
    });
</script>
@endforeach
@endisset --}}
