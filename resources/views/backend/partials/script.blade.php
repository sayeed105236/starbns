<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>
<script src="{{asset('dist/js/app.js')}}"></script>
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js">

</script>
<script>
$(document).ready( function () {
  $('#myTable').DataTable();
} );
</script>
@stack('scripts')
