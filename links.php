<title>
  <?php if (isset($pageTitle)) {
    echo $pageTitle;
  } else {
    echo webSetting('title') ?? 'AMS';
  } ?>
</title>
<link rel="icon" type="image/png" href="/ams/assets/images/tractorlogo.png">

<link rel="stylesheet" href="/ams/assets/css/style.css">
<link rel="stylesheet" href="/ams/assets/css/styles.css">
<link rel="stylesheet" href="/ams/assets/css/bootstrap.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />

<!--     Fonts and icons     -->
<link href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,800" rel="stylesheet" />

<!-- Font Awesome Icons -->
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>


<!-- CSS Files -->
<link id="pagestyle" href="/ams/assets/css/soft-ui-dashboard.css?v=1.1.0" rel="stylesheet" />

<!--   Core JS Files   -->
<script src="/ams/assets/js/core/popper.min.js"></script>
<script src="/ams/assets/js/core/bootstrap.min.js"></script>
<script src="/ams/assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="/ams/assets/js/plugins/smooth-scrollbar.min.js"></script>
<script src="/ams/assets/js/plugins/chartjs.min.js"></script>
<script src="/ams/assets/js/jquery-3.7.1.min.js"></script>
<script src="/ams/assets/js/core/bootstrap.bundle.min.js"></script>

<!-- Control Center for Dashboard: parallax effects, scripts for the example pages etc -->
<script src="/ams/assets/js/soft-ui-dashboard.min.js?v=1.1.0"></script>

<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">


<script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="/ams/includes/style.js"></script>

<script>

  // Force refresh when coming back from cache
  window.addEventListener("pageshow", function (event) {
    if (event.persisted) {
      window.location.reload();
    }
  });
</script>
<script>
  $(document).ready(function () {
    $('.mysummernote').summernote({
      height: 250
    });
    $('.dropdown-toogle').dropdown();
  });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>


<script>
  $(document).ready(function () {
    $('#myTable').DataTable();
  });
</script>

<script>
  var win = navigator.platform.indexOf('Win') > -1;
  if (win && document.querySelector('#sidenav-scrollbar')) {
    var options = {
      damping: '0.5'
    }
    Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
  }
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="/ams/assets/js/soft-ui-dashboard.min.js?v=1.1.0"></script>