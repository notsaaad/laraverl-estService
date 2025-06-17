const steps = document.querySelectorAll('.step-content');
const navSteps = document.querySelectorAll('.step-item');
let currentStep = 0;

function showStep(index) {
  steps.forEach((s, i) => {
    s.classList.toggle('d-none', i !== index);
  });
  updateStepIndicator(index + 1); // عشان مؤشر الشريط 1-based
}

document.querySelectorAll('.next').forEach(btn =>
  btn.addEventListener('click', () => {
    if (currentStep < steps.length - 1) currentStep++;
    showStep(currentStep);
  })
);

document.querySelectorAll('.prev').forEach(btn =>
  btn.addEventListener('click', () => {
    if (currentStep > 0) currentStep--;
    showStep(currentStep);
  })
);



function updateStepIndicator(current) {
  navSteps.forEach((step, index) => {
    step.classList.remove('active', 'completed');
    if (index + 1 < current) {
      step.classList.add('completed');
    } else if (index + 1 === current) {
      step.classList.add('active');
    }
  });
}

showStep(currentStep); // البداية
