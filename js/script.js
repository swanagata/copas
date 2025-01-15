// file: js/kopituboard.js

document.addEventListener('DOMContentLoaded', function () {
    const clipboard = new ClipboardJS('.copy-btn');

    clipboard.on('success', function(e) {
        const button = e.trigger;
        const originalText = button.innerText;
        const successMessage = button.getAttribute('data-success-message');
        
        button.innerText = successMessage;
        
        setTimeout(() => {
            button.innerText = originalText;
        }, 1000);

        e.clearSelection();
    });

    clipboard.on('error', function(e) {
        console.error('Failed to copy:', e);
    });
});
