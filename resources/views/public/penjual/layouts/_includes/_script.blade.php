<script>
    $("#bantuan_input").change(function(event) {
        $.each($(this).find('option'), function(key, value) {
            $(value).removeClass('active');
        })
        $('option:selected').addClass('active');

    });

    $("#bantuan_input").tooltip({
        placement: 'right',
        trigger: 'hover',
        container: 'body',
        title: function(e) {
            return $(this).find('.active').attr('title');
        }
    });

</script>
