// categoryManager.js - Fully debugged version
class CategoryManager {
    constructor() {
        this.pendingDelete = null;
        this.initEventListeners();
        this.loadCategories();
    }

    // Initialize all event listeners
    initEventListeners() {
        // Category form submission
        document.getElementById('categoryForm').addEventListener('submit', (e) => {
            e.preventDefault();
            this.handleCategorySubmit();
        });

        // Subcategory form submission
        document.getElementById('subForm').addEventListener('submit', (e) => {
            e.preventDefault();
            this.handleSubcategorySubmit();
        });

        // Delete confirmation
        document.getElementById('confirmDeleteBtn').addEventListener('click', () => {
            this.handleDeleteConfirm();
        });

        // Reset form button
        document.getElementById('resetBtn').addEventListener('click', () => {
            this.setAddMode();
        });

        // Reset all button
        const resetAllBtn = document.getElementById('resetAllBtn');
        if (resetAllBtn) {
            resetAllBtn.addEventListener('click', () => {
                this.setAddMode();
                this.showToast('Form reset.');
            });
        }

        // Search functionality
        const tableSearch = document.getElementById('tableSearch');
        if (tableSearch) {
            tableSearch.addEventListener('input', (e) => {
                this.handleSearch(e.target.value);
            });
        }

        // Initialize event delegation
        this.delegateEventListeners();
    }

    // Event delegation for dynamically created elements
    delegateEventListeners() {
        document.addEventListener('click', (e) => {
            // Edit category button
            if (e.target.closest('.edit-cat')) {
                const btn = e.target.closest('.edit-cat');
                this.prepareEditCategory(btn.dataset.catId);
            }
            
            // Delete category button
            else if (e.target.closest('.del-cat')) {
                const btn = e.target.closest('.del-cat');
                this.prepareDeleteCategory(btn.dataset.catId, btn.dataset.catName);
            }
            
            // Add subcategory button
            else if (e.target.closest('.add-sub')) {
                const btn = e.target.closest('.add-sub');
                this.prepareAddSubcategory(btn.dataset.catId, btn.dataset.catName);
            }
            
            // Edit subcategory button
            else if (e.target.closest('.edit-sub')) {
                const btn = e.target.closest('.edit-sub');
                const subItem = btn.closest('.sub-item');
                this.prepareEditSubcategory(
                    btn.dataset.catId, 
                    btn.dataset.subId,
                    subItem.dataset.name,
                    subItem.dataset.mcq
                );
            }
            
            // Delete subcategory button
            else if (e.target.closest('.del-sub')) {
                const btn = e.target.closest('.del-sub');
                this.prepareDeleteSubcategory(
                    btn.dataset.catId, 
                    btn.dataset.subId, 
                    btn.dataset.subName
                );
            }
        });
    }

    // Handle category form submission (add/edit)
    async handleCategorySubmit() {
        const form = document.getElementById('categoryForm');
        const editingId = document.getElementById('editingCategoryId').value;
        const nameInput = document.getElementById('catName');
        const descInput = document.getElementById('catDesc');
        
        const name = nameInput.value.trim();
        const description = descInput.value.trim();

        if (!name) {
            nameInput.classList.add('is-invalid');
            return;
        }

        nameInput.classList.remove('is-invalid');

        try {
            let result;
            if (editingId) {
                // Update existing category
                result = await this.updateCategory(editingId, name, description);
                this.showToast('Category updated successfully');
            } else {
                // Add new category
                result = await this.addCategory(name, description);
                this.showToast('Category added successfully');
            }
            
            form.reset();
            this.setAddMode();
            // Refresh the categories table
            this.loadCategories();
        } catch (error) {
            console.error('Error saving category:', error);
            this.showToast('Error saving category: ' + error.message, 'error');
        }
    }

    // Handle subcategory form submission (add/edit)
    async handleSubcategorySubmit() {
        const form = document.getElementById('subForm');
        const catId = document.getElementById('subCatId').value;
        const subId = document.getElementById('subId').value;
        const nameInput = document.getElementById('subName');
        const mcqInput = document.getElementById('subMcq');
        
        const name = nameInput.value.trim();
        const mcqCount = parseInt(mcqInput.value) || 0;

        if (!name) {
            nameInput.classList.add('is-invalid');
            return;
        }

        nameInput.classList.remove('is-invalid');

        try {
            if (subId) {
                // Update existing subcategory
                await this.updateSubcategory(subId, name, mcqCount);
                this.showToast('Subcategory updated successfully');
            } else {
                // Add new subcategory
                await this.addSubcategory(catId, name, mcqCount);
                this.showToast('Subcategory added successfully');
            }
            
            // Hide modal and refresh data
            bootstrap.Modal.getInstance(document.getElementById('subModal')).hide();
            this.loadCategories();
        } catch (error) {
            console.error('Error saving subcategory:', error);
            this.showToast('Error saving subcategory: ' + error.message, 'error');
        }
    }

