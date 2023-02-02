import './bootstrap'

$(document).ready(function () {
    $(document).on('click', '.remove-product-image', function (e) {
        e.preventDefault();

        const $btn = $(this);
        $.ajax({
            url: $btn.data('route'),
            type: 'DELETE',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val()
            },
            success: function(data) {
                console.log('data', data);
                $btn.parent().remove();
            },
            error: function(data) {
                console.log('Error: ', data)
            }
        });
    });
});
