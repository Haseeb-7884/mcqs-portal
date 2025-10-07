<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Manage Categories</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    :root {
      --bg: #f7fafc;
      --card: #ffffff;
      --muted: #6b7280;
      --ink: #111827;
      --ring: #e5e7eb;
      --soft: 0 4px 20px rgba(0, 0, 0, .06);
      --radius: 14px;
    }

    body { background: var(--bg); color: var(--ink) }

    .page-title { font-weight: 800; letter-spacing: .2px }
    .page-sub { color: var(--muted) }

    .card-soft {
      border: 1px solid var(--ring);
      border-radius: var(--radius);
      background: var(--card);
      box-shadow: var(--soft);
    }

    .card-head { padding: 1rem 1.25rem; border-bottom: 1px solid var(--ring); position: sticky; top: 0; z-index: 1; background: var(--card) }
    .card-title { font-size: 1.125rem; font-weight: 700 }

    .table-wrap { max-height: 28rem; overflow: auto }
    .table thead th { text-transform: uppercase; font-size: .72rem; letter-spacing: .06em; color: var(--muted); position: sticky; top: 0; background: #f9fafb; z-index: 2 }

    .row-alt:nth-child(odd) { background: #fff }
    .row-alt:nth-child(even) { background: #fbfcfe }

    .sub-row { background: #fbfbfd }
    .sub-list .sub-item { display:flex; align-items:center; justify-content:space-between; padding:.35rem .75rem; border:1px dashed #e5e7eb; border-radius: .5rem; margin-bottom:.35rem; }
    .sub-indent { border-left: 2px solid #d1d5db; padding-left: .75rem; }
    .badge-soft { background:#eef2ff; color:#3730a3; font-weight:600 }

    .btn-pill { border-radius: .6rem }

    .form-card { max-height: 520px }
    .form-card .card-body { overflow: auto }

    .toast-ctr { position: fixed; top: 1rem; right: 1rem; z-index: 1080 }
    .toast-soft { border: 1px solid #bbf7d0; background: #f0fdf4; color: #14532d; border-radius: .75rem; padding:.6rem .8rem; box-shadow: var(--soft) }

    .pointer { cursor: pointer }
  </style>
</head>

<body>
  <div class="container-xxl py-4 py-lg-5">
    <div class="d-flex align-items-center justify-content-between mb-3">
      <div>
        <h1 class="page-title mb-1">Manage Categories</h1>
        <p class="page-sub mb-0">Add, edit, or organize categories & subcategories. Optimized for PHP backend — minimal JS.</p>
      </div>
      <div class="d-none d-lg-flex gap-2">
        <button class="btn btn-outline-secondary btn-pill" id="resetAllBtn"><i class="bi bi-arrow-counterclockwise me-1"></i>Reset Form</button>
        <button class="btn btn-primary btn-pill" data-bs-toggle="offcanvas" data-bs-target="#helpCanvas"><i class="bi bi-question-circle me-1"></i>Help</button>
      </div>
    </div>

    <div class="row g-4">
      <!-- LEFT: Categories -->
      <div class="col-12 col-lg-7">
        <div class="card-soft h-100">
          <div class="card-head d-flex align-items-center justify-content-between">
            <h2 class="card-title mb-0">Categories & Subcategories</h2>
            <div class="input-group input-group-sm" style="max-width: 260px;">
              <span class="input-group-text bg-white"><i class="bi bi-search"></i></span>
              <input type="text" class="form-control" id="tableSearch" placeholder="Search category...">
            </div>
          </div>

          <div class="table-wrap">
            <table class="table align-middle mb-0" id="catTable">
              <thead class="table-light">
                <tr>
                  <th class="ps-4" style="width:45%">Category</th>
                  <th style="width:12%">Subs</th>
                  <th style="width:16%">Total MCQs</th>
                  <th style="width:27%">Actions</th>
                </tr>
              </thead>
              <tbody id="categoryBody">

                <!-- ================== CATEGORY 1 ================== -->
                <tr class="row-alt category-row" 
                    data-cat-id="cat1" 
                    data-name="General Knowledge"
                    data-desc="Broad range of general knowledge topics"
                    data-subcount="4"
                    data-total="128">
                  <td class="ps-4">
                    <div class="d-flex align-items-start">
                      <button class="btn btn-light btn-sm me-2 chevron" 
                              data-bs-toggle="collapse" 
                              data-bs-target="#subs_cat1" 
                              aria-expanded="false" aria-controls="subs_cat1">
                        <i class="bi bi-chevron-right"></i>
                      </button>
                      <div>
                        <div class="fw-semibold">General Knowledge</div>
                        <div class="text-muted small">Broad range of general knowledge topics</div>
                      </div>
                    </div>
                  </td>
                  <td><span class="badge rounded-pill bg-secondary-subtle text-secondary-emphasis subcount">4</span></td>
                  <td><span class="badge rounded-pill bg-primary-subtle text-primary-emphasis total">128</span></td>
                  <td>
                    <div class="d-flex flex-wrap gap-1">
                      <button class="btn btn-sm btn-primary btn-pill edit-cat" data-cat-id="cat1"><i class="bi bi-pencil-square me-1"></i>Edit</button>
                      <button class="btn btn-sm btn-danger btn-pill del-cat" data-cat-id="cat1" data-cat-name="General Knowledge"><i class="bi bi-trash me-1"></i>Delete</button>
                      <button class="btn btn-sm btn-outline-secondary btn-pill add-sub" data-cat-id="cat1" data-cat-name="General Knowledge"><i class="bi bi-plus-lg me-1"></i>Add Sub</button>
                    </div>
                  </td>
                </tr>
                <tr class="collapse sub-row" id="subs_cat1" data-parent-cat="cat1">
                  <td colspan="4" class="ps-5">
                    <div class="sub-list" id="sublist_cat1">
                      <div class="sub-item" data-sub-id="s1" data-mcq="45" data-name="Current Affairs">
                        <div class="d-flex align-items-center gap-2">
                          <span class="text-muted">↳</span>
                          <span class="sub-indent fw-semibold">Current Affairs</span>
                          <span class="badge badge-soft ms-2">45 MCQs</span>
                        </div>
                        <div class="d-flex gap-1">
                          <button class="btn btn-sm btn-light edit-sub" data-cat-id="cat1" data-sub-id="s1"><i class="bi bi-pencil-square"></i></button>
                          <button class="btn btn-sm btn-light text-danger del-sub" data-cat-id="cat1" data-sub-id="s1" data-sub-name="Current Affairs"><i class="bi bi-trash"></i></button>
                        </div>
                      </div>
                      <div class="sub-item" data-sub-id="s2" data-mcq="83" data-name="Pakistan Studies">
                        <div class="d-flex align-items-center gap-2">
                          <span class="text-muted">↳</span>
                          <span class="sub-indent fw-semibold">Pakistan Studies</span>
                          <span class="badge badge-soft ms-2">83 MCQs</span>
                        </div>
                        <div class="d-flex gap-1">
                          <button class="btn btn-sm btn-light edit-sub" data-cat-id="cat1" data-sub-id="s2"><i class="bi bi-pencil-square"></i></button>
                          <button class="btn btn-sm btn-light text-danger del-sub" data-cat-id="cat1" data-sub-id="s2" data-sub-name="Pakistan Studies"><i class="bi bi-trash"></i></button>
                        </div>
                      </div>
                      <div class="sub-item" data-sub-id="s3" data-mcq="0" data-name="Geography">
                        <div class="d-flex align-items-center gap-2">
                          <span class="text-muted">↳</span>
                          <span class="sub-indent fw-semibold">Geography</span>
                          <span class="badge badge-soft ms-2">0 MCQs</span>
                        </div>
                        <div class="d-flex gap-1">
                          <button class="btn btn-sm btn-light edit-sub" data-cat-id="cat1" data-sub-id="s3"><i class="bi bi-pencil-square"></i></button>
                          <button class="btn btn-sm btn-light text-danger del-sub" data-cat-id="cat1" data-sub-id="s3" data-sub-name="Geography"><i class="bi bi-trash"></i></button>
                        </div>
                      </div>
                      <div class="sub-item" data-sub-id="s4" data-mcq="0" data-name="Science">
                        <div class="d-flex align-items-center gap-2">
                          <span class="text-muted">↳</span>
                          <span class="sub-indent fw-semibold">Science</span>
                          <span class="badge badge-soft ms-2">0 MCQs</span>
                        </div>
                        <div class="d-flex gap-1">
                          <button class="btn btn-sm btn-light edit-sub" data-cat-id="cat1" data-sub-id="s4"><i class="bi bi-pencil-square"></i></button>
                          <button class="btn btn-sm btn-light text-danger del-sub" data-cat-id="cat1" data-sub-id="s4" data-sub-name="Science"><i class="bi bi-trash"></i></button>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>

                <!-- ================== CATEGORY 2 ================== -->
                <tr class="row-alt category-row" 
                    data-cat-id="cat2" 
                    data-name="English"
                    data-desc="English language and literature"
                    data-subcount="2"
                    data-total="67">
                  <td class="ps-4">
                    <div class="d-flex align-items-start">
                      <button class="btn btn-light btn-sm me-2 chevron" data-bs-toggle="collapse" data-bs-target="#subs_cat2" aria-expanded="false" aria-controls="subs_cat2">
                        <i class="bi bi-chevron-right"></i>
                      </button>
                      <div>
                        <div class="fw-semibold">English</div>
                        <div class="text-muted small">English language and literature</div>
                      </div>
                    </div>
                  </td>
                  <td><span class="badge rounded-pill bg-secondary-subtle text-secondary-emphasis subcount">2</span></td>
                  <td><span class="badge rounded-pill bg-primary-subtle text-primary-emphasis total">67</span></td>
                  <td>
                    <div class="d-flex flex-wrap gap-1">
                      <button class="btn btn-sm btn-primary btn-pill edit-cat" data-cat-id="cat2"><i class="bi bi-pencil-square me-1"></i>Edit</button>
                      <button class="btn btn-sm btn-danger btn-pill del-cat" data-cat-id="cat2" data-cat-name="English"><i class="bi bi-trash me-1"></i>Delete</button>
                      <button class="btn btn-sm btn-outline-secondary btn-pill add-sub" data-cat-id="cat2" data-cat-name="English"><i class="bi bi-plus-lg me-1"></i>Add Sub</button>
                    </div>
                  </td>
                </tr>
                <tr class="collapse sub-row" id="subs_cat2" data-parent-cat="cat2">
                  <td colspan="4" class="ps-5">
                    <div class="sub-list" id="sublist_cat2">
                      <div class="sub-item" data-sub-id="e1" data-mcq="40" data-name="Grammar">
                        <div class="d-flex align-items-center gap-2">
                          <span class="text-muted">↳</span>
                          <span class="sub-indent fw-semibold">Grammar</span>
                          <span class="badge badge-soft ms-2">40 MCQs</span>
                        </div>
                        <div class="d-flex gap-1">
                          <button class="btn btn-sm btn-light edit-sub" data-cat-id="cat2" data-sub-id="e1"><i class="bi bi-pencil-square"></i></button>
                          <button class="btn btn-sm btn-light text-danger del-sub" data-cat-id="cat2" data-sub-id="e1" data-sub-name="Grammar"><i class="bi bi-trash"></i></button>
                        </div>
                      </div>
                      <div class="sub-item" data-sub-id="e2" data-mcq="27" data-name="Vocabulary">
                        <div class="d-flex align-items-center gap-2">
                          <span class="text-muted">↳</span>
                          <span class="sub-indent fw-semibold">Vocabulary</span>
                          <span class="badge badge-soft ms-2">27 MCQs</span>
                        </div>
                        <div class="d-flex gap-1">
                          <button class="btn btn-sm btn-light edit-sub" data-cat-id="cat2" data-sub-id="e2"><i class="bi bi-pencil-square"></i></button>
                          <button class="btn btn-sm btn-light text-danger del-sub" data-cat-id="cat2" data-sub-id="e2" data-sub-name="Vocabulary"><i class="bi bi-trash"></i></button>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>

                <!-- ================== CATEGORY 3 ================== -->
                <tr class="row-alt category-row" 
                    data-cat-id="cat3" 
                    data-name="Computer Science"
                    data-desc="Programming and computer science fundamentals"
                    data-subcount="3"
                    data-total="92">
                  <td class="ps-4">
                    <div class="d-flex align-items-start">
                      <button class="btn btn-light btn-sm me-2 chevron" data-bs-toggle="collapse" data-bs-target="#subs_cat3" aria-expanded="false" aria-controls="subs_cat3">
                        <i class="bi bi-chevron-right"></i>
                      </button>
                      <div>
                        <div class="fw-semibold">Computer Science</div>
                        <div class="text-muted small">Programming and computer science fundamentals</div>
                      </div>
                    </div>
                  </td>
                  <td><span class="badge rounded-pill bg-secondary-subtle text-secondary-emphasis subcount">3</span></td>
                  <td><span class="badge rounded-pill bg-primary-subtle text-primary-emphasis total">92</span></td>
                  <td>
                    <div class="d-flex flex-wrap gap-1">
                      <button class="btn btn-sm btn-primary btn-pill edit-cat" data-cat-id="cat3"><i class="bi bi-pencil-square me-1"></i>Edit</button>
                      <button class="btn btn-sm btn-danger btn-pill del-cat" data-cat-id="cat3" data-cat-name="Computer Science"><i class="bi bi-trash me-1"></i>Delete</button>
                      <button class="btn btn-sm btn-outline-secondary btn-pill add-sub" data-cat-id="cat3" data-cat-name="Computer Science"><i class="bi bi-plus-lg me-1"></i>Add Sub</button>
                    </div>
                  </td>
                </tr>
                <tr class="collapse sub-row" id="subs_cat3" data-parent-cat="cat3">
                  <td colspan="4" class="ps-5">
                    <div class="sub-list" id="sublist_cat3">
                      <div class="sub-item" data-sub-id="c1" data-mcq="50" data-name="Programming">
                        <div class="d-flex align-items-center gap-2">
                          <span class="text-muted">↳</span>
                          <span class="sub-indent fw-semibold">Programming</span>
                          <span class="badge badge-soft ms-2">50 MCQs</span>
                        </div>
                        <div class="d-flex gap-1">
                          <button class="btn btn-sm btn-light edit-sub" data-cat-id="cat3" data-sub-id="c1"><i class="bi bi-pencil-square"></i></button>
                          <button class="btn btn-sm btn-light text-danger del-sub" data-cat-id="cat3" data-sub-id="c1" data-sub-name="Programming"><i class="bi bi-trash"></i></button>
                        </div>
                      </div>
                      <div class="sub-item" data-sub-id="c2" data-mcq="20" data-name="Networking">
                        <div class="d-flex align-items-center gap-2">
                          <span class="text-muted">↳</span>
                          <span class="sub-indent fw-semibold">Networking</span>
                          <span class="badge badge-soft ms-2">20 MCQs</span>
                        </div>
                        <div class="d-flex gap-1">
                          <button class="btn btn-sm btn-light edit-sub" data-cat-id="cat3" data-sub-id="c2"><i class="bi bi-pencil-square"></i></button>
                          <button class="btn btn-sm btn-light text-danger del-sub" data-cat-id="cat3" data-sub-id="c2" data-sub-name="Networking"><i class="bi bi-trash"></i></button>
                        </div>
                      </div>
                      <div class="sub-item" data-sub-id="c3" data-mcq="22" data-name="Databases">
                        <div class="d-flex align-items-center gap-2">
                          <span class="text-muted">↳</span>
                          <span class="sub-indent fw-semibold">Databases</span>
                          <span class="badge badge-soft ms-2">22 MCQs</span>
                        </div>
                        <div class="d-flex gap-1">
                          <button class="btn btn-sm btn-light edit-sub" data-cat-id="cat3" data-sub-id="c3"><i class="bi bi-pencil-square"></i></button>
                          <button class="btn btn-sm btn-light text-danger del-sub" data-cat-id="cat3" data-sub-id="c3" data-sub-name="Databases"><i class="bi bi-trash"></i></button>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>

                <!-- (Copy the block above for more categories in PHP) -->

              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- RIGHT: Add/Edit Category -->
      <div class="col-12 col-lg-5">
        <div class="card-soft form-card" id="formCard">
          <div class="card-head">
            <h2 id="formTitle" class="card-title mb-0">Add New Category</h2>
          </div>
          <div class="card-body">

            <form id="categoryForm" novalidate>
              <input type="hidden" id="editingCategoryId" value="">

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
                <div class="row g-2 small">
                  <div class="col-6">
                    <div class="text-muted">Subcategories</div>
                    <div class="fw-semibold" id="statSubs">0</div>
                  </div>
                  <div class="col-6">
                    <div class="text-muted">Total MCQs</div>
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

  <!-- Toast -->
  <div class="toast-ctr">
    <div id="appToast" class="toast-soft d-none"><i class="bi bi-check-circle me-2"></i><span id="toastMsg">Done.</span></div>
  </div>

  <!-- Modals -->
  <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 id="deleteTitle" class="modal-title">Delete</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div id="deleteBody" class="modal-body small"></div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="button" id="confirmDeleteBtn" class="btn btn-danger">Delete</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="subModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <form class="modal-content" id="subForm">
        <div class="modal-header">
          <h5 id="subModalTitle" class="modal-title">Add Subcategory</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="subCatId"> <!-- cat id -->
          <input type="hidden" id="subId">    <!-- sub id when editing -->
          <div class="mb-3">
            <label class="form-label">Parent Category</label>
            <input type="text" id="subParentName" class="form-control" disabled>
          </div>
          <div class="mb-3">
            <label class="form-label" for="subName">Subcategory Name *</label>
            <input type="text" id="subName" class="form-control" required>
          </div>
          <div class="mb-0">
            <label class="form-label" for="subMcq">MCQs (optional)</label>
            <input type="number" id="subMcq" class="form-control" min="0" step="1" placeholder="e.g., 12">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary" id="subSaveBtn">Save</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Offcanvas Help -->
  <div class="offcanvas offcanvas-end" tabindex="-1" id="helpCanvas" aria-labelledby="helpCanvasLabel">
    <div class="offcanvas-header">
      <h5 id="helpCanvasLabel">How this page works</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body small text-muted">
      <ol class="mb-4">
        <li><strong>Minimal JS</strong>: Rows are hardcoded (for now). Your PHP will later loop and print the same structure.</li>
        <li><strong>Collapse</strong>: Uses Bootstrap collapse. We only rotate the chevron icon in JS.</li>
        <li><strong>Add/Edit Sub</strong>: Single modal is reused; values are filled via <code>data-*</code> attributes.</li>
        <li><strong>Delete</strong>: Single confirm modal for both cat and sub. DOM updates are minimal.</li>
        <li><strong>Hook to PHP</strong>: Replace JS submit handlers with normal form posts to your routes (e.g., <code>action="/category/create.php"</code>).</li>
      </ol>
      <div class="alert alert-info">Tip: keep the same <code>data-cat-id</code> and <code>data-sub-id</code> as your DB IDs so buttons work without extra JS.</div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    // ======== Minimal, PHP-ready JS (no rendering, only light DOM updates) ========

    const toast = document.getElementById('appToast');
    const toastMsg = document.getElementById('toastMsg');
    const showToast = (msg) => {
      toastMsg.textContent = msg;
      toast.classList.remove('d-none');
      toast.style.opacity = 0; toast.style.transform = 'translateY(-6px)';
      setTimeout(() => { toast.style.transition = 'all .22s'; toast.style.opacity = 1; toast.style.transform = 'translateY(0)'; }, 10);
      setTimeout(() => { toast.style.opacity = 0; toast.style.transform = 'translateY(-6px)'; }, 1900);
      setTimeout(() => toast.classList.add('d-none'), 2200);
    };

    const q = (sel, ctx=document) => ctx.querySelector(sel);
    const qa = (sel, ctx=document) => Array.from(ctx.querySelectorAll(sel));

    // Rotate chevrons on collapse
    qa('.chevron').forEach(btn => {
      const targetSel = btn.getAttribute('data-bs-target');
      const target = q(targetSel);
      if (!target) return;
      target.addEventListener('show.bs.collapse', () => btn.querySelector('i').className = 'bi bi-chevron-down');
      target.addEventListener('hide.bs.collapse', () => btn.querySelector('i').className = 'bi bi-chevron-right');
    });

    // --- Right Form helpers ---
    const form = q('#categoryForm');
    const formTitle = q('#formTitle');
    const editingId = q('#editingCategoryId');
    const catName = q('#catName');
    const catDesc = q('#catDesc');
    const statsBox = q('#editStats');
    const statSubs = q('#statSubs');
    const statMcqs = q('#statMcqs');
    const resetBtn = q('#resetBtn');
    const saveBtn = q('#saveBtn');

    const setAddMode = () => {
      editingId.value = '';
      formTitle.textContent = 'Add New Category';
      saveBtn.textContent = 'Add Category';
      statsBox.classList.add('d-none');
      catName.value = '';
      catDesc.value = '';
    };

    const setEditMode = (row) => {
      editingId.value = row.dataset.catId;
      formTitle.textContent = 'Edit Category';
      saveBtn.textContent = 'Update Category';
      catName.value = row.dataset.name || '';
      catDesc.value = row.dataset.desc || '';
      // Read live stats from DOM to stay in sync
      statSubs.textContent = q('.subcount', row.closest('tr')).textContent.trim();
      statMcqs.textContent = q('.total', row.closest('tr')).textContent.trim();
      statsBox.classList.remove('d-none');
    };

    // Edit category button
    qa('.edit-cat').forEach(btn => btn.addEventListener('click', () => {
      const row = btn.closest('.category-row');
      setEditMode(row);
    }));

    // Reset/Cancel
    resetBtn.addEventListener('click', () => setAddMode());

    // Add/Update submit (DEMO only). Hook to PHP later.
    form.addEventListener('submit', (e) => {
      e.preventDefault();
      if (!catName.value.trim()) { catName.classList.add('is-invalid'); return; }
      catName.classList.remove('is-invalid');

      if (!editingId.value) {
        // In production: POST to PHP to create, then reload or append row.
        showToast('Category ready to be created (hook to PHP).');
        form.reset(); setAddMode();
      } else {
        // Update UI only (name/desc). In production: POST then update.
        const row = qa('.category-row').find(r => r.dataset.catId === editingId.value);
        if (row) {
          row.dataset.name = catName.value.trim();
          row.dataset.desc = catDesc.value.trim();
          row.querySelector('.fw-semibold').textContent = row.dataset.name;
          const descEl = row.querySelector('.text-muted.small');
          descEl.textContent = row.dataset.desc;
        }
        showToast('Category updated (UI only).');
      }
    });

    // --- Add/Edit Subcategory Modal ---
    const subModalEl = q('#subModal');
    const subModal = new bootstrap.Modal(subModalEl);
    const subForm = q('#subForm');
    const subModalTitle = q('#subModalTitle');
    const subCatId = q('#subCatId');
    const subId = q('#subId');
    const subParentName = q('#subParentName');
    const subName = q('#subName');
    const subMcq = q('#subMcq');

    // Open Add Sub
    qa('.add-sub').forEach(btn => btn.addEventListener('click', () => {
      subModalTitle.textContent = 'Add Subcategory';
      subCatId.value = btn.dataset.catId;
      subId.value = '';
      subParentName.value = btn.dataset.catName;
      subName.value = '';
      subMcq.value = '';
      subModal.show();
    }));

    // Open Edit Sub
    qa('.edit-sub').forEach(btn => btn.addEventListener('click', () => {
      const item = btn.closest('.sub-item');
      const catId = btn.dataset.catId;
      subModalTitle.textContent = 'Edit Subcategory';
      subCatId.value = catId;
      subId.value = item.dataset.subId;
      // Get parent name from the category row
      const row = qa('.category-row').find(r => r.dataset.catId === catId);
      subParentName.value = row ? (row.dataset.name || '') : '';
      subName.value = item.dataset.name || '';
      subMcq.value = item.dataset.mcq || '';
      subModal.show();
    }));

    // Save Sub (UI only). Hook to PHP later.
    subForm.addEventListener('submit', (e) => {
      e.preventDefault();
      if (!subName.value.trim()) { subName.classList.add('is-invalid'); return; }
      subName.classList.remove('is-invalid');

      const catId = subCatId.value;
      const list = q('#sublist_' + catId.replace('cat','cat')); // id already matches
      const catRow = qa('.category-row').find(r => r.dataset.catId === catId);
      const subCountEl = catRow ? q('.subcount', catRow) : null;
      const totalEl = catRow ? q('.total', catRow) : null;

      // Edit existing
      if (subId.value) {
        const item = q(`[data-parent-cat="${catId}"] .sub-item[data-sub-id="${subId.value}"]`);
        if (item) {
          item.dataset.name = subName.value.trim();
          item.dataset.mcq = String(parseInt(subMcq.value || '0', 10));
          item.querySelector('.sub-indent').textContent = item.dataset.name;
          item.querySelector('.badge').textContent = `${item.dataset.mcq} MCQs`;
          // Recalc total
          if (totalEl) totalEl.textContent = calcTotal(catId);
          showToast('Subcategory updated (UI only).');
        }
      } else {
        // Create new sub item in DOM
        const id = 'n' + Date.now();
        const mcq = String(parseInt(subMcq.value || '0', 10));
        const div = document.createElement('div');
        div.className = 'sub-item';
        div.setAttribute('data-sub-id', id);
        div.setAttribute('data-name', subName.value.trim());
        div.setAttribute('data-mcq', mcq);
        div.innerHTML = `
          <div class="d-flex align-items-center gap-2">
            <span class="text-muted">↳</span>
            <span class="sub-indent fw-semibold">${subName.value.trim()}</span>
            <span class="badge badge-soft ms-2">${mcq} MCQs</span>
          </div>
          <div class="d-flex gap-1">
            <button class="btn btn-sm btn-light edit-sub" data-cat-id="${catId}" data-sub-id="${id}"><i class="bi bi-pencil-square"></i></button>
            <button class="btn btn-sm btn-light text-danger del-sub" data-cat-id="${catId}" data-sub-id="${id}" data-sub-name="${subName.value.trim()}"><i class="bi bi-trash"></i></button>`;
        list.appendChild(div);
        // attach listeners to the new buttons
        div.querySelector('.edit-sub').addEventListener('click', (ev) => {
          const it = ev.currentTarget.closest('.sub-item');
          subModalTitle.textContent = 'Edit Subcategory';
          subCatId.value = catId; subId.value = it.dataset.subId; subParentName.value = catRow.dataset.name || '';
          subName.value = it.dataset.name || ''; subMcq.value = it.dataset.mcq || '';
          subModal.show();
        });
        div.querySelector('.del-sub').addEventListener('click', handleDelSub);
        // Update counters
        if (subCountEl) subCountEl.textContent = String(list.querySelectorAll('.sub-item').length);
        if (totalEl) totalEl.textContent = calcTotal(catId);
        showToast('Subcategory added (UI only).');
      }

      subModal.hide();
    });

    // Calculate total MCQs for a category by summing its subs
    function calcTotal(catId) {
      const items = qa(`[data-parent-cat="${catId}"] .sub-item`);
      const sum = items.reduce((s, el) => s + (parseInt(el.dataset.mcq || '0', 10) || 0), 0);
      return String(sum);
    }

    // Delete Category
    const delModalEl = q('#deleteModal');
    const delModal = new bootstrap.Modal(delModalEl);
    const delTitle = q('#deleteTitle');
    const delBody = q('#deleteBody');
    const confirmDeleteBtn = q('#confirmDeleteBtn');
    let pendingDelete = null; // { type: 'cat'|'sub', catId, subId? }

    qa('.del-cat').forEach(btn => btn.addEventListener('click', () => {
      const name = btn.dataset.catName;
      const catId = btn.dataset.catId;
      delTitle.textContent = 'Delete Category';
      delBody.innerHTML = `<div class="d-flex align-items-center mb-2"><i class="bi bi-exclamation-triangle-fill text-danger me-2"></i><strong>Delete "${name}"?</strong></div><div class="small text-danger">This will remove all subcategories and MCQs.</div>`;
      pendingDelete = { type: 'cat', catId };
      delModal.show();
    }));

    function handleDelSub(e){
      const btn = e.currentTarget;
      const sub = btn.dataset.subName;
      const catId = btn.dataset.catId;
      const subId = btn.dataset.subId;
      delTitle.textContent = 'Delete Subcategory';
      delBody.innerHTML = `<div class="d-flex align-items-center mb-2"><i class="bi bi-exclamation-triangle-fill text-danger me-2"></i><strong>Delete "${sub}"?</strong></div><div class="small text-danger">This will remove its MCQs from the total.</div>`;
      pendingDelete = { type: 'sub', catId, subId };
      delModal.show();
    }

    qa('.del-sub').forEach(btn => btn.addEventListener('click', handleDelSub));

    confirmDeleteBtn.addEventListener('click', () => {
      if (!pendingDelete) return;
      if (pendingDelete.type === 'cat') {
        const row = qa('.category-row').find(r => r.dataset.catId === pendingDelete.catId);
        const subs = q(`#subs_${pendingDelete.catId}`);
        if (row) row.remove();
        if (subs) subs.remove();
        // Reset form if we were editing this category
        if (editingId.value === pendingDelete.catId) setAddMode();
        showToast('Category deleted (UI only).');
      } else {
        const { catId, subId } = pendingDelete;
        const item = q(`[data-parent-cat="${catId}"] .sub-item[data-sub-id="${subId}"]`);
        if (item) item.remove();
        // Update counters
        const row = qa('.category-row').find(r => r.dataset.catId === catId);
        if (row) {
          const list = q(`#sublist_${catId}`);
          const subCountEl = q('.subcount', row);
          const totalEl = q('.total', row);
          if (list && subCountEl) subCountEl.textContent = String(list.querySelectorAll('.sub-item').length);
          if (totalEl) totalEl.textContent = calcTotal(catId);
        }
        showToast('Subcategory deleted (UI only).');
      }
      pendingDelete = null;
      delModal.hide();
    });

    // Search (client-side filter on category name)
    q('#tableSearch').addEventListener('input', (e) => {
      const term = e.target.value.toLowerCase();
      qa('#categoryBody > tr.category-row').forEach(row => {
        const name = (row.dataset.name || '').toLowerCase();
        row.style.display = name.includes(term) ? '' : 'none';
        const subsRow = q(`#subs_${row.dataset.catId}`);
        if (subsRow) subsRow.style.display = row.style.display; // keep pairs together
      });
    });

    // Global reset button (optional)
    const resetAllBtn = q('#resetAllBtn');
    if (resetAllBtn) resetAllBtn.addEventListener('click', () => { setAddMode(); showToast('Form reset.'); });

    // Initialize form state
    setAddMode();
  </script>
</body>

</html>
