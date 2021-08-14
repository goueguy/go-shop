<script src="{{asset('assets/vendors/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/vendors/fastclick/lib/fastclick.js')}}"></script>
<script src="{{asset('assets/vendors/nprogress/nprogress.js')}}"></script>
<script src="{{asset('assets/vendors/Chart.js/dist/Chart.min.js')}}"></script>
<script src="{{asset('assets/vendors/gauge.js/dist/gauge.min.js')}}"></script>
<script src="{{asset('assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
<script src="{{asset('assets/vendors/iCheck/icheck.min.js')}}"></script>
<script src="{{asset('assets/vendors/skycons/skycons.js')}}"></script>
<script src="{{asset('assets/vendors/Flot/jquery.flot.js')}}"></script>
<script src="{{asset('assets/vendors/Flot/jquery.flot.pie.js')}}"></script>
<script src="{{asset('assets/vendors/Flot/jquery.flot.time.js')}}"></script>
<script src="{{asset('assets/vendors/Flot/jquery.flot.stack.js')}}"></script>
<script src="{{asset('assets/vendors/Flot/jquery.flot.resize.js')}}"></script>
<script src="{{asset('assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>
<script src="{{asset('assets/vendors/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
<script src="{{asset('assets/vendors/flot.curvedlines/curvedLines.js')}}"></script>
<script src="{{asset('assets/vendors/DateJS/build/date.js')}}"></script>
<script src="{{asset('assets/vendors/jqvmap/dist/jquery.vmap.js')}}"></script>
<script src="{{asset('assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
<script src="{{asset('assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
<script src="{{asset('assets/vendors/moment/min/moment.min.js')}}"></script>
<script src="{{asset('assets/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('assets/build/js/custom.min.js')}}"></script>
<script src="{{asset('assets/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
<script src="{{asset('assets/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
<script src="{{asset('assets/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
<script src="{{asset('assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
<script src="{{asset('assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
<script src="{{asset('assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
<script>
    $(function(){
        $("#data-list").DataTable();
        $("#categorie").change(function(){
            let id = $(this).val();
            let url = "{{route('admin.categories.subcategories',":id")}}";
            url = url.replace(":id",id);
            $("#sous_categorie").find('option').not(':first').remove();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({

                url:url,
                type:"GET",
                dataType:"json",
                data:{id:id},
                success:function(success){
                    let ArrayData = 0;
                    ArrayData = success['data'].length;
                    if(ArrayData > 0){
                        for (let i = 0; i < ArrayData; i++) {
                            let id = success['data'][i].id;
                            let name = success['data'][i].name;
                            let option = "<option value='"+id+"'>"+name+"</option>"
                            $("#sous_categorie").append(option);
                        }
                    }
                },
                error:function(error){
                    console.log(error);
                }
            })
        });
    })
</script>
