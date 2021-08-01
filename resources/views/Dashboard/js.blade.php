{{-- menunjukan side bar yang aktif --}}
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
            "paging":false,
            "info": false,
        });
    });

    $(document).ready(function (){
        $('#dashboard').addClass('active');
    });
</script>
