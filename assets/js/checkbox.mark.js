define(['jquery'], function($) {
    $('body').on('change', '.checkboxRead', function() {
        var value = ($(this).is(":checked")) ? 1 : 0;
        $.post($(this).data('url'), {mark: 'read', id: $(this).attr('name'), value: value}, function() {});
    });

    $('body').on('change', '.checkboxAnswered', function() {
        var value = ($(this).is(":checked")) ? 1 : 0;
        $.post($(this).data('url'), {mark: 'answered', id: $(this).attr('name'), value: value}, function() {});
    });

    $('body').on('click', 'a.subject', function() {
        var id = ($(this).data('id'));
        $('input[name=' + id + '][class="checkboxRead"]').prop('checked', true);
        var tr = $(this).closest('tr');
        tr.removeClass('bold');
    });

});
