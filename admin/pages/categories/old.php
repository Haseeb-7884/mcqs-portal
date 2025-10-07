<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Manage Categories</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons (for simple icons) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: #f8fafc
        }

        .page-title {
            font-weight: 700;
            color: #111827
        }

        .page-sub {
            color: #6b7280
        }

        .card-soft {
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, .05);
            background: #fff
        }

        .card-head {
            padding: 1rem 1.25rem;
            border-bottom: 1px solid #e5e7eb
        }

        .card-title {
            margin: 0;
            font-size: 1.125rem;
            font-weight: 600;
            color: #111827
        }

        .table-wrap {
            max-height: 24rem;
            overflow: auto
        }

        .table>thead th {
            font-size: .75rem;
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: .05em
        }

        .table-hover tbody tr:hover {
            background: #f9fafb
        }

        .row-alt:nth-child(odd) {
            background: #fff
        }

        .row-alt:nth-child(even) {
            background: #fbfcfe
        }

        .sub-row {
            background: #fbfbfd
        }

        .sub-indent {
            border-left: 2px solid #d1d5db;
            padding-left: 1.5rem
        }

        .btn-pill {
            border-radius: .5rem
        }

        .btn-outline-gray {
            border: 1px solid #d1d5db;
            color: #374151;
            background: #fff
        }

        .btn-outline-gray:hover {
            background: #f3f4f6
        }

        .status-pill {
            font-size: .75rem;
            border-radius: .375rem;
            padding: .25rem .5rem
        }

        .form-card {
            height: 400px
        }

        /* fixed ~400px as requested */
        .form-card .card-body {
            overflow: auto
        }

        .form-label {
            color: #4b5563
        }

        .form-text {
            color: #6b7280
        }

        .toast-ctr {
            position: fixed;
            top: 1rem;
            right: 1rem;
            z-index: 1080
        }

        .toast-soft {
            border: 1px solid;
            box-shadow: 0 6px 20px rgba(0, 0, 0, .08);
            border-radius: .75rem
        }

        .toast-success {
            background: #f0fdf4;
            border-color: #bbf7d0;
            color: #14532d
        }

        .toast-error {
            background: #fef2f2;
            border-color: #fecaca;
            color: #7f1d1d
        }

        .action-icon {
            font-size: .9rem;
            margin-right: .25rem
        }

        .pointer {
            cursor: pointer
        }

        @media (max-width: 991.98px) {
            .form-card {
                height: auto
            }
        }
    </style>
</head>

