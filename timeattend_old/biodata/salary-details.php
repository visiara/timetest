   <h4 class="mb-4">Salary Details</h4>
    <form id="salaryForm">
      <div class="mb-3">
        <label for="bankName" class="form-label">Bank Name</label>
        <select class="form-select" id="bankName" name="bank_name" required>
          <option selected>Access Bank</option>
          <option>GTBank</option>
          <option>First Bank</option>
          <option>UBA</option>
        </select>
      </div>

      <div class="mb-3">
        <label for="accountNumber" class="form-label">Bank Account Number</label>
        <input type="text" class="form-control" id="accountNumber" name="account_number" value="750702218" required>
      </div>

      <div class="mb-3">
        <label for="pensionAdmin" class="form-label">Pension Fund Admin</label>
        <select class="form-select" id="pensionAdmin" name="pension_admin" required>
          <option selected>ARM Pensions</option>
          <option>Stanbic IBTC</option>
          <option>Fidelity Pensions</option>
        </select>
      </div>

      <div class="mb-3">
        <label for="rsaPin" class="form-label">RSA Pin</label>
        <input type="text" class="form-control" id="rsaPin" name="rsa_pin" value="85904y932" required>
      </div>

      <button type="submit" class="btn btn-custom mt-3">Save Changes</button>
    </form>

    <div class="mt-3" id="result"></div>
  </div>

