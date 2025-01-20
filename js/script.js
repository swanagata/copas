document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.copy-btn').forEach(function(button) {
        button.addEventListener('click', function() {
            const text = this.getAttribute('data-clipboard-text');
            navigator.clipboard.writeText(text).then(() => {
                const originalText = button.innerText;
                const successMessage = button.getAttribute('data-success-message');
                
                button.innerText = successMessage;
                
                setTimeout(() => {
                    button.innerText = originalText;
                }, 1000);
            }).catch(err => {
                console.error('Failed to copy:', err);
            });
        });
    });
});
