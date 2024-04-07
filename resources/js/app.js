import './bootstrap';

document.querySelectorAll('.updateTaskSpan').forEach(function(span) {
    span.addEventListener('click', function() {
        this.querySelector('.updateTaskForm').submit();
    });
});

span.addEventListener('click', function(event) {
    var borderSecondary = this.querySelector('.border-secondary');
    borderSecondary.classList.toggle('toDo');
    event.stopPropagation(); // Evita che il click venga propagato al wrapper .updateTaskSpan
});

console.log("Ciao");
