
    <h4 class="mb-3">Dependents (Spouse & Children)</h4>

    <!-- Spouse Section -->
    <form id="dependentsForm">
      <h5 class="mb-3">Spouse Details</h5>

      <div class="mb-3">
        <label class="form-label">Full Name</label>
        <input type="text" class="form-control" name="spouse_name" value="Sarah Johnson" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Residential Address</label>
        <input type="text" class="form-control" name="spouse_address" value="12 Adebayo Street, Surulere, Lagos, Nigeria" required>
      </div>

      <div class="row">
        <div class="col-md-6 mb-3">
          <label class="form-label">Phone number</label>
          <div class="input-group">
            <span class="input-group-text">+234</span>
            <input type="text" class="form-control" name="spouse_phone" value="750702218" required>
          </div>
        </div>

        <div class="col-md-6 mb-3">
          <label class="form-label">Date Of Birth</label>
          <input type="date" class="form-control" name="spouse_dob" value="2005-01-01" required>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6 mb-3">
          <label class="form-label">Occupation</label>
          <input type="text" class="form-control" name="spouse_occupation" value="Lawyer" required>
        </div>

        <div class="col-md-6 mb-3">
          <label class="form-label">Gender</label>
          <select class="form-select" name="spouse_gender" required>
            <option selected>Female</option>
            <option>Male</option>
            <option>Other</option>
          </select>
        </div>
      </div>

      <!-- Divider -->
      <div class="divider"></div>

      <!-- Children Section -->
      <h5 class="mb-3">Children Details</h5>

      <div class="child-card">
        <div class="child-info">
          <div class="child-avatar bg-primary"></div>
          <div>
            <strong>Jason Johnson</strong><br>
            <small>Son</small>
          </div>
        </div>
        <div class="child-actions">
          <button type="button" class="btn btn-sm btn-outline-light">Edit</button>
          <button type="button" class="btn btn-sm btn-outline-danger">Remove</button>
        </div>
      </div>

      <div class="child-card">
        <div class="child-info">
          <div class="child-avatar bg-pink"></div>
          <div>
            <strong>Jason Johnson</strong><br>
            <small>Daughter</small>
          </div>
        </div>
        <div class="child-actions">
          <button type="button" class="btn btn-sm btn-outline-light">Edit</button>
          <button type="button" class="btn btn-sm btn-outline-danger">Remove</button>
        </div>
      </div>

      <div class="child-card">
        <div class="child-info">
          <div class="child-avatar bg-pink"></div>
          <div>
            <strong>Jason Johnson</strong><br>
            <small>Daughter</small>
          </div>
        </div>
        <div class="child-actions">
          <button type="button" class="btn btn-sm btn-outline-light">Edit</button>
          <button type="button" class="btn btn-sm btn-outline-danger">Remove</button>
        </div>
      </div>

      <!-- Add child block -->
      <div class="add-child mb-4">
        <span>+ Add Child</span>
      </div>

      <button type="submit" class="btn btn-custom mt-3">Save Changes</button>
    </form>