    // Handle delete confirmation
    async handleDeleteConfirm() {
        const modal = document.getElementById('deleteModal');
        const { type, id, parentId, name } = this.pendingDelete;

        try {
            if (type === 'category') {
                await this.deleteCategory(id);
                this.showToast('Category deleted successfully');
            } else if (type === 'subcategory') {
                await this.deleteSubcategory(id);
                this.showToast('Subcategory deleted successfully');
            }
            
            // Hide modal and refresh data
            bootstrap.Modal.getInstance(modal).hide();
            this.loadCategories();
        } catch (error) {
            console.error('Error deleting:', error);
            this.showToast('Error deleting: ' + error.message, 'error');
        }
    }

    // Handle search functionality
    handleSearch(term) {
        const searchTerm = term.toLowerCase();
        document.querySelectorAll('#categoryBody > tr.category-row').forEach(row => {
            const name = (row.dataset.name || '').toLowerCase();
            const desc = (row.dataset.desc || '').toLowerCase();
            
            if (name.includes(searchTerm) || desc.includes(searchTerm)) {
                row.style.display = '';
                const subsRow = document.getElementById(`subs_${row.dataset.catId}`);
                if (subsRow) subsRow.style.display = '';
            } else {
                row.style.display = 'none';
                const subsRow = document.getElementById(`subs_${row.dataset.catId}`);
                if (subsRow) subsRow.style.display = 'none';
            }
        });
    }

    // API Calls to backend PHP scripts

    // Load all categories and subcategories
    async loadCategories() {
        try {
            const response = await fetch('api/get_categories.php');
            if (!response.ok) {
                throw new Error('Server returned ' + response.status);
            }
            const categories = await response.json();
            
            // Update the UI with the fetched data
            this.renderCategories(categories);
        } catch (error) {
            console.error('Error loading categories:', error);
            this.showToast('Error loading categories: ' + error.message, 'error');
        }
    }

    // Add a new category
    async addCategory(name, description) {
        const response = await fetch('api/add_category.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ name, description })
        });
        
        if (!response.ok) {
            const errorData = await response.json().catch(() => ({}));
            throw new Error(errorData.error || 'Failed to add category');
        }
        
