// Minimal JavaScript for functionality
document.addEventListener('DOMContentLoaded', function () {
    // Handle radio button changes to update correct answer highlighting
    const radioButtons = document.querySelectorAll('input[type="radio"]');

    radioButtons.forEach(radio => {
        radio.addEventListener('change', function () {
            const questionName = this.name;
            const allOptions = document.querySelectorAll(`input[name="${questionName}"]`);

            // Remove correct-answer class from all options in this question
            allOptions.forEach(option => {
                option.closest('.option-item').classList.remove('correct-answer');
            });

            // Don't add correct-answer class to prevent green highlighting

            // Update correct answer indicator
            const questionSection = this.closest('.mcq-section');
            const indicator = questionSection.querySelector('.correct-answer-indicator');
            const optionLabel = this.nextElementSibling.textContent;
            indicator.innerHTML = `<i class="fas fa-check"></i> Correct Answer: ${optionLabel}`;
        });
    });
});

function saveChanges() {
    // Show loading state
    const saveBtn = document.querySelector('.btn-save');
    const originalText = saveBtn.textContent;
    saveBtn.textContent = 'Saving...';
    saveBtn.disabled = true;

    // Simulate save operation (replace with actual form submission)
    setTimeout(() => {
        alert('Changes saved successfully!');
        saveBtn.textContent = originalText;
        saveBtn.disabled = false;

        // Hide unsaved changes indicator
        document.querySelector('.unsaved-changes').style.display = 'none';
        document.querySelector('.warning-message').textContent = 'All changes saved.';
    }, 1500);
}