<body>
    <div class="container-xxl py-4 py-lg-5">
        <div class="mb-3">
            <h1 class="page-title mb-1">Manage Categories</h1>
            <p class="page-sub">Add, edit, or organize categories and subcategories. Track total MCQs in each.</p>
        </div>

        <div class="row g-4">
            <!-- LEFT: Categories & Subcategories (≈60%) -->
            <div class="col-12 col-lg-7">
                <div class="card-soft h-100">
                    <div class="card-head d-flex align-items-center justify-content-between">
                        <h2 class="card-title">Categories &amp; Subcategories</h2>
                    </div>

                    <div class="table-wrap">
                        <table class="table align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="ps-4">Category Name</th>
                                    <th style="width:140px">Subcategories</th>
                                    <th style="width:120px">Total MCQs</th>
                                    <th style="width:260px">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="categoryBody" class="small"></tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- RIGHT: Add/Edit Category (≈40%) -->
            <div class="col-12 col-lg-5">
                <div class="card-soft form-card">
                    <div class="card-head">
                        <h2 id="formTitle" class="card-title">Add New Category</h2>
                    </div>
                    <div class="card-body">
                        <form id="categoryForm" novalidate>
                            <div class="mb-3">
                                <label class="form-label" for="catName">Category Name *</label>
                                <input id="catName" type="text" class="form-control" placeholder="Enter category name" required>
                                <div class="invalid-feedback">Category name is required.</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="catDesc">Description</label>
                                <textarea id="catDesc" rows="4" class="form-control" placeholder="Enter category description (optional)"></textarea>
                            </div>

                            <div id="editStats" class="d-none bg-light rounded p-3 mb-3">
                                <h6 class="mb-2 text-secondary">Category Statistics</h6>
                                <div class="row g-2">
                                    <div class="col-6">
                                        <div class="text-muted small">Subcategories:</div>
                                        <div class="fw-semibold" id="statSubs">0</div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-muted small">Total MCQs:</div>
                                        <div class="fw-semibold" id="statMcqs">0</div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end gap-2 pt-3 border-top">
                                <button type="button" id="resetBtn" class="btn btn-outline-secondary btn-pill">Reset</button>
                                <button type="submit" id="saveBtn" class="btn btn-primary btn-pill">Add Category</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Toasts -->
    <div class="toast-ctr">
        <div id="appToast" class="p-3 toast-soft d-none">
            <div class="d-flex align-items-center">
                <i id="toastIcon" class="bi me-2"></i>
                <div id="toastMsg" class="small fw-semibold"></div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="deleteTitle" class="modal-title">Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="deleteBody" class="modal-body small">
                    <!-- dynamic text -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" id="confirmDeleteBtn" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // ---------- Mock Data (from your prompt) ----------
        let categories = [{
                id: crypto.randomUUID(),
                name: "General Knowledge",
                description: "Broad range of general knowledge topics",
                subcategories: [{
                        id: crypto.randomUUID(),
                        name: "Current Affairs",
                        mcqCount: 45
                    },
                    {
                        id: crypto.randomUUID(),
                        name: "Pakistan Studies",
                        mcqCount: 83
                    },
                    {
                        id: crypto.randomUUID(),
                        name: "Geography",
                        mcqCount: 0
                    },
                    {
                        id: crypto.randomUUID(),
                        name: "Science",
                        mcqCount: 0
                    },
                ],
                totalMCQs: 128
            },
            {
                id: crypto.randomUUID(),
                name: "English",
                description: "English language and literature",
                subcategories: [{
                        id: crypto.randomUUID(),
                        name: "Grammar",
                        mcqCount: 40
                    },
                    {
                        id: crypto.randomUUID(),
                        name: "Vocabulary",
                        mcqCount: 27
                    },
                ],
                totalMCQs: 67
            },
            {
                id: crypto.randomUUID(),
                name: "Computer Science",
                description: "Programming and computer science fundamentals",
                subcategories: [{
                        id: crypto.randomUUID(),
                        name: "Programming",
                        mcqCount: 50
                    },
                    {
                        id: crypto.randomUUID(),
                        name: "Networking",
                        mcqCount: 20
                    },
                    {
                        id: crypto.randomUUID(),
                        name: "Databases",
                        mcqCount: 22
                    },
                ],
                totalMCQs: 92
            }
        ];

        // ---------- State ----------
        const expanded = new Set(); // expanded category ids
        let editingCategoryId = null; // category being edited (right form)
        let addingSubTo = null; // category id currently adding a subcategory to
        let editingSub = {
            catId: null,
            subId: null
        }; // inline subcategory editing

        // ---------- DOM ----------
        const tbody = document.getElementById('categoryBody');
        const form = document.getElementById('categoryForm');
        const title = document.getElementById('formTitle');
        const nameInput = document.getElementById('catName');
        const descInput = document.getElementById('catDesc');
        const resetBtn = document.getElementById('resetBtn');
        const saveBtn = document.getElementById('saveBtn');
        const statsBox = document.getElementById('editStats');
        const statSubs = document.getElementById('statSubs');
        const statMcqs = document.getElementById('statMcqs');

        const toast = document.getElementById('appToast');
        const toastIcon = document.getElementById('toastIcon');
        const toastMsg = document.getElementById('toastMsg');

        const delModalEl = document.getElementById('deleteModal');
        const delModal = new bootstrap.Modal(delModalEl);
        const delTitle = document.getElementById('deleteTitle');
        const delBody = document.getElementById('deleteBody');
        const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
        let pendingDelete = null; // {type: 'category'|'subcategory', catId, subId?}

        // ---------- Helpers ----------
        function calcTotals(cat) {
            cat.totalMCQs = cat.subcategories.reduce((s, sc) => s + (sc.mcqCount || 0), 0);
        }

        function showToast(message, type = 'success') {
            toast.classList.remove('d-none', 'toast-success', 'toast-error');
            toast.classList.add(type === 'success' ? 'toast-success' : 'toast-error');
            toastIcon.className = 'bi me-2 ' + (type === 'success' ? 'bi-check-circle' : 'bi-x-circle');
            toastMsg.textContent = message;
            toast.style.opacity = 0;
            toast.style.transform = 'translateY(-6px)';
            toast.classList.remove('d-none');
            setTimeout(() => {
                toast.style.transition = 'all .25s';
                toast.style.opacity = 1;
                toast.style.transform = 'translateY(0)';
            }, 10);
            setTimeout(() => {
                toast.style.opacity = 0;
                toast.style.transform = 'translateY(-6px)';
            }, 2200);
            setTimeout(() => {
                toast.classList.add('d-none');
            }, 2550);
        }

        function setFormMode(categoryId = null) {
            editingCategoryId = categoryId;
            if (categoryId) {
                const cat = categories.find(c => c.id === categoryId);
                title.textContent = 'Edit Category';
                nameInput.value = cat.name;
                descInput.value = cat.description || '';
                saveBtn.textContent = 'Update Category';
                resetBtn.textContent = 'Cancel';
                statsBox.classList.remove('d-none');
                statSubs.textContent = cat.subcategories.length;
                statMcqs.textContent = cat.totalMCQs;
            } else {
                title.textContent = 'Add New Category';
                nameInput.value = '';
                descInput.value = '';
                saveBtn.textContent = 'Add Category';
                resetBtn.textContent = 'Reset';
                statsBox.classList.add('d-none');
            }
        }

        // ---------- Render ----------
        function render() {
            tbody.innerHTML = '';
            categories.forEach((cat, idx) => {
                calcTotals(cat);
                const isExpanded = expanded.has(cat.id);

                // Category Row
                const tr = document.createElement('tr');
                tr.className = 'row-alt';
                tr.innerHTML = `
          <td class="ps-4">
            <div class="d-flex align-items-start">
              <button class="btn btn-light btn-sm me-2 toggle pointer" data-id="${cat.id}">
                <i class="bi ${isExpanded ? 'bi-chevron-down' : 'bi-chevron-right'}"></i>
              </button>
              <div>
                <div class="fw-semibold">${cat.name}</div>
                ${cat.description ? `<div class="text-muted small">${cat.description}</div>` : ''}
              </div>
            </div>
          </td>
          <td>${cat.subcategories.length}</td>
          <td>${cat.totalMCQs}</td>
          <td>
            <div class="d-flex flex-wrap gap-1">
              <button class="btn btn-sm btn-primary btn-pill edit-cat" data-id="${cat.id}">
                <i class="bi bi-pencil-square action-icon"></i>Edit
              </button>
              <button class="btn btn-sm btn-danger btn-pill del-cat" data-id="${cat.id}">
                <i class="bi bi-trash action-icon"></i>Delete
              </button>
              <button class="btn btn-sm btn-outline-gray btn-pill add-sub" data-id="${cat.id}">
                <i class="bi bi-plus-lg action-icon"></i>Add Sub
              </button>
            </div>
          </td>
        `;
                tbody.appendChild(tr);

                // Inline "Add Subcategory" row
                if (addingSubTo === cat.id) {
                    const addRow = document.createElement('tr');
                    addRow.className = 'sub-row';
                    addRow.innerHTML = `
            <td colspan="4" class="ps-5">
              <div class="d-flex align-items-center gap-2">
                <input type="text" class="form-control form-control-sm w-50" id="newSubName" placeholder="Enter subcategory name" />
                <button class="btn btn-sm btn-primary" id="saveNewSub" data-id="${cat.id}">Save</button>
                <button class="btn btn-sm btn-outline-secondary" id="cancelNewSub">Cancel</button>
              </div>
            </td>
          `;
                    tbody.appendChild(addRow);
                }

                // Subcategory rows (if expanded)
                if (isExpanded) {
                    cat.subcategories.forEach(sc => {
                        const isEditing = editingSub.catId === cat.id && editingSub.subId === sc.id;
                        const subTr = document.createElement('tr');
                        subTr.className = 'sub-row';
                        subTr.innerHTML = !isEditing ? `
              <td>
                <div class="d-flex align-items-center">
                  <div class="me-3" style="width:1.5rem"></div>
                  <div class="sub-indent">
                    <span class="text-muted me-1">↳</span>
                    <span class="text-secondary">${sc.name}</span>
                  </div>
                </div>
              </td>
              <td class="text-muted">—</td>
              <td>${sc.mcqCount}</td>
              <td>
                <div class="d-flex flex-wrap gap-1">
                  <button class="btn btn-sm btn-primary btn-pill edit-sub" data-cat="${cat.id}" data-sub="${sc.id}">
                    <i class="bi bi-pencil-square action-icon"></i>Edit
                  </button>
                  <button class="btn btn-sm btn-danger btn-pill del-sub" data-cat="${cat.id}" data-sub="${sc.id}">
                    <i class="bi bi-trash action-icon"></i>Delete
                  </button>
                </div>
              </td>
            ` : `
              <td colspan="4" class="ps-5">
                <div class="d-flex align-items-center gap-2">
                  <input type="text" class="form-control form-control-sm w-50" id="editSubName" value="${sc.name}">
                  <button class="btn btn-sm btn-primary" id="saveEditSub" data-cat="${cat.id}" data-sub="${sc.id}">Save</button>
                  <button class="btn btn-sm btn-outline-secondary" id="cancelEditSub">Cancel</button>
                </div>
              </td>
            `;
                        tbody.appendChild(subTr);
                    });
                }
            });
        }

        // ---------- Events ----------
        tbody.addEventListener('click', (e) => {
            const t = e.target.closest('button');
            if (!t) return;

            // Toggle expand
            if (t.classList.contains('toggle')) {
                const id = t.dataset.id;
                expanded.has(id) ? expanded.delete(id) : expanded.add(id);
                // cancel inline states if collapsing
                if (!expanded.has(id)) {
                    if (addingSubTo === id) addingSubTo = null;
                    if (editingSub.catId === id) editingSub = {
                        catId: null,
                        subId: null
                    };
                }
                render();
            }

            // Edit category
            if (t.classList.contains('edit-cat')) {
                const id = t.dataset.id;
                setFormMode(id);
            }

            // Delete category
            if (t.classList.contains('del-cat')) {
                const id = t.dataset.id;
                const cat = categories.find(c => c.id === id);
                delTitle.textContent = 'Delete Category';
                delBody.innerHTML = `
          <div class="d-flex align-items-center mb-2">
            <i class="bi bi-exclamation-triangle-fill text-danger me-2"></i>
            <strong>Are you sure you want to delete "${cat.name}"?</strong>
          </div>
          <div class="small text-danger">This will also delete all subcategories and MCQs under it.</div>
          <div class="small text-muted mt-2">This action cannot be undone.</div>
        `;
                pendingDelete = {
                    type: 'category',
                    catId: id
                };
                delModal.show();
            }

            // Add Subcategory row toggle
            if (t.classList.contains('add-sub')) {
                const id = t.dataset.id;
                addingSubTo = (addingSubTo === id ? null : id);
                editingSub = {
                    catId: null,
                    subId: null
                };
                expanded.add(id);
                render();
                if (addingSubTo) {
                    document.getElementById('newSubName').focus();
                }
            }

            // Save new subcategory
            if (t.id === 'saveNewSub') {
                const id = t.dataset.id;
                const input = document.getElementById('newSubName');
                const name = input.value.trim();
                if (!name) {
                    showToast('Subcategory name is required.', 'error');
                    input.focus();
                    return;
                }
                const cat = categories.find(c => c.id === id);
                cat.subcategories.push({
                    id: crypto.randomUUID(),
                    name,
                    mcqCount: 0
                });
                calcTotals(cat);
                addingSubTo = null;
                showToast('Subcategory added successfully.', 'success');
                render();
            }

            // Cancel new subcategory
            if (t.id === 'cancelNewSub') {
                addingSubTo = null;
                render();
            }

            // Edit subcategory
            if (t.classList.contains('edit-sub')) {
                editingSub = {
                    catId: t.dataset.cat,
                    subId: t.dataset.sub
                };
                addingSubTo = null;
                render();
                document.getElementById('editSubName').focus();
            }

            // Save edited subcategory
            if (t.id === 'saveEditSub') {
                const {
                    cat: catId,
                    sub: subId
                } = t.dataset;
                const input = document.getElementById('editSubName');
                const name = input.value.trim();
                if (!name) {
                    showToast('Subcategory name is required.', 'error');
                    input.focus();
                    return;
                }
                const cat = categories.find(c => c.id === catId);
                const sc = cat.subcategories.find(s => s.id === subId);
                sc.name = name;
                editingSub = {
                    catId: null,
                    subId: null
                };
                showToast('Subcategory updated successfully.', 'success');
                render();
            }

            // Cancel edit subcategory
            if (t.id === 'cancelEditSub') {
                editingSub = {
                    catId: null,
                    subId: null
                };
                render();
            }

            // Delete subcategory
            if (t.classList.contains('del-sub')) {
                const {
                    cat: catId,
                    sub: subId
                } = t.dataset;
                const cat = categories.find(c => c.id === catId);
                const sc = cat.subcategories.find(s => s.id === subId);
                delTitle.textContent = 'Delete Subcategory';
                delBody.innerHTML = `
          <div class="d-flex align-items-center mb-2">
            <i class="bi bi-exclamation-triangle-fill text-danger me-2"></i>
            <strong>Are you sure you want to delete "${sc.name}"?</strong>
          </div>
          <div class="small text-danger">This will also delete all MCQs under it.</div>
          <div class="small text-muted mt-2">This action cannot be undone.</div>
        `;
                pendingDelete = {
                    type: 'subcategory',
                    catId,
                    subId
                };
                delModal.show();
            }
        });

        // Confirm delete
        confirmDeleteBtn.addEventListener('click', () => {
            if (!pendingDelete) return;
            if (pendingDelete.type === 'category') {
                categories = categories.filter(c => c.id !== pendingDelete.catId);
                showToast('Category deleted.', 'success');
            } else {
                const cat = categories.find(c => c.id === pendingDelete.catId);
                cat.subcategories = cat.subcategories.filter(s => s.id !== pendingDelete.subId);
                calcTotals(cat);
                showToast('Subcategory deleted.', 'success');
            }
            pendingDelete = null;
            delModal.hide();
            render();
            // reset form if we deleted the one being edited
            if (editingCategoryId && !categories.find(c => c.id === editingCategoryId)) {
                setFormMode(null);
            } else if (editingCategoryId) {
                const cat = categories.find(c => c.id === editingCategoryId);
                statSubs.textContent = cat.subcategories.length;
                statMcqs.textContent = cat.totalMCQs;
            }
        });

        // Right form submit (Add / Update)
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            const name = nameInput.value.trim();
            if (!name) {
                nameInput.classList.add('is-invalid');
                showToast('Category name is required.', 'error');
                return;
            }
            nameInput.classList.remove('is-invalid');

            if (!editingCategoryId) {
                categories.push({
                    id: crypto.randomUUID(),
                    name,
                    description: descInput.value.trim() || '',
                    subcategories: [],
                    totalMCQs: 0
                });
                showToast('Category added successfully.', 'success');
                setFormMode(null);
            } else {
                const cat = categories.find(c => c.id === editingCategoryId);
                cat.name = name;
                cat.description = descInput.value.trim();
                calcTotals(cat);
                statSubs.textContent = cat.subcategories.length;
                statMcqs.textContent = cat.totalMCQs;
                showToast('Category updated successfully.', 'success');
            }
            render();
        });

        // Reset/Cancel button
        resetBtn.addEventListener('click', () => {
            if (editingCategoryId) {
                setFormMode(null);
            } else {
                form.reset();
                nameInput.classList.remove('is-invalid');
            }
        });

        // Initial
        setFormMode(null);
        render();
    </script>
</body>

</html>