        return response.json();
    }

    // Update a category
    async updateCategory(id, name, description) {
        const response = await fetch('api/update_category.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id, name, description })
        });
        
        if (!response.ok) {
            const errorData = await response.json().catch(() => ({}));
            throw new Error(errorData.error || 'Failed to update category');
        }
        
        return response.json();
    }

    // Delete a category
    async deleteCategory(id) {
        const response = await fetch('api/delete_category.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id })
        });
        
        if (!response.ok) {
            const errorData = await response.json().catch(() => ({}));
            throw new Error(errorData.error || 'Failed to delete category');
        }
        
        return response.json();
    }

    // Add a new subcategory
    async addSubcategory(categoryId, name, mcqCount) {
        const response = await fetch('api/add_subcategory.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ category_id: categoryId, name, mcqs: mcqCount })
        });
        
        if (!response.ok) {
            const errorData = await response.json().catch(() => ({}));
            throw new Error(errorData.error || 'Failed to add subcategory');
        }
        
        return response.json();
    }

    // Update a subcategory
    async updateSubcategory(id, name, mcqCount) {
        const response = await fetch('api/update_subcategory.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id, name, mcqs: mcqCount })
        });
        
        if (!response.ok) {
            const errorData = await response.json().catch(() => ({}));
            throw new Error(errorData.error || 'Failed to update subcategory');
        }
        
        return response.json();
    }

    // Delete a subcategory
    async deleteSubcategory(id) {
        const response = await fetch('api/delete_subcategory.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id })
        });
        
        if (!response.ok) {
            const errorData = await response.json().catch(() => ({}));
            throw new Error(errorData.error || 'Failed to delete subcategory');
        }
        
        return response.json();
    }

    // UI Helper Methods

    // Prepare the edit category form
    prepareEditCategory(categoryId) {
        const row = document.querySelector(`.category-row[data-cat-id="${categoryId}"]`);
        if (!row) return;
        
        document.getElementById('editingCategoryId').value = categoryId;
        document.getElementById('catName').value = row.dataset.name || '';
        document.getElementById('catDesc').value = row.dataset.desc || '';
        
        document.getElementById('formTitle').textContent = 'Edit Category';
        document.getElementById('saveBtn').textContent = 'Update Category';
        
        // Show statistics
        document.getElementById('editStats').classList.remove('d-none');
        document.getElementById('statSubs').textContent = row.dataset.subcount || '0';
        document.getElementById('statMcqs').textContent = row.dataset.total || '0';
    }

    // Prepare the delete category confirmation
    prepareDeleteCategory(categoryId, categoryName) {
        this.pendingDelete = {
            type: 'category',
            id: categoryId,
            name: categoryName
        };
        
        document.getElementById('deleteTitle').textContent = 'Delete Category';
        document.getElementById('deleteBody').innerHTML = `
            <div class="d-flex align-items-center mb-2">
                <i class="bi bi-exclamation-triangle-fill text-danger me-2"></i>
                <strong>Delete "${categoryName}"?</strong>
            </div>
            <div class="small text-danger">This will remove all subcategories and MCQs.</div>
        `;
        
        // Show the modal
        new bootstrap.Modal(document.getElementById('deleteModal')).show();
    }

    // Prepare the add subcategory form
    prepareAddSubcategory(categoryId, categoryName) {
        document.getElementById('subModalTitle').textContent = 'Add Subcategory';
        document.getElementById('subCatId').value = categoryId;
        document.getElementById('subId').value = '';
        document.getElementById('subParentName').value = categoryName;
        document.getElementById('subName').value = '';
        document.getElementById('subMcq').value = '';
        
        // Clear validation
        document.getElementById('subName').classList.remove('is-invalid');
        
        // Show the modal
        new bootstrap.Modal(document.getElementById('subModal')).show();
    }

    // Prepare the edit subcategory form
    prepareEditSubcategory(categoryId, subcategoryId, name, mcqCount) {
        const categoryRow = document.querySelector(`.category-row[data-cat-id="${categoryId}"]`);
        const categoryName = categoryRow ? categoryRow.dataset.name : '';
        
        document.getElementById('subModalTitle').textContent = 'Edit Subcategory';
        document.getElementById('subCatId').value = categoryId;
        document.getElementById('subId').value = subcategoryId;
        document.getElementById('subParentName').value = categoryName;
        document.getElementById('subName').value = name || '';
        document.getElementById('subMcq').value = mcqCount || '';
        
        // Clear validation
        document.getElementById('subName').classList.remove('is-invalid');
        
        // Show the modal
        new bootstrap.Modal(document.getElementById('subModal')).show();
    }

    // Prepare the delete subcategory confirmation
    prepareDeleteSubcategory(categoryId, subcategoryId, subcategoryName) {
        this.pendingDelete = {
            type: 'subcategory',
            id: subcategoryId,
            parentId: categoryId,
            name: subcategoryName
        };
        
        document.getElementById('deleteTitle').textContent = 'Delete Subcategory';
        document.getElementById('deleteBody').innerHTML = `
            <div class="d-flex align-items-center mb-2">
                <i class="bi bi-exclamation-triangle-fill text-danger me-2"></i>
                <strong>Delete "${subcategoryName}"?</strong>
            </div>
            <div class="small text-danger">This will remove its MCQs from the total.</div>
        `;
        
        // Show the modal
        new bootstrap.Modal(document.getElementById('deleteModal')).show();
    }

    // Set the form to add mode
    setAddMode() {
        document.getElementById('editingCategoryId').value = '';
        document.getElementById('formTitle').textContent = 'Add New Category';
        document.getElementById('saveBtn').textContent = 'Add Category';
        document.getElementById('editStats').classList.add('d-none');
        document.getElementById('catName').value = '';
        document.getElementById('catDesc').value = '';
        document.getElementById('catName').classList.remove('is-invalid');
    }

    // Show toast notification
    showToast(message, type = 'success') {
        const toast = document.getElementById('appToast');
        const toastMsg = document.getElementById('toastMsg');
        
        // Set message and style based on type
        toastMsg.textContent = message;
        
        if (type === 'error') {
            toast.style.backgroundColor = '#fef2f2';
            toast.style.borderColor = '#fecaca';
            toast.style.color = '#991b1b';
        } else {
            toast.style.backgroundColor = '#f0fdf4';
            toast.style.borderColor = '#bbf7d0';
            toast.style.color = '#14532d';
        }
        
        // Show the toast
        toast.classList.remove('d-none');
        
        // Animation
        toast.style.opacity = 0;
        toast.style.transform = 'translateY(-6px)';
        
        setTimeout(() => {
            toast.style.transition = 'all .22s';
            toast.style.opacity = 1;
            toast.style.transform = 'translateY(0)';
        }, 10);
        
        // Hide after delay
        setTimeout(() => {
            toast.style.opacity = 0;
            toast.style.transform = 'translateY(-6px)';
            setTimeout(() => toast.classList.add('d-none'), 300);
        }, 3000);
    }

    // Render categories in the table (this would be called after fetching data)
    renderCategories(categories) {
        const tbody = document.getElementById('categoryBody');
        tbody.innerHTML = '';
        
        categories.forEach(category => {
            const categoryRow = this.createCategoryRow(category);
            tbody.appendChild(categoryRow);
            
            if (category.subcategories && category.subcategories.length > 0) {
                const subRow = this.createSubcategoriesRow(category);
                tbody.appendChild(subRow);
            }
        });
        
        // Re-initialize event listeners for the new elements
        this.delegateEventListeners();
        
        // Initialize chevron toggle functionality
        this.initChevronToggle();
    }

    // Initialize chevron toggle functionality
    initChevronToggle() {
        document.querySelectorAll('.chevron').forEach(btn => {
            const targetSel = btn.getAttribute('data-bs-target');
            const target = document.querySelector(targetSel);
            if (!target) return;
            
            // Remove any existing listeners
            target.removeEventListener('show.bs.collapse', this._chevronHandler);
            target.removeEventListener('hide.bs.collapse', this._chevronHandler);
            
            // Add new listeners
            target.addEventListener('show.bs.collapse', () => {
                btn.querySelector('i').className = 'bi bi-chevron-down';
            });
            target.addEventListener('hide.bs.collapse', () => {
                btn.querySelector('i').className = 'bi bi-chevron-right';
            });
        });
    }

    // Create category row HTML
    createCategoryRow(category) {
        const row = document.createElement('tr');
        row.className = 'row-alt category-row';
        row.dataset.catId = category.id;
        row.dataset.name = category.category_name || category.name;
        row.dataset.desc = category.description || '';
        row.dataset.subcount = category.subcategories ? category.subcategories.length : 0;
        row.dataset.total = category.totalMCQs || 0;
        
        row.innerHTML = `
            <td class="ps-4">
                <div class="d-flex align-items-start">
                    <button class="btn btn-light btn-sm me-2 chevron" 
                            data-bs-toggle="collapse" 
                            data-bs-target="#subs_${category.id}" 
                            aria-expanded="false" aria-controls="subs_${category.id}">
                        <i class="bi bi-chevron-right"></i>
                    </button>
                    <div>
                        <div class="fw-semibold">${category.category_name || category.name}</div>
                        <div class="text-muted small">${category.description || ''}</div>
                    </div>
                </div>
            </td>
            <td><span class="badge rounded-pill bg-secondary-subtle text-secondary-emphasis subcount">${category.subcategories ? category.subcategories.length : 0}</span></td>
            <td><span class="badge rounded-pill bg-primary-subtle text-primary-emphasis total">${category.totalMCQs || 0}</span></td>
            <td>
                <div class="d-flex flex-wrap gap-1">
                    <button class="btn btn-sm btn-light  edit-cat" data-cat-id="${category.id}"><i class="bi bi-pencil-square me-1"></i></button>
                    <button class="btn btn-sm btn-light text-danger del-cat" data-cat-id="${category.id}" data-cat-name="${category.category_name || category.name}"><i class="bi bi-trash me-1"></i></button>
                    <button class="btn btn-sm btn-light text-secondary add-sub" data-cat-id="${category.id}" data-cat-name="${category.category_name || category.name}"><i class="bi bi-plus-lg me-1"></i></button>
                </div>
            </td>
        `;
        
        return row;
    }

    // Create subcategories row HTML
    createSubcategoriesRow(category) {
        const row = document.createElement('tr');
        row.className = 'collapse sub-row';
        row.id = `subs_${category.id}`;
        row.dataset.parentCat = category.id;
        
        let subItemsHTML = '';
        if (category.subcategories) {
            category.subcategories.forEach(sub => {
                subItemsHTML += `
                    <div class="sub-item" data-sub-id="${sub.id}" data-mcq="${sub.MCQs || sub.mcqs || 0}" data-name="${sub.sub_category_name || sub.name}">
                        <div class="d-flex align-items-center gap-2">
                            <span class="text-muted">↳</span>
                            <span class="sub-indent fw-semibold">${sub.sub_category_name || sub.name}</span>
                            <span class="badge badge-soft ms-2">${sub.MCQs || sub.mcqs || 0} MCQs</span>
                        </div>
                        <div class="d-flex gap-1">
                            <button class="btn btn-sm btn-light edit-sub" data-cat-id="${category.id}" data-sub-id="${sub.id}"><i class="bi bi-pencil-square"></i></button>
                            <button class="btn btn-sm btn-light text-danger del-sub" data-cat-id="${category.id}" data-sub-id="${sub.id}" data-sub-name="${sub.sub_category_name || sub.name}"><i class="bi bi-trash"></i></button>
                        </div>
                    </div>
                `;
            });
        }
        
        row.innerHTML = `
            <td colspan="4" class="ps-5">
                <div class="sub-list" id="sublist_${category.id}">
                    ${subItemsHTML}
                </div>
            </td>
        `;
        
        return row;
    }
}

// Initialize the category manager when the DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    window.categoryManager = new CategoryManager();
});