document.addEventListener('DOMContentLoaded', function () {
    const admissionForm = document.querySelector('form');

    admissionForm.addEventListener('submit', function (event) {
        let isValid = true;

        // Personal Details Validation
        const nameInput = admissionForm.querySelector('input[name="name"]');
        if (nameInput.value.trim() === '') {
            alert('Full Name is required');
            isValid = false;
        }

        const mobileInput = admissionForm.querySelector('input[name="mobile_number"]');
        const mobileValue = mobileInput.value.trim();
        if (mobileValue === '') {
            alert('Mobile Number is required');
            isValid = false;
        } else if (!/^\d{10}$/.test(mobileValue)) {
            alert('Mobile Number should be a 10-digit number');
            isValid = false;
        }

        // Address Details Validation
        const addressInput = admissionForm.querySelector('textarea[name="address"]');
        if (addressInput.value.trim() === '') {
            alert('Address is required');
            isValid = false;
        }

        const cityInput = admissionForm.querySelector('input[name="city"]');
        if (cityInput.value.trim() === '') {
            alert('City is required');
            isValid = false;
        }

        const stateInput = admissionForm.querySelector('input[name="state"]');
        if (stateInput.value.trim() === '') {
            alert('State is required');
            isValid = false;
        }

        // Class/Course Details Validation
        const courseInput = admissionForm.querySelector('input[name="course"]');
        if (courseInput.value.trim() === '') {
            alert('Course Name is required');
            isValid = false;
        }

        // Date of Admission Validation
        const admissionDateInput = admissionForm.querySelector('input[name="date_of_admission"]');
        if (admissionDateInput.value === '') {
            alert('Date of Admission is required');
            isValid = false;
        }

        // Previous Qualifications Validation
        const qualificationsInput = admissionForm.querySelector('textarea[name="qualifications"]');
        if (qualificationsInput.value.trim() === '') {
            alert('Qualifications are required');
            isValid = false;
        }

        if (!isValid) {
            event.preventDefault(); // Prevent form submission if validation fails
        }
    });
});

// JavaScript code for confirmation dialog
document.getElementById('admission-form').addEventListener('submit', function (e) {
    const confirmation = confirm("Are you sure you want to submit the admission form?");
    if (!confirmation) {
        e.preventDefault(); // Prevent form submission if user cancels
    }
});

