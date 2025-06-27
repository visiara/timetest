<script>
function confirmActivation(id){
  if (id == 'InActive'){
    return confirm('Are you sure you want to De-Activate this User?');
  } else {
    return confirm('Are you sure you want to Activate this User?');
  }
}

function confirmEdit(){
  return confirm('Are you sure you want to Edit this Data?');
}

function confirmDelete(){
  return confirm('Are you sure you want to Delete this Data?');
}

function confirmRestore(){
  return confirm('Are you sure you want to Restore this Data?');
}

</script>
        <div class="footer-left">
          <div class="mg-b-2">Copyright &copy; <?php echo date("Y"); ?>. Heckerbella Limited. All Rights Reserved.</div>
        </div>
        <div class="footer-right d-flex align-items-center">
          <span class="tx-uppercase mg-r-10">Share:</span>
          <a target="_blank" class="pd-x-5" href="https://www.facebook.com/sharer/sharer.php?u=http%3A//heckabella.com"><i class="fab fa-facebook tx-20"></i></a>
          <a target="_blank" class="pd-x-5" href="https://twitter.com"><i class="fab fa-twitter tx-20"></i></a>
        </div>