
    <h4 class="mb-4">Next of Kin Details</h4>
    <form id="nextOfKinForm">
      <div class="mb-3">
        <label for="name" class="form-label">Name Of Next Of Kin</label>
        <input type="text" class="form-control" id="name" name="name" value="Jason Olatunji Johnson" required>
      </div>

      <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <input type="text" class="form-control" id="address" name="address" value="12 Adebayo Street, Surulere, Lagos, Nigeria" required>
      </div>

      <div class="row">
        <div class="col-md-4 mb-3">
          <label for="relationship" class="form-label">Relationship</label>
          <select class="form-select" id="relationship" name="relationship" required>
            <option selected>Brother</option>
            <option>Sister</option>
            <option>Father</option>
            <option>Mother</option>
            <option>Spouse</option>
          </select>
        </div>

        <div class="col-md-4 mb-3">
          <label for="phone" class="form-label">Phone number</label>
          <div class="input-group">
            <span class="input-group-text">+234</span>
            <input type="text" class="form-control" id="phone" name="phone" value="750702218" required>
          </div>
        </div>

        <div class="col-md-4 mb-3">
          <label for="email" class="form-label">Email Address</label>
          <input type="email" class="form-control" id="email" name="email" value="jason@example.com" required>
        </div>
      </div>

      <button type="submit" class="btn btn-custom mt-3">Save Changes</button>
    </form>
