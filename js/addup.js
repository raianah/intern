// script.js

document.addEventListener('DOMContentLoaded', () => {
    // Get modal elements
    const addCourseModal = document.getElementById('addCourseModal');
    const addSchoolModal = document.getElementById('addSchoolModal');
    const addStudentModal = document.getElementById('addStudentModal');

    // Get button elements
    const openAddCourseModal = document.getElementById('openAddCourseModal');
    const openAddSchoolModal = document.getElementById('openAddSchoolModal');
    const openAddStudentModal = document.getElementById('openAddStudentModal');

    // Get close button elements
    const closeAddCourseModal = document.getElementById('closeAddCourseModal');
    const closeAddSchoolModal = document.getElementById('closeAddSchoolModal');
    const closeAddStudentModal = document.getElementById('closeAddStudentModal');

    // Function to open a modal
    const openModal = (modal) => {
        modal.style.display = 'block';
    };

    // Function to close a modal
    const closeModal = (modal) => {
        modal.style.display = 'none';
    };

    // Event listeners for opening modals
    openAddCourseModal.addEventListener('click', () => openModal(addCourseModal));
    openAddSchoolModal.addEventListener('click', () => openModal(addSchoolModal));
    openAddStudentModal.addEventListener('click', () => openModal(addStudentModal));

    // Event listeners for closing modals
    closeAddCourseModal.addEventListener('click', () => closeModal(addCourseModal));
    closeAddSchoolModal.addEventListener('click', () => closeModal(addSchoolModal));
    closeAddStudentModal.addEventListener('click', () => closeModal(addStudentModal));

    // Close modals when clicking outside of modal content
    window.addEventListener('click', (event) => {
        if (event.target === addCourseModal) {
            closeModal(addCourseModal);
        }
        if (event.target === addSchoolModal) {
            closeModal(addSchoolModal);
        }
        if (event.target === addStudentModal) {
            closeModal(addStudentModal);
        }
    });
});
