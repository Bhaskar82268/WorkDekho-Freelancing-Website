document.addEventListener('DOMContentLoaded', () => {
    const jobForm = document.querySelector('.job-form');
  
    if (jobForm) {
      jobForm.addEventListener('submit', (e) => {
        const title = jobForm.title.value.trim();
        const description = jobForm.description.value.trim();
        const budget = jobForm.budget.value.trim();
  
        if (!title || !description || !budget) {
          e.preventDefault();
          alert('Please fill in all fields before submitting.');
        }
      });
    }
  });
  