document.querySelectorAll('.btn-delete').forEach(function(button) {
    button.addEventListener("click", function(e) {
        e.preventDefault();
        
        // Retrieve the type and ID from data attributes
        const type = this.getAttribute('data-type'); // "student" or "college"
        const id = this.getAttribute('data-id');
        
        // Confirm deletion with a dynamic message
        if (window.confirm(`Are you sure you want to delete this ${type}?`)) {
            // Select the common hidden form
            const form = document.querySelector('#form-delete-row');
            if (form) {
                // Build the action URL dynamically
                form.setAttribute('action', `/${type}s/${id}`);
                form.submit();
            } else {
                console.error("Delete form not found.");
            }
        }
    });
});