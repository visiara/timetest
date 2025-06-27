
    <h4 class="mb-4">Emergency Contact Details</h4>
    <form id="emergencyForm">
      <!-- Emergency Contact 1 -->
      <div class="mb-3">
        <label class="form-label">Full Name</label>
        <input type="text" class="form-control" name="contact1_name" value="Jason Olatunji Johnson" required>
      </div>

      <div class="row">
        <div class="col-md-4 mb-3">
          <label class="form-label">Relationship</label>
          <select class="form-select" name="contact1_relationship" required>
            <option selected>Brother</option>
            <option>Father</option>
            <option>Mother</option>
            <option>Spouse</option>
          </select>
        </div>

        <div class="col-md-4 mb-3">
          <label class="form-label">Phone number</label>
          <div class="input-group">
            <span class="input-group-text">+234</span>
            <input type="text" class="form-control" name="contact1_phone" value="750702218" required>
          </div>
        </div>

        <div class="col-md-4 mb-3">
          <label class="form-label">Email Address</label>
          <input type="email" class="form-control" name="contact1_email" value="jason@example.com" required>
        </div>
      </div>

      <!-- Divider -->
      <div class="divider"></div>

      <!-- Emergency Contact 2 -->
      <h5 class="mb-3">Emergency Contact 2</h5>

      <div class="mb-3">
        <label class="form-label">Full Name</label>
        <input type="text" class="form-control" name="contact2_name" value="Jason Olatunji Johnson" required>
      </div>

      <div class="row">
        <div class="col-md-4 mb-3">
          <label class="form-label">Phone number</label>
          <div class="input-group">
            <span class="input-group-text">+234</span>
            <input type="text" class="form-control" name="contact2_phone" value="750702218" required>
          </div>
        </div>

        <div class="col-md-4 mb-3">
          <label class="form-label">Relationship</label>
          <select class="form-select" name="contact2_relationship" required>
            <option selected>Brother</option>
            <option>Father</option>
            <option>Mother</option>
            <option>Spouse</option>
          </select>
        </div>

        <div class="col-md-4 mb-3">
          <label class="form-label">Email Address</label>
          <input type="email" class="form-control" name="contact2_email" value="jason@example.com" required>
        </div>
      </div>

      <!-- Submit -->
      <button type="submit" class="btn btn-custom mt-3">Save Changes</button>
    </form>
