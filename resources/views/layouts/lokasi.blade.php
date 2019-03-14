@extends('layouts.app')
@extends('layouts.error')
@section('content')

<p><span id="lokasi"></span></p>

    <script type="text/javascript">
	$(document).ready(function() {
		navigator.geolocation.getCurrentPosition(function (position) {
   			 tampilLokasi(position);
		}, function (e) {
		    alert('Geolocation Tidak Mendukung Pada Browser Anda');
		}, {
		    enableHighAccuracy: true
		});
	});
	function tampilLokasi(posisi) {
        //console.log(posisi);
        var foto = 'foto2';
		var latitude 	= posisi.coords.latitude;
		var longitude 	= posisi.coords.longitude;
		$.ajax({
			type 	: 'get',
			url		: '{{ route("data.lokasi") }}',
			data 	: 'latitude='+latitude+'&longitude='+longitude+'&foto='+foto,
			success	: function (e) {
				if (e) {
					alert(foto);
					$('#lokasi').html(e);
				}
				//else{
			//		$('#lokasi').html('Tidak Tersedia');
			//	}
			}
		})
	}
</script>
@stop

