import './bootstrap';

document.querySelectorAll('.updateTaskSpan').forEach(function(span) {
    span.addEventListener('click', function() {
        this.querySelector('.updateTaskForm').submit();
    });
});

