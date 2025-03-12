document.querySelectorAll('.btn-delete').forEach(function(button){
    button.addEventListener("click", function(e) {
        e.preventDefault();
        if (window.confirm("Are you sure to delete this student?")){
            let studentId = this.getAttribute('data-id');
            let form = document.querySelector('#form-delete-student');

            form.setAttribute('action', '/students/' + studentId);
            form.submit();
        }
    });
});


