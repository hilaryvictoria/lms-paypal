<script type="text/javascript">
    $(document).ready(function() {
        // loads on document ready
        select();
        // loads when select is clicked
        $('select[name="course"]').on('change', function() { select(); });
    });

    function select() {
        var course = $('select[name="course"]').val();
        if (course) {
            $.ajax({
                url: "{{ url('admin/category/ajax') }}/" + course,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    var d = $('select[name="category"]').empty();
                    $.each(data, function(key, value) {
                        $('select[name="category"]').append(
                            '<option value="' + value.id + '">' + value
                            .title + '</option>');
                    });
                },
            });
        } else {
            alert('danger');
        }
    };
</script>
