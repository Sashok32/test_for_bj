$('.editTaskForm #exercise').change(function () {
    var $self = $(this);
    var oldText = $self.text();
    var updated = $self.closest('.editTaskForm').find('.updatedTask');
    if (updated.val() == 0) {
        var newText = $self.val();
        if (newText != oldText) {
            updated.val(1);
        }
    }
});

if ($('.flush')) {
    setTimeout(function () {
        $('.flush').slideUp(1000, function () {
            $('.flush').remove();
        });
    }, 500)
